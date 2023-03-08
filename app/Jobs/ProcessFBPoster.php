<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessFBPoster implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fb = new \Facebook\Facebook([
            'app_id' => '814031489642087',
            'app_secret' => '0fb9aa27a88203c1bac1a7989df2eeea',
            'default_graph_version' => 'v15.0',
            'default_access_token' => env('FB_ACCESS_TOKEN'), // optional
            ]);
        try {
            $data = [
                'message' => $this->data->title."

".$this->data->info."

Represent By - ".$this->data->page->name."

Watch Here - ".env('APP_URL')."/page/".$this->data->page->slug."

Follow for more update - https://t.me/aninewstage",
                'source' => $fb->fileToUpload($this->data->poster),
            ];
            $response = $fb->post('/101766916083447/photos', $data);
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(\Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        $response->getGraphNode();
    }
}
