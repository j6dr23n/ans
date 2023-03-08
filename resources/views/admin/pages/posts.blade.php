@extends('admin.layouts.app')

@section('title', 'Your Post')

@section('css')
    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('admin/cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css') }}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ asset('admin/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css') }}">
@endsection


@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Your Posts</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Your Posts</li>
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
                        <h5 class="card-title mb-0">Your Page Posts</h5>
                    </div>
                    <div class="card-body">
                        <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SR No.</th>
                                    <th>Title</th>
                                    <th>View</th>
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
                                @foreach ($posts as $item)
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
                                        <td>{{ $item->unique_views_count }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td class="text-{{ $item->condition !== 'ongoing' ? 'info' : 'warning' }}">
                                            {{ $item->condition }}</td>
                                        <td><i class="ri ri-star-half-line text-primary"></i> {{ $item->rating }}</td>
                                        <td>{{ $item->genres }}</td>
                                        <td class="text-{{ $item->featured !== 'on' ? 'success' : 'info' }}">
                                            {{ $item->featured }}</td>
                                        <td>{{ $item->created_at->format('j F y') }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if ($item->type === 'manga')
                                                        <li><a href="{{ route('chapters.show', $item->id) }}"
                                                                class="dropdown-item"><i
                                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                View</a>
                                                        </li>
                                                    @else
                                                        <li><a href="{{ route('episodes.show', $item->id) }}"
                                                                class="dropdown-item"><i
                                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                View</a>
                                                        </li>
                                                    @endif
                                                    <li><a class="dropdown-item edit-item-btn"
                                                            href="{{ route('animes.edit', $item->slug) }}"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
