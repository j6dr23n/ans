@section('title', '- Download ' . $post->title)

@section('meta-tags')
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
                            <!-- breadcrumb-list start -->
                            <ul class="breadcrumb-list-2">
                                <li>Title: {{ Str::limit($post->title, 40) }}</li>
                                <li>Episode: {{ $episode->epi_number }}</li>
                                <li><span>Condition: </span>{{ $post->condition }}</li>
                                <li>{{ $post->release_year }}</li>
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
                    <div class="section-title-4 st-border-bottom">
                        <h2 class="text-center">Download Link</h2>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Drive</th>
                                    <th scope="col">Resolution</th>
                                    <th scope="col">Download</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($episode->downloads) > 0)
                                    <form action="{{ route('user.download') }}" method="POST">
                                        <input type="hidden" name="epi_id" value="{{ $episode->id }}">
                                        @csrf
                                        <tr>
                                            <th scope="row">0</th>
                                            <td>{{ $episode->drive }}</td>
                                            <td>{{ $episode->resolution }}</td>
                                            <td>
                                                @if (auth()->user())
                                                    <button type="submit" class="btn-style-hm4-2 animated">Download
                                                        Now</button>
                                                @else
                                                    <a href="/login" class="btn-style-hm4-2 animated">Login To
                                                        Download</a>
                                                @endif
                                            </td>
                                        </tr>
                                    </form>
                                    @forelse ($episode->downloads as $item)
                                        <form action="{{ route('user.download') }}" method="POST">
                                            <input type="hidden" name="epi_id" value="{{ $episode->id }}">
                                            <input type="hidden" name="dl_id" value="{{ $item->id }}">
                                            @csrf
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $item->drive }}</td>
                                                <td>{{ $item->resolution }}</td>
                                                <td>
                                                    @if (auth()->user())
                                                        <button type="submit" class="btn-style-hm4-2 animated">Download
                                                            Now</button>
                                                    @else
                                                        <a href="/login" class="btn-style-hm4-2 animated">Login To
                                                            Download</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </form>
                                    @empty
                                        <form action="{{ route('user.download') }}" method="POST">
                                            <input type="hidden" name="epi_id" value="{{ $episode->id }}">
                                            @csrf
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{ $episode->drive }}</td>
                                                <td>{{ $episode->resolution }}</td>
                                                <td>
                                                    @if (auth()->user())
                                                        <button type="submit" class="btn-style-hm4-2 animated">Download
                                                            Now</button>
                                                    @else
                                                        <a href="/login" class="btn-style-hm4-2 animated">Login To
                                                            Download</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        </form>
                                    @endforelse
                                @else
                                    <form action="{{ route('user.download') }}" method="POST">
                                        <input type="hidden" name="epi_id" value="{{ $episode->id }}">
                                        @csrf
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>{{ $episode->drive }}</td>
                                            <td>{{ $episode->resolution }}</td>
                                            <td>
                                                @if (auth()->user())
                                                    <button type="submit" class="btn-style-hm4-2 animated">Download
                                                        Now</button>
                                                @else
                                                    <a href="/login" class="btn-style-hm4-2 animated">Login To
                                                        Download</a>
                                                @endif

                                            </td>
                                        </tr>
                                    </form>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <hr>
                </div>
                @if ($post->page->isDL720x90AdsAdsOpen())
                    <x-ads.banner720x90 :id="'page-' . $post->page->ads_code" />
                @endif
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
