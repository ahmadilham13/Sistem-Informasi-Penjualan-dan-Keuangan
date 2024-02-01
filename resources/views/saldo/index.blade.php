<x-app-layout>
    @include('saldo.partials.alert')
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <ol class="flex gap-3 text-sm">
                <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
                <li class="text-indigo-500 breadcrumb-item active" aria-current="page">Saldo</li>
            </ol>
        </div>
    </div>

    <div class="container mx-auto mt-8">
        <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-6">Saldo Uang</h2>

            <div class="mb-4">
                <p class="text-gray-600">Saldo Anda saat ini:</p>
                @if (empty($data->saldo))
                    <p class="text-3xl font-bold text-red-500">Rp 0</p>
                @else
                <p class="text-3xl font-bold text-green-500">Rp {{ $data->saldo }}</p>
                @endif
            </div>

            <!-- Log Aktivitas -->
            <div class="mb-4">
                <h3 class="text-xl font-semibold mb-2">Log Aktivitas</h3>
                
                @forelse ($activities as $activity)
                <ul class="overflow-y-auto max-h-40">
                    <li class="mb-2">
                        <span class="text-green-500">Uang Masuk:</span>
                        <span class="text-gray-600">Rp 500.000 - 01/02/2024 09:30 AM</span>
                    </li>
                    <li class="mb-2">
                        <span class="text-red-500">Uang Keluar:</span>
                        <span class="text-gray-600">Rp 200.000 - 01/02/2024 02:45 PM</span>
                    </li>
                </ul>
                @empty
                <x-data-empty>
                    {{ __('Activity`s Empty') }}
                </x-data-empty>
                @endforelse
                    
            </div>

            <!-- Tombol Tambah Saldo -->
            <div class="text-center">
                <a href="{{ route(name: 'saldo.create', absolute: false) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Tambah Saldo
                </a>
            </div>
        </div>
    </div>
</x-app-layout>