@extends('admin.layouts.app')

@section('title', 'Edit Download Link')

@section('content')
    <form action="{{ route('moredl.update', $moredl->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-lg-12">
            <div class="container-fluid parent-add-epi mt-4">
                <div class="card border card-border-info">
                    <div class="card-header text-center">
                        <h6 class="card-title mb-0 text-info">Edit Download Link</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Drive</label>
                                <select class="form-select" name="drive" id="">
                                    <option selected value=""> --Drive-- </option>
                                    @foreach ($drives as $drive)
                                        <option value="{{ $drive->name }}"
                                            {{ $moredl->drive === $drive->name ? 'selected' : '' }}>
                                            {{ $drive->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Resolution</label>
                                <select class="form-select" name="resolution" id="">
                                    <option selected value=""> --Resolution--
                                    </option>
                                    @foreach ($resolutions as $reso)
                                        <option value="{{ $reso->pixel }}"
                                            {{ $moredl->resolution === $reso->pixel ? 'selected' : '' }}>{{ $reso->pixel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($errors->all() as $message)
                                <p style="color:red;">{{ $message }}</p>
                            @endforeach
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="zipcodeInput" class="form-label">Download
                                        Link</label>
                                    <input type="url" class="form-control" id="zipcodeInput"
                                        placeholder="Enter download link..." name="download_link"
                                        value="{{ old('download_link') !== null ? old('download_link') : $moredl->download_link }}">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                    <button class="btn btn-warning mx-4 mb-4" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('external-js')
    @include('admin/partials/_toastr')
    @include('admin/partials/_dynamic-input')
@endsection
