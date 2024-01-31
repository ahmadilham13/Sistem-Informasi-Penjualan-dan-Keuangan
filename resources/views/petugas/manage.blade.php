<x-app-layout>
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
          <ol class="flex gap-3 text-sm">
            <li class="breadcrumb-item text-gray-500"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
            <li class="breadcrumb-item text-gray-500"><a href="{{ route('petugas.index', absolute: false) }}">Petugas</a></li>
            @if (isset($data))
              <li class="breadcrumb-item active text-gray-500"> <a href="{{ route('petugas.show', parameters : ['user' => $data['id']], absolute: false) }}">{{$data["name"]}}</a></li>
              <li class="breadcrumb-item active text-indigo-500" aria-current="page">Edit Petugas</li>
            @else
              <li class="breadcrumb-item active text-indigo-500" aria-current="page">Add Petugas</li>
            @endif
          </ol>
        </div>
    </div>
    <div class="h-full bg-gray-200">
        <div class="bg-white py-5 px-8 rounded-lg shadow-xl space-y-4">
            <h4 class="text-xl capitalize mb-10">{{isset($data) ? __('Update') : __('Add')}} Group</h4>
            @include(
                'petugas.partials.form', [
                    'method' => isset($data) ? 'PUT' : 'POST',
                    'action' => isset($data) ? route(name: 'petugas.update', parameters: $data["id"], absolute: false) : route(name: 'petugas.store', absolute: false)])
        </div>
    </div>
</x-app-layout>