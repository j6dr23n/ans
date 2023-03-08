<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\File;
use Artisan;

class ProcessManaga implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $mangaName;
    public $fileName;
    public $chapter;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mangaName, $fileName, $chapter)
    {
        $this->mangaName = $mangaName;
        $this->fileName = $fileName;
        $this->chapter = $chapter;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $img = new \Imagick();

        // $path = public_path()."/storage/manga/".$mangaName.'/images/'.$pdfName;
        // File::makeDirectory($path, $mode = 0777, true, true);
        File::makeDirectory(public_path()."/storage/manga/".$this->mangaName."/chapter/".$this->chapter->chapter_no, $mode = 0777, true, true);
        $saveImagePath = public_path()."/storage/manga/".$this->mangaName."/chapter/".$this->chapter->chapter_no."/image.jpg";
        $img->setResolution(144, 144);
        $img->readImage(public_path('/storage/manga/'.$this->mangaName.'/pdf/'.$this->fileName));
        $img->setImageUnits(\Imagick::RESOLUTION_PIXELSPERINCH); //Declare the units for resolution.
        $img->setImageFormat('jpeg');
        $img->setImageCompression(\Imagick::COMPRESSION_JPEG);
        $img->setImageCompressionQuality(100);
        $img->writeImages($saveImagePath, true);
        $img->clear();
        $img->destroy();

        $this->chapter->update([
            'img_path' => $saveImagePath,
            'pdf_path' => '/storage/manga/'.$this->mangaName.'/pdf/'.$this->fileName
        ]);

        $noti['title'] = $this->chapter->manga->title;
        $noti['message'] = 'New chapter added';

        if (app()->environment('production')) {
            sendTele($this->chapter, env('CHANNEL_ID'));
            sendTele($this->chapter, env('CHANNEL_ID_21'));
            webPushNoti($noti['title'], $noti['message'], $this->chapter->manga->poster);
            Artisan::call('tmp:clean');
        }
    }
}
