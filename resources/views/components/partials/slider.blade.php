<div class="slider-area bg-black">
    <div class="container-fluid p-0">
        <div class="hero-slider-four dot-style-1 nav-style-1">
            @foreach ($items->take(4) as $item)
                <div class="single-hero-slider-wrap single-animation-wrap slider-height-hm4 bg-image-hm4 slider-bg-color-black d-flex align-items-center slider-bg-position-1 bg-black"
                    style="background-image:url({{ $item->poster }});">
                    <div class="slider-content-hm4 slider-animated">
                        <h1 class="title animated" style="font-size: 40px;">{{ Str::limit($item->title, 25) }} </h1>
                        <div class="sub-title-time-wrap">
                            <span class="sub-title animated">{{ $item->genres }}</span>
                            <span class="time animated">{{ $item->age_rating }}+</span>
                        </div>
                        <div class="slider-button">
                            <a href="{{ route('view.show', $item->slug) }}" class="btn-style-hm4 animated">Watch
                                Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
