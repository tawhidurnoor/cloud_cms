<!DOCTYPE html>
<html lang="zxx">

<head>

    @include('frontend.layouts.partials.meta')

    @yield('meta')

    @include('frontend.layouts.partials.styles')

    @yield('styles')

    @yield('title')

    {!! getScripts('head') !!}
</head>

<body>

    @include('frontend.layouts.partials.loader')

    @include('frontend.layouts.partials.header')

    @include('frontend.layouts.partials.navbar')

    @yield('body')

    @include('frontend.layouts.partials.footer')

    @include('frontend.layouts.partials.scripts')

    @yield('scripts')

    {!! getScripts('body') !!}
</body>

</html>
