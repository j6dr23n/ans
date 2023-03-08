@section('title', '- ' . $post->title)

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $post->title }}">
    <meta name="description" content="{{ Str::limit($post->title, 150) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ Str::limit($post->title, 150) }}">
    <meta property="og:image" content="{{ $post->poster }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ $post->title }}">
    <meta property="twitter:description" content="{{ Str::limit($post->title, 150) }}">
    <meta property="twitter:image" content="{{ $post->poster }}">
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
                                <li>Total {{ $chapters->count() }} Episodes</li>
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
    <div class="movie-details-wrap section-ptb-50 bg-black">
        <div class="container">
            <div class="movie-details-video-content-wrap">
                <div class="video-wrap-2 poster-div">
                    <img src="{{ $post->poster }}" class="img-fluid poster-image" alt="">
                </div>
                <div class="movie-details-content">
                    <div class="movie-details-info">
                        <ul>
                            <li><span>Title: </span>{{ $post->title }}</li>
                            <li><span>Type: </span>{{ $post->type }}</li>
                            <li><span>Rating:</span><span style="color: white"><i class="zmdi zmdi-star-half"></i>
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
        </div>
    </div>
    <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
        <div class="container">
            <div class="section-title-4 st-border-bottom text-center">
                <h2>Total Chapters ({{ $chapters->count() }})</h2>
            </div>
            <div class="row">
                @forelse ($chapters as $item)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="movie-wrap text-center mb-30">
                            <div class="movie-img">
                                <a><img src="{{ $post->poster }}" alt="{{ $post->title }}"></a>
                                <form action="{{ route('watchlist.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="chapter_id" value="{{ $item->id }}">
                                    <button title="Watchlist" class="Watch-list-btn" type="submit" tabindex="0"><i
                                            class="zmdi zmdi-plus"></i></button>
                                </form>
                                <span style="color: white;">Chapter No.{{ $item->chapter_no }}</span>
                            </div>
                            <div class="movie-content">
                                <span>Chapter no: {{ $item->chapter_no }}</span>
                                <div class="movie-btn">
                                    <form action="{{ route('user.download') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="chapter_id" value="{{ $item->id }}">
                                        @if ($post->paid === 0)
                                            @if (auth()->user())
                                                <button type="submit" href="{{ $item->pdf_path }}"
                                                    class="btn-style-hm4-2 animated">Download
                                                    Now</button>
                                            @else
                                                <a href="/login" class="btn-style-hm4-2 animated">Login To Download</a>
                                            @endif
                                            <a href="{{ route('pages.chapter.show', [$post->slug, $item->chapter_no]) }}"
                                                class="btn-style-hm4-2 animated">Read
                                                Now</a>
                                        @elseif(auth()->user() && allow($post->page->id))
                                            @if (auth()->user())
                                                <button type="submit" href="{{ $item->pdf_path }}"
                                                    class="btn-style-hm4-2 animated">Download
                                                    Now</button>
                                            @else
                                                <a href="/login" class="btn-style-hm4-2 animated">Login To Download</a>
                                            @endif
                                            <a href="{{ route('pages.chapter.show', [$post->slug, $item->chapter_no]) }}"
                                                class="btn-style-hm4-2 animated">Read
                                                Now</a>
                                        @else
                                            <a href="/payments?page={{ Crypt::encryptString($post->page->id) }}"
                                                class="btn-style-hm4-2 animated" style="width: 100%">Buy
                                                Now</a>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="blink-text">No Chapters Here!!! Come back Later.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-layout>
