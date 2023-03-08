@section('title', '- VIP Plan')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="VIP Plan">
    <meta name="description" content="Ani: New Stage မှ VIP Plan အသေးစိတ်။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="VIP Plan">
    <meta property="og:description" content="Ani: New Stage မှ VIP Plan အသေးစိတ်။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="VIP Plan">
    <meta property="twitter:description" content="Ani: New Stage မှ VIP Plan အသေးစိတ်။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

<x-layout>
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <div class="in-breadcrumb" bis_skin_checked="1">
                <div class="row" bis_skin_checked="1">
                    <div class="col" bis_skin_checked="1">
                        <div class="breadcrumb-style-2 center" bis_skin_checked="1">
                            <h2>VIP Plan</h2>
                            <ul class="breadcrumb-list-2 black">
                                <li><a href="index-4.html">Home</a></li>
                                <li>VIP Plan</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pricing-wrap bg-black section-pt-90 section-pb-60" bis_skin_checked="1">
        <div class="container" bis_skin_checked="1">
            <div class="row row-cols-md-3 row-cols-1" bis_skin_checked="1">
                <div class="col mb-30" bis_skin_checked="1">
                    <div class="pricing-panel modify-pricing-panel text-center" bis_skin_checked="1">
                        <div class="pricing-heading" bis_skin_checked="1">
                            <h2>2000 <span>/ Month</span></h2>
                            <h3>MMK</h3>
                        </div>
                        <div class="pricing-body" bis_skin_checked="1">
                            <ul>
                                <li>Download Without ADS</li>
                            </ul>
                        </div>
                        <div class="pricing-footer" bis_skin_checked="1">
                            <a href="https://www.facebook.com/AKMPLUS.Myanmar" class="plan-btn">Choose A Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-30" bis_skin_checked="1">
                    <div class="pricing-panel modify-pricing-panel active text-center" bis_skin_checked="1">
                        <div class="pricing-heading" bis_skin_checked="1">
                            <h2>5000 <span>/ 3 Months</span></h2>
                            <h3>MMK</h3>
                        </div>
                        <div class="pricing-body" bis_skin_checked="1">
                            <ul>
                                <li>Download Without ADS</li>
                            </ul>
                        </div>
                        <div class="pricing-footer" bis_skin_checked="1">
                            <a href="https://www.facebook.com/AKMPLUS.Myanmar" class="plan-btn">Choose A Plan</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-30" bis_skin_checked="1">
                    <div class="pricing-panel modify-pricing-panel text-center" bis_skin_checked="1">
                        <div class="pricing-heading" bis_skin_checked="1">
                            <h2>9000 <span>/ 6 Months</span></h2>
                            <h3>MMK</h3>
                        </div>
                        <div class="pricing-body" bis_skin_checked="1">
                            <ul>
                                <li>Download Without ADS</li>
                            </ul>
                        </div>
                        <div class="pricing-footer" bis_skin_checked="1">
                            <a href="https://www.facebook.com/AKMPLUS.Myanmar" class="plan-btn">Choose A Plan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
