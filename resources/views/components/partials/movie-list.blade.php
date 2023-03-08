@props(['name' => 'Latest Posts', 'items', 'class', 'ads' => '', 'page' => null])

<div class="movie-list section-padding-lr {{ $class }} bg-black">
    <div class="container-fluid">
        <div class="section-title-4 st-border-bottom">
            <h2>{{ $name }}</h2>
        </div>
        <div class="movie-slider-active nav-style-2">
            @forelse ($items as $item)
                <div class="movie-wrap-plr">
                    <div class="movie-wrap text-center">
                        <div class="movie-img">
                            <a href="{{ route('view.show', $item->slug) }}"><img src="{{ $item->poster }}"
                                    alt=""></a>
                        </div>
                        <div class="movie-content">
                            <h3 class="title"><a
                                    href="{{ route('view.show', $item->slug) }}">{{ Str::limit($item->title, 25) }}</a>
                            </h3>
                            <span>Rating : {{ $item->rating }}</span>
                            <div class="movie-btn">
                                <a href="{{ route('view.show', $item->slug) }}" class="btn-style-hm4-2 animated">Watch
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($page !== null)
                    @if ($loop->remaining % 4 === 0 && $page->isFeature160x300AdsOpen())
                        <div class="movie-wrap-plr">
                            <div class="movie-wrap text-center">
                                <x-ads.banner160x300 :id="$ads" />
                            </div>
                        </div>
                    @endif
                @else
                    @if ($loop->remaining % 4 === 0)
                        <div class="movie-wrap-plr">
                            <div class="movie-wrap text-center">
                                <x-ads.banner160x300 :id="$ads" />
                            </div>
                        </div>
                    @endif
                @endif
            @empty
                <p class="blink-text">No Post Here!!! Come back Later.</p>
            @endforelse
        </div>
    </div>
</div>
