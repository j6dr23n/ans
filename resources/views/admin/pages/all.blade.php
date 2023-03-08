@extends('admin.layouts.app')

@section('title', 'Anime List')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Posts</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All Posts</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            {{ Route::currentRouteName() != 'pages.all' ? 'Search Results' . ' (' . $search . ')' : 'List All' }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
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
                                    @foreach ($items as $item)
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
                                            <td>{{ $item->type }}</td>
                                            <td class="text-{{ $item->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                                {{ $item->condition }}</td>
                                            <td><i class="ri ri-star-half-line"></i>{{ $item->rating }}</td>
                                            <td>{{ $item->genres }}</td>
                                            <td class="text-{{ $item->featured !== 'on' ? 'success' : 'info' }}">
                                                {{ $item->featured }}</td>
                                            <td>{{ $item->page->name ?? 'Demo' }}</td>
                                            @if ($item->type === 'manga')
                                                <td><a href="{{ route('chapters.show', $item->id) }}"><i
                                                            class="ri ri-eye-fill"></i></a></td>
                                            @else
                                                <td><a href="{{ route('episodes.show', $item->id) }}"><i
                                                            class="ri ri-eye-fill"></i></a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $items->onEachSide(2)->links('admin.partials._pagination') }}
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
