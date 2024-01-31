<x-app-layout>
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <ol class="flex gap-3 text-sm">
                <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
                <li class="text-gray-500 breadcrumb-item"><a href="{{ route(name: 'petugas.index', absolute: false) }}">Petugas</a></li>
                <li class="text-indigo-500 breadcrumb-item active" aria-current="page">{{ $data->name }}</li>
            </ol>
        </div>
    </div>


        <!-- start:Page content -->
        <div x-data="{ modal: false, modalPassword: false }">
            <div class="flex flex-col my-4 space-y-4 2xl:flex-row 2xl:space-y-0 2xl:space-x-4">
                <div class="pb-8 bg-white rounded-lg shadow-xl 2xl:w-1/2">
                    <div class="w-full h-[250px]">
                        <img src="https://source.unsplash.com/500x250/?colorfull-wallpaper"
                            class="w-full h-full rounded-tl-lg rounded-tr-lg" />
                    </div>
                    <div class="flex flex-col items-center -mt-20">
                        <div class="relative">
                            <div
                                class="w-40 h-40 overflow-hidden rounded-full border-4 {{$errors->get('avatar') != null ? 'border border-red-500' : 'border-white'}}">
                                <img id="userAvatar"
                                    src="{{$data->media->last() != null ? $data->media->last()->getUrl() : Vite::asset('resources/images/default-avatar.png')}}"
                                    class="w-full h-full bg-cover" />
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('avatar')" />
                        <div class="mt-2">
                            <p class="text-2xl">{{$data->name}}</p>
                        </div>
                        <p class="text-gray-700">{{$data->title}}</p>
                        <p class="text-sm text-gray-500">{{$data->location}}</p>
                    </div>
                </div>
                <div class="flex flex-col w-full 2xl:w-1/2">
                    <div class="flex flex-col justify-between flex-1 p-5 bg-white rounded-lg shadow-xl">
                        <div>
                            <h4 class="text-base font-semibold">Personal Info</h4>
                            <ul class="mt-2">
                                <li class="flex py-3 border-b">
                                    <span class="w-24 text-base font-medium">Name:</span>
                                    <span class="text-gray-700">{{$data->name}}</span>
                                </li>
                                <li class="flex py-3 border-b">
                                    <span class="w-24 text-base font-medium">Phone:</span>
                                    <span class="text-gray-700">{{!empty($data->phone_number) ? $data->phone_number :
                                        '-'}}</span>
                                </li>
                                <li class="flex py-3 border-b">
                                    <span class="w-24 text-base font-medium">Email:</span>
                                    <span class="text-gray-700">{{ str_starts_with($data->email, 'deactivated.') ?
                                        str_replace('deactivated.', '', $data->email) : $data->email }}</span>
                                </li>
                                <li class="flex py-3 border-b">
                                    <span class="w-24 text-base font-medium">Location:</span>
                                    <span class="text-gray-700">{{!empty($data->location) ? $data->location : '-'}}</span>
                                </li>
                                <li class="flex py-3 border-b">
                                    <span class="w-24 text-base font-medium">Joined:</span>
                                    <span class="text-gray-700"> {{date_format($data->created_at, "D")}} / {{
                                        date_format($data->created_at,"d-M-Y") }}
                                        ({{$data->created_at->diffForHumans()}})</span>
                                </li>
                                <li class="flex py-3">
                                    <span class="w-24 text-base font-medium">Status:</span>
                                    <span class="text-gray-700"> {{ $data->email_verified_at != null ? __('Verified') :
                                        __('Not Verified') }}{{ $data->deactivated_at != null ? ' '.__('(Deactivated)') : ''
                                        }}</span>
                                </li>
                            </ul>
                        </div>
                        {{-- @can('user.update', $data) --}}
                        <div class="flex gap-3 ml-auto">
                            <a href="{{ route('petugas.edit', parameters: ['user' => $data->id], absolute: false) }}"
                                {{-- <a :href="route('user.edit', [$group['id'], $user['id']])" --}}
                                class="px-3 py-2 text-xs font-semibold text-yellow-600 transition duration-150 rounded bg-yellow-50 hover:bg-yellow-500 hover:text-white">
                                Update Profile
                            </a>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>
            </div>
    
            <!-- end::Basic Table -->
        </div>
        <!-- end:Page content -->
</x-app-layout>