@include('frontend.pile.styles')
@include('frontend.pile.scripts')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset("logos/logo-circle.png") }}">

    <title>{{ $title ?? config('app.name', 'Blog') }}</title>

    @stack('head_styles')

</head>
<body>

    <!-- Page Header -->
    @yield("page_header")

    <!-- Navigation -->
    @include("frontend.layouts.nav")


    @yield('content')



    <!-- Footer -->
    @include("frontend.footer")

    @stack('head_scripts')

    @yield("scripts")

</body>
</html>
