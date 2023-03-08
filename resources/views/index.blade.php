<x-layout>
    <!-- slider area start -->
    <x-partials.slider :items="$animes" />
    <x-ads.banner720x90 />
    <!-- slider area end -->

    {{-- movie list start --}}
    <x-partials.movie-list :name="'Featured Posts'" :items="$featuredPosts" :class="'section-ptb-50'" />
    <div class="movie-list section-padding-lr section-pt-50 section-pb-50 bg-black">
        <div class="container-fluid">
            <div class="section-title-4 st-border-bottom">
                <h2>Latest Posts</h2>
            </div>
            <x-ads.banner720x90 />
            </div>
            <div class="infinite-scroll">
                <div class="row">
                    <x-partials.movie-card :items="$posts" />
                    {{ $posts->onEachSide(1)->links('partials.pagination') }}
                </div>
            </div>
        </div>
    </div>

    {{-- movie list start --}}
    @include('partials/infinite-scroll')
</x-layout>
