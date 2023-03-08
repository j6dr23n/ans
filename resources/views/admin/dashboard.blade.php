@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('css')
    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('admin/cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ asset('admin/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css') }}">
@endsection

@section('content')
    <div class="col">

        <div class="h-100">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">
                                                Total Anime</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="{{ count($animes) }}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-success rounded fs-3">
                                                <i class="bx bx-movie-play text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                    <i class="bx bx-camera-movie"></i>
                                </div>
                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video"></i>
                                </div>
                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video-off"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">
                                                Movie</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="{{ count($movies) }}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-primary rounded fs-3">
                                                <i class="bx bx-movie-play text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                    <i class="bx bx-camera-movie"></i>
                                </div>
                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video"></i>
                                </div>
                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video-off"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">
                                                Manga</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="{{ count($manga) }}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                                <i class="bx bx-movie-play text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                    <i class="bx bx-camera-movie"></i>
                                </div>
                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video"></i>
                                </div>
                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video-off"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted text-truncate fs-13">
                                                Hentai</p>
                                            <h4 class="fs-22 fw-semibold mb-3"><span class="counter-value"
                                                    data-target="{{ count($hentai) }}">0</span></h4>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-secondary rounded fs-3">
                                                <i class="bx bx-movie-play text-secondary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                                <div class="animation-effect-6 text-success opacity-25 fs-18">
                                    <i class="bx bx-camera-movie"></i>
                                </div>
                                <div class="animation-effect-4 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video"></i>
                                </div>
                                <div class="animation-effect-3 text-success opacity-25 fs-18">
                                    <i class="bi bi-camera-video-off"></i>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div> <!-- end row-->
                </div>
            </div>


            <div class="row">
                <div class="col-xl-8">
                    <div class="swiper selling-product">
                        <div class="d-flex pt-2 pb-4">
                            <h5 class="card-title fs-16 mb-1">Platform Pages</h5>
                        </div>
                        <div class="swiper-wrapper">
                            @foreach ($pages as $item)
                                <div class="swiper-slide" style="max-width: 280px;">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="bg-soft-info rounded py-3">
                                                <img src="{{ $item->poster }}" alt=""
                                                    style="max-height: 215px;max-width: 100%;" class="mx-auto d-block">
                                            </div>
                                            <div class="pt-3">
                                                <span class="float-end">
                                                    <i
                                                        class="ri ri-checkbox-blank-circle-fill {{ Cache::has('is_online_page' . $item->id) ? 'text-success' : 'text-danger' }} align-bottom"></i></span>
                                                <h5 class="text-dark mb-3">{{ $item->name }}</h5>
                                                <a href="#!" class="stretched-link">
                                                    <h6 class="fs-15 lh-base text-truncate mb-0">
                                                        {{ Str::limit($item->info, 100) }}</h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Latest Members</h5>
                        </div>
                        <div class="card-body px-0">
                            <div data-simplebar style="max-height: 320px;">
                                <div class="vstack gap-3 px-3">
                                    @foreach ($members as $item)
                                        <div class="p-3 border border-dashed rounded-3">
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar-sm bg-light rounded p-1 flex-shrink-0">
                                                    <img src="https://i.pinimg.com/564x/97/21/05/972105c5a775f38cf33d3924aea053f1.jpg"
                                                        alt="" class="img-fluid d-block" width="40px"
                                                        height="20px">
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h6 class="text-truncate">
                                                        {{ $item->page !== null ? $item->page->name : 'No One' }}</h6>
                                                    <p class="text-truncate mb-0">by: <span
                                                            class="text-info">{{ $item->name }}</span></p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="badge badge-soft-warning"></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> <!-- end row-->

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Latest Anime</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" bis_skin_checked="1">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Genres</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($animes->take(5) as $item)
                                        <tr>
                                            <td><a href="#" class="fw-medium">#{{ $loop->iteration }}</a></td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center" bis_skin_checked="1">
                                                    <div class="flex-shrink-0" bis_skin_checked="1">
                                                        <img src="{{ $item->poster }}" alt=""
                                                            class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        {{ Str::limit($item->title, 45) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-{{ $item->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                                {{ $item->condition }}</td>
                                            <td><i class="ri ri-star-half-line"></i>{{ $item->rating }}</td>
                                            <td>{{ $item->genres }}</td>
                                            <td class="text-{{ $item->featured !== 'on' ? 'success' : 'info' }}">
                                                {{ $item->featured }}</td>
                                            <td>{{ $item->page !== null ? $item->page->name : 'No One' }}</td>
                                            <td><a href="{{ route('episodes.show', $item->id) }}"><i
                                                        class="ri ri-eye-fill"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Latest Movie</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" bis_skin_checked="1">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Genres</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($movies->take(5) as $item)
                                        <tr>
                                            <td><a href="#" class="fw-medium">#{{ $loop->iteration }}</a></td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center" bis_skin_checked="1">
                                                    <div class="flex-shrink-0" bis_skin_checked="1">
                                                        <img src="{{ $item->poster }}" alt=""
                                                            class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        {{ Str::limit($item->title, 45) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-{{ $item->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                                {{ $item->condition }}</td>
                                            <td><i class="ri ri-star-half-line"></i>{{ $item->rating }}</td>
                                            <td>{{ $item->genres }}</td>
                                            <td class="text-{{ $item->featured !== 'on' ? 'success' : 'info' }}">
                                                {{ $item->featured }}</td>
                                            <td>{{ $item->page !== null ? $item->page->name : 'No One' }}</td>
                                            <td><a href="{{ route('episodes.show', $item->id) }}"><i
                                                        class="ri ri-eye-fill"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Latest Hentai</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" bis_skin_checked="1">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Genres</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hentai->take(5) as $item)
                                        <tr>
                                            <td><a href="#" class="fw-medium">#{{ $loop->iteration }}</a></td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center" bis_skin_checked="1">
                                                    <div class="flex-shrink-0" bis_skin_checked="1">
                                                        <img src="{{ $item->poster }}" alt=""
                                                            class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        {{ Str::limit($item->title, 45) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-{{ $item->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                                {{ $item->condition }}</td>
                                            <td><i class="ri ri-star-half-line"></i>{{ $item->rating }}</td>
                                            <td>{{ $item->genres }}</td>
                                            <td class="text-{{ $item->featured !== 'on' ? 'success' : 'info' }}">
                                                {{ $item->featured }}</td>
                                            <td>{{ $item->page !== null ? $item->page->name : 'No One' }}</td>
                                            <td><a href="{{ route('episodes.show', $item->id) }}"><i
                                                        class="ri ri-eye-fill"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Latest Manga</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive" bis_skin_checked="1">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Genres</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Created By</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($manga->take(5) as $item)
                                        <tr>
                                            <td><a href="#" class="fw-medium">#{{ $loop->iteration }}</a></td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center" bis_skin_checked="1">
                                                    <div class="flex-shrink-0" bis_skin_checked="1">
                                                        <img src="{{ $item->poster }}" alt=""
                                                            class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        {{ Str::limit($item->title, 45) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-{{ $item->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                                {{ $item->condition }}</td>
                                            <td><i class="ri ri-star-half-line"></i>{{ $item->rating }}</td>
                                            <td>{{ $item->genres }}</td>
                                            <td class="text-{{ $item->featured !== 'on' ? 'success' : 'info' }}">
                                                {{ $item->featured }}</td>
                                            <td>{{ $item->page !== null ? $item->page->name : 'No One' }}</td>
                                            <td><a href="{{ route('episodes.show', $item->id) }}"><i
                                                        class="ri ri-eye-fill"></i></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- end table -->
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Page Logs</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm">
                                    <i class="ri-file-list-3-line align-middle"></i> View All
                                </button>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table
                                    class="table table-borderless table-centered table-hover align-middle table-nowrap mb-0">
                                    <thead class="text-muted table-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">User</th>
                                            <th scope="col">Log</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logs as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <a class="fw-medium link-primary">{{ $item->name }}</a>
                                                </td>
                                                <td>
                                                    <span class="text-secondary">{{ $item->description }}</span>
                                                </td>
                                                <td>{{ $item->created_at->format('j F Y') }}</td>
                                            </tr><!-- end tr -->
                                        @endforeach
                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .card-->
                </div> <!-- .col-->
            </div> <!-- end row-->

        </div> <!-- end .h-100-->

    </div> <!-- end col -->
@endsection

@section('scripts')
    <script src="{{ asset('admin/code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <!--datatable js-->
    <script src="{{ asset('admin/cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin/cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>

    <script src="{{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>
@endsection
