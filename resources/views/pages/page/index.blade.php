@section('title', '- Pages')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="Page List">
    <meta name="description" content="Ani: New Stage တွင်ပါ၀င်သော Page များ။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="Page List">
    <meta property="og:description" content="Ani: New Stage တွင်ပါ၀င်သော Page များ။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Page List">
    <meta property="twitter:description" content="Ani: New Stage တွင်ပါ၀င်သော Page များ။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

<x-layout>

    <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
        <div class="container-fluid">
            <div class="section-title-4 st-border-bottom text-center">
                <h2>Our Partners</h2>
            </div>
            <div class="infinite-scroll">
                <div class="row">
                    <x-partials.page-card :items="$pages" />
                    {{ $pages->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>
    @include('partials/infinite-scroll')
</x-layout>
