@section('title', '- ' . $post->title)

<x-layout>
    <!-- Breadcrumb -->
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2 text-center">
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list-2">
                                <li>Title: {{ $post->title }}</li>
                                <li>Episode: {{ $episode->epi_number }}</li>
                            </ul>
                            <!-- breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="page-content">
        <div class="movie-details-wrap section-ptb-50 bg-black">
            <div class="container">
                @if ($post->page->isNativeAdsOpen())
                    <x-ads.bannernative :id="'page-' . $post->page->ads_code" />
                @endif
                <div class="movie-details-video-content-wrap">
                    @if ($episode->embed_link === null)
                        <div class="video-wrap-2">
                            <h3 class="blink-text py-2 px-2">No streaming server available.</h3>
                        </div>
                        <a href="{{ route('view.download', [$post->slug, $episode->id]) }}"
                            class="btn-style-hm4-2 animated text-center mt-3 py-2" style="display:block;">Download
                            Now</a>
                    @elseif($episode->embed_link === strip_tags($episode->embed_link))
                        <label for="" class="text-white">Select Server</label>
                        <select name="iframeSrc" class="form-select" aria-label="Default select example"
                            onchange="changeIframeSrc();">
                            <option value="{{ $episode->embed_link }}">{{ $episode->drive }} -
                                {{ $episode->resolution }}
                            </option>
                            @foreach ($episode->embeds as $item)
                                <option value="{{ $item->embed_link }}">{{ $item->drive }} - {{ $item->resolution }}
                                </option>
                            @endforeach
                        </select>
                        <br>
                        <div class="video-wrap">
                            <iframe id="iframe-embed" src="{{ $episode->embed_link }}" frameborder="0" scrolling="no"
                                allow="autoplay; fullscreen" allowfullscreen="" webkitallowfullscreen=""
                                mozallowfullscreen="" style="display: block;"></iframe>
                        </div>
                        <a href="{{ route('view.download', [$post->slug, $episode->id]) }}"
                            class="btn-style-hm4-2 animated text-center mt-3 py-2" style="display:block;">Download
                            Now</a>
                    @elseif($episode->embed_link === null)
                        <div class="video-wrap-2">
                            <h3 class="text-center blink-text" style="color:red">There is no server for streaming.</h3>
                        </div>
                    @else
                        <div class="video-wrap-2">
                            {!! $episode->embed_link !!}
                        </div>
                        <a href="{{ route('view.download', [$post->slug, $episode->id]) }}"
                            class="btn-style-hm4-2 animated text-center mt-3 py-2" style="display:block;">Download
                            Now</a>
                    @endif
                    <hr>
                </div>
                <div class="section-title-4 st-border-bottom">
                    <h2>More Episodes ({{ $episodes->count() }})</h2>
                </div>
                <div class="row">
                    @forelse ($episodes as $item)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6">
                            <div class="movie-wrap text-center mb-30">
                                <div class="movie-img">
                                    <a><img src="{{ $post->poster }}" alt="{{ $post->title }}"></a>
                                    <span style="color: white;">Episode No.{{ $item->epi_number }}</span>
                                </div>
                                <div class="movie-content">
                                    <span>Drive: {{ $item->drive }}</span>
                                    <span>Episode no: {{ $item->epi_number }}</span>
                                    <div class="movie-btn">

                                        <a href="{{ route('view.download', [$post->slug, $item->id]) }}"
                                            class="btn-style-hm4-2 animated">Download Now</a>
                                        <a href="{{ route('view.stream', [$post->slug, $item->id]) }}"
                                            class="btn-style-hm4-2 animated">Watch Now</a>
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
                        <p class="blink-text">No Episode Here!!! Come back Later.</p>
                    @endforelse
                </div>
                <x-ads.banner720x90 :id="'page-' . $post->page->ads_code" />
            </div>
        </div>
    </main>
    @section('adblock-script')
        @if ($post->page->isAdsBlock())
            @include('partials.adblock')
        @endif
    @endsection
</x-layout>
