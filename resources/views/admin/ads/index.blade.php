@extends('admin.layouts.app')

@section('title', 'Anime List')

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ADS Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ads</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            Ads List
                        </h5>
                    </div>
                    <div class="card-body">
                        <!-- Striped Rows -->
                        @if (auth()->user()->page->allow_ads === 1)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Imperssion</th>
                                            <th scope="col">Clicks</th>
                                            <th scope="col">Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ads as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->imperssions }}</td>
                                                <td>{{ $item->clicks }}</td>
                                                <td>$ {{ $item->revenue }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-dark">
                                        <tr>
                                            <td>Total</td>
                                            <td>Overall</td>
                                            <td>{{ $total_imperssions }}</td>
                                            <td>{{ $total_clicks }}</td>
                                            <td>$ {{ $total_revenue }}</td>
                                        </tr>
                                    </tfoot>
                                </table>

                                {{ $ads->onEachSide(2)->links('admin.partials._pagination') }}
                            </div>
                        @else
                            <h3 style="color:red" class="text-center">Check at page setting -> Ads Tab to add ads to your
                                page.</h3>
                        @endif
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!-- container-fluid -->
@endsection
