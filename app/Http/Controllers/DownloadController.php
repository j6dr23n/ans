<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Episode;
use App\Models\MoreDownload;
use App\Models\User;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public const DownloadLimit = 12;
    public const Episode = 'Episode';
    public const Chapter = 'Chapter';
    public const MoreDownload = 'MoreDownload';

    public function download(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->firstOrFail();
        if ($user->dlcount < self::DownloadLimit) {
            if ($request->has('dl_id')) {
                $dl = MoreDownload::where('id', $request->dl_id)->firstOrFail();
                $this->dlcountadd($user);
                $this->log($user, $dl);

                return redirect()->away($dl->download_link);
            }

            if ($request->has('chapter_id')) {
                $chapter = Chapter::where('id', $request->chapter_id)->firstOrFail();
                $this->dlcountadd($user);
                $this->log($user, $chapter);

                if ($chapter->dl_link !== null) {
                    return redirect()->away($chapter->dl_link);
                }

                return back()->with('error', 'There is no download link!!!');
            }

            if (! $request->has('dl_id')) {
                $episode = Episode::with('anime')->where('id', $request->epi_id)->firstOrFail();

                if (Auth::check() && Auth::user()->isUser()) {
                    if ($episode->epi_720p_link !== null) {
                        $this->dlcountadd($user);
                        $this->log($user, $episode);

                        return redirect()->away($episode->epi_720p_link);
                    }
                    return redirect()->back()->with('error', 'Download link not available for free user!!!');
                }
                $this->dlcountadd($user);
                $this->log($user, $episode);

                return redirect()->away($episode->epi_link);
            }
        }
        return redirect()->back()->with('error', 'Your daily download limit reached!!!');
    }

    protected function log($user, $model)
    {
        $agent = new Agent();

        switch (class_basename($model)) {
            case self::MoreDownload:
                $pageId = $model->episode->anime->page->id;
                $description =  $description = $user->name.' has download '.$model->episode->anime->type.' ('.$model->episode->epi_number.') of '.$model->episode->anime->title;
                break;
            case self::Episode:
                $pageId = $model->anime->page->id;
                $description = $user->name.' has download '.$model->anime->type.' ('.$model->epi_number.') of '.$model->anime->title;
                break;
            case self::Chapter:
                $pageId = $model->manga->page->id;
                $description = $user->name.' has download '.$model->manga->type.' ('.$model->chapter_no.') of '.$model->manga->title;
                break;
            default:
                $description = $user->name.' download something and we can\'t identify.';
                break;
        }

        $log = activity('user_download')->causedBy($user)
        ->performedOn($model)
        ->event('download')
        ->withProperties([
                'page_id' => $pageId,
                'device' => $agent->device(),
                'ip' => request()->ip(),
                'platform' => $agent->platform(),
                'browser' => $agent->browser(),
            ])
            ->log($description);

        return $log;
    }

    protected function dlcountadd($user): User
    {
        $user->increment('dlcount', 1);
        $user->save();

        return $user;
    }
}
