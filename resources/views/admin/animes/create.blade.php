@extends('admin.layouts.app')

@section('title', 'Create Anime')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Post</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Post</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <!--end col-->
            <div class="col-xl-12 p-0">
                <div class="card">
                    <div class="card-body p-4">
                        @foreach ($errors->all() as $message)
                            <p style="color:red;">{{ $message }}</p>
                        @endforeach
                        <form method="POST" action="{{ route('animes.store') }}" class="form-prevent-multiple-submit"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">Page Name</label>
                                        <select class="form-select mb-3" aria-label="Default select example" name="page_id"
                                            disabled>
                                            <option selected> {{ auth()->user()->page->name ?? 'None' }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="lastnameInput"
                                            placeholder="Enter your title..." name="title" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3 pb-2">
                                        <label for="exampleFormControlTextarea" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea" placeholder="Enter your description..." rows="6"
                                            name="info">{{ old('info') }}</textarea>
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
                                        <label for="trailerInput" class="form-label">Trailer (Embed Link)</label>
                                        <input type="text" class="form-control" id="trailerInput"
                                            placeholder="Enter your embed link" name="trailer" value="{{ old('trailer') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Type</label>
                                        <select class="form-select rounded-pill mb-3" aria-label="Default select example"
                                            name="type">
                                            <option selected value=""> --Type--</option>
                                            @foreach ($types as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ old('type') === $item->name ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Condition</label>
                                        <select class="form-select rounded-pill mb-3" aria-label="Default select example"
                                            name="condition">
                                            <option selected value=""> --Condition-- </option>
                                            <option value="Ongoing" {{ old('condition') === 'Ongoing' ? 'selected' : '' }}>
                                                Ongoing</option>
                                            <option value="Finished"
                                                {{ old('condition') === 'Finished' ? 'selected' : '' }}>
                                                Finished
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Season</label>
                                        <select class="form-select rounded-pill mb-3" aria-label="Default select example"
                                            name="season">
                                            <option selected value=""> --Season-- </option>
                                            @for ($i = 1; $i < 21; $i++)
                                                <option value="{{ $i }}"
                                                    {{ old('season') === "$i" ? 'selected' : '' }}>
                                                    {{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Genres</label>
                                        <select class="form-select rounded-pill mb-3" aria-label="Default select example"
                                            name="genres">
                                            <option selected value=""> --Genres--</option>
                                            @foreach ($genres as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ old('genres') === $item->name ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Sub Genres</label>
                                        <select class="form-select rounded-pill mb-3" aria-label="Default select example"
                                            name="sub_genres">
                                            <option selected value=""> --Sub Genres--</option>
                                            @foreach ($genres as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ old('sub_genres') === $item->name ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="websiteInput1" class="form-label">Release Year</label>
                                        <input type="date" class="form-control" id="websiteInput1"
                                            name="release_year" value="{{ old('release_year') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Rating</label>
                                        <input type="number" class="form-control" minlength="5" maxlength="6"
                                            id="zipcodeInput" placeholder="Enter rating" name="rating"
                                            value="{{ old('rating') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="countryInput" class="form-label">Age Rating</label>
                                        <input type="number" class="form-control" id="countryInput"
                                            placeholder="Enter Age Rating" name="age_rating"
                                            value="{{ old('age_rating') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" name="featured" type="checkbox" id="formCheck1">
                                        <label class="form-check-label" for="formCheck1">
                                            &nbsp;&nbsp;Featured
                                        </label>
                                    </div>
                                </div>
                                <!-- col -->
                                <div class="col-lg-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" name="paid" type="checkbox" id="formCheck1">
                                        <label class="form-check-label" for="formCheck1">
                                            &nbsp;&nbsp;Paid
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-grid gap-2 mt-2">

                                        <button type="button" name="add" id="add-epi-btn"
                                            class="btn btn-sm btn-warning add_episode">Add
                                            More
                                            Episode
                                        </button>
                                    </div>
                                </div>
                                <section id="dynamicAddRemove">
                                </section>
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

@section('scripts')
    @include('admin/partials/_dynamic-input')
@endsection
