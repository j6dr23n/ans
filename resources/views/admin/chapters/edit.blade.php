@extends('admin.layouts.app')

@section('title', 'Edit Chapter')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Chapter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Chapter</li>
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
                        <form action="{{ route('chapters.update', $chapter->id) }}" method="POST"
                            enctype="multipart/form-data" class="form-prevent-multiple-submit">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="anime_id" value="{{ $anime->id }}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">Name</label>
                                        <input type="number" class="form-control" id="lastnameInput"
                                            placeholder="Chapter Number..." value="{{ $chapter->chapter_no }}"
                                            name="chapter_no">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="dlLinkInput" class="form-label">Download Link</label>
                                        <input type="url" class="form-control" id="dlLinkInput"
                                            placeholder="Download Link..." value="{{ $chapter->dl_link }}" name="dl_link">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="form-label">PDF File</label>
                                        <input type="file" class="form-control" name="pdf_file" accept="application/pdf">
                                    </div>
                                </div>
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
