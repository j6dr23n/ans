@section('title', '- ' . $page->name)
@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="{{ $page->name }}">
    <meta name="description" content="{{ Str::limit($page->info, 150) }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="{{ $page->name }}">
    <meta property="og:description" content="{{ Str::limit($page->info, 150) }}">
    <meta property="og:image" content="{{ $page->poster }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="{{ $page->name }}">
    <meta property="twitter:description" content="{{ Str::limit($page->info, 150) }}">
    <meta property="twitter:image" content="{{ $page->poster }}">

    @if ($page->isPopupAdsOpen())
        <script type='text/javascript' src='//silldisappoint.com/fe/95/f5/fe95f52ff6c663d0c6128ac07c6553c2.js'></script>
    @endif
@endsection

<x-layout>
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-2">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2 center">
                            <h2>{{ $page->name }}</h2>
                            <ul class="breadcrumb-list-2 black">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>{{ $page->name }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="page-content">
        <!-- about-us-cont-area -->
        <div class="about-us-cont-area bg-black">
            <div class="container-fluid p-4">
                <div class="row align-items-center p-4" style="border: 2px solid white;">
                    <div class="col-lg-6">
                        <div class="about-images text-center s--mt--30">
                            <img class="img-fluid" width="200px" height="200px" src="{{ $page->poster }}"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-cont text-center text-white-style">
                            <div class="about-us-title">
                                <h2 class="text-center pt-2">{{ $page->name }}</h2>
                            </div>
                            <p>{{ $page->info }}</p>
                            @if (!empty($page->setting->monthly_cost))
                                <div class="like-share-wrap"
                                    style="justify-content: space-around;align-items: baseline">
                                    <h4 class="text-white">Paid Plan</h4>
                                    <div class="social-share-wrap m-2" style="justify-content: center">
                                        <span>Monthly Cost:</span>
                                        <p>{{ number_format($page->setting->monthly_cost ?? '0', 0) }}</p>
                                    </div>

                                    <div class="social-share-wrap" style="justify-content: center">
                                        <span>Lifetime Cost:</span>
                                        <p>{{ number_format($page->setting->lifetime_cost ?? '0', 0) }}</p>
                                    </div>
                                    <div class="submit-btn" style="display:block;">
                                        <a href="/payments?page={{ Crypt::encryptString($page->id) }}"
                                            class="btn-style-hm4-2 animated">Buy
                                            Now</a>
                                    </div>
                                </div>
                            @endif
                            <div class="like-share-wrap mt-0" style="justify-content: center">
                                <div class="social-share-wrap" style="justify-content: center">
                                    <span>Last Seen:</span>
                                    <div class="social-style-1">
                                        @if (Cache::has('is_online_page' . $page->id))
                                            <span class="text-success">Online</span>
                                        @elseif($page->last_seen === null)
                                            <span class="text-warning">Offline</span>
                                        @else
                                            <p>{{ \Carbon\Carbon::parse($page->last_seen)->diffForHumans() }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="social-share-wrap" style="justify-content: center">
                                    <span>Check:</span>
                                    <div class="social-style-1">
                                        <a class="facebook" href="{{ $page->fb }}"><svg id="icon-facebook"
                                                viewBox="0 0 112.196 112.196">
                                                <circle cx="56.098" cy="56.098" r="56.098" fill="#3b5998">
                                                </circle>
                                                <path fill="#fff"
                                                    d="M70.201 58.294h-10.01v36.672H45.025V58.294h-7.213V45.406h7.213v-8.34c0-5.964 2.833-15.303 15.301-15.303l11.234.047v12.51h-8.151c-1.337.0-3.217.668-3.217 3.513v7.585h11.334l-1.325 12.876z">
                                                </path>
                                            </svg></a>
                                        <a href="{{ $page->tele }}"><svg id="icon-telegram" viewBox="0 0 512 512">
                                                <circle cx="256" cy="256" r="256" fill="#08c">
                                                </circle>
                                                <path fill="#fff"
                                                    d="M221.138 293.3l115.691 87.347 58.399-249.287L96.771 248.759l90.817 30.081 165.743-111.176z">
                                                </path>
                                                <path fill="#d2d2d7"
                                                    d="M187.588 278.84l24.873 89.504 8.677-75.044 132.193-125.636z">
                                                </path>
                                                <path fill="#b9b9be" d="M258.738 321.688l-46.277 46.656 8.677-75.044z">
                                                </path>
                                            </svg></a>
                                        <a style="background-color: red" href="mailto:{{ $page->email }}"><i
                                                class="zmdi zmdi-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($page->isTop720x90AdsOpen())
                    <x-ads.banner720x90 :id="'page-' . $page->ads_code" />
                @endif
            </div>
            <x-partials.movie-list :items="$featuredAnimes" :class="'section-ptb-50 pb-4'" :name="'Featured Post'" :ads="'page-' . $page->ads_code"
                :page="$page" />
            <div class="movie-list section-padding-lr section-pb-50 bg-black">
                <div class="container-fluid">
                    <div class="section-title-4 st-border-bottom">
                        <h2>Latest Post</h2>
                    </div>
                    <div class="col-md-12 col-lg-12">
                        <!-- Nav tabs -->
                        <ul role="tablist" class="nav dashboard-list white mb--60">
                            <li class="active" role="presentation"><a href="#free" data-bs-toggle="tab"
                                    class="tablist-btn active">Free Post</a></li>
                            <li class="active" role="presentation"><a href="#paid" data-bs-toggle="tab"
                                    class="tablist-btn ">Paid Post</a></li>
                        </ul>
                    </div>

                    <div class="tab-content dashboard-content">
                        <div class="tab-pane active" id="free">
                            <div class="row">
                                <x-partials.movie-card :items="$freeAnimes" :ads="'page-' . $page->ads_code" :page="$page" />
                                {{ $freeAnimes->onEachSide(1)->links('partials.pagination') }}
                            </div>
                        </div>
                        <div class="tab-pane" id="paid">
                            <div class="row">
                                <x-partials.movie-card :items="$paidAnimes" :ads="'page-' . $page->ads_code" :page="$page" />
                                {{ $paidAnimes->appends(['page' => $freeAnimes->currentPage()])->onEachSide(1)->links('partials.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <!--// about-us-cont-area -->
    </main>

    @section('extra-js')
        @if ($page->isSocialBarAdsOpen())
            <script type='text/javascript' src='//silldisappoint.com/c5/b1/2b/c5b12bc5eb5471f61a0a86da7026015c.js'></script>
        @endif
    @endsection
    @section('adblock-script')
        @if ($page->isAdsBlock())
            @include('partials.adblock')
        @endif
    @endsection
</x-layout>
