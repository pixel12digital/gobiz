<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr' }}">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <!-- CSS files -->
    @if (App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he'))
        <link href="{{ asset('css/tabler.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabler-flags.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabler-payments.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabler-vendors.rtl.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/demo.rtl.min.css') }}" rel="stylesheet" />
    @else
        <link href="{{ asset('css/tabler.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabler-flags.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabler-payments.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/tabler-vendors.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/demo.min.css') }}" rel="stylesheet" />
    @endif

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
</head>

<body data-bs-theme="{{ Auth::user()->choosed_theme == 'light' ? 'light' : 'dark' }}" dir="{{(App::isLocale('ar') || App::isLocale('ur') || App::isLocale('he') ? 'rtl' : 'ltr')}}">

    @php
    use App\Setting;
    $settings = Setting::where('status', 1)->first();
    @endphp

    {{-- Preloader --}}
    <div id="nativecode-loader">
        <div class="nativecode-loading"></div>
    </div>

    <div id="app" class="page">
        @include('admin.includes.header')
        @include('admin.includes.sidebar')

        @yield('body')
    </div>

    <script src="{{ asset('/vendor/translation/js/app.js') }}"></script>

    <!-- Tabler Core -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/tabler.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatable.js') }}"></script>
    {{-- Preloader --}}
    <script>
        // Wait for the window to load
        window.onload = function() {
            // Get the preloader element
            var preloader = document.getElementById('nativecode-loader');

            // Add the fade-out class to start the fade-out effect
            setTimeout(function() {
                preloader.classList.add('fade-out');

                // After the fade-out effect, remove the preloader and show the content
                setTimeout(function() {
                    preloader.style.display = 'none'; // Remove preloader from view
                    document.querySelector('.page').style.display = 'block'; // Show content
                }, 7000); // This duration matches the CSS transition duration (2s)
            }, 100); // Optional delay to allow the page to load fully
        };
        // Choose langages
        $('#chooseLang').change(function () {
            "use strict";
            // set the window's location property to the value of the option the user has selected
            window.location = `?change_language=` + $(this).val();
        });
    </script>
    {{-- Custom JS --}}
    @yield('scripts')
</body>

</html>