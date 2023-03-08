@extends('admin.layouts.app')

@section('title', 'Analytics Data List')

@section('content')
    <div class="container">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Download Logs</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Download Logs</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 text-center text-primary">
                        Download Logs
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Small Tables -->
                        <table class="table table-sm table-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">IP</th>
                                    <th scope="col">Device</th>
                                    <th scope="col">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($logs as $item)
                                    @php
                                        $name = explode('has', $item->description);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td> <span class="text-info">{{ $name[0] }}</span> has {{ $name[1] }}</td>
                                        <td class="text-danger">{{ $item->properties['ip'] }}</td>
                                        <td class="text-warning">{{ $item->properties['device'] }}</td>
                                        <td>{{ $item->created_at->format('j F y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $logs->onEachSide(2)->links('admin.partials._pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
