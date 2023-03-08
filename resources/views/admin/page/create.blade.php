@extends('admin.layouts.app')

@section('title', 'Create Page')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Page</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Page</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <!--end col-->
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body p-4">
                        @foreach ($errors->all() as $message)
                            <p style="color:red;">{{ $message }}</p>
                        @endforeach
                        <form method="POST" action="{{ route('page.store') }}" class="form-prevent-multiple-submit"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="exampleFormControlTextarea" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your page description..."
                                            rows="6" name="info">{{ old('info') }}</textarea>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="posterLinkInput" class="form-label">Poster Link</label>
                                        <input type="text" class="form-control" id="posterLinkInput"
                                            placeholder="Enter your poster link" name="poster" value="{{ old('poster') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="trailerInput" class="form-label">Facebook Page Link</label>
                                        <input type="text" class="form-control" id="trailerInput"
                                            placeholder="Facebook page link..." name="fb">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="trailerInput" class="form-label">Telegram Channel Link</label>
                                        <input type="text" class="form-control" id="trailerInput"
                                            placeholder="Telegram channel link..." name="tele">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="trailerInput" class="form-label">Page admin email address</label>
                                        <input type="email" class="form-control" id="trailerInput"
                                            placeholder="Page admin email address..." name="email">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <!-- Buttons Grid -->
                                    <div class="d-grid gap-2 mt-2">
                                        <button class="btn btn-md btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </div>
@endsection

@section('external-js')
    @include('admin/partials/_toastr')
@endsection
