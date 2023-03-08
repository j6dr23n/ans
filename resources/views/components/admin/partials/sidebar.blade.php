<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('images/logo/logo.jpg') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo/logo-bottom.png') }}" alt="" height="50px">
            </span>
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('images/logo/logo.jpg') }}" alt="" height="26">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('images/logo/logo-bottom.png') }}" alt="" height="50px">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i>
                        <span data-key="t-dashboard">Dashboard</span> </a>
                </li>
                @if (!auth()->user()->page)
                    <li class="nav-item">
                        <a href="{{ route('page.create') }}" class="nav-link menu-link"> <i class="bx bx-edit"></i>
                            <span data-key="t-dashboard">Create Page</span> </a>
                    </li>
                @endif
                @if (auth()->user()->page)
                    <li class="nav-item">
                        <a href="{{ route('ads.index') }}" class="nav-link menu-link"> <i class="bx bx-home"></i>
                            <span data-key="t-dashboard">Ads Dashboard</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pages.posts') }}" class="nav-link menu-link"> <i class="mdi mdi-post"></i>
                            <span data-key="t-dashboard">Your Posts</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('animes.create') }}" class="nav-link menu-link"> <i class="bx bx-edit"></i>
                            <span data-key="t-dashboard">Create Post</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('push-notificaiton') }}" class="nav-link menu-link"> <i
                                class="ri ri-notification-4-line"></i> <span data-key="t-dashboard">Create
                                Notification</span> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarList" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="ri ri-file-list-line"></i> <span data-key="t-authentication">List All</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarList">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('pages.all') }}" class="nav-link" data-key="t-all-post">All
                                        Post</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('animes.index') }}" class="nav-link" data-key="t-anime">Anime</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('movies.index') }}" class="nav-link" data-key="t-movie">Movie</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('manga.index') }}" class="nav-link" data-key="t-manga">Manga</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('hentai.index') }}" class="nav-link"
                                        data-key="t-hentai">Hentai</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (auth()->user()->isMember() && auth()->user()->page)
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarCreate" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarAuth">
                            <i class="ri ri-add-circle-line"></i> <span data-key="t-authentication">Create
                                List</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarCreate">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('types.create') }}" class="nav-link"
                                        data-key="t-type">Type</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('drives.create') }}" class="nav-link"
                                        data-key="t-drive">Drive</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('resolutions.create') }}" class="nav-link"
                                        data-key="t-resolution">Resolution</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('genres.create') }}" class="nav-link"
                                        data-key="t-genre">Genre</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

                @if (auth()->user()->isModerator() ||
                        auth()->user()->isAdministrator())
                    <li class="menu-title"><span data-key="t-create-list">Create List</span></li>

                    @can('create', App\Models\Anime\User::class)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarUsers">
                                <i class="bx bxs-user-detail"></i> <span data-key="t-create-user">Users</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarUsers">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('users.create') }}" class="nav-link"
                                            data-key="t-user-create">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link"
                                            data-key="t-user-list">List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('create', App\Models\Anime\Quote::class)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarQuotes" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarQuotes">
                                <i class="bx bx-text"></i> <span data-key="t-create-quotes">Quotes</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarQuotes">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('quotes.create') }}" class="nav-link"
                                            data-key="t-quotes-create">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('quotes.index') }}" class="nav-link"
                                            data-key="t-quotes-list">List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('create', App\Models\Type::class)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarType" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarType">
                                <i class="bx bxs-box"></i> <span data-key="t-create-type">Type</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarType">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('types.create') }}" class="nav-link"
                                            data-key="t-create-type">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('types.index') }}" class="nav-link"
                                            data-key="t-list-type">List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('create', App\Models\Resolution::class)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarResolution" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="bx bxs-video"></i> <span data-key="t-authentication">Resolution</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarResolution">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('resolutions.create') }}" class="nav-link"
                                            data-key="t-create-resolution">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('resolutions.index') }}" class="nav-link"
                                            data-key="t-list-resolution">List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('create', App\Models\Anime\Genre::class)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarGenres" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="bx bxs-grid-alt"></i> <span data-key="t-genres">Genres</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarGenres">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('genres.create') }}" class="nav-link"
                                            data-key="t-create-genre">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('genres.index') }}" class="nav-link"
                                            data-key="t-list-genre">List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan

                    @can('create', App\Models\Anime\Drive::class)
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarDrive" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarAuth">
                                <i class="bx bxs-grid-alt"></i> <span data-key="t-genres">Drive</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarDrive">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('drives.create') }}" class="nav-link"
                                            data-key="t-create-genre">Create</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('drives.index') }}" class="nav-link"
                                            data-key="t-list-genre">List</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endcan
                @endif

                <li class="menu-title"><span data-key="t-analytics">Analytics</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarAnalytics" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarAuth">
                        <i class="ri ri-list-unordered"></i> <span data-key="t-authentication">Analytics &
                            Logs</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarAnalytics">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('pages.analytics') }}" class="nav-link"
                                    data-key="t-type">Analytics</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pages.logs') }}" class="nav-link" data-key="t-drive">Logs</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pages.dl-logs') }}" class="nav-link menu-link"> <i
                            class="ri ri-download-fill"></i>
                        <span data-key="t-download-logs">Download
                            Logs</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
