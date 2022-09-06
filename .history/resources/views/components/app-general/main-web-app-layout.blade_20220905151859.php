@props(['all_countries', 'all_categories'])

{{-- this layout is used by the entire slice360 web app --}}
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <!--=============== basic ===============-->
        <meta charset="UTF-8">
        <title>Slice360 - Our goal is to make everyone own some wealth</title>
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="robots" content="index, follow" />
        <meta name="keywords" content="" />
        <meta name="description" content="" />

        {{-- inlcude tailwind CSS compiled via vite --}}
        {{-- @vite(['resources/css/app.css']) --}}

        <!--=============== include bootstrap css ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/bootstrap.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/bootstrap-grid.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/bootstrap-utilities.css') }}">

        <!--=============== include css ===============-->
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/reset.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/plugins.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/dashboard-style.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/color.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/timeline.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/custom.css') }}">

        <!--=============== include fonts ===============-->
        {{-- <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/all.css') }}"> --}}
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/brands.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/font_awesome.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/regular.css') }}">
        {{-- <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/solid.css') }}"> --}}
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/svg-with-js.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('web_app/css/font_awesome/v4-shims.css') }}">

        <!--=============== include favicons ===============-->
        <link rel="shortcut icon" href="{{ asset('web_app/images/favicon.ico') }}">
    </head>
    <body>




        {{-- begin :: scroll caret --}}
        <a class="to-top"><i class="fas fa-caret-up"></i></a>
        {{-- end :: scroll caret --}}

        <div class="fixed-flash-box">
            Testing the box
        </div>
        {{-- add the flash-message component --}}
        <x-app-general.flash-message />
        {{-- add the flash-message component end --}}

        <!--=============== include scripts ===============-->
        {{-- @vite(['resources/js/app.js']) --}}

        <!--=============== include scripts ===============-->
        <script src="{{ asset('web_app/js/jquery.min.js') }}"></script>
        <script src="{{ asset('web_app/js/jquery_validator.js') }}"></script>
        <script src="{{ asset('web_app/js/plugins.js') }}"></script>
        <script src="{{ asset('web_app/js/scripts.js') }}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY_HERE&libraries=places&callback=initAutocomplete"></script>
        <script src="{{ asset('web_app/js/map-single.js') }}"></script>
        <script src="{{ asset('web_app/js/timeline.min.js') }}"></script>
        <script src="{{ asset('web_app/js/tinymce.js') }}"></script>
        <script src="https://cdn.tiny.cloud/1/2erokf2sc29d23ul3dgeeprg7ik77jxo8n8jybqp4qkmfxmy/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('web_app/js/alpine.js') }}"></script>
        <script src="{{ asset('web_app/js/custom.js') }}"></script>


        <!--=============== include bootstrap scripts ===============-->
        <script src="{{ asset('web_app/js/bootstrap.js') }}"></script>
        <script src="{{ asset('web_app/js/bootstra.bundle.js') }}"></script>

        {{-- this section we stack page specific JS --}}
        @stack('custom_javascript')
    </body>
</html>
