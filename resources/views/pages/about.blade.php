@section('title', '- About')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="About us">
    <meta name="description"
        content="Ani: New Stage က ဆိုရင် မြန်မာနိုင်ငံအတွင်းထဲမှာရှိတဲ့ anime/manga တို့ကို
                                မြန်မာဘာသာဖြင့် တင်ဆက်ပေးနေသော page တွေနဲ့ပေါင်းထားတဲ့ website တစ်ခုပဲဖြစ်ပါတယ်။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="About us">
    <meta property="og:description"
        content="Ani: New Stage က ဆိုရင် မြန်မာနိုင်ငံအတွင်းထဲမှာရှိတဲ့ anime/manga တို့ကို
                                မြန်မာဘာသာဖြင့် တင်ဆက်ပေးနေသော page တွေနဲ့ပေါင်းထားတဲ့ website တစ်ခုပဲဖြစ်ပါတယ်။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="About us">
    <meta property="twitter:description"
        content="Ani: New Stage က ဆိုရင် မြန်မာနိုင်ငံအတွင်းထဲမှာရှိတဲ့ anime/manga တို့ကို
                                မြန်မာဘာသာဖြင့် တင်ဆက်ပေးနေသော page တွေနဲ့ပေါင်းထားတဲ့ website တစ်ခုပဲဖြစ်ပါတယ်။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

<x-layout>
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-2">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2 center">
                            <h2>About Us</h2>
                            <ul class="breadcrumb-list-2 black">
                                <li><a href="{{ route('index') }}">Home</a></li>
                                <li>About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Conttent -->
    <main class="page-content">
        <x-ads.banner720x90 />
        <!-- about-us-cont-area -->
        <div class="about-us-cont-area section-ptb bg-black">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-cont text-white-style">
                            <div class="about-us-title">
                                <h2 class="text-center">About Us</h2>
                            </div>


                            <p> Ani: New Stage က ဆိုရင် မြန်မာနိုင်ငံအတွင်းထဲမှာရှိတဲ့ anime/manga တို့ကို
                                မြန်မာဘာသာဖြင့် တင်ဆက်ပေးနေသော page တွေနဲ့ပေါင်းထားတဲ့ website တစ်ခုပဲဖြစ်ပါတယ်။
                                နာမည်ကြီး pirate website တွေဖြစ်တဲ့ gogoanime, 9animd, zoro စတဲ့ website တွေလိုပဲ
                                streaming အသားပေးတဲ့ website တစ်ခုဆိုရင်လည်း မမှားပါဘူး။ NGO ဖြစ်တဲ့အတွက်ကြောင့် new
                                stage website က user တွေ အဆင်ပြေချောမွေ့စွာ အသုံးပြုနိုင်ဖို့အတွက်
                                ပြင်ဆင်ထားတာပဲဖြစ်ပါတယ်။ မြန်မာနိုင်ငံမှာရှိတဲ့ page တွေမှ ဘာသာပြန်တင်ဆက်ထားတဲ့ကားတွေကို
                                တစ်စုတစ်စည်းတည်းဖြစ်အောင် အသုံးပြုနိုင်ဖို့အတွက် ဖန်တီးရေးဆွဲထားတာဖြစ်တဲ့အတွက် အဖွဲ့
                                တစ်ဖွဲ့ဆီရဲ့ ကိုယ်ပိုင် စာမျက်နှာတွေရှိပါတယ်။ user တွေနဲ့ အမြဲထိတွေ့
                                ဆက်ဆံနိုင်ရန်အတွက်လည်း ရည်ရွယ်ထားသောကြောင့် website အတွင်းမှာ messenger feature
                                ကိုလည်းရေးထည့်ထားတာဖြစ်လို့ အဆင်မပြေသောအရာများကို မေးမြန်းရန်လည်းလွယ်ကူပါတယ်။
                                တစ်ချို့သော ကိစ္စရပ်များကို ကာကွယ်ရန် အထူးအလေးပေးထားသောကြောင့် limit အနည်းငယ်ရှိပါတယ်။
                                new stage website ဟာ platform တစ်ခုဖြစ်ရန် အတွက် အထူးရည်မှန်းထားသော website တစ်ခုလည်း
                                ဖြစ်တဲ့အတွက်ကြောင့် user များအနေနဲ့ စိတ်ကျေနပ်မှုအကောင်းဆုံးဖြစ်သောနေရာဖြစ်အောင် new
                                stage မှ အကောင်းဆုံး ဖန်တီးသွားပါမယ်။ အားလုံးကိုကျေးဇူးတင်ပါတယ်။</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-images s--mt--30">
                            <img src="{{ asset('images/logo/logo-bottom.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// about-us-cont-area -->

        <!-- Start Counterup Area -->
        <div class="counterup_area section-pb section-pt-120 bg-black-2">
            <div class="container">
                <div class="row">
                    <x-ads.bannernative />
                    <!-- Start Single Count -->
                    <div class="col-lg-3 col-sm-6 single_counter white text-center mt--30">
                        <div class="counter_image">
                            <i class="fas fa-film fa-6x" style="color: red;"></i>
                        </div>
                        <span class="count odometer" data-count-to="{{ $animes }}"></span>
                        <h5>Animes Count</h5>
                    </div>
                    <!-- End Single Count -->
                    <!-- Start Single Count -->
                    <div class="col-lg-3 col-sm-6 single_counter white text-center mt--30">
                        <div class="counter_image">
                            <i class="fas fa-film fa-6x" style="color: white;"></i>
                        </div>
                        <span class="count odometer" data-count-to="{{ $movies }}"></span>
                        <h5>Movies Count</h5>
                    </div>
                    <!-- End Single Count -->
                    <!-- Start Single Count -->
                    <div class="col-lg-3 col-sm-6 single_counter white text-center mt--30">
                        <div class="counter_image">
                            <i class="fas fa-film fa-6x" style="color: green;"></i>
                        </div>
                        <span class="count odometer" data-count-to="{{ $manga }}"></span>
                        <h5>Manga Count</h5>
                    </div>
                    <!-- End Single Count -->
                    <!-- Start Single Count -->
                    <div class="col-lg-3 col-sm-6 single_counter white text-center mt--30">
                        <div class="counter_image">
                            <i class="fas fa-film fa-6x" style="color: blue;"></i>
                        </div>
                        <span class="count odometer" data-count-to="{{ $hentai }}"></span>
                        <h5>Hentai Count</h5>
                    </div>
                    <!-- End Single Count -->
                    <x-ads.banner300x250 />
                </div>
            </div>
        </div>
        <!-- End Counterup Area -->


        <!-- Our Best Team -->
        <div class="our-best-team-area section-ptb bg-black">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 m-auto">
                        <!-- Section Title -->
                        <div class="section-title mb-70 text-center">
                            <h2 class="text-white">Team Member</h2>
                        </div>
                        <!--// Section Title -->
                    </div>
                </div>

                <div class="row">

                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="{{ asset('images/teams/j6dr23n.png') }}" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/jionsix.hacknh/"><i
                                                    class="zmdi zmdi-facebook"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Naing Min Thwin</h4>
                                <h5>Founder & Developer</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="{{ asset('images/teams/min.png') }}" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/profile.php?id=100022767634659">
                                                <i class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Min</h4>
                                <h5>Co Founder</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <x-ads.banner160x300 />
                            <div class="team-info white">
                                <h4>Ads Banner</h4>
                                <h5>ADS</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="https://i.ibb.co/7YYFKJ7/irvine.jpg" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/profile.php?id=100086304205699"><i
                                                    class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Irvine Htet</h4>
                                <h5>Helper</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="https://i.ibb.co/Nt0Qcrs/yyn.jpg" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/youn.naung.3"><i
                                                    class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Youn Yun Naung</h4>
                                <h5>ADS</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <x-ads.banner160x300 />
                            <div class="team-info white">
                                <h4>Ads Banner</h4>
                                <h5>ADS</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="https://i.ibb.co/gw2PsXF/tunwa2.jpg" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/tun.wa.ii.5496"><i
                                                    class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Tun Wa ||</h4>
                                <h5>Data Uploader</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="https://i.ibb.co/8BB0bWK/kyawsuthway.jpg" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/subaru.subaru.777158"><i
                                                    class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Kyaw Su Thway</h4>
                                <h5>Sharer</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <x-ads.banner160x300 />
                            <div class="team-info white">
                                <h4>Ads Banner</h4>
                                <h5>ADS</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="https://i.ibb.co/cDS63fn/aozi.jpg" alt="Aozi">
                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/profile.php?id=100056964675998"><i
                                                    class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>Aozi Koku</h4>
                                <h5>Page</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <div class="team-image">
                                <img src="https://i.ibb.co/H4thgfv/akmplus.jpg" alt="">

                                <div class="team-socail red">
                                    <ul>
                                        <li><a href="https://www.facebook.com/AKMPLUS.Myanmar"><i
                                                    class="zmdi zmdi-facebook"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info white">
                                <h4>AKM PLUS</h4>
                                <h5>Page</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->
                    <!-- single-team -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-team text-center">
                            <x-ads.banner160x300 />
                            <div class="team-info white">
                                <h4>Ads Banner</h4>
                                <h5>ADS</h5>
                            </div>
                        </div>
                    </div>
                    <!-- single-team -->

                </div>
            </div>
        </div>
        <!--// Our Best Team -->

    </main>
</x-layout>
