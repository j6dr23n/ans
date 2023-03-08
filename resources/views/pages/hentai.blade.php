@section('title', '- Hentai')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="Hentai List">
    <meta name="description" content="Ani: New Stage မှာရှိသော hentai များ။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="Hentai List">
    <meta property="og:description" content="Ani: New Stage မှာရှိသော hentai များ။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Hentai List">
    <meta property="twitter:description" content="Ani: New Stage မှာရှိသော hentai များ။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

<x-layout>
    <x-partials.slider :items="$hentai" />

    <x-partials.movie-list :items="$featuredHentai" :class="'section-pt-50'" :name="'Featured Hentai'" />

    <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
        <div class="container-fluid">
            <div class="section-title-4 st-border-bottom">
                <h2>Latest Hentai</h2>
            </div>
            <div class="infinite-scroll">
                <div class="row">
                    <x-partials.movie-card :items="$hentai" />
                    {{ $hentai->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
    @include('partials/infinite-scroll')
</x-layout>
