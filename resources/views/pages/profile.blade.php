<x-layout>
    <div class="breadcrumb-area breadcrumb-modify-padding bg-black-2">
        <div class="container">
            <div class="in-breadcrumb">
                <div class="row">
                    <div class="col">
                        <div class="breadcrumb-style-2 center">
                            <h2>My Account</h2>
                            <ul class="breadcrumb-list-2 black">
                                <li><a href="index-4.html">Home</a></li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main class="my-account-wrapper section-pt-90 section-pb-90 bg-black">
        <div class="container">
            <div class="col-md-12 col-lg-12">
                <!-- Nav tabs -->
                <ul role="tablist" class="nav dashboard-list white mb--60">
                    <li class="active" role="presentation"><a href="#account-details" data-bs-toggle="tab"
                            class="tablist-btn active">Account details</a></li>
                    <li class="active" role="presentation"><a href="#vip-pages" data-bs-toggle="tab"
                            class="tablist-btn ">VIP Pages</a></li>
                </ul>
            </div>

            <div class="tab-content dashboard-content">
                <div class="tab-pane active" id="account-details">
                    <div class="row">
                        <div class="col-lg-3 col-xl-2 col-md-3">
                            <div class="our-profile-images mb--60 ">
                                <div class="profile-media">
                                    <div class="edit-profile">
                                        <img src="https://www.nicepng.com/png/detail/115-1150821_default-avatar-comments-sign-in-icon-png.png"
                                            alt="">
                                        <div class="btn-file">
                                            <span class="btn-file-icon"><i class="zmdi zmdi-camera-bw"></i></span>
                                            <input type="file">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-xl-10 col-md-9">
                            <div class="account-form-container-wrapper our-product-left_m">
                                <div class="login">
                                    <div class="account-form-container">
                                        <div class="text-blueGray-400 text-center mb-3 font-bold">
                                            @foreach ($errors->all() as $message)
                                                <p style="color:red;font-size: 20px;">{{ $message }}</p>
                                            @endforeach
                                        </div>
                                        <div class="account-login-form">
                                            <form action="{{ route('pages.profile_update', $user->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="my-account-form-wrap border-bottom-2 white pb--30">
                                                    <h3>General Information</h3>
                                                    <div class="row account-input-box">
                                                        <div class="col-md-6 single-input-box mt--15">
                                                            <label>Display Name</label>
                                                            <input type="text" name="name"
                                                                value="{{ $user->name }}" disabled>
                                                        </div>
                                                        <div class="col-md-6 single-input-box mt--15">
                                                            <label>Email Address</label>
                                                            <input type="email" name="email"
                                                                value="{{ $user->email }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-account-form-wrap border-bottom-2 white mt--30 pb--30">
                                                    <h3>Change Password</h3>
                                                    <div class="row account-input-box">
                                                        <div class="col-md-4 single-input-box mt--15">
                                                            <label>New Password:</label>
                                                            <input type="password" name="password">
                                                        </div>
                                                        <div class="col-md-4 single-input-box mt--15">
                                                            <label>Confirm password</label>
                                                            <input type="password" name="password_confirmation">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button-box mt--30">
                                                    <button type="submit" class="btn theme-color-four">Save
                                                        Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="vip-pages">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="current-plan-wrapper white">

                                <div class="dic-pricing">
                                    @foreach (auth()->user()->paidPages as $item)
                                        <div class="row border-bottom-2">
                                            <div class="col-md-3 col-xs-12">
                                                <!--header-->
                                                <div class="dic-pricing-header">
                                                    <img src="{{ $item->page->poster }}" class="img-fluid"
                                                        width="200px" height="200px" alt="">
                                                </div>
                                                <!--/header-->
                                            </div>
                                            <div class="col-md-5 col-xs-12">
                                                <!--items-->
                                                <div class="dic-pricing-items">
                                                    <div class="about-cont text-center text-white-style">
                                                        <div class="like-share-wrap"
                                                            style="justify-content: space-around;align-items: baseline">
                                                            <div class="social-share-wrap m-2"
                                                                style="justify-content: center">
                                                                <span>Page Name:</span>
                                                                <p>{{ $item->page->name }}
                                                                </p>
                                                            </div>

                                                            <div class="social-share-wrap"
                                                                style="justify-content: center">
                                                                <span>Expiry At:</span>
                                                                <p>{{ $item->expiry_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/items-->
                                            </div>
                                            <div class="col-md-4 col-xs-12">
                                                <div class="dic-pricing-btn text-center">
                                                    <!--button-->
                                                    <a class="btn-two-style theme-color-four"
                                                        href="/payments?page={{ Crypt::encryptString($item->page->id) }}">
                                                        Upgrade Plan
                                                    </a>
                                                    <!--/button-->
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</x-layout>
