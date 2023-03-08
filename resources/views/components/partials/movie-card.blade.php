@props(['items', 'ads' => '', 'page' => null])
@forelse ($items as $item)
    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
        <div class="movie-wrap text-center mb-30">
            <div class="ribbon-wrapper">
                <div class="ribbon red">{{ $item->type }}</div>
            </div>

            <div class="movie-img">
                <a href="{{ route('view.show', $item->slug) }}"><img src="{{ $item->poster }}"
                        alt="{{ $item->title }}"></a>
                <h4 class="text-white text-xs p-2">{{ Str::limit($item->title, 25) }}</h4>
            </div>
            <div class="movie-content">
                <h3 class="title"><a
                        href="{{ route('view.show', $item->slug) }}">{{ Str::limit($item->title, 25) }}</a>
                </h3>
                <span>Rating : {{ $item->rating }}</span>
                <div class="movie-btn">
                    <a href="{{ route('view.show', $item->slug) }}" class="btn-style-hm4-2 animated">Watch Now</a>
                </div>
            </div>
            <div class="ribbon-wrapper-btm">
                <div class="ribbon-btm blue">{{ intWithStyle($item->unique_views_count ?? 0) }}</div>
            </div>
        </div>
    </div>
    @if ($page !== null)
        @if ($loop->remaining % 4 === 0 && $page->isPost160x300AdsOpen())
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ads-div">
                <div class="movie-wrap text-center mb-30">
                    <x-ads.banner160x300 :id="$ads" />
                </div>
            </div>
        @endif
    @else
        @if ($loop->remaining % 4 === 0)
            <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 ads-div">
                <div class="movie-wrap text-center mb-30">
                    <x-ads.banner160x300 :id="$ads" />
                </div>
            </div>
        @endif
    @endif
@empty
    <p class="blink-text">No Post Here!!! Come back Later.</p>
@endforelse
