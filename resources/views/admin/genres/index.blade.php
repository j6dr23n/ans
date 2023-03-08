@extends('admin.layouts.app')

@section('title', 'Anime List')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Genre List</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Genre List</li>
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
                            Genre List
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Name</th>
                                        <th>Created Date</th>
                                        <th>Updated Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($genres as $item)
                                        <tr>
                                            <td><a href="#" class="fw-medium">#{{ $loop->iteration }}</a></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('j F y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->updated_at)->format('j F y') }}</td>
                                            <td class="d-flex" style="font-size: 20px">
                                                <a href="{{ route('genres.edit', $item->id) }}" class="me-2">
                                                    <i class="ri ri-edit-2-fill"></i>
                                                </a>
                                                <form action="{{ route('genres.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="dltBtn"><i class="ri ri-delete-bin-fill"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{ $genres->onEachSide(2)->links('admin.partials._pagination') }}
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
