<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    @include('components.meta')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @env('production')
        <!-- Yandex Verification -->
        <meta name="yandex-verification" content="5946fc6fcecc47ac"/>
    @endenv

    <style>
        main {
            padding-top: 6rem;
            min-height: calc(100vh - 6rem);
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>
<header class="position-absolute w-100">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light py-4">
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <svg width="250" viewBox="0 0 973 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        id="logo-path"
                        d="M74.3814 83.0188L49.2075 54.7087C64.9729 51.4878 70.2281 39.9603 70.2281 28.6024C70.2281 14.1931 59.8873 1.1399 40.3076 1.05514C27.1697 1.05514 13.947 0.97038 0.809082 0.97038V84.1206H16.4898V56.3191H31.5772L55.734 84.1206H74.3814V83.0188ZM40.3076 15.634C50.1398 15.634 54.5474 22.3301 54.5474 28.9414C54.5474 35.5528 50.3093 42.2488 40.3076 42.2488H16.4898V15.634H40.3076ZM137.782 60.0486C139.986 35.9766 127.781 23.8558 108.201 23.8558C89.2145 23.8558 77.0937 36.6546 77.0937 54.4544C77.0937 73.1865 89.1298 85.6463 109.303 85.6463C118.203 85.6463 128.289 82.595 134.392 76.1531L125.153 66.999C121.847 70.4742 114.812 72.5084 109.472 72.5084C99.301 72.5084 93.0288 67.2533 92.0964 60.0486H137.782ZM92.2659 48.0126C94.4697 40.4689 100.827 36.6546 108.709 36.6546C117.016 36.6546 122.949 40.4689 123.882 48.0126H92.2659ZM194.826 33.688C191.521 27.8395 184.062 24.1948 176.179 24.1948C159.142 24.1101 145.665 34.6204 145.665 54.7934C145.665 75.3055 158.549 85.9854 175.84 85.9006C182.367 85.8159 191.521 82.4254 194.826 75.5598L195.504 84.1206H209.151V25.6357H195.335L194.826 33.688ZM177.535 37.1632C200.251 37.1632 200.251 72.5932 177.535 72.5932C167.872 72.5932 160.159 65.9819 160.159 54.7934C160.159 43.6898 167.872 37.1632 177.535 37.1632ZM249.751 37.7565C258.905 37.7565 266.703 44.6221 266.703 54.7934C266.703 65.3885 258.905 71.9999 249.751 71.9999C240.512 71.9999 233.138 65.0495 233.138 54.7934C233.138 44.2831 240.512 37.7565 249.751 37.7565ZM267.721 1.1399V33.6033C264.245 27.5005 254.667 24.1948 248.48 24.1948C231.358 24.1948 218.644 34.6204 218.644 54.7934C218.644 74.0341 231.613 85.3921 248.819 85.3921C255.939 85.3921 263.144 83.0188 267.721 76.0684L268.653 84.1206H282.13V1.1399H267.721ZM309.253 25.3815V84.1206H294.759V25.3815H309.253ZM293.403 9.10741C293.403 20.3806 310.525 20.3806 310.525 9.10741C310.525 -2.16577 293.403 -2.16577 293.403 9.10741ZM379.859 84.1206V53.3525C379.859 34.9594 368.755 24.7034 355.024 24.7034C347.65 24.7034 341.717 27.67 335.783 33.4337L334.851 25.4662H321.883V84.1206H336.292V54.2001C336.292 45.3002 342.31 37.8413 351.21 37.8413C360.449 37.8413 365.365 44.6221 365.365 53.522V84.1206H379.859ZM432.411 27.0767C428.342 24.2796 423.596 23.6863 419.018 23.6863C402.575 23.6863 389.352 35.1289 389.352 53.3525C389.352 71.6608 400.71 82.8492 419.018 82.8492C426.223 82.8492 433.852 86.4939 433.852 94.5462C433.852 102.598 427.325 107.176 419.018 107.176C410.712 107.176 403.677 102.175 403.677 94.5462H389.352C389.352 110.312 401.982 120.653 419.018 120.653C435.971 120.653 448.261 110.736 448.261 94.5462C448.261 87.0873 445.888 80.0521 436.225 75.2208C445.803 70.8132 448.515 60.6419 448.515 53.3525C448.515 46.9954 446.905 41.147 442.328 36.0613L448.854 27.7548L438.174 19.7025L432.411 27.0767ZM419.018 36.9089C427.325 36.9089 434.191 43.266 434.191 53.3525C434.191 63.439 427.325 69.6266 419.018 69.6266C410.542 69.6266 403.677 63.6086 403.677 53.3525C403.677 43.1812 410.542 36.9089 419.018 36.9089ZM498.524 15.8883H522.003C541.922 15.8883 542.006 45.3002 522.003 45.3002H498.524V15.8883ZM522.003 0.97038C508.95 0.97038 495.896 1.05514 482.843 1.05514V84.1206H498.524V59.7096H522.003C562.688 59.7096 562.603 0.97038 522.003 0.97038ZM559.467 25.6357V84.1206H573.961V53.2677C573.961 42.5031 580.996 38.4346 588.54 38.4346C593.287 38.4346 595.999 39.706 598.966 42.2488L605.492 29.6195C602.356 26.4834 596.507 24.1101 590.489 24.1101C584.556 24.1101 578.453 25.1272 573.961 32.4166L572.859 25.6357H559.467ZM638.549 24.4491C619.901 24.4491 608.289 38.1803 608.289 54.963C608.289 71.7456 619.647 85.3921 638.634 85.3921C657.62 85.3921 669.147 71.7456 669.147 54.963C669.147 38.1803 657.111 24.4491 638.549 24.4491ZM638.634 37.587C648.381 37.587 654.569 46.1478 654.569 54.963C654.569 63.8628 649.229 72.1694 638.634 72.1694C628.038 72.1694 622.699 63.8628 622.699 54.963C622.699 46.1478 628.208 37.587 638.634 37.587ZM719.241 27.0767C715.172 24.2796 710.426 23.6863 705.764 23.6863C689.405 23.6863 676.098 35.1289 676.098 53.3525C676.098 71.6608 687.541 82.8492 705.764 82.8492C713.053 82.8492 720.597 86.4939 720.597 94.5462C720.597 102.598 714.071 107.176 705.764 107.176C697.458 107.176 690.507 102.175 690.507 94.5462H676.098C676.098 110.312 688.812 120.653 705.764 120.653C722.801 120.653 735.091 110.736 735.091 94.5462C735.091 87.0873 732.718 80.0521 722.97 75.2208C732.633 70.8132 735.346 60.6419 735.346 53.3525C735.346 46.9954 733.65 41.147 729.158 36.0613L735.685 27.7548L725.005 19.7025L719.241 27.0767ZM705.764 36.9089C714.071 36.9089 721.021 43.266 721.021 53.3525C721.021 63.439 714.071 69.6266 705.764 69.6266C697.373 69.6266 690.507 63.6086 690.507 53.3525C690.507 43.1812 697.373 36.9089 705.764 36.9089ZM744.584 25.6357V84.1206H759.079V53.2677C759.079 42.5031 766.114 38.4346 773.657 38.4346C778.404 38.4346 781.116 39.706 784.083 42.2488L790.61 29.6195C787.473 26.4834 781.625 24.1101 775.607 24.1101C769.674 24.1101 763.571 25.1272 759.079 32.4166L757.977 25.6357H744.584ZM854.095 60.0486C856.384 35.9766 844.178 23.8558 824.599 23.8558C805.612 23.8558 793.491 36.6546 793.491 54.4544C793.491 73.1865 805.443 85.6463 825.616 85.6463C834.516 85.6463 844.602 82.595 850.79 76.1531L841.551 66.999C838.245 70.4742 831.21 72.5084 825.87 72.5084C815.699 72.5084 809.426 67.2533 808.409 60.0486H854.095ZM808.664 48.0126C810.783 40.4689 817.224 36.6546 825.022 36.6546C833.329 36.6546 839.262 40.4689 840.279 48.0126H808.664ZM911.563 31.6538C904.782 25.7205 897.917 23.9405 888.762 23.9405C878.083 23.9405 864.097 28.6871 864.097 42.2488C864.097 55.5563 877.235 59.54 888.339 60.3876C896.645 60.8962 899.951 62.5067 899.951 66.5752C899.951 70.8132 894.865 73.6951 889.356 73.5256C882.829 73.4408 873.336 69.9656 869.183 65.3885L862.063 75.7293C870.624 84.6292 879.863 86.1549 889.101 86.1549C905.884 86.1549 914.275 77.255 914.275 66.9142C914.275 51.403 900.29 48.8602 889.271 48.1821C881.812 47.6735 878.337 45.5545 878.337 41.7403C878.337 38.0956 882.151 35.9766 889.017 35.9766C894.611 35.9766 899.358 37.248 903.511 41.147L911.563 31.6538ZM969.794 31.6538C963.098 25.7205 956.147 23.9405 947.078 23.9405C936.398 23.9405 922.328 28.6871 922.328 42.2488C922.328 55.5563 935.55 59.54 946.569 60.3876C954.876 60.8962 958.181 62.5067 958.181 66.5752C958.181 70.8132 953.096 73.6951 947.671 73.5256C941.145 73.4408 931.651 69.9656 927.498 65.3885L920.378 75.7293C928.854 84.6292 938.178 86.1549 947.417 86.1549C964.115 86.1549 972.591 77.255 972.591 66.9142C972.591 51.403 958.521 48.8602 947.502 48.1821C940.043 47.6735 936.567 45.5545 936.567 41.7403C936.567 38.0956 940.382 35.9766 947.247 35.9766C952.842 35.9766 957.588 37.248 961.741 41.147L969.794 31.6538Z"
                        fill="black"/>
                </svg>
            </a>
            <button class="navbar-toggler text-black border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.index') ? 'active' : '' }}"
                               href="{{ route('books.index') }}">{{ __('book.index') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('books.finished') ? 'active' : '' }}"
                               href="{{ route('books.finished') }}">{{ __('book.finished') }}</a>
                        </li>
                    @endauth
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
</main>

<footer class="border-top py-3 mt-auto">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <span class="d-block text-muted">© {{ now()->year }} {{ config('app.name') }}</span>
            <a href="{{ route('feedback.create') }}"
               class="d-block btn btn-warning">{{ __('Suggestions for improvement') }}</a>
        </div>
    </div>
</footer>

@env('production')
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(89362602, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/89362602" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
@endenv
</body>

</html>
