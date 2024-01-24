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
    <!-- flatpickr style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- flatpickr style -->

    <!-- Styles -->
    @vite(['resources/css/app.css'])

    <!-- flatpickr style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- flatpickr style -->

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @routes

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
    <!-- Scripts -->
</head>

<body class="font-sans antialiased">
    <div x-data="{ menuOpen: false }" class="flex min-h-screen custom-scrollbar">
        <!-- start::Black overlay -->
        <div :class="menuOpen ? 'block' : 'hidden'" @click="menuOpen = false"
            class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>
        <!-- end::Black overlay -->
        <!-- start::Sidebar -->
        @include('layouts.sidebar')
        <!-- end::Sidebar -->
        <div class="flex flex-col w-full lg:pl-64">
            <!-- start::Topbar -->
            @include('layouts.header')
            <!-- end::Topbar -->
            <!-- start:Page content -->
            <div class="h-full px-5 py-8 bg-gray-200">
                {{ $slot }}
            </div>
            <!-- end:Page content -->
        </div>
    </div>
    <script>
        // Stats by category
        document.addEventListener("alpine:init", () => {
            Alpine.data("statsByCategory", () => ({
                items: [{
                    name: "Project 1",
                    percent: "71",
                },
                {
                    name: "Project 2",
                    percent: "63",
                },
                {
                    name: "Project 3",
                    percent: "92",
                },
                {
                    name: "Project 4",
                    percent: "84",
                },
                ],
                currentItem: {
                    name: "Project 1",
                    percent: "71",
                },
            }));
        });

        // Project overview stats
        document.addEventListener("alpine:init", () => {
            Alpine.data("productOverviewStats", () => ({
                project: {
                    completed: 149,
                    in_progress: 42,
                },
            }));
        });

        // start::Chart 1
        const labels = [
            "January",
            "February",
            "Mart",
            "April",
            "May",
            "Jun",
            "July",
        ];

        const data_1 = {
            labels: labels,
            datasets: [{
                label: "My First Dataset",
                data: [65, 59, 80, 81, 56, 55, 40],
                backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                    "rgba(255, 205, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(201, 203, 207, 0.2)",
                ],
                borderColor: [
                    "rgb(255, 99, 132)",
                    "rgb(255, 159, 64)",
                    "rgb(255, 205, 86)",
                    "rgb(75, 192, 192)",
                    "rgb(54, 162, 235)",
                    "rgb(153, 102, 255)",
                    "rgb(201, 203, 207)",
                ],
                borderWidth: 1,
            },],
        };

        const config_1 = {
            type: "bar",
            data: data_1,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        };

        var chart_1 = new Chart(document.getElementById("chart_1"), config_1);

        // end::Chart 1

        // start::Chart 2
        const data_2 = {
            labels: [
                "Eating",
                "Drinking",
                "Sleeping",
                "Designing",
                "Coding",
                "Cycling",
                "Running",
            ],
            datasets: [{
                label: "My First Dataset",
                data: [65, 59, 90, 81, 56, 55, 40],
                fill: true,
                backgroundColor: "rgba(255, 99, 132, 0.2)",
                borderColor: "rgb(255, 99, 132)",
                pointBackgroundColor: "rgb(255, 99, 132)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(255, 99, 132)",
            },
            {
                label: "My Second Dataset",
                data: [28, 48, 40, 19, 96, 27, 100],
                fill: true,
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgb(54, 162, 235)",
                pointBackgroundColor: "rgb(54, 162, 235)",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgb(54, 162, 235)",
            },
            ],
        };

        const config_2 = {
            type: "radar",
            data: data_2,
            options: {
                elements: {
                    line: {
                        borderWidth: 3,
                    },
                },
            },
        };

        var chart_2 = new Chart(document.getElementById("chart_2"), config_2);
        // end::Chart 2
    </script>
    @stack('scripts')
</body>

</html>
