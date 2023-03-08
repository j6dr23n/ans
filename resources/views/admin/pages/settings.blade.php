@extends('admin.layouts.app')

@section('title', 'Anime List')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Page Setting</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page Setting</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Total View Count</p>
                                <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                        data-target="{{ $view_count }}">{{ intWithStyle($view_count) }}</span>
                                </h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-secondary rounded fs-3">
                                    <i class="ri ri-eye-fill text-secondary"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                    <div class="animation-effect-6 text-secondary opacity-25">
                        <i class="bi bi-brightness-high-fill"></i>
                    </div>
                    <div class="animation-effect-4 text-secondary opacity-25">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <div class="animation-effect-3 text-secondary opacity-25">
                        <i class="bi bi-currency-pound"></i>
                    </div>
                </div><!-- end card -->

            </div>
            <div class="col-xl-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted text-truncate fs-13">Bandwidth Usage</p>
                                <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                        data-target="{{ $setting->bandwidth_usage ?? '0' }}">{{ $setting->bandwidth_usage ?? '0' }}</span>
                                    MB
                                </h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-success rounded fs-3">
                                    <i class="bx bxs-network-chart text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                    <div class="animation-effect-6 text-success opacity-25">
                        <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="animation-effect-4 text-success opacity-25">
                        <i class="bi bi-currency-pound"></i>
                    </div>
                    <div class="animation-effect-3 text-success opacity-25">
                        <i class="bi bi-currency-euro"></i>
                    </div>
                </div><!-- end card -->
            </div>
        </div>
        <div class="row">
            <!--end col-->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body p-4">
                        @foreach ($errors->all() as $message)
                            <p style="color:red;">{{ $message }}</p>
                        @endforeach
                        <div class="col-xl-12">
                            <h5 class="mb-3">Page Setting</h5>
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#pill-justified-payment-1"
                                                role="tab" aria-selected="false" tabindex="-1">
                                                Payment
                                            </a>
                                        </li>
                                        <li class="nav-item " role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-api-key-1"
                                                role="tab" aria-selected="false" tabindex="-1">
                                                API Key
                                            </a>
                                        </li>
                                        <li class="nav-item " role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#pill-justified-ads-1"
                                                role="tab" aria-selected="false" tabindex="-1">
                                                Ads
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content text-muted">
                                        <div class="tab-pane active" id="pill-justified-payment-1" role="tabpanel">
                                            <form action="{{ route('page-settings.update', $setting->id ?? 0) }}"
                                                method="POST" class="form-prevent-multiple-submit">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">Kpay</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter your kpay number..." name="kpay"
                                                                value="{{ $setting->kpay ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="lastnameInput" class="form-label">Wave Pay</label>
                                                            <input type="number" class="form-control" id="lastnameInput"
                                                                placeholder="Enter your wave pay number..." name="wavepay"
                                                                value="{{ $setting->wavepay ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 pb-2">
                                                            <label for="exampleFormControlTextarea"
                                                                class="form-label">Monthly
                                                                Cost</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter Monthly Cost..." name="monthly_cost"
                                                                value="{{ $setting->monthly_cost ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="posterLinkInput" class="form-label">Lifetime
                                                                Cost</label>
                                                            <input type="number" class="form-control"
                                                                id="posterLinkInput" placeholder="Enter lifetime cost..."
                                                                name="lifetime_cost"
                                                                value="{{ $setting->lifetime_cost ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <!-- Buttons Grid -->
                                                        <div class="d-grid gap-2 mt-2">
                                                            <button class="btn btn-md btn-primary"
                                                                type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="pill-justified-api-key-1" role="tabpanel">
                                            <form action="{{ route('page-settings.update', $setting->id ?? 0) }}"
                                                method="POST" class="form-prevent-multiple-submit">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="firstnameInput" class="form-label">StreamSB API
                                                                KEY</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter streamsb api key..."
                                                                name="streamsb_api_key"
                                                                value="{{ $setting->streamsb_api_key ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="lastnameInput" class="form-label">Stream Tape API
                                                                KEY</label>
                                                            <input type="number" class="form-control" id="lastnameInput"
                                                                placeholder="Enter stream api key..."
                                                                name="streamtape_api_key"
                                                                value="{{ $setting->streamtape_api_key ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3 pb-2">
                                                            <label for="exampleFormControlTextarea"
                                                                class="form-label">Stream
                                                                Tape API Password</label>
                                                            <input type="number" class="form-control"
                                                                placeholder="Enter streamtape api password..."
                                                                name="streamtape_api_pwd"
                                                                value="{{ $setting->streamtape_api_pwd ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="posterLinkInput" class="form-label">Up Stream API
                                                                KEY</label>
                                                            <input type="number" class="form-control"
                                                                id="posterLinkInput" placeholder="Enter upstream api..."
                                                                name="upstream_api_key"
                                                                value="{{ $setting->upstream_api_key ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <!-- Buttons Grid -->
                                                        <div class="d-grid gap-2 mt-2">
                                                            <button class="btn btn-md btn-primary"
                                                                type="submit">Submit</button>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </form>
                                        </div>
                                        @if (auth()->user()->page->allow_ads === 1)
                                            <div class="tab-pane" id="pill-justified-ads-1" role="tabpanel">
                                                <form action="{{ route('ads-settings.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check form-check-danger">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck1" name="adsblock" value="1"
                                                                    {{ $ads_setting->adsblock === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck1">
                                                                    AdBlock Detector On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck2" name="popup_ads" value="1"
                                                                    {{ $ads_setting->popup_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck2">
                                                                    PopUnder Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck3" name="social_bar_ads" value="1"
                                                                    {{ $ads_setting->social_bar_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck3">
                                                                    Social Bar Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck4" name="top_720x90_ads" value="1"
                                                                    {{ $ads_setting->top_720x90_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck4">
                                                                    Page Top 720x90 Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck5" name="feature_160x300_ads"
                                                                    value="1"
                                                                    {{ $ads_setting->feature_160x300_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck5">
                                                                    Page Feature 160x300 Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck6" name="post_160x300_ads"
                                                                    value="1"
                                                                    {{ $ads_setting->post_160x300_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck6">
                                                                    Page Post 160x300 Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck7" name="episode_160x300_ads"
                                                                    value="1"
                                                                    {{ $ads_setting->episode_160x300_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck7">
                                                                    Page Episode 160x300 Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck8" name="dl_720x90_ads" value="1"
                                                                    {{ $ads_setting->dl_720x90_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck8">
                                                                    Page Download 720x90 Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3 px-4">
                                                            <div class="form-check ">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="formCheck9" name="native_ads" value="1"
                                                                    {{ $ads_setting->native_ads === 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="formCheck9">
                                                                    Page Native Ads On/Off
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12">
                                                            <!-- Buttons Grid -->
                                                            <div class="d-grid gap-2 mt-2">
                                                                <button class="btn btn-md btn-primary"
                                                                    type="submit">Submit</button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                        @else
                                            <div class="tab-pane" id="pill-justified-ads-1" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <h3 class="text-center p-4" style="color:red">You're not allow to
                                                            add
                                                            ads on your page.
                                                            Check your monthly
                                                            view count must be 5k+ then contact to ans admin <a
                                                                href="https://www.facebook.com/jionsix.hacknh/">@j6dr23n</a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
@endsection
