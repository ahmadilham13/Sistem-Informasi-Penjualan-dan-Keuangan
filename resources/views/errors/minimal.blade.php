<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>

        <!-- Styles -->
        @vite(['resources/css/app.css'])

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        <!-- Scripts -->
    </head>

    <body>
        <div class="flex items-center justify-center w-full h-screen px-16 bg-gray-200 md:px-0">
            <div
                class="flex flex-col items-center justify-center px-4 py-8 bg-white border border-gray-200 rounded-lg shadow-2xl md:px-8 lg:px-24">
                <p class="text-6xl font-bold tracking-wider text-gray-300 md:text-7xl lg:text-9xl">@yield('code')</p>
                <p class="mt-4 text-2xl font-bold tracking-wider text-gray-500 md:text-3xl lg:text-5xl">@yield('title')
                </p>
                <p class="pb-4 mt-4 text-center text-gray-500 border-b-2">@yield('message')</p>
                <a href="{{ route(name: 'index', parameters: [], absolute: false) }}"
                    class="flex items-center px-4 py-2 mt-6 space-x-2 text-gray-100 transition duration-150 rounded bg-primary hover:bg-primary-dark"
                    title="Return to previous page">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Return to previous page</span>
                </a>
            </div>
        </div>
    </body>

</html>