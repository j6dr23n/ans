@extends('admin.layouts.app')

@section('title', 'Episode List')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Epsiode List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Epsiode List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-soft-dark">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            Main Anime
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Condition</th>
                                        <th>Rating</th>
                                        <th>Genres</th>
                                        <th>Featured</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex gap-2 align-items-center" bis_skin_checked="1">
                                                <div class="flex-shrink-0" bis_skin_checked="1">
                                                    <img src="{{ $anime->poster }}" alt=""
                                                        class="avatar-xs rounded-circle">
                                                </div>
                                                <div class="flex-grow-1" bis_skin_checked="1">
                                                    {{ Str::limit($anime->title, 45) }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $anime->type }}</td>
                                        <td class="text-{{ $anime->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                            {{ $anime->condition }}</td>
                                        <td><i class="ri ri-star-half-line"></i>{{ $anime->rating }}</td>
                                        <td>{{ $anime->genres }}</td>
                                        <td class="text-{{ $anime->featured !== 'on' ? 'success' : 'info' }}">
                                            {{ $anime->featured }}</td>
                                        <td>{{ $anime->page->name ?? 'Demo' }}</td>
                                        <td class="d-flex" style="font-size: 20px">
                                            <a href="{{ route('animes.edit', $anime->slug) }}" class="me-2">
                                                <i class="ri ri-edit-2-fill"></i>
                                            </a>
                                            <form action="{{ route('animes.destroy', $anime->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dltBtn"><i class="ri ri-delete-bin-fill"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-gradient">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title mb-0 pt-1">
                            Episode List
                        </h5>
                        <a href="{{ route('episodes.create', $anime->id) }}" class="btn btn-primary btn-sm">Add
                            New</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Poster</th>
                                        <th>Episode Number</th>
                                        <th>Episode Link</th>
                                        <th>Drive</th>
                                        <th>Resolution</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($episodes as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ $anime->poster }}" alt=""
                                                    class="avatar-xs rounded-circle">
                                            </td>
                                            <td>
                                                <div>
                                                    {{ Str::limit($item->epi_number, 45) }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="{{ $item->epi_link }}">{{ Str::limit($item->epi_link, 30) }}</a>
                                            </td>
                                            <td><i class="bx bxs-cloud-download me-2"></i>{{ $item->drive }}</td>
                                            <td><i
                                                    class="{{ $item->resolution === null ? ' bx bxs-file-pdf' : ' bx bxs-camera-movie' }} me-2"></i>{{ $item->resolution === null ? 'pdf' : $item->resolution }}
                                            </td>
                                            <td>{{ $item->created_at->format('j F y') }}</td>
                                            <td class="d-flex" style="font-size: 20px">
                                                <a href="{{ route('episodes.edit', $item->id) }}" class="me-2">
                                                    <i class="ri ri-edit-2-fill text-warning"></i>
                                                </a>
                                                <form action="{{ route('episodes.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dltBtn"><i class="ri ri-delete-bin-fill text-danger"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $episodes->onEachSide(2)->links('admin.partials._pagination') }}
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!-- container-fluid -->
@endsection

@section('scripts')
    @include('admin/partials/_delete-script')
@endsection
