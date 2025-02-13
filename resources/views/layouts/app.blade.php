<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!-- Foooter -->
            @isset($footer)
            <footer class="bg-gray-800 text-white py-6">
                <div class="container mx-auto flex flex-col items-center">
                    <div class="flex mb-4">
                        <a href="#" class="mx-2 text-gray-400 hover:text-white p-2">Home</a>
                        <a href="#" class="mx-2 text-gray-400 hover:text-white p-2">About</a>
                        <a href="#" class="mx-2 text-gray-400 hover:text-white p-2">Services</a>
                        <a href="#" class="mx-2 text-gray-400 hover:text-white p-2">Contact</a>
                    </div>
                    <p class="text-gray-400">&copy; 2025 {{ $footer }}. All rights reserved.</p>
                </div>
            </footer>
            @endisset
        </div>
    </body>
</html>
