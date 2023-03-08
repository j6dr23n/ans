@section('title', '- Manga')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="Manga List">
    <meta name="description" content="Ani: New Stage မှာရှိသော manga များ။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="Manga List">
    <meta property="og:description" content="Ani: New Stage မှာရှိသော manga များ။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Manga List">
    <meta property="twitter:description" content="Ani: New Stage မှာရှိသော manga များ။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

<x-layout>
    <x-partials.slider :items="$manga" />

    <x-partials.movie-list :items="$featuredManga" :class="'section-pt-50'" :name="'Featured Manga'" />

    <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
        <div class="container-fluid">
            <div class="section-title-4 st-border-bottom">
                <h2>Latest Manga</h2>
            </div>
            <div class="infinite-scroll">
                <div class="row">
                    <x-partials.movie-card :items="$manga" />
                    {{ $manga->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
    @include('partials/infinite-scroll')
</x-layout>
