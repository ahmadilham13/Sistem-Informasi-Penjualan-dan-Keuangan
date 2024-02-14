<x-app-layout>
    {{-- start::Alert --}}
    @include('gaji.partials.alert')
    {{-- end::Alert --}}

    <div>
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <ol class="flex gap-3 text-sm">
                    <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
                    <li class="text-indigo-500 breadcrumb-item active" aria-current="page">Gaji Karwayan</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Start Gaji --}}
    <div class="p-5 mb-12 bg-white rounded">
        <div class="px-2 mb-12" x-data="{ openDelete: false, gajiId: 0 }">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-between gap-3">
                    <h4 class="text-base font-semibold">Gaji Karyawan</h4>
                    {{-- tambah can --}}
                    <a href="{{ route(name: 'gaji.create', absolute: false) }}" class="px-4 py-2 text-sm text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white">
                        Kirim
                    </a>
                    {{-- tambah encan --}}
                </div>
                @include('gaji.partials.filter-form', [
                    'search' => $search,
                    'sortChoices' => $sortChoices,
                    'sortBy' => $sortBy,
                ])
            </div>
            <!-- start:: Info Table -->
            @empty($data->items())
                <x-data-empty>
                    {{ __('Modal`s Empty') }}
                </x-data-empty>
            @else
                <x-table>
                    <x-slot name="tableHeaders">
                        <x-table-header />
                        <x-table-header>
                            {{ __('Name') }}
                        </x-table-header>
                        <x-table-header>
                            {{ __('Nominal') }}
                        </x-table-header>
                        <x-table-header>
                            {{ __('Created') }}
                        </x-table-header>
                    </x-slot>
                    <x-slot name="tableBody">
                        @foreach ($data as $item)
                            <x-table-row>
                                <x-table-data>
                                    <div class="flex items-center gap-3">
                                        <div class="relative" x-data="{ online: @js(Cache::has(config('auth.user_online') . $item->id) ? true : false) }">
                                            <img src="{{ $item->user->media->last() != null ? $item->user->media->last()->getUrl() : Vite::asset('resources/images/default-avatar.png') }}" width="42" height="42" alt="" class="rounded full">
                                            {{-- <div class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full" :class="{'bg-green-500': online, 'bg-gray-500': !online}"></div> --}}
                                        </div>
                                    </div>
                                </x-table-data>
                                <x-table-data>{{ $item->user->name }}</x-table-data>
                                <x-table-data>Rp {{ number_format($item->nominal, 0, ',', '.') }}</x-table-data>
                                <x-table-data>{{ date_format($item->created_at,"d-M-Y") }}</x-table-data>
                            </x-table-row>
                        @endforeach
                    </x-slot>
                </x-table>
            @endempty
            <!-- end:: Info Table -->

            <!-- start:: Modal Delete Petugas -->
            <div x-show="openDelete" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-80 md:inset-0 h-modal md:h-full" x-transition.opacity x-transition:enter.duration.100ms x-transition:leave.duration.300ms x-cloak>
                <div class="relative w-full h-full max-w-md p-4 md:h-auto" @click.away="openDelete = false; gajiId: 0">
                    {{-- Modal Content --}}
                    <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                        <button type="button" @click="openDelete = false; gajiId: 0" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close Modal</span>
                        </button>
                        <svg class="text-red-600 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="mb-4 ">Are you sure you want to delete this item?</p>
                        <div class="flex items-center justify-center space-x-4">
                            <form :action="route('petugas.destroy', {'user': gajiId}, false)" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button color="primary" type="submit">
                                    Yes, I'm sure
                                </x-button>
                            </form>
                            <button @click="openDelete = false; gajiId: 0"
                                class="px-3 py-2 text-sm font-medium bg-white border border-black rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10">
                                No, cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Modal Delete Petugas -->
            {{ $data->links() }}
        </div>
    </div>
    {{-- End Gaji --}}
</x-app-layout>