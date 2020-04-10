<!doctype html>
<html lang="{{ $locale = app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/fonts.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header class="header-container" uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; bottom: #transparent-sticky-navbar">
            <nav class="uk-navbar-container" uk-navbar style="position: relative; z-index: 980;">
                <div class="uk-navbar-left">
                    <a class="uk-navbar-item uk-logo" href="/">{{ config('app.name') }}</a>
                </div>

                <div class="uk-navbar-center uk-visible@s">
                    <ul class="uk-navbar-nav">
                        @include('layouts.navigation.items')
                    </ul>
                </div>

                <div class="uk-navbar-right">
                    <div class="uk-navbar-nav">
                        <a class="uk-navbar-item" href="{{ route('locale.switch') }}"><i uk-icon="icon: {{ $locale === 'en' ? 'ru' : 'en' }}-flag; ratio: 0.05"></i></a>
                        <button class="uk-navbar-item uk-hidden@s" uk-icon="menu" uk-toggle="target: #offcanvas-overlay"></button>
                    </div>

                    @auth
                        <div class="uk-navbar-nav">
                            <a class="uk-navbar-item" href="#" uk-icon="icon: user; ratio: 0.8"></a>
                            <div uk-dropdown="offset: 30">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    <li><a href="{{ route('logout') }}">@lang('menu.logout')</a></li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </nav>
        </header>

        @if (View::hasSection('container'))
            <main class="uk-container uk-container-xlarge uk-margin-small">
                @include('partials.alerts')
                @yield('container')
            </main>
        @endif
    </div>

    @include('layouts.navigation.items-offcanvas')

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script type="text/javascript" defer>
      window.locale = "{{ $locale }}";
      window.fallback = "{{ config('app.fallback_locale') }}";
    </script>
    @stack('js')
</body>
</html>
