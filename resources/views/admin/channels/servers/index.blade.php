@extends('admin.layouts.app')

@section('title', 'Server List')

@section('external-css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
alpha/css/bootstrap.css" rel="stylesheet">
@endsection

@section('content')
    <div class="lg:px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-2">
            <div class="w-full mb-6 px-2">
                <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class="relative w-full px-4 max-w-full flex justify-between">
                                <h3 class="font-semibold text-lg text-blueGray-700 inline">
                                    Server List
                                </h3>
                                <a href="{{ route('channel-server.create',$channel->id) }}"
                                    style="color:blue;font-weight:bold;">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table class="items-center w-full bg-transparent border-collapse">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Server Number
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Link
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Created Date
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Edit
                                    </th>
                                    <th
                                        class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($servers as $item)
                                    <tr>
                                        <th
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                                            <span class="ml-3 font-bold text-blueGray-600">
                                                {{ $item->server_no }}
                                            </span>
                                        </th>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            <a class="text-blueGray-500 block py-1 px-3">
                                                {{ Str::limit($item->link,30) }}
                                            </a>
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            <a class="text-blueGray-500 block py-1 px-3">
                                                {{ \Carbon\Carbon::parse($item->created_at)->toDateTimeString() }}
                                            </a>
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            <x-admin.button href="{{ route('channel-server.edit', $item->id) }}"
                                                icon="edit" />
                                        </td>
                                        <td
                                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">
                                            <x-admin.submit action="{{ route('channel-server.destroy', $item->id) }}"
                                                data_id="{{ $item->id }}" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('admin/partials/_footer')
    </div>
@endsection

@section('external-js')
    @include('admin/partials/_toastr')
    @include('admin/partials/_delete-script')
@endsection
