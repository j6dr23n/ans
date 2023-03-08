<?php

namespace App\Jobs\Uploads;

use App\Models\Episode;
use App\Models\MoreDownload;
use App\Models\MoreEmbed;
use App\Models\PageSetting;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UploadToUpStream implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $timeout = 7200;
    public $data;
    public $id;
    public $page_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $id, $page_id)
    {
        $this->data = $data;
        $this->id = $id;
        $this->page_id = $page_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $setting = PageSetting::where('page_id', $this->page_id)->firstOrFail();
        $upload_url = $this->getUploadUrl($setting->upstream_api_key); //get upload url from streamsb api
        $results = $this->uploadVideoDD($setting->upstream_api_key, $upload_url); // start uploading to streamsb account
        Log::info($upload_url, $results);
        $code = $results['files'][0]['filecode'];

        //Episode Info Updated
        $episode = Episode::where('id', $this->id)->firstOrFail();
        if ($episode->embed_link === null) {
            $episode->drive = 'upstream';
            $episode->epi_link = "https://upstream.to/d/".$code;
            $episode->epi_720p_link = "https://upstream.to/d/".$code;
            $episode->embed_link = "https://upstream.to/embed-".$code.".html";
            $episode->save();
        }

        if ($episode->embed_link !== null) {
            MoreDownload::create([
                'episode_id' => $this->id,
                'drive' => 'upstream',
                'resolution' => '720p',
                'download_link' => "https://upstream.to/d/".$code
            ]);

            MoreEmbed::create([
                'episode_id' => $this->id,
                'drive' => 'upstream',
                'resolution' => '720p',
                'embed_link' => "https://upstream.to/embed-".$code.".html"
            ]);
        }
        $setting->increment('bandwidth_usage', $this->data[1]);
        $setting->save();
    }

    public function failed(Exception $exception)
    {
        Log::error($exception);
    }

    protected function getUploadUrl($api_key)
    {
        $url = 'https://upstream.to/api/upload/server?key='.$api_key;

        $session = curl_init($url);

        curl_setopt($session, CURLOPT_HTTPGET, true);  // HTTP GET
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true); // Receive server response
        $server_output = curl_exec($session);
        curl_close($session);
        $results = json_decode($server_output, true);
        $uploadUrl = $results['result'];

        return $uploadUrl;
    }

    protected function uploadVideoDD($api_key, $upload_url)
    {
        $file_name = date('d-m-Y').'/'.$this->data[0];
        $my_file = storage_path('app/videos/tempo/'.$this->data[0]);
        $type = pathinfo($my_file, PATHINFO_EXTENSION);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $upload_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);

        $posts = ['key' => "$api_key",
            'file' => curl_file_create($my_file, $type, $file_name), ];

        // Add read file as post field
        curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);

        $server_output = curl_exec($ch); // Let's do this!
        curl_close($ch); // Clean up
        $output = $server_output;

        return json_decode($output, true);
    }
}
