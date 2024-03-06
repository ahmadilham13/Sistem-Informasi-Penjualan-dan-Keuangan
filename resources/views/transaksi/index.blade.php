<x-app-layout>
    {{-- start::Alert --}}
    @include('transaksi.partials.alert')
    {{-- end::Alert --}}

    <div>
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <ol class="flex gap-3 text-sm">
                    <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
                    <li class="text-indigo-500 breadcrumb-item active" aria-current="page">Transaksi</li>
                </ol>
            </div>
        </div>

                {{-- Start Transaksi --}}
                <div class="p-5 mb-12 bg-white rounded">
                    <div class="px-2 mb-12" x-data="{ openDelete: false, transaksiId: 0 }">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center justify-between gap-3">
                                <h4 class="text-base font-semibold">Transaksi</h4>
                                {{-- tambah can --}}
                                <a href="{{ route(name: 'transaksi.create', absolute: false) }}" class="px-4 py-2 text-sm text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white">
                                    New Transaksi
                                </a>
                                {{-- tambah encan --}}
                            </div>
                            @include('transaksi.partials.filter-form', [
                                'search' => $search,
                                'sortChoices' => $sortChoices,
                                'sortBy' => $sortBy,
                            ])
                        </div>
                        <!-- start:: Info Table -->
                        @empty($data->items())
                            <x-data-empty>
                                {{ __('Transaksi`s Empty') }}
                            </x-data-empty>
                        @else
                            <x-table>
                                <x-slot name="tableHeaders">
                                    <x-table-header>
                                        {{ __('Kode Transaksi') }}
                                    </x-table-header>
                                    <x-table-header>
                                        {{ __('Customer Name') }}
                                    </x-table-header>
                                    <x-table-header>
                                        {{ __('Bibit Name') }}
                                    </x-table-header>
                                    <x-table-header>
                                        {{ __('Quantity') }}
                                    </x-table-header>
                                    <x-table-header>
                                        {{ __('Total') }}
                                    </x-table-header>
                                    <x-table-header>
                                        {{ __('Created') }}
                                    </x-table-header>
                                    {{-- <x-table-header class="text-center">
                                        {{ __('Action') }}
                                    </x-table-header> --}}
                                </x-slot>
                                <x-slot name="tableBody">
                                    @foreach ($data as $item)
                                        <x-table-row>
                                            <x-table-data>{{ $item->kode_transaksi }}</x-table-data>
                                            <x-table-data>{{ $item->customer_name }}</x-table-data>
                                            <x-table-data>{{ $item->productBibit->product_name }}</x-table-data>
                                            <x-table-data>{{ $item->quantity }}</x-table-data>
                                            <x-table-data>Rp. {{ number_format($item->productBibit->harga_jual * $item->quantity, 0, ',', '.') }}</x-table-data>
                                            <x-table-data>{{ date_format($item->created_at,"d-M-Y") }}</x-table-data>
                                            {{-- <x-table-actions>
                                                <div class="flex items-center justify-center gap-2">
                                                    <a href="{{ route(name: 'petugas.show', parameters: ['user' => $item->id], absolute: false) }}" class="px-4 py-2 text-xs font-medium text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                            <path
                                                                d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </x-table-actions> --}}
                                        </x-table-row>
                                    @endforeach
                                </x-slot>
                            </x-table>
                        @endempty
                        <!-- end:: Info Table -->
        
                        {{ $data->links() }}
                    </div>
                </div>
                {{-- End Transaksi --}}
    </div>

</x-app-layout>