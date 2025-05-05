<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    <style</style>
    @endif
    <meta charset="utf-8">
    <title>@yield('page-title')</title>
</head>
<body class="bg-gray-300 grid grid-rows-[auto_auto_1fr_auto] min-h-screen">

    @include('includes.header')

    @include('includes.navigation')

    <main class="p-4 flex flex-col">
        @yield('main-content')
    </main>
    
    @include('includes.footer')

</body>
</html>