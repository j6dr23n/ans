<x-layout>
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2 center">
                            <h2>TV Channels</h2>
                            <ul class="breadcrumb-list-2 black">
                                <li><a href="index-4.html">Home</a></li>
                                <li>TV Channels</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pricing-wrap bg-black section-pt-90 section-pb-60">
        <div class="container">
            <div class="row row-cols-md-3 row-cols-1">
                @foreach ($channels as $item)
                    <div class="col mb-30">
                        <div class="pricing-panel modify-pricing-panel text-center">
                            <div class="pricing-heading-tv">
                                <img src="{{ $item->image }}" alt="" width="100%"
                                    style="height: 100px !important;">
                            </div>
                            @foreach ($item->servers as $item)
                                <div class="pricing-footer">
                                    <a href="{{ route('tv-channel.show',$item->id) }}" class="plan-btn">Server {{ $item->server_no }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
