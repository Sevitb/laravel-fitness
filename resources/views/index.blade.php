<!DOCTYPE html>
<html lang="en">

<head>
    @include('head.meta')
    @include('head.links')
    @stack('links')
    @include('head.scripts')
    @stack('scripts')
    <title>КАМ</title>
</head>

<body>
    <div class="page-wrapper">
        <x-header></x-header>
        @yield('content')
        <x-footer></x-footer>
    </div>
</body>

</html>
