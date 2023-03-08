@extends('admin.layouts.app')

@section('title', 'Create Episode')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Auto Create Episode</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Auto Create Episode</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <form action="{{ route('episodes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="animes_id" value="{{ $anime->id }}">
        <section id="dynamicAddRemove">
            @if (old('episodes') === null)
                <div class="col-lg-12">
                    <div class="container-fluid parent-add-epi mt-4 p-0">
                        <div class="card border card-border-primary">
                            <div class="card-header text-center">
                                <h6 class="card-title mb-0">Auto Create Episode</h6>
                            </div>
                            <div class="card-body bg-gradient">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="zipcodeInput" class="form-label">Episode
                                                Number</label>
                                            <input type="number" class="form-control" id="zipcodeInput"
                                                placeholder="Episode number..." name="episodes[0][epi_number]"
                                                value="{{ old('epi_number') }}">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <label for="" class="form-label">Resolution</label>
                                        <select class="form-select mb-2" name="episodes[0][resolution]" id="">
                                            <option selected value=""> --Resolution--
                                            </option>
                                            @foreach ($resolutions as $item)
                                                <option value="{{ $item->pixel }}"
                                                    {{ old('resolution') === $item->pixel ? 'selected' : '' }}>
                                                    {{ $item->pixel }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-12">
                                        <label for="" class="form-label">Select your video</label>
                                        <input type="file" class="form-control" id="browseFile" accept="video/mp4">
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-12 mt-4">
                                        <div class="card bg-light overflow-hidden shadow-none">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <span class="text-info progress-percentage">0%</span>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <h6 class="mb-0 progress-text">
                                                            Ready to upload...</h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress bg-soft-info rounded-0">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="0"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col-->
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-around">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="formCheck1"
                                                    name="streamsb">
                                                <label class="form-check-label" for="formCheck1">
                                                    &nbsp;&nbsp;StreamSB
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="formCheck1"
                                                    name="streamtape">
                                                <label class="form-check-label" for="formCheck1">
                                                    &nbsp;&nbsp;StreamTape
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="formCheck1"
                                                    name="upstream">
                                                <label class="form-check-label" for="formCheck1">
                                                    &nbsp;&nbsp;UpStream
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <!-- Buttons Grid -->
                                    <div class="d-grid gap-2 mt-2">
                                        <button class="btn btn-md btn-primary submit-btn" type="submit">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </section>
    </form>
@endsection

@section('scripts')
    <!-- Resumable js -->
    <script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

    <script type="text/javascript">
        let browseFile = $('#browseFile');
        let resumable = new Resumable({
            target: '{{ route('file.advanced.upload') }}',
            query: {
                _token: '{{ csrf_token() }}'
            }, // CSRF token
            fileType: ['mp4'],
            chunkSize: 10 * 1024 *
                1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
            headers: {
                'Accept': 'application/json'
            },
            testChunks: false,
            throttleProgressCallbacks: 1,
        });

        resumable.assignBrowse(browseFile[0]);

        resumable.on('fileAdded', function(file) { // trigger when file picked
            showProgress();
            resumable.upload() // to actually start uploading.
        });

        resumable.on('fileProgress', function(file) { // trigger when file progress update
            updateProgress(Math.floor(file.progress() * 100));
        });

        resumable.on('fileSuccess', function(file, response) { // trigger when file upload complete
            alert("Video upload Successfully");
            $('.submit-btn').prop('disabled', false).html('Submit');
        });

        resumable.on('fileError', function(file, response) { // trigger when there is any error
            alert(response);
            console.log(response);
        });


        let progress = $('.progress');

        function showProgress() {
            progress.find('.progress-bar').css('width', '0%');
            $('.progress-percentage').html('0%');
            progress.show();
        }

        function updateProgress(value) {
            if (value === 0) {
                $('.progress-text').html('Task In Progress...')
            }
            if (value > 90) {
                $('.progress-text').html('Encoding Progress will take time...')
            }
            if (value === 100) {
                $('.progress-text').html('Your video uploaded to server.')
            }
            progress.find('.progress-bar').css('width', `${value}%`);
            $('.progress-percentage').html(`${value}%`);
            $('.submit-btn').prop('disabled', true).html('Processing!!!');
        }

        function hideProgress() {
            progress.hide();
        }
    </script>
@endsection
