@section('title', '- Login')

@section('meta-tags')
    <!-- Primary Meta Tags -->
    <meta name="title" content="Login">
    <meta name="description" content="Ani: New Stage အကောင့်၀င်ရန်နေရာ။">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->full() }}">
    <meta property="og:title" content="Login">
    <meta property="og:description" content="Ani: New Stage အကောင့်၀င်ရန်နေရာ။">
    <meta property="og:image" content="{{ asset('images/logo/logo.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->full() }}">
    <meta property="twitter:title" content="Login">
    <meta property="twitter:description" content="Ani: New Stage အကောင့်၀င်ရန်နေရာ။">
    <meta property="twitter:image" content="{{ asset('images/logo/logo.jpg') }}">
@endsection

@section('extra-css')
    <style>
        .login_form_wrapper {
            width: 100%;
            padding-top: 40px;
            padding-bottom: 100px;
            background-color: grey;
        }

        .login_wrapper {
            padding-bottom: 20px;
            margin-bottom: 20px;
            border-bottom: 1px solid #e4e4e4;
            float: left;
            width: 100%;
            background: #fff;
            padding: 50px;
        }

        .login_wrapper a.btn {
            color: #fff;
            width: 100%;
            height: 50px;
            padding: 6px 25px;
            line-height: 36px;
            margin-bottom: 20px;
            text-align: left;
            border-radius: 5px;
            background: #4385f5;
            font-size: 16px;
            border: 1px solid #4385f5;
        }


        .login_wrapper a i {
            float: right;
            margin: 0;
            line-height: 35px;
        }

        .login_wrapper a.google-plus {
            background: #db4c3e;
            border: 1px solid #db4c3e;
        }

        .login_wrapper h2 {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #111;
            line-height: 20px;
            text-transform: uppercase;
            text-align: center;
            position: relative;
        }

        .login_wrapper .formsix-pos,
        .formsix-e {
            position: relative;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .login_wrapper .form-control {
            height: 53px;
            padding: 15px 20px;
            font-size: 14px;
            line-height: 24px;
            border: 1px solid #fafafa;
            border-radius: 3px;
            box-shadow: none;
            font-family: 'Roboto';
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
            background-color: #fafafa;
        }

        .login_wrapper .form-control:focus {
            color: #999;
            background-color: fafafa;
            border: 1px solid #4285f4 !important;
        }

        .login_remember_box {
            margin-top: 30px;
            margin-bottom: 30px;
            color: #999;
        }

        .login_remember_box .control {
            position: relative;
            padding-left: 20px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            margin: 0;
        }

        .login_remember_box .control input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }

        .login_remember_box .control__indicator {
            position: absolute;
            top: 0;
            left: 0;
            width: 15px;
            height: 15px;
            background: #fff;
            border: 1px solid #999;
        }

        .login_remember_box .forget_password {
            float: right;
            color: #db4c3e;
            line-height: 12px;
            text-decoration: underline;
        }

        .login_btn_wrapper {
            padding-bottom: 20px;
            margin-bottom: 30px;
            border-bottom: 1px solid #e4e4e4;
        }

        .login__btnwrapper button {
            color: #fff;
            width: 100%;
            height: 50px;
            padding: 6px 25px;
            line-height: 36px;
            margin-bottom: 20px;
            text-align: left;
            border-radius: 5px;
            background: #4385f5;
            font-size: 16px;
            border: 1px solid #4385f5;
        }

        .login_btn_wrapper button.login_btn {
            text-align: center;
            text-transform: uppercase;
        }

        .login_message p {
            text-align: center;
            font-size: 16px;
            margin: 0;
        }

        p {
            color: #999999;
            font-size: 14px;
            line-height: 24px;
        }

        .login_wrapper button.login_btn:hover {
            background-color: #2c6ad4;
            border-color: #2c6ad4;
        }

        .login_wrapper button.btn:hover {
            background-color: #2c6ad4;
            border-color: #2c6ad4;
        }

        .login_wrapper a.google-plus:hover {
            background: #bd4033;
            border-color: #bd4033;
        }
    </style>
@endsection
<x-layout>

    <div class="login_wrapper">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                <div class="text-blueGray-400 text-center mb-3 font-bold">
                    @foreach ($errors->all() as $message)
                        <p style="color:red;font-size: 20px;">{{ $message }}</p>
                    @endforeach
                </div>
                <a href="{{ url('auth/facebook') }}" class="btn btn-primary facebook text-center">
                    <span>Login with Facebook</span> <i class="fa fa-facebook"></i> </a>
                <a href="{{ url('auth/google') }}" class="btn btn-danger google-plus text-center">
                    <span>Login with Google</span> <i class="fa fa-google-plus"></i> </a>
            </div>
        </div>
        <h2>or</h2>
        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <div class="formsix-pos">
                <div class="form-group i-email">
                    <input type="email" class="form-control" required="" id="email2"
                        placeholder="Email Address *" name="email">
                </div>
            </div>
            <div class="formsix-e">
                <div class="form-group i-password">
                    <input type="password" name="password" class="form-control" required="" id="password2"
                        placeholder="Password *">
                </div>
            </div>
            <div class="login_btn_wrapper">
                <button type="submit" class="btn btn-primary login_btn">Login</button>
            </div>
            <div class="login_message">
                <p>Don&rsquo;t have an account ? <a href="{{ url('auth/facebook') }}"> Sign up with
                        Facebook</a> </p>
            </div>
        </form>
    </div>
    <!-- /.login_wrapper-->


</x-layout>
