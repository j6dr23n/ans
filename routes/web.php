<?php

use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\AdsSettingController;
use App\Http\Controllers\Admin\Anime\MoreDlController;
use App\Http\Controllers\Admin\Anime\DriveController;
use App\Http\Controllers\Admin\Anime\MoreEBController;
use App\Http\Controllers\Admin\Anime\ResolutionController;
use App\Http\Controllers\Admin\Anime\TypeController;
use App\Http\Controllers\Admin\Anime\GenreController;
use App\Http\Controllers\Admin\AnimeController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\ChannelController;
use App\Http\Controllers\Admin\ChannelServerController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WebPushNotiController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageSettingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\WatchListController;
use App\Models\WatchList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class,'index'])->name('index');
Route::get('/animes', [PageController::class,'animes'])->name('animes');
Route::get('/movies', [PageController::class,'movies'])->name('movies');
Route::get('/hentai', [PageController::class,'hentai'])->name('hentai');
Route::get('/manga', [PageController::class,'manga'])->name('manga');
Route::get('/guide', [PageController::class,'guide'])->name('guide');
Route::get('/view/{slug}', [PageController::class,'show'])->name('view.show');
Route::get('/view/{slug}/stream/{id}', [PageController::class,'stream'])->name('view.stream');
Route::get('/view/{slug}/download/{id}', [PageController::class,'download'])->name('view.download');
Route::get('/about', [PageController::class,'about'])->name('about');
Route::any('/search-results', [PageController::class,'search'])->name('home.search');

Route::get('/tv-channels', [PageController::class,'tv_channels'])->name('tv-channels');
Route::get('/tv-channels/{id}', [PageController::class,'tv_channel_show'])->name('tv-channel.show');

Route::get('/view/{anime:slug}/chapter/{chapter:chapter_no}', [PageController::class,'show_chapter'])->name('pages.chapter.show');

Route::get('/pages', [PageController::class,'pages_index'])->name('pages.index');
Route::get('/page/{slug}', [PageController::class,'pages_show'])->name('pages.show');
Route::get('/pricing', [PageController::class,'pages_pricing'])->name('pages.pricing');

Route::post('/download', [DownloadController::class,'download'])->name('user.download');
Route::patch('/fcm-token', [WebPushNotiController::class, 'updateToken'])->name('fcmToken');

Route::group(['middleware' => 'member'], function () {
    Route::get('/login', [MemberController::class,'index'])->name('member.login');
    Route::get('/login-manual', [MemberController::class,'manual_view'])->name('member.login_manual');
    Route::post('/login-manual', [MemberController::class,'manual_store'])->name('member.login_store');
});

Route::get('auth/facebook', [MemberController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [MemberController::class, 'loginWithFacebook']);

Route::get('auth/google', [MemberController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [MemberController::class, 'handleGoogleCallback']);


Route::group(['middleware' => 'auth'], function () {
    Route::resource('payments', PaymentController::class);
    Route::get('/profile/{fb_id}', [PageController::class,'pages_profile'])->name('pages.profile');
    Route::put('/profile/{id}', [PageController::class,'pages_profile_update'])->name('pages.profile_update');
    Route::resource('/watchlist', WatchListController::class);
});

Route::group(['middleware' => ['admin','page.last_seen'],'prefix' => 'ans'], function () {
    Route::get('push-notificaiton', [WebPushNotiController::class, 'index'])->name('push-notificaiton');
    Route::post('/send-notification', [WebPushNotiController::class,'notification'])->name('notification');

    Route::get('lara-logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    Route::get('/dashboard', [AdminPageController::class,'index'])->name('dashboard');
    Route::resource('/page-settings', PageSettingController::class);
    Route::resource('/ads-settings', AdsSettingController::class);
    Route::post('/admin-search-results', [AdminPageController::class,'search'])->name('admin.search');
    Route::post('/advanced-upload', [AdminPageController::class,'advancedFileUpload'])->name('file.advanced.upload');

    Route::resource('ads', AdsController::class);
    Route::resource('animes', AnimeController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('episodes', EpisodeController::class)->except('create');
    Route::resource('page', PagesController::class);
    Route::resource('drives', DriveController::class);
    Route::resource('quotes', QuoteController::class);
    Route::resource('resolutions', ResolutionController::class);
    Route::resource('types', TypeController::class);
    Route::resource('users', UserController::class);
    Route::resource('payments', AdminPaymentController::class, ['as' => 'akm']);
    Route::resource('chapters', ChapterController::class)->except('create');
    Route::resource('channels', ChannelController::class);
    Route::get('channel-server/view/{id}', [ChannelServerController::class,'index'])->name('channel-server.index');
    Route::get('channel-server/{channel:id}/create', [ChannelServerController::class,'create'])->name('channel-server.create');
    Route::resource('channel-server', ChannelServerController::class)->except('index', 'create');
    Route::get('/chapter/{id}/create', [ChapterController::class,'create'])->name('chapters.create');
    Route::resource('moredl', MoreDlController::class);
    Route::resource('moreeb', MoreEBController::class);
    Route::get('movies', [AdminPageController::class,'movies'])->name('movies.index');
    Route::get('manga', [AdminPageController::class,'manga'])->name('manga.index');
    Route::get('hentai', [AdminPageController::class,'hentai'])->name('hentai.index');
    Route::get('all', [AdminPageController::class,'all'])->name('pages.all');
    Route::get('posts', [AdminPageController::class,'posts'])->name('pages.posts');
    Route::get('analytics', [AdminPageController::class,'analytics'])->name('pages.analytics');
    Route::get('download-logs', [AdminPageController::class,'download_logs'])->name('pages.dl-logs');
    Route::get('logs', [AdminPageController::class,'logs'])->name('pages.logs');
    Route::get('episodes/{id}/create/', [EpisodeController::class,'create'])->name('episodes.create');
    Route::get('episodes/{id}/auto-create/', [EpisodeController::class,'auto_create'])->name('episodes.auto.create');
});
require __DIR__.'/auth.php';
