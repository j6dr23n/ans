@extends('admin.layouts.app')

@section('title', 'Page List')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Page List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Page List</li>
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
                            Page List
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Name</th>
                                        <th>Info</th>
                                        <th>FB</th>
                                        <th>Telegram</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pages as $item)
                                        <tr>
                                            <td><a href="#" class="fw-medium">#{{ $loop->iteration }}</a></td>
                                            <td>
                                                <div class="d-flex gap-2 align-items-center" bis_skin_checked="1">
                                                    <div class="flex-shrink-0" bis_skin_checked="1">
                                                        <img src="{{ $item->poster }}" alt=""
                                                            class="avatar-xs rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1" bis_skin_checked="1">
                                                        {{ Str::limit($item->name, 45) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ Str::limit($item->info, 10) }}</td>
                                            <td>{{ Str::limit($item->fb, 20) }}</td>
                                            <td>{{ Str::limit($item->tele, 20) }}</td>
                                            <td><a href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                            <td>{{ $item->created_at->format('j F y') }}</td>
                                            <td class="d-flex" style="font-size: 20px">
                                                <a href="{{ route('page.edit', $item->slug) }}" class="me-2">
                                                    <i class="ri ri-edit-2-fill"></i>
                                                </a>
                                                <form action="{{ route('page.destroy', $item->slug) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dltBtn"><i class="ri ri-delete-bin-fill"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $pages->onEachSide(2)->links('admin.partials._pagination') }}
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
