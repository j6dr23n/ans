@section('title', '- ' . $post->title)

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ Str::limit($post->info, 150) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit($post->info, 150) }}">
    <meta property="og:image" content="{{ $post->poster }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ $post->title }}">
    <meta property="twitter:description" content="{{ Str::limit($post->info, 150) }}">
    <meta property="twitter:image" content="{{ $post->poster }}">

    @if ($post->page->isPopupAdsOpen())
        <script type='text/javascript' src='//silldisappoint.com/fe/95/f5/fe95f52ff6c663d0c6128ac07c6553c2.js'></script>
    @endif
@endsection

<x-layout>
    <!-- Breadcrumb -->
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2">
                            <h2>{{ $post->title }}</h2>
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list-2">
                                <li>Total {{ $post->episodes->count() }} Episodes</li>
                                <li>View: {{ $post->unique_views_count }}</li>
                                <li>Rating: {{ $post->rating }}</li>
                                <li>{{ $post->release_year }}</li>
                                <li>{{ $post->genres }}</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Breadcrumb -->
    <main class="page-content">
        <div class="movie-details-wrap section-ptb-50 bg-black">
            <div class="container">
                <div class="movie-details-video-content-wrap">
                    <div class="video-wrap-2 poster-div">
                        <img src="{{ $post->poster }}" class="img-fluid poster-image" alt="">
                    </div>
                    <div class="movie-details-content">
                        <ul role="tablist" class="nav dashboard-list white mb--60">
                            <li class="active" role="presentation"><a href="#description" data-bs-toggle="tab"
                                    class="tablist-btn active">Description</a></li>
                            @if ($post->trailer)
                                <li class="active" role="presentation"><a href="#trailer" data-bs-toggle="tab"
                                        class="tablist-btn ">Trailer</a></li>
                            @endif
                        </ul>
                        <div class="tab-content dashboard-content">
                            <div class="tab-pane active" id="description">
                                <div class="row">
                                    <div class="movie-details-info">
                                        <ul>
                                            <li><span>Title: </span>{{ $post->title }}</li>
                                            <li><span>View: </span>{{ $post->unique_views_count }}</li>
                                            <li><span>Type: </span>{{ $post->type }}</li>
                                            <li><span>Rating:</span><span style="color: white"><i
                                                        class="zmdi zmdi-star-half"></i>
                                                    {{ $post->rating }}</span></li>
                                            <li><span>Genres: </span>{{ $post->genres }}</li>
                                            <li><span>Sub Genres: </span>{{ $post->sub_genres }}</li>
                                            <li><span>Condition: </span>{{ $post->condition }}</li>
                                            <li><span>Release Year: </span>{{ $post->release_year }}</li>
                                            <li><span>Season: </span>{{ $post->season }}</li>
                                            @if ($post->page)
                                                <li><span>Represent By: </span><a
                                                        href="/page/{{ $post->page->slug }}">{{ $post->page->name }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <p>{{ $post->info }}</p>
                                </div>
                            </div>
                            @if ($post->trailer)
                                <div class="tab-pane" id="trailer">
                                    <div class="row">
                                        <div class="video-wrap">
                                            <iframe id="iframe-embed" src="{{ $post->trailer }}"
                                                title="{{ $post->title }}" frameborder="0" scrolling="no"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                style="display: block;"allowfullscreen></iframe>
                                        </div>
                                        @if ($post->page->isNativeAdsOpen())
                                            <x-ads.bannernative :id="'page-' . $post->page->ads_code" />
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
            <div class="container-fluid">
                @if ($post->page->isTop720x90AdsOpen())
                    <x-ads.banner720x90 :id="'page-' . $post->page->ads_code" />
                @endif
                <div class="section-title-4 st-border-bottom">
                    <h2>Episodes ({{ $post->episodes->count() }})</h2>
                </div>
                <div class="row">
                    @forelse ($post->episodes as $item)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="movie-wrap text-center mb-30">
                                <div class="movie-img">
                                    <a><img src="{{ $post->poster }}" alt="{{ $post->title }}"></a>
                                    <form action="{{ route('watchlist.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="episode_id" value="{{ $item->id }}">
                                        <button title="Watchlist" class="Watch-list-btn" type="submit"
                                            tabindex="0"><i class="zmdi zmdi-plus"></i></button>
                                    </form>
                                    <span style="color: white;">Episode No.{{ $item->epi_number }}</span>
                                </div>
                                <div class="movie-content">
                                    <span>Episode no: {{ $item->epi_number }}</span>
                                    <div class="movie-btn">
                                        @if ($post->paid === 0)
                                            <a href="{{ route('view.download', [$post->slug, $item->id]) }}"
                                                class="btn-style-hm4-2 animated">Download Now</a>
                                            @if ($item->embed_link !== null)
                                                <a href="{{ route('view.stream', [$post->slug, $item->id]) }}"
                                                    class="btn-style-hm4-2 animated">Watch Now</a>
                                            @endif
                                        @elseif(auth()->user() && allow($post->page->id))
                                            <a href="{{ route('view.download', [$post->slug, $item->id]) }}"
                                                class="btn-style-hm4-2 animated">Download Now</a>
                                            @if ($item->embed_link !== null)
                                                <a href="{{ route('view.stream', [$post->slug, $item->id]) }}"
                                                    class="btn-style-hm4-2 animated">Watch Now</a>
                                            @endif
                                        @else
                                            <a href="/payments?page={{ Crypt::encryptString($post->page->id) }}"
                                                class="btn-style-hm4-2 animated" style="width: 100%">Buy
                                                Now</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($loop->remaining % 2 === 0 && $post->page->isEpisode160x300AdsOpen())
                            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                                <div class="movie-wrap text-center mb-30">
                                    <x-ads.banner160x300 :id="'page-' . $post->page->ads_code" />
                                </div>
                            </div>
                        @endif
                    @empty
                        <p class="blink-text mb-2">No Episode Here!!! Come back Later.</p>
                    @endforelse
                </div>
                <div class="section-title-4 st-border-bottom" bis_skin_checked="1">
                    <h2 class="res-font-dec text-center">Comments</h2>
                    <div id="disqus_thread" style="background-color:white;padding:20px;border:2px solid red;"></div>
                </div>

                <x-ads.banner720x90 :id="'page-' . $post->page->ads_code" />
            </div>
        </div>
    </main>
    @section('extra-js')
        @if ($post->page->isSocialBarAdsOpen())
            <script type='text/javascript' src='//silldisappoint.com/c5/b1/2b/c5b12bc5eb5471f61a0a86da7026015c.js'></script>
        @endif
    @endsection
    @section('adblock-script')
        @if ($post->page->isAdsBlock())
            @include('partials.adblock')
        @endif
    @endsection
</x-layout>
