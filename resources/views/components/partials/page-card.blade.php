@forelse ($items as $item)
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
        <div class="movie-wrap text-center mb-30">
            <div class="movie-img">
                <a href="{{ route('pages.show', $item->slug) }}"><img src="{{ $item->poster }}"
                        alt="{{ $item->title }}"></a>
                <h4 class="text-white p-2">{{ $item->name }}</h4>
            </div>
            <div class="movie-content">
                <div class="movie-btn">
                    <a href="{{ route('pages.show', $item->slug) }}" class="btn-style-hm4-2 animated">Explore Now</a>
                </div>
            </div>
        </div>
    </div>
    @if($loop->iteration % 4 === 0)
        <div class="col-12 ads-div">
            <div class="movie-wrap text-center mb-30">
                <x-ads.bannernative />
            </div>
        </div>
    @endif
@empty
    <p class="blink-text">No Post Here!!! Come back Later.</p>
@endforelse
