@extends('admin.layouts.app')

@section('title', 'Create Server')

@section('content')
    <section class="lg:px-4 md:px-10 mx-auto w-full -m-24">
        <div class="container mx-auto px-4 py-5 h-full">
            <div class="flex content-center items-center justify-center">
                <div class="w-full px-4">
                    <div
                        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
                        <div class="flex-auto px-4 lg:px-10 py-10 pt-10">
                            <div class="text-blueGray-400 text-center mb-3 font-bold">
                                <h2>Create Server</h2>
                                @foreach ($errors->all() as $message)
                                    <p style="color:red;">{{ $message }}</p>
                                @endforeach
                            </div>
                            <form method="POST" action="{{ route('channel-server.store') }}">
                                @csrf
                                <input type="hidden" name="channel_id" value="{{ $channel->id }}">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Server Number</label>
                                    <input type="number"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Server Number" name="server_no" value="{{ old('server_no') }}"/>
                                </div>
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Link</label>
                                    <input type="url"
                                        class="border-0 px-3 py-2 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        placeholder="Link" name="link" value="{{ old('link') }}" />
                                </div>
                                
                                <div class="text-center mt-6">
                                    <button
                                        class="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                                        type="submit">
                                        Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('external-js')
    @include('admin/partials/_toastr')
@endsection
