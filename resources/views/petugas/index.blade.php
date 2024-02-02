<x-app-layout>
    {{-- start::Alert --}}
    @include('petugas.partials.alert')
    {{-- end::Alert --}}
    <div>
        <!-- Page Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <ol class="flex gap-3 text-sm">
                    <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
                    <li class="text-indigo-500 breadcrumb-item active" aria-current="page">Petugas</li>
                </ol>
            </div>
        </div>

        {{-- Start Petugas --}}
        <div class="p-5 mb-12 bg-white rounded">
            <div class="px-2 mb-12" x-data="{ openDelete: false, petugasId: 0 }">
                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-between gap-3">
                        <h4 class="text-base font-semibold">Petugas</h4>
                        {{-- tambah can --}}
                        <a href="{{ route(name: 'petugas.create', absolute: false) }}" class="px-4 py-2 text-sm text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white">
                            New Petugas
                        </a>
                        {{-- tambah encan --}}
                    </div>
                    @include('petugas.partials.filter-form', [
                        'search' => $search,
                        'sortChoices' => $sortChoices,
                        'sortBy' => $sortBy,
                    ])
                </div>
                <!-- start:: Info Table -->
                <x-table>
                    <x-slot name="tableHeaders">
                        <x-table-header />
                        <x-table-header>
                            {{ __('Name') }}
                        </x-table-header>
                        <x-table-header>
                            {{ __('Email') }}
                        </x-table-header>
                        <x-table-header>
                            {{ __('Last Seen') }}
                        </x-table-header>
                        <x-table-header>
                            {{ __('Created') }}
                        </x-table-header>
                        <x-table-header class="text-center">
                            {{ __('Action') }}
                        </x-table-header>
                    </x-slot>
                    <x-slot name="tableBody">
                        @foreach ($data as $item)
                            <x-table-row>
                                <x-table-data>
                                    <div class="flex items-center gap-3">
                                        <div class="relative" x-data="{ online: @js(Cache::has(config('auth.user_online') . $item->id) ? true : false) }">
                                            <img src="{{ $item->media->last() != null ? $item->media->last()->getUrl() : Vite::asset('resources/images/default-avatar.png') }}" width="42" height="42" alt="" class="rounded full">
                                            <div class="absolute bottom-0 right-0 w-3 h-3 border-2 border-white rounded-full" :class="{'bg-green-500': online, 'bg-gray-500': !online}"></div>
                                        </div>
                                    </div>
                                </x-table-data>
                                <x-table-data>{{ $item->name }}</x-table-data>
                                <x-table-data>{{ $item->email }}</x-table-data>
                                <x-table-data>
                                    @if (Cache::has(config('auth.user_online') . $item->id))
                                        Online
                                    @elseif(!empty($item->last_seen))
                                        {{\Carbon\Carbon::parse($item->last_seen)->diffForHumans()}}
                                    @else
                                        -
                                    @endif
                                </x-table-data>
                                <x-table-data>{{ $item->created_at }}</x-table-data>
                                <x-table-actions>
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route(name: 'petugas.edit', parameters: ['user' => $item->id], absolute: false) }}" class="px-4 py-2 text-xs font-medium text-yellow-500 transition duration-150 rounded bg-yellow-50 hover:bg-yellow-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path
                                                    d="M6.41421 15.89L16.5563 5.74785L15.1421 4.33363L5 14.4758V15.89H6.41421ZM7.24264 17.89H3V13.6473L14.435 2.21231C14.8256 1.82179 15.4587 1.82179 15.8492 2.21231L18.6777 5.04074C19.0682 5.43126 19.0682 6.06443 18.6777 6.45495L7.24264 17.89ZM3 19.89H21V21.89H3V19.89Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <a href="{{ route(name: 'petugas.show', parameters: ['user' => $item->id], absolute: false) }}" class="px-4 py-2 text-xs font-medium text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path
                                                    d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        {{-- <button class="px-4 py-2 text-xs font-medium text-red-500 transition duration-150 rounded bg-red-50 hover:bg-red-500 hover:text-white" @click="openDelete = true; petugasId = @js($item->id)">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path
                                                    d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 4V6H15V4H9Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </button> --}}
                                    </div>
                                </x-table-actions>
                            </x-table-row>
                        @endforeach
                    </x-slot>
                </x-table>
                <!-- end:: Info Table -->

                <!-- start:: Modal Delete Petugas -->
                <div x-show="openDelete" class="fixed top-0 left-0 right-0 z-50 flex items-center justify-center w-full overflow-x-hidden overflow-y-auto bg-black bg-opacity-80 md:inset-0 h-modal md:h-full" x-transition.opacity x-transition:enter.duration.100ms x-transition:leave.duration.300ms x-cloak>
                    <div class="relative w-full h-full max-w-md p-4 md:h-auto" @click.away="openDelete = false; petugasId: 0">
                        {{-- Modal Content --}}
                        <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                            <button type="button" @click="openDelete = false; petugasId: 0" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deleteModal">
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
                                <form :action="route('petugas.destroy', {'user': petugasId}, false)" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-button color="primary" type="submit">
                                        Yes, I'm sure
                                    </x-button>
                                </form>
                                <button @click="openDelete = false; petugasId: 0"
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
        {{-- End Petugas --}}
    </div>

</x-app-layout>