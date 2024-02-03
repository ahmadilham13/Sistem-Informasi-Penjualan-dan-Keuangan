<x-app-layout>
    {{-- start::Alert --}}
    @include('transaksi.partials.alert')
    {{-- end::Alert --}}
    
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
          <ol class="flex gap-3 text-sm">
            <li class="breadcrumb-item text-gray-500"> <a href="{{ route(name: 'index', absolute: false) }}">Home</a> </li>
            <li class="breadcrumb-item text-gray-500"><a href="{{ route('transaksi.index', absolute: false) }}">Transaksi</a></li>
            @if (isset($data))
              <li class="breadcrumb-item active text-gray-500"> <a href="{{ route('transaksi.show', parameters : ['transaksi' => $data['id']], absolute: false) }}">{{$data["kode_transaksi"]}}</a></li>
              <li class="breadcrumb-item active text-indigo-500" aria-current="page">Edit Transaksi</li>
            @else
              <li class="breadcrumb-item active text-indigo-500" aria-current="page">Add Transaksi</li>
            @endif
          </ol>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
        <div class="flex flex-col w-full h-full gap-4 rounded-lg lg:col-span-2 px-5 py-6 overflow-y-hidden bg-white shadow-xl">
            @include('transaksi.partials.list-product')
        </div>
        <div class="flex flex-col w-full h-full gap-4 rounded-lg auto-rows-fr px-5 py-6 overflow-y-hidden bg-white shadow-xl">
            <div class="bg-gray-200 py-5 px-8 rounded-lg shadow-xl space-y-4">
                <h4 class="text-xl capitalize mb-10">Kasir</h4>

                @include(
                    'transaksi.partials.form', [
                        'method' => isset($data) ? 'PUT' : 'POST',
                        'action' => isset($data) ? route(name: 'transaksi.update', parameters: $data["id"], absolute: false) : route(name: 'transaksi.store', absolute: false)])
            </div>
        </div>

    </div>

</x-app-layout>