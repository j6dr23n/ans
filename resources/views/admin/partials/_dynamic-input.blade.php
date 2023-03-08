<script type="text/javascript">
    var i = 0;
    var d = 0;
    var e = 0;
    $(".add_episode").click(function() {
        ++i;
        $("#dynamicAddRemove").append(`
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
                                            placeholder="Enter vip link..."
                                            name="episodes[`+i+`][epi_link]"
                                            value="{{ old('epi_link') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Episode
                                            Link (Free User)</label>
                                        <input type="url" class="form-control" id="zipcodeInput"
                                            placeholder="Enter free ads link..."
                                            name="episodes[`+i+`][epi_720p_link]"
                                            value="{{ old('epi_720p_link') }}">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="zipcodeInput" class="form-label">Embed
                                            Link</label>
                                        <input type="url" class="form-control" id="zipcodeInput"
                                            placeholder="Enter embed link..."
                                            name="episodes[`+ i +`][embed_link]"
                                            value="{{ old('embed_link') }}">
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Drive</label>
                                    <select class="form-select" name="episodes[` + i + `][drive]" id="">
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
                                        placeholder="Enter Episode Number" name="episodes[`+i+`][epi_number]"
                                        value="{{ old('epi_number') }}">
                                </div>
                                <div class="col-lg-4">
                                    <label for="" class="form-label">Resolution</label>
                                    <select class="form-select" name="episodes[` + i + `][resolution]" id="">
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
                        <button class="btn btn-sm btn-danger m-4 remove_episode"
                                        type="button">Remove</button>
                    </div>
                </div>
            </div>`);
    });
    $(document).on('click', '.remove_episode', function() {
        $(this).parent('div').remove();
    });
    $(".add_embed").click(function() {
        ++e;
        $("#dynamicAddRemove").append(`
        <div class="col-lg-12">
            <div class="container-fluid parent-add-epi mt-4 p-0">
                <div class="card border card-border-secondary">
                    <div class="card-header text-center">
                        <h6 class="card-title mb-0 text-secondary">Add More Embed Link</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Drive</label>
                                <select class="form-select" name="more_embed[` + e + `][drive]" id="">
                                    <option selected value=""> --Drive-- </option>
                                @foreach ($drives as $item)
                                    <option value="{{ $item->name }}"
                                        {{ old('drive') === $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Resolution</label>
                                <select class="form-select" name="more_embed[` + e + `][resolution]" id="">
                                    <option selected value=""> --Resolution--
                                    </option>
                                    @foreach ($resolutions as $item)
                                    <option value="{{ $item->pixel }}" {{ old('resolution') === $item->pixel ? 'selected' : '' }}>{{ $item->pixel }}</option>
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
                                    <label for="zipcodeInput" class="form-label">Embed
                                        Link</label>
                                    <input type="url" class="form-control" id="zipcodeInput"
                                        placeholder="Enter embed link..." name="more_embed[` + e + `][embed_link]"
                                        value="{{ old('embed_link') }}">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                    <button class="btn btn-sm btn-danger mx-4 mb-4 remove_embed"
                                        type="button">Remove</button>
                </div>
            </div>
        </div>`);
    });
    $(document).on('click', '.remove_embed', function() {
        $(this).parent('div').remove();
    });
    $(".add_download").click(function() {
        ++d;
        $("#dynamicAddRemove").append(` 
        <div class="col-lg-12">
            <div class="container-fluid parent-add-epi mt-4 p-0">
                <div class="card border card-border-info">
                    <div class="card-header text-center">
                        <h6 class="card-title mb-0 text-info">Add More Download Link</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="" class="form-label">Drive</label>
                                <select class="form-select" name="more_download[` + d + `][drive]" id="">
                                    <option selected value=""> --Drive-- </option>
                                    @foreach ($drives as $item)
                                    <option value="{{ $item->name }}"
                                        {{ old('drive') === $item->name ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="" class="form-label">Resolution</label>
                                <select class="form-select" name="more_download[` + d + `][resolution]" id="">
                                    <option selected value=""> --Resolution--
                                    </option>
                                    @foreach ($resolutions as $item)
                                    <option value="{{ $item->pixel }}" {{ old('resolution') === $item->pixel ? 'selected' : '' }}>{{ $item->pixel }}</option>
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
                                    <label for="zipcodeInput" class="form-label">Embed
                                        Link</label>
                                    <input type="url" class="form-control" id="zipcodeInput"
                                        placeholder="Enter embed link..." name="more_download[` + d + `][download_link]"
                                        value="{{ old('download_link') }}">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                    <button class="btn btn-sm btn-danger mx-4 mb-4 remove_download"
                                        type="button">Remove</button>
                </div>
            </div>
        </div>`);
    });
    $(document).on('click', '.remove_download', function() {
        $(this).parent('div').remove();
    });
   
</script>
