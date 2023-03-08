@section('title', '- ' . $anime->title)

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $anime->title }}">
    <meta name="description" content="{{ Str::limit($anime->title, 150) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ $anime->title }}">
    <meta property="og:description" content="{{ Str::limit($anime->title, 150) }}">
    <meta property="og:image" content="{{ $anime->poster }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ $anime->title }}">
    <meta property="twitter:description" content="{{ Str::limit($anime->title, 150) }}">
    <meta property="twitter:image" content="{{ $anime->poster }}">
@endsection

<x-layout>
    <!-- Breadcrumb -->
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2">
                            <h2>{{ $anime->title }}</h2>
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list-2">
                                <li>Rating: {{ $anime->rating }}</li>
                                <li>{{ $anime->release_year }}</li>
                                <li>{{ $anime->genres }}</li>
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
                    <img src="{{ $anime->poster }}" class="img-fluid poster-image" alt="">
                </div>
                <div class="movie-details-content">
                    <div class="movie-details-info">
                        <ul>
                            <li><span>Title: </span>{{ $anime->title }}</li>
                            <li><span>Type: </span>{{ $anime->type }}</li>
                            <li><span>Rating:</span><span style="color: white"><i class="zmdi zmdi-star-half"></i>
                                    {{ $anime->rating }}</span></li>
                            <li><span>Genres: </span>{{ $anime->genres }}</li>
                            <li><span>Sub Genres: </span>{{ $anime->sub_genres }}</li>
                            <li><span>Condition: </span>{{ $anime->condition }}</li>
                            <li><span>Release Year: </span>{{ $anime->release_year }}</li>
                            <li><span>Season: </span>{{ $anime->season }}</li>
                        </ul>
                    </div>
                    <p>{{ $anime->info }}</p>
                </div>
            </div>
            <div class="section-title-4 st-border-bottom">
                <h2 style="text-align: center;">Chapter No. {{ $chapter->chapter_no }}</h2>
            </div>
            <div class="infinite-scroll">
                <div id="lightgallery" style="text-align: center">
                    @foreach ($images as $item)
                        @php
                            $path = env('APP_URL') . str_replace(public_path(), '', $item);
                        @endphp
                        <a href="{{ $path }}">
                            <img src="{{ $path }}" class="mb-3 poster-image" />
                        </a>
                    @endforeach
                </div>
                {{ $images->onEachSide(1)->links('partials.pagination') }}
            </div>
            <div>
                @if ($nextId !== null)
                    <a href="{{ route('pages.chapter.show', [$anime->slug, $nextId]) }}"
                        class="btn-secondary btm-sm text-center mt-3 p-1"
                        style="display:block;border-radius: 0.2em">Next
                        Chapter</a>
                @else
                    <a class="btn-danger btn-sm text-center mt-3 p-1" style="display:block;">No More
                        Chapter</a>
                @endif

                @if ($previousId !== null)
                    <a href="{{ route('pages.chapter.show', [$anime->slug, $previousId]) }}"
                        class="btn-info btn-sm text-center mt-3 p-1" style="display:block;">Previous
                        Chapter</a>
                @endif
            </div>
        </div>
    </div>
    @include('partials/infinite-scroll')
</x-layout>
