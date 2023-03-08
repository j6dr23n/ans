@extends('admin.layouts.app')

@section('title', 'Edit Payments')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Payment</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Payment</li>
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
                        <form method="POST" action="{{ route('akm.payments.update', $payment->id) }}"
                            class="form-prevent-multiple-submit">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="lastnameInput"
                                            placeholder="User Name" value="{{ $payment->user->name }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="exampleFormControlTextarea" class="form-label">Email</label>
                                        <input type="email" id="" class="form-control"
                                            value="{{ $payment->user->email }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Payment Slip</h4>
                                        <a href="{{ asset('/storage/' . $payment->slip) }}"><img
                                                src="{{ asset('/storage/' . $payment->slip) }}" alt=""
                                                width="100%"></a>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="websiteInput1" class="form-label">Expiry At</label>
                                        <input type="date" class="form-control" id="websiteInput1" name="expiry_at"
                                            value="{{ old('expiry_at') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="formCheck1" name="approve"
                                                {{ $payment->approve === 1 ? 'checked' : '' }}>
                                            <label class="form-check-label" for="formCheck1">
                                                &nbsp;&nbsp;Approve
                                            </label>
                                        </div>
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
