<?php

namespace App\Jobs;

use App\Models\Anime;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ChangePosterFormatToWebp implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $poster;
    public $id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id, $poster)
    {
        $this->poster = $poster;
        $this->id = $id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $fileName = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);
        $webp = Image::make($this->poster)->encode('webp', 75)->save(storage_path('app/public/poster/'  . $fileName  . '.webp'));

        $token = $this->getTokenB2();
        $file = $this->uploadVideoB2($token, $fileName);
        $imageURL = env("STORAGE_URL").'/file/ans-assets/'.$file['fileName'];
        $anime = Anime::findOrFail($this->id);
        $anime->update(['poster' => $imageURL]);
        Storage::disk('public')->delete('poster/'.$fileName.'.webp');

        Log::info($anime->poster);
    }

    protected function getTokenB2()
    {
        $apiUrl = 'https://api004.backblazeb2.com';
        $authToken = $this->getAuthTokenB2();

        $api_url = $apiUrl; // From b2_authorize_account call
        $auth_token = $authToken; // From b2_authorize_account call
        $bucket_id = env('BUCKET_ID');  // The ID of the bucket you want to upload to

        $session = curl_init($api_url.'/b2api/v2/b2_get_upload_url');

        // Add post fields
        $data = ['bucketId' => $bucket_id];
        $post_fields = json_encode($data);
        curl_setopt($session, CURLOPT_POSTFIELDS, $post_fields);

        // Add headers
        $headers = [];
        $headers[] = 'Authorization: '.$auth_token;
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close($session); // Clean up
        $results = json_decode($server_output, true);
        $upload_auth_token = $results['authorizationToken'];
        $upload_url = $results['uploadUrl'];
        $token = [$upload_url, $upload_auth_token];

        return $token;
    }

    protected function getAuthTokenB2()
    {
        $application_key_id = env('B2_APP_KEY_ID'); // Obtained from your B2 account page
        $application_key = env('B2_APP_KEY'); // Obtained from your B2 account page
        $credentials = base64_encode($application_key_id . ":" . $application_key);
        $url = "https://api.backblazeb2.com/b2api/v2/b2_authorize_account";

        $session = curl_init($url);

        // Add headers
        $headers = [];
        $headers[] = 'Accept: application/json';
        $headers[] = 'Authorization: Basic '.$credentials;
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers);  // Add headers

        curl_setopt($session, CURLOPT_HTTPGET, true);  // HTTP GET
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true); // Receive server response
        $server_output = curl_exec($session);
        curl_close($session);
        $results = json_decode($server_output, true);
        $auth_token = $results['authorizationToken'];

        return $auth_token;
    }

    protected function uploadVideoB2($token, $fileName)
    {
        $file_name = 'posters/'.$fileName.'.webp';
        $my_file = storage_path('app/public/poster/'.$fileName.'.webp');
        $handle = fopen($my_file, 'r');
        $read_file = fread($handle, filesize($my_file));

        $upload_url = $token[0]; // Provided by b2_get_upload_url
        $upload_auth_token = $token[1]; // Provided by b2_get_upload_url
        $bucket_id = env('BUCKET_ID');  // The ID of the bucket
        $content_type = 'image/webp';
        $sha1_of_file_data = sha1_file($my_file);

        $session = curl_init($upload_url);

        // Add read file as post field
        curl_setopt($session, CURLOPT_POSTFIELDS, $read_file);

        // Add headers
        $headers = [];
        $headers[] = 'Authorization: '.$upload_auth_token;
        $headers[] = 'X-Bz-File-Name: '.$file_name;
        $headers[] = 'Content-Type: '.$content_type;
        $headers[] = 'X-Bz-Content-Sha1: '.$sha1_of_file_data;
        $headers[] = 'X-Bz-Info-Author: '.'unknown';
        $headers[] = 'X-Bz-Server-Side-Encryption: '.'AES256';
        curl_setopt($session, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($session, CURLOPT_POST, true); // HTTP POST
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);  // Receive server response
        $server_output = curl_exec($session); // Let's do this!
        curl_close($session); // Clean up
        $output = $server_output;

        return json_decode($output, true);
    }
}
