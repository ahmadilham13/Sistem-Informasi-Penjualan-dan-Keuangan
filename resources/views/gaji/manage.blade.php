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
                    <li class="text-gray-500 breadcrumb-item"> <a href="{{ route(name: 'gaji.index', absolute: false) }}">Gaji Karyawan</a> </li>
                    <li class="text-indigo-500 breadcrumb-item active" aria-current="page">Send Gaji</li>
                </ol>
            </div>
        </div>

        <div class="h-full bg-gray-200">
            <div class="bg-white py-5 px-8 rounded-lg shadow-xl space-y-4">
                <h4 class="text-xl capitalize mb-10">{{isset($data) ? __('Update') : __('Send')}} Gaji</h4>
                @include(
                    'gaji.partials.form', [
                        'method' => isset($data) ? 'PUT' : 'POST',
                        'action' => isset($data) ? route(name: 'gaji.update', parameters: $data["id"], absolute: false) : route(name: 'gaji.store', absolute: false)])
            </div>
        </div>
    </div>

</x-app-layout>