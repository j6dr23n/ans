<header class="header-area bg-black section-padding-lr {{ count($quotes) > 0 ? 'pt-0' : '' }}">
    @if (count($quotes) > 0)
        <div style="height: 28px;" id="marquee-div" onclick="hideMarquee()">
            <!-- Marquee Quote start-->
            <marquee behavior="scroll" id="marquee-text" scrollamount="7" direction="left" class="text-white"
                style="white-space: nowrap;background-color: red;opacity: 0.8;">
                @foreach ($quotes as $item)
                    <span style="margin-right:20px">{{ $item->text }}</span>
                @endforeach
            </marquee>
            <!-- Marquee Quote end-->
        </div>
    @endif

    <div class="container-fluid">
        <div class="header-wrap header-netflix-style">
            <div class="logo-menu-wrap">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('index') }}"><img
                            src="https://files.aninewstage.org/file/ans-assets/assets/logo.png" alt="logo"
                            style="max-width:138px;max-height:38px;"></a>
                </div>
                <!-- Logo -->
                <div class="main-menu main-theme-color-four">
                    <nav class="main-navigation">
                        <ul>
                            <li class="active"><a href="{{ route('index') }}">Home</a></li>
                            @if (auth()->user() &&
                                auth()->user()->isMember())
                                <li class="active"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            @endif
                            <li><a href="{{ route('guide') }}">Guide</a></li>
                            <li><a href="{{ route('pages.pricing') }}">VIP</a></li>
                            <li><a href="{{ route('pages.index') }}">Pages</a></li>
                            <li><a href="{{ route('animes') }}">Animes</a></li>
                            <li><a href="{{ route('movies') }}">Movies</a></li>
                            <li><a href="{{ route('manga') }}">Manga</a></li>
                            <li><a href="{{ route('hentai') }}">Hentai</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="right-side d-flex">
                <!-- search-input-box start -->
                <div class="header-search-2">
                    <a class="search-toggle" href="#">
                        <i class="zmdi zmdi-search s-open"></i>
                        <i class="zmdi zmdi-close s-close"></i>
                    </a>
                    <div class="search-wrap-2 ui-widget">
                        <form action="{{ route('home.search') }}" method="POST">
                            @csrf
                            <input placeholder="Search" id="search" name="search" type="text"
                                value="{{ Request::get('search') }}">
                            <button class="button-search"><i class="zmdi zmdi-search"></i></button>
                        </form>
                    </div>
                </div>
                <!-- search-input-box end -->
                @guest
                    <div class="subscribe-btn-wrap">
                        <a href="/login" class="subscribe-btn">Login</a>
                    </div>
                @endguest
                @auth
                    <div class="our-profile-area " bis_skin_checked="1">
                        <a href="#" class="our-profile-pc" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img src="https://files.aninewstage.org/file/ans-assets/assets/avatar.png" width="32px"
                                height="32px" alt="" class="rounded">
                        </a>
                        <div class="dropdown-menu netflix-profile-style red" bis_skin_checked="1">
                            <ul>
                                <li class="single-list"><a
                                        href="{{ route('pages.profile', auth()->user()->fb_id ?? auth()->user()->google_id) }}">My Account</a></li>
                                <li class="single-list"><a href="{{ route('watchlist.index') }}">Watchlist</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <form class="float-left ml-1" action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="subscribe-btn">Logout</button>
                    </form>
                @endauth
                <!-- mobile-menu start -->
                <div class="mobile-menu d-block d-lg-none"></div>
                <!-- mobile-menu end -->
            </div>
        </div>
    </div>
</header>
