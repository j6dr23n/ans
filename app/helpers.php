<?php

use App\Models\Anime;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Kutia\Larafirebase\Facades\Larafirebase;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

const TTL = 9000; //set the cache time for 2.5 hours

function getPosts($type)
{
    return Anime::with('page')->where('type', $type)->latest('updated_at');
}

function getPost($slug)
{
    return Cache::remember('post-'.$slug, TTL, function () use ($slug) {
        $post = Anime::with(['page','episodes'])->where('slug', $slug)->firstOrFail();
        $post->unique_views_count = views($post)->unique()->count();

        return $post;
    });
}

function getManga($slug)
{
    return Cache::remember('post-'.$slug, TTL, function () use ($slug) {
        $manga = Anime::with(['page','chapters'])->where('slug', $slug)->firstOrFail();
        $manga->unique_views_count = views($manga)->unique()->count();

        return $manga;
    });
}

function getChapters($manga)
{
    return Cache::remember('chapters-'.$manga->slug, TTL, function () use ($manga) {
        return $manga->chapters;
    });
}

function getFeaturedPosts()
{
    return Cache::remember('featured', TTL, function () {
        return Anime::whereFeatured('on')->orderByDesc('updated_at')->take(12)->get();
    });
}

function getOngoingPosts()
{
    return Cache::remember('ongoing', TTL, function () {
        return Anime::whereCondition('ongoing')->take(10)->get();
    });
}

function getAnimes()
{
    return Cache::remember('animes', TTL, function () {
        return getPosts('anime')->take(10)->get();
    });
}

function getRandomPostsByType($type)
{
    return DB::table('animes')->where('type', $type)->inRandomOrder()->latest();
}

function getAllPosts()
{
    $currentPage = request()->get('page', 1);
    return Cache::remember('posts-'.$currentPage, TTL, function () {
        $posts = Anime::with('page')->orderByDesc('updated_at')->paginate(24);
        foreach ($posts as $post) {
            $post->unique_views_count = views($post)->unique()->count();
        }

        return $posts;
    });
}

function getFeaturedPostsByType($type)
{
    $currentPage = request()->get('page', 1);
    return Cache::remember($type.'-featured-posts-'.$currentPage, TTL, function () use ($type) {
        return Anime::whereType($type)->whereFeatured('on')->latest()->get();
    });
}

function getPostsByType($type)
{
    $currentPage = request()->get('page', 1);
    return Cache::remember($type.'-posts-'.$currentPage, TTL, function () use ($type) {
        $posts = getPosts($type)->paginate(24);
        foreach ($posts as $post) {
            $post->unique_views_count = views($post)->unique()->count();
        }

        return $posts;
    });
}

function webPushNoti($title, $message, $image)
{
    try {
        $fcmTokens = User::whereNotNull('fcm_token')->pluck('fcm_token')->toArray();

        $response = Larafirebase::withTitle($title)
        ->withBody($message)
        ->withImage($image)
        ->withIcon('https://aninewstage.org/images/logo/logo.jpg')
        ->withSound('default')
        ->sendMessage($fcmTokens);

        return $response->getStatusCode();
    } catch(\Exception $e) {
        report($e);
        Log::alert($e->getMessage());
        return $e->getMessage();
    }
}

function sendTele($data, $channel_id)
{
    if ($data->animes_id) {
        $response = Telegram::sendPhoto([
            'chat_id' => env('CHANNEL_ID'),
            'photo' => InputFile::createFromContents(\file_get_contents($data->anime->poster), $data->anime->title),
            'caption' => 'New episode of '. $data->anime->title.' has been added. ('.ucfirst($data->anime->type).')
Added By : '.$data->anime->page->name.'.

Watch Now : '.env('APP_URL').'/page/'.$data->anime->page->slug
        ]);
    } elseif ($data->chapter_no) {
        $response = Telegram::sendPhoto([
            'chat_id' => $channel_id,
            'photo' => InputFile::createFromContents(\file_get_contents($data->manga->poster), $data->manga->title),
            'caption' => 'New chapter of '. $data->manga->title.' has been added. ('.ucfirst($data->manga->type).')
Added By : '.$data->manga->page->name.'.

Read Now : '.env('APP_URL').'/page/'.$data->manga->page->slug
        ]);
    } else {
        $response = Telegram::sendPhoto([
            'chat_id' => $channel_id,
            'photo' => InputFile::createFromContents(\file_get_contents($data->poster), $data->title),
            'caption' => $data->title.' has been added. ('.ucfirst($data->type).')
    Added By : '.$data->page->name.'.
    
    Watch Now : '.env('APP_URL').'/page/'.$data->page->slug
        ]);
    }

    return $response;
}

function fbposter($data)
{
    $fb = new \Facebook\Facebook([
        'app_id' => '814031489642087',
        'app_secret' => '0fb9aa27a88203c1bac1a7989df2eeea',
        'default_graph_version' => 'v15.0',
        'default_access_token' => env('FB_ACCESS_TOKEN'), // optional
        ]);
    try {
        $data = [
            'message' => $data->title."

".$data->info."

Represent By - ".$data->page->name."

Watch Here - ".env('APP_URL')."/page/".$data->page->slug."

Follow for more update - https://t.me/aninewstage",
            'source' => $fb->fileToUpload($data->poster),
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

function allow($id)
{
    return Auth::user()->paidPages->pluck('page_id')->contains($id) && auth()->user()->paidPages->where('page_id', $id)->firstOrFail()->expiry_at >= Carbon::today()->toDateString();
}

function intWithStyle($n)
{
    if ($n < 1000) {
        return $n;
    }
    $suffix = ['','k','M','G','T','P','E','Z','Y'];
    $power = floor(log($n, 1000));
    return round($n/(1000**$power), 1, PHP_ROUND_HALF_EVEN).$suffix[$power];
}
//To Encrypt  $this::encrypt_decrypt($value, 'encrypt');
//To Decrypt $this::encrypt_decrypt($value, 'decrypt');
function encrypt_decrypt($string, $action = 'encrypt')
{
    $ciphering = "AES-128-ECB";

    // Use OpenSSl Encryption method
    $iv_length = openssl_cipher_iv_length($ciphering);
    $options = 0;

    // Non-NULL Initialization Vector for encryption
    $encryption_iv = '1643839201265821';

    // Store the encryption key
    $encryption_key = "KRULYWYNE&&NAINGMINSYSTEM19999";

    if ($action == 'encrypt') {
        $output=openssl_encrypt(
            $string,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
    } elseif ($action == 'decrypt') {
        $output = openssl_decrypt(
            $string,
            $ciphering,
            $encryption_key,
            $options,
            $encryption_iv
        );
    }
    return $output;
}
