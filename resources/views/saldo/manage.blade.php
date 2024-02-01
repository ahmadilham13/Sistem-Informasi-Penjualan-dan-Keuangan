<x-app-layout>
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <ol class="flex gap-3 text-sm">
                <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
                <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'saldo.index', absolute: false) }}">Saldo</a> </li>
                <li class="text-indigo-500 breadcrumb-item active" aria-current="page">Add Saldo</li>
            </ol>
        </div>
    </div>
    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-">
            @include('saldo.partials.form')
        </div>
    </div>
</x-app-layout>