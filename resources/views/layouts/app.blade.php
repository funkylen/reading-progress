<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <meta name="description" content="Журнал чтения. Отмечай сколько прочитал за сегодня и следи за прогрессом.">
    <meta name="keywords" content="чтение, журнал, прогресс, read, progress, books, книги, книга, привычка, привычки">

    <meta name="robots" content="index,follow,noodp">
    <meta name="googlebot" content="index,follow">

    <!-- Twitter -->
    <meta name="twitter:title" content="Reading Progress">
    <meta name="twitter:description"
          content="Журнал чтения. Отмечай сколько прочитал за сегодня и следи за прогрессом.">
    <meta name="twitter:creator" content="@vladlengil">
    <meta name="twitter:image" content="{{ asset('favicon.svg') }}">
    <meta name="twitter:card" content="summary"/>

    <!-- OG -->
    <meta property="og:title" content="Reading Progress"/>
    <meta property="og:type" content="website"/>
    <meta
        property="og:description"
        content="Журнал чтения. Отмечай сколько прочитал за сегодня и следи за прогрессом."
    />
    <meta property="og:image" content="{{ asset('favicon.svg') }}"/>
    <meta property="og:url" content="{{ config('app.url') }}"/>

    <!-- G+ / Pinterest -->
    <meta content="Reading Progress">
    <meta content="Журнал чтения. Отмечай сколько прочитал за сегодня и следи за прогрессом.">

    <!-- Фавиконы и иконки сайта -->

    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="apple-touch-icon" href="/apple-touch-icon.png"/>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png"/>
    <meta name="theme-color" content="#ffffff">

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#ffffff">

    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Yandex Verification -->
    <meta name="yandex-verification" content="5946fc6fcecc47ac"/>
</head>

<body>
<header class="position-absolute w-100">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">
                <span class="d-block">Reading</span>
                <span class="d-block">Progress</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
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
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
        </div>
    </nav>
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
</body>

</html>
