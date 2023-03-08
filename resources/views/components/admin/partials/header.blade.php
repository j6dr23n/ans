<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{ asset('images/logo.jpg') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="25">
                        </span>
                    </a>

                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="25">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>

                <button type="button" class="btn btn-sm px-3 fs-15 text-muted header-item d-none d-md-block"
                    data-bs-toggle="modal" data-bs-target="#searchModal">
                    <span class="bi bi-search me-2"></span> Search...
                </button>
            </div>

            <div class="d-flex align-items-center">

                <div class="d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        id="page-header-search-dropdown" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <i class="bi bi-search fs-16"></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bi bi-grid fs-18'></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                        <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0 fw-semibold fs-15"> Browse by Apps </h6>
                                </div>
                            </div>
                        </div>

                        <div class="p-2">
                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="https://www.remove.bg/">
                                        <img src="https://www.remove.bg/apple-touch-icon.png" alt="Github">
                                        <span>Remove BG</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="#!">
                                        <img src="https://www.ilovepdf.com/img/app-icon.png" alt="bitbucket">
                                        <span>I Love PDF</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item"
                                        href="https://drive.google.com/file/d/197uW4mrUKaQ709jE4cBW9nxBYUOIT3-A/view?usp=share_link">
                                        <i class="bx bx-help-circle" style="font-size: 35px;"></i>
                                        <span>Guide</span>
                                    </a>
                                </div>
                            </div>

                            <div class="row g-0">
                                <div class="col">
                                    <a class="dropdown-icon-item" href="https://www.facebook.com/aninewstage">
                                        <i class="bx bxl-facebook-circle" style="font-size: 35px;"></i>
                                        <span>Facebook</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="https://t.me/aninewstage">
                                        <i class="bx bxl-telegram" style="font-size: 35px;"></i>
                                        <span>Telegram</span>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="dropdown-icon-item" href="https://discord.gg/K325rz8wmF">
                                        <i class="bx bxl-discord-alt" style="font-size: 35px;"></i>
                                        <span>Discord</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle"
                        data-toggle="fullscreen">
                        <i class='bi bi-arrows-fullscreen fs-16'></i>
                    </button>
                </div>

                <div class="dropdown topbar-head-dropdown ms-1 header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-dark rounded-circle mode-layout"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bi bi-sun align-middle fs-20"></i>
                    </button>
                    <div class="dropdown-menu p-2 dropdown-menu-end" id="light-dark-mode">
                        <a href="#!" class="dropdown-item" data-mode="light"
                            onclick="changeLayoutSkin('light')"><i class="bi bi-sun align-middle me-2"></i> Defualt
                            (light mode)</a>
                        <a href="#!" class="dropdown-item" data-mode="dark"
                            onclick="changeLayoutSkin('dark')"><i class="bi bi-moon align-middle me-2"></i> Dark</a>
                        <a href="#!" class="dropdown-item" data-mode="auto"
                            onclick="changeLayoutSkin('auto')"><i class="bi bi-moon-stars align-middle me-2"></i> Auto
                            (system defualt)</a>
                    </div>
                </div>

                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('admin/assets/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span
                                    class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                                <span
                                    class="d-none d-xl-block ms-1 fs-13 text-muted user-name-sub-text">{{ ucfirst(auth()->user()->type) }}</span>
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="{{ route('page-settings.index') }}"><i
                                class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Settings</span></a>
                        <a class="dropdown-item" href="{{ route('akm.payments.index') }}"><i
                                class="mdi mdi-currency-usd text-muted fs-16 align-middle me-1"></i> <span
                                class="align-middle">Payments</span></a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a class="dropdown-item" href="auth-logout-basic.html"
                                onclick="event.preventDefault();
                            this.closest('form').submit();"><i
                                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle" data-key="t-logout">Logout</span></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
