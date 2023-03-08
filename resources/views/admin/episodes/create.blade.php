@extends('admin.layouts.app')

@section('title', 'Create Episode')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-around">
            <!-- Buttons Grid -->
            <a type="button" href="{{ route('episodes.auto.create', $anime->id) }}" class="btn btn-warning rounded-pill">Auto
                Upload Episode
            </a>
            <button type="button" name="add" class="btn btn-primary rounded-pill add_episode">Add
                More
                Episode
            </button>
        </div>
        <form action="{{ route('episodes.store') }}" method="POST">
            @csrf
            <input type="hidden" name="animes_id" value="{{ $anime->id }}">
            <section id="dynamicAddRemove">
                @if (old('episodes') === null)
                    <div class="col-lg-12">
                        <div class="container-fluid parent-add-epi mt-4 p-0">
                            <div class="card border card-border-primary">
                                <div class="card-header text-center">
                                    <h6 class="card-title mb-0">Add Episode</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Episode
                                                    Link (VIP User)</label>
                                                <input type="url" class="form-control" id="zipcodeInput"
                                                    placeholder="Enter vip link..." name="episodes[0][epi_link]"
                                                    value="{{ old('epi_link') }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Episode
                                                    Link (Free User)</label>
                                                <input type="url" class="form-control" id="zipcodeInput"
                                                    placeholder="Enter free ads link..." name="episodes[0][epi_720p_link]"
                                                    value="{{ old('epi_720p_link') }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Embed
                                                    Link</label>
                                                <input type="url" class="form-control" id="zipcodeInput"
                                                    placeholder="Enter embed link..." name="episodes[0][embed_link]"
                                                    value="{{ old('embed_link') }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Drive</label>
                                            <select class="form-select" name="episodes[0][drive]" id="">
                                                <option selected value=""> --Drive-- </option>
                                                @foreach ($drives as $item)
                                                    <option value="{{ $item->name }}"
                                                        {{ old('drive') === $item->name ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Episode Number</label>
                                            <input type="number" class="form-control" id="countryInput"
                                                placeholder="Enter Episode Number" name="episodes[0][epi_number]"
                                                value="{{ old('epi_number') }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Resolution</label>
                                            <select class="form-select" name="episodes[0][resolution]" id="">
                                                <option selected value=""> --Resolution--
                                                </option>
                                                @foreach ($resolutions as $item)
                                                    <option value="{{ $item->pixel }}"
                                                        {{ old('resolution') === $item->pixel ? 'selected' : '' }}>
                                                        {{ $item->pixel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </section>
            @if (old('episodes') !== null)
                @foreach (old('episodes') as $i => $field)
                    <div class="col-lg-12">
                        <div class="container-fluid parent-add-epi mt-4 p-0">
                            <div class="card border card-border-primary">
                                <div class="card-header text-center">
                                    <h6 class="card-title mb-0">Add Episode</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Episode
                                                    Link (VIP User)</label>
                                                <input type="url" class="form-control" id="zipcodeInput"
                                                    placeholder="Enter vip link..." name="episodes[0][epi_link]"
                                                    value="{{ old('episodes')[$i]['epi_link'] }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Episode
                                                    Link (Free User)</label>
                                                <input type="url" class="form-control" id="zipcodeInput"
                                                    placeholder="Enter free ads link..." name="episodes[0][epi_720p_link]"
                                                    value="{{ old('episodes')[$i]['epi_720p_link'] }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="zipcodeInput" class="form-label">Embed
                                                    Link</label>
                                                <input type="url" class="form-control" id="zipcodeInput"
                                                    placeholder="Enter embed link..." name="episodes[0][embed_link]"
                                                    value="{{ old('episodes')[$i]['embed_link'] }}">
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Drive</label>
                                            <select class="form-select" name="episodes[0][drive]" id="">
                                                <option selected value=""> --Drive-- </option>
                                                @foreach ($drives as $item)
                                                    <option value="{{ $item->name }}"
                                                        {{ old('episodes')[$i]['drive'] === $item->name ? 'selected' : '' }}>
                                                        {{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Episode Number</label>
                                            <input type="number" class="form-control" id="countryInput"
                                                placeholder="Enter Episode Number" name="episodes[0][epi_number]"
                                                value="{{ old('episodes')[$i]['epi_number'] }}">
                                        </div>
                                        <div class="col-lg-4">
                                            <label for="" class="form-label">Resolution</label>
                                            <select class="form-select" name="episodes[0][resolution]" id="">
                                                <option selected value=""> --Resolution--
                                                </option>
                                                @foreach ($resolutions as $item)
                                                    <option value="{{ $item->pixel }}"
                                                        {{ old('episodes')[$i]['resolution'] === $item->pixel ? 'selected' : '' }}>
                                                        {{ $item->pixel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-danger m-4 remove_episode" type="button">Remove</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="d-grid gap-2 mb-4">
                <button class="btn btn-md btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>

@endsection

@section('scripts')
    @include('admin/partials/_dynamic-input')
@endsection
