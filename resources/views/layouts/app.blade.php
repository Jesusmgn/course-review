<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <div class="min-h-screen flex flex-col">

        {{-- 🔹 Barra de navegación principal --}}
        @include('layouts.navigation')

        {{-- 🔹 Encabezado (si existe) --}}
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow-md">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- 🔹 Contenido principal --}}
        <main class="flex-1">
            <div class="max-w-7xl mx-auto p-6 sm:p-8">
                @yield('content')
            </div>
        </main>

        {{-- 🔹 Footer simple --}}
        <footer class="bg-gray-800 text-gray-400 text-center py-4 text-sm border-t border-gray-700">
            © {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Todos los derechos reservados.
        </footer>

    </div>
</body>
</html>
