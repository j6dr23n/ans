<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ani: New Stage @yield('title')</title>
    @yield('meta-tags')
    <meta name="description"
        content="Ani: New Stage က ဆိုရင် မြန်မာနိုင်ငံအတွင်းထဲမှာရှိတဲ့ anime/manga တို့ကို
    မြန်မာဘာသာဖြင့် တင်ဆက်ပေးနေသော page တွေနဲ့ပေါင်းထားတဲ့ website တစ်ခုပဲဖြစ်ပါတယ်။">
    <meta name="image" content="https://files.aninewstage.org/file/ans-assets/assets/logo-bottom.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon/favicon.ico') }}">

    <!-- CSS
    ========================= -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Fonts CSS -->
    <link rel="stylesheet" href="{{ asset('css/material-design-iconic-font.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Modernizer JS -->
    <script src="{{ asset('js/vendor/modernizr-3.6.0.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css" />

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0-beta.3/css/lightgallery-bundle.min.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
    @yield('extra-css')
    <!-- GA4 Google analytics-->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0WV7E9QL4P"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-0WV7E9QL4P');
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TLHGWBB');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <div id="fb-root"></div>
    <div id="fb-customer-chat" class="fb-customerchat"></div>
    <!-- Messenger Chat Plugin Code -->

    <div class="loader-wrapper">
        <div class="loader"
            style="margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);">
            <img src="https://files.aninewstage.org/file/ans-assets/assets/loader.gif" alt="" width="100px"
                height="100px">
        </div>
    </div>
    <!-- Main Wrapper Start -->
    <div class="main-wrapper" style="overflow: hidden;">
        <!-- header area start -->
        <x-partials.header />
        {{-- header area end --}}

        {{-- page start --}}
        {{ $slot }}
        {{-- page end --}}

        <main class="adblock" style="display: none;">
            <div class="about-us-cont-area bg-black">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="https://mailoptin.io/wp-content/uploads/2018/03/adblock.png" alt=""
                            class="mx-auto d-block">
                    </div>
                </div>
            </div>
        </main>

        {{-- footer start --}}
        <x-partials.footer />
        {{-- footer end --}}

        <!-- Modal -->
        <div class="modal fade" id="exampleModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="subscribe-btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="zmdi zmdi-close s-close"></i></button>
                    </div>
                    <div class="modal-body">
                        <h5 id="exampleModalLabel">Ready to watch? Enter your email to create or restart your
                            membership.</h5>
                        <div class="create-membership-wrap modify">
                            <input placeholder="Email Address">
                            <button class="landing-btn-style" type="button">Get Started</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Wrapper End -->

    <!-- JS
============================================ -->

    <!-- jquery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
    <script src="{{ asset('js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ asset('js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Jquery UI JS -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@2.5.0-beta.3/lightgallery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios@1.2.3/dist/axios.min.js"></script>
    @yield('adblock-script')
    @yield('extra-js')
    @include('admin/partials/_toastr')

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->

    @auth
        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                apiKey: "AIzaSyC7VzvIJmK5GDMbU0ag4dRoHTFmw1V1BWk",
                authDomain: "aninewstage.firebaseapp.com",
                projectId: "aninewstage",
                storageBucket: "aninewstage.appspot.com",
                messagingSenderId: "305785322749",
                appId: "1:305785322749:web:cfb4c13b56d761a0ef5294",
                measurementId: "G-0WV7E9QL4P"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);

            const messaging = firebase.messaging();

            function initFirebaseMessagingRegistration() {
                messaging.requestPermission().then(function() {
                    return messaging.getToken()
                }).then(function(token) {

                    axios.post("{{ route('fcmToken') }}", {
                        _method: "PATCH",
                        token
                    }).then(({
                        data
                    }) => {
                        console.log(data)
                    }).catch(({
                        response: {
                            data
                        }
                    }) => {
                        console.error(data)
                    })

                }).catch(function(err) {
                    console.log(`Token Error :: ${err}`);
                });
            }

            initFirebaseMessagingRegistration();


            messaging.onMessage(function({
                data: {
                    body,
                    title
                }
            }) {
                new showNotification(title, {
                    body
                });
            });
        </script>
    @endauth
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "101766916083447");
        chatbox.setAttribute("attribution", "biz_inbox");

        checkFBBlockURL();
        $(function() {
            lightGallery(document.getElementById('lightgallery'), {
                speed: 500,
                controls: true,
            });
        });

        function changeIframeSrc() {
            var val = document.querySelector('select[name="iframeSrc"]').options;
            document.getElementById("iframe-embed").src = val[val.selectedIndex].value;
            console.log(document.getElementById("iframe-embed").src);
        }

        $(window).on('DOMContentLoaded', removeLoader);

        function removeLoader() {
            $(".loader-wrapper").fadeOut(1000, function() {
                // fadeOut complete. Remove the loading div
                $(".loader-wrapper").remove(); //makes page more lightweight 
            });
        }

        async function checkFBBlockURL() {
            let isBlocked = await this.CheckFBBlockByScript();
            if (!isBlocked) {
                $('#fb-customer-chat').hide();
                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml: true,
                        version: 'v15.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

                function hideMarquee() {
                    document.getElementById("marquee-div").style.display = "none";
                }
            } else {
                $('#fb-customer-chat').show();
            }

            return isBlocked;
        }

        async function CheckFBBlockByScript() {
            let status = false;
            let url = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
            const config = {
                method: "HEAD",
                mode: "no-cors",
                priority: "low"
            };
            let request = new Request(url, config);
            try {
                const {
                    timeout = 4000
                } = options;
                let a = await fetch(request, options);

                status = false;
            } catch (error) {
                status = true;
                return status;
            }

            return status;
        }
    </script>

    <script>
        //disqus init
        (function() {
            var d = document,
                s = d.createElement('script');
            s.src = 'https://aninewstage.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLHGWBB" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>
</body>

</html>
