@extends('admin.layouts.app')

@section('title', 'Create User')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create User</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create User</li>
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
                        <form method="POST" action="{{ route('users.store') }}" class="form-prevent-multiple-submit"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">Page Name</label>
                                        <select name="" id="" class="form-select mb-3">
                                            <option value=""> --Page--</option>
                                            @foreach ($pages as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="lastnameInput"
                                            placeholder="Enter user name..." name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="posterLinkInput" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="posterLinkInput"
                                            placeholder="Enter user email" name="email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="trailerInput" class="form-label">Facebook Account ID</label>
                                        <input type="number" class="form-control" id="trailerInput"
                                            placeholder="Enter user facebook account id" name="fb_id"
                                            value="{{ old('fb_id') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Download Count</label>
                                        <input type="number" class="form-control" id="countryInput"
                                            placeholder="Enter user download count" name="dlcount"
                                            value="{{ old('dlcount') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label class="form-label" for="formCheck1">
                                        Type
                                    </label>
                                    <select name="type" id="" class="form-select mb-3">
                                        <option value="admin">Admin</option>
                                        <option value="moderator">Moderator</option>
                                        <option value="member">Member</option>
                                        <option value="vip">VIP</option>
                                        <option value="free">Free</option>
                                    </select>
                                </div>
                                <!-- col -->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="countryInput"
                                            placeholder="Enter user password" name="password" value="{{ old('password') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" name="banned" type="checkbox" id="formCheck1">
                                        <label class="form-check-label" for="formCheck1">
                                            &nbsp;&nbsp;Banned?
                                        </label>
                                    </div>
                                </div>
                                <!-- col -->
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
