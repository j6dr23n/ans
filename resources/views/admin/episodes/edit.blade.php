@extends('admin.layouts.app')

@section('title', 'Edit Episode')

@section('content')
    <div class="d-flex justify-content-around">
        <!-- Buttons Grid -->
        <button type="button" class="btn btn-secondary rounded-pill add_embed">Add
            More
            Embed
        </button>
        <button type="button" name="add" class="btn btn-info rounded-pill add_download">Add
            More
            Download
        </button>
    </div>
    <form action="{{ route('episodes.update', $episode->id) }}" method="POST">
        @csrf
        @method('PUT')
        <section id="dynamicAddRemove">
            <div class="col-lg-12">
                <div class="container-fluid parent-add-epi mt-4 p-0">
                    <div class="card border card-border-primary">
                        <div class="card-header text-center">
                            <h6 class="card-title mb-0">Add Episode</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($errors->all() as $message)
                                    <p style="color:red;">{{ $message }}</p>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Episode
                                            Link (VIP User)</label>
                                        <input type="url" class="form-control" id="zipcodeInput"
                                            placeholder="Enter vip link..." name="epi_link"
                                            value="{{ $episode->epi_link }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Episode
                                            Link (Free User)</label>
                                        <input type="url" class="form-control" id="zipcodeInput"
                                            placeholder="Enter free ads link..." name="epi_720p_link"
                                            value="{{ $episode->epi_720p_link }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Embed
                                            Link</label>
                                        <input type="url" class="form-control" id="zipcodeInput"
                                            placeholder="Enter embed link..." name="embed_link"
                                            value="{{ $episode->embed_link }}">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Drive</label>
                                    <select class="form-select" name="drive" id="">
                                        <option selected value=""> --Drive-- </option>
                                        @foreach ($drives as $item)
                                            <option value="{{ $item->name }}"
                                                {{ $episode->drive === $item->name ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Episode Number</label>
                                    <input type="number" class="form-control" id="countryInput"
                                        placeholder="Enter Episode Number" name="epi_number"
                                        value="{{ $episode->epi_number }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Resolution</label>
                                    <select class="form-select" name="resolution" id="">
                                        <option selected value=""> --Resolution--
                                        </option>
                                        @foreach ($resolutions as $item)
                                            <option value="{{ $item->pixel }}"
                                                {{ $episode->resolution === $item->pixel ? 'selected' : '' }}>
                                                {{ $item->pixel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mt-4">
                                <button class="btn btn-md btn-warning" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    @if (count($episode->embeds) > 0)
        <div class="col-lg-12">
            <div class="card bg-soft-secondary">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0 pt-1">
                        More Embed List
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Embed Link</th>
                                    <th>Drive</th>
                                    <th>Resolution</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($episode->embeds as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ $item->embed_link }}">
                                                {{ Str::limit($item->embed_link, 30) }}
                                            </a>
                                        </td>
                                        <td><i class="bx bxs-cloud-download me-2"></i>{{ $item->drive }}</td>
                                        <td><i
                                                class="{{ $item->resolution === null ? ' bx bxs-file-pdf' : ' bx bxs-camera-movie' }} me-2"></i>{{ $item->resolution === null ? 'pdf' : $item->resolution }}
                                        </td>
                                        <td>{{ $item->created_at->format('j F y') }}</td>
                                        <td class="d-flex" style="font-size: 20px">
                                            <a href="{{ route('moreeb.edit', $item->id) }}" class="me-2">
                                                <i class="ri ri-edit-2-fill text-warning"></i>
                                            </a>
                                            <form action="{{ route('moreeb.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dltBtn"><i class="ri ri-delete-bin-fill text-danger"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    @endif

    @if (count($episode->downloads) > 0)
        <div class="col-lg-12">
            <div class="card bg-soft-info">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0 pt-1">
                        More Download List
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Download Link</th>
                                    <th>Drive</th>
                                    <th>Resolution</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($episode->downloads as $item)
                                    <tr>
                                        <td>
                                            <a href="{{ $item->download_link }}">
                                                {{ Str::limit($item->download_link, 30) }}
                                            </a>
                                        </td>
                                        <td><i class="bx bxs-cloud-download me-2"></i>{{ $item->drive }}</td>
                                        <td><i
                                                class="{{ $item->resolution === null ? ' bx bxs-file-pdf' : ' bx bxs-camera-movie' }} me-2"></i>{{ $item->resolution === null ? 'pdf' : $item->resolution }}
                                        </td>
                                        <td>{{ $item->created_at->format('j F y') }}</td>
                                        <td class="d-flex" style="font-size: 20px">
                                            <a href="{{ route('moredl.edit', $item->id) }}" class="me-2">
                                                <i class="ri ri-edit-2-fill text-warning"></i>
                                            </a>
                                            <form action="{{ route('moredl.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="dltBtn"><i class="ri ri-delete-bin-fill text-danger"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    @endif
@endsection

@section('scripts')
    @include('admin/partials/_dynamic-input')
    @include('admin/partials/_delete-script')
@endsection
