@section('extra-css')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js"></script>
    <style>
        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
        }

        .embed-responsive-16by9::before {
            padding-top: 56.25%;
        }

        .embed-responsive::before {
            display: block;
            content: "";
        }

        .embed-responsive .embed-responsive-item {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
    </style>
@endsection
<x-layout>
    <!-- Breadcrumb -->
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2">
                            <h2 class="text-center">{{ $server->name }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Breadcrumb -->
    <div class="movie-details-wrap section-ptb-50 bg-black">
        <div class="container">
            <iframe data-aa='2013096' src='//acceptable.a-ads.com/2013096'
                style='border:0px; padding:0; width:100%; height:100%; overflow:hidden; background-color: transparent;' class="mb-2"></iframe>
            <div class="movie-details-video-content-wrap">
                <div class="embed-responsive embed-responsive-16by9">
                    <div id="player" class="embed-responsive-item"></div>
                </div>
            </div>
            <iframe data-aa='2013096' src='//acceptable.a-ads.com/2013096'
                style='border:0px; padding:0; width:100%; height:100%; overflow:hidden; background-color: transparent;' class="mt-2"></iframe>
        </div>
    </div>
    @section('extra-js')
        <script>
            var player = new Clappr.Player({
                source: '<?php echo $server->link;?>',
                parentId: "#player",
                width: '100%',
                height: '100%',
            });
        </script>
    @endsection
</x-layout>
