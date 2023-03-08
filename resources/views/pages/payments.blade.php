<x-layout>
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-3">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2 center">
                            <h2>Payments</h2>
                            <ul class="breadcrumb-list-2 black">
                                <li><a href="index-4.html">Home</a></li>
                                <li>Payments</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-us-area bg-black section-pt-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form-wrap section-pb-90">
                        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data"
                            id="contact-form">
                            @csrf
                            <input type="hidden" name="page_id" value="{{ $page->id }}">
                            <div class="row">
                                @if ($page->setting)
                                    <div class="col-lg-12 col-md-12 contact-inner black"
                                        style="display: flex;align-items: center; align-content: space-between">
                                        <img src="{{ asset('/images/kbzpay.png') }}" class="img-fluid" width="100px"
                                            height="100px" alt="">
                                        <p class="text-white" style="font-size: 20px;">0{{ $page->setting->kpay }}</p>
                                    </div>
                                    <div class="col-lg-12 col-md-12 contact-inner black"
                                        style="display: flex;align-items: center; align-content: space-between">
                                        <img src="{{ asset('/images/wavepay.png') }}" class="img-fluid rounded p-2"
                                            width="100px" height="100px" alt="">
                                        <p class="text-white" style="font-size: 20px;">0{{ $page->setting->wavepay }}
                                        </p>
                                    </div>
                                    <div class="like-share-wrap mt-0 text-white"
                                    style="justify-content: space-around;align-items: baseline;">
                                        <div class="social-share-wrap m-2" style="justify-content: center">
                                            <span>Monthly Cost:</span>
                                            <p>{{ number_format($page->setting->monthly_cost ?? '0', 0) }}</p>
                                        </div>

                                        <div class="social-share-wrap" style="justify-content: center">
                                            <span>Lifetime Cost:</span>
                                            <p>{{ number_format($page->setting->lifetime_cost ?? '0', 0) }}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-lg-12 text-center contact-inner black mb-4 mt-4">
                                    <label for="" style="display: block; text-align: left;color: white;">Page
                                        Name</label>
                                    <input type="text" placeholder="{{ $page->name }}" readonly>
                                </div>
                                <div class="col-lg-12 text-center contact-inner black mb-2">
                                    <label for="" style="display: block; text-align: left;color: white;">Your
                                        Email</label>
                                    <input type="email" value="{{ auth()->user()->email }}"
                                        placeholder="{{ auth()->user()->email ?? 'Email address' }}" readonly>
                                </div>
                                <div class="col-lg-12 text-center contact-inner black">
                                    <label for=""
                                        style="display: block; text-align: left;color: white; padding:10px 0px;">Upload
                                        your
                                        payment slip.</label>
                                    <input type="file" name="slip" style="padding:12px;" accept="image/*">
                                </div>
                            </div>
                            <div class="contact-submit-btn text-center">
                                <button class="submit-btn" type="submit">Send</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
