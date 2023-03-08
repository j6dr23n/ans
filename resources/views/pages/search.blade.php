@section('title', '- Search')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="Search List">
    <meta name="description" content="Ani: New Stage ရှာဖွေ၍တွေ့ရှိသောကားများ။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="Search List">
    <meta property="og:description" content="Ani: New Stage ရှာဖွေ၍တွေ့ရှိသောကားများ။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Search List">
    <meta property="twitter:description" content="Ani: New Stage ရှာဖွေ၍တွေ့ရှိသောကားများ။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

<x-layout>
    <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
        <div class="container-fluid">
            <div class="section-title-4 st-border-bottom">
                <h2>Search Results ( {{ $search }} )</h2>
            </div>
            <div class="row">
                <x-partials.movie-card :items="$items" />
            </div>
            {{ $items->appends(Request::get('page'))->onEachSide(1)->links('partials.pagination') }}
        </div>
    </div>
</x-layout>
