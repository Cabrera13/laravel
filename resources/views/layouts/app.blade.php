<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('partials.head')
<body>
    <div id="app">
        @include('partials.header')
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
