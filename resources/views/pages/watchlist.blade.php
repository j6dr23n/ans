<x-layout>
    <div class="movie-list-area section-pt-50 bg-black-2">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-12 me-auto ms-auto">
                    <div class="movie-list-top-bar">
                        <div class="movie-list-title">
                            <h2 class="title">Watchlist</h2>
                        </div>
                    </div>
                    <div class="movielist-wrap">
                        @forelse ($items as $item)
                            @if ($item->episode !== null)
                                <div class="single-movielist">
                                    <div class="movielist-img-content">
                                        <div class="movielist-img">
                                            <a href="{{ route('view.show', $item->episode->anime->slug) }}">
                                                <img src="{{ $item->episode->anime->poster }}" alt="">
                                                <i class="zmdi zmdi-play play-btn-style"></i>
                                            </a>
                                        </div>
                                        <div class="movielist-content">
                                            <h3 class="title"><a
                                                    href="{{ route('view.show', $item->episode->anime->slug) }}">{{ Str::limit($item->episode->anime->title, 30) }}</a>
                                            </h3>
                                            <p class="mb-1 text-white">Episode No: {{ $item->episode->epi_number }}
                                            </p>
                                            <a href="{{ route('view.download', [$item->episode->anime->slug, $item->episode->id]) }}"
                                                class="btn-style-hm4-2 mb-1 animated">Download Now</a>
                                            <a href="{{ route('view.stream', [$item->episode->anime->slug, $item->episode->id]) }}"
                                                class="btn-style-hm4-2 animated">Watch Now</a>
                                        </div>
                                    </div>
                                    <div class="movielist-close">
                                        <form action="{{ route('watchlist.destroy', $item->id) }}" method="POST"
                                            style="text-align: center">
                                            @csrf
                                            @method('DELETE')
                                            <a type="submit" class="dltBtn watchlist-close-btn"><i
                                                    class="zmdi zmdi-close" data-id="{{ $item->id }}"></i></a>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <div class="single-movielist">
                                    <div class="movielist-img-content">
                                        <div class="movielist-img">
                                            <a href="{{ route('view.show', $item->chapter->manga->slug) }}">
                                                <img src="{{ $item->chapter->manga->poster }}" alt="">
                                                <i class="zmdi zmdi-play play-btn-style"></i>
                                            </a>
                                        </div>
                                        <div class="movielist-content">
                                            <h3 class="title"><a
                                                    href="{{ route('view.show', $item->chapter->manga->slug) }}">{{ Str::limit($item->chapter->manga->title, 30) }}</a>
                                            </h3>
                                            <p class="mb-1 text-white">Chapter No: {{ $item->chapter->chapter_no }}
                                            </p>
                                            <a href="{{ route('pages.chapter.show', [$item->chapter->manga->slug, $item->chapter->chapter_no]) }}"
                                                class="btn-style-hm4-2 animated">Read
                                                Now</a>
                                        </div>
                                    </div>
                                    <div class="movielist-close">
                                        <form action="{{ route('watchlist.destroy', $item->id) }}" method="POST"
                                            style="text-align: center">
                                            @csrf
                                            @method('DELETE')
                                            <a type="submit" class="dltBtn watchlist-close-btn"><i
                                                    class="zmdi zmdi-close" data-id="{{ $item->id }}"></i></a>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        @empty
                            <p class="blink-text" style="font-size: 28px">No item</p>
                            <hr style="border-bottom:1px solid white;">
                        @endforelse
                        {{ $items->links('partials.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('extra-js')
        @include('admin/partials/_delete-script')
    @endsection
</x-layout>
