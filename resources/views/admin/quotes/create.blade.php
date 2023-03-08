@extends('admin.layouts.app')

@section('title', 'Create Quote')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Quote</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Quote</li>
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
                        <form method="POST" action="{{ route('quotes.store') }}" class="form-prevent-multiple-submit">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">Text</label>
                                        <input type="text" class="form-control" id="lastnameInput"
                                            placeholder="Quote text..." name="text" value="{{ old('text') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" name="published" type="checkbox" id="formCheck1">
                                        <label class="form-check-label" for="formCheck1">
                                            &nbsp;&nbsp;Published
                                        </label>
                                    </div>
                                </div>
                                <!--end col -->
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
