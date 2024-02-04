<form 
    class="space-y-3" 
    enctype="multipart/form-data"
    x-data="{ form: $form(@js($method), '{{ $action }}', {
        customer_name: '{{ old('customer_name', isset($data['customer_name']) ? $data['customer_name'] : '') }}',
    }) }"
>
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- start::Customer Name Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="customer_name" :value="__('Customer Name')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="customer_name" name="customer_name" type="text" placeholder="Customer Name..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.customer_name"
                required autofocus autocomplete="customer_name" 
                @change="form.validate('customer_name')"/>
            <x-input-error class="mt-2" type="customer_name" />
        </div>
        <!-- end::Customer Name Input -->

        {{-- input Hidden Start --}}
        @foreach ($kasirs as $item)
            <x-text-input type="hidden" name="product_id[]" :value="$item->productBibit->id"/>
            <x-text-input type="hidden" name="quantity[]" :value="$item->quantity"/>
        @endforeach

        <x-text-input type="hidden" name="total_bayar" :value="$total_payment"/>
        {{-- input Hidden End --}}
    </div>

    @isset($kasirs[0])
        <div class="flex justify-end gap-2 pt-8 pb-5">
            <button
                class="px-4 py-2 text-sm text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white">
                Save
            </button>
        </div>
    @endisset
</form>
    {{-- Table Start --}}
        @isset($kasirs[0])
            <x-table>
                <x-slot name="tableHeaders">
                    <x-table-header>
                        {{ __('Product') }}
                    </x-table-header>
                    <x-table-header>
                        {{ __('Harga') }}
                    </x-table-header>
                    <x-table-header>
                        {{ __('Quantity') }}
                    </x-table-header>
                    <x-table-header>
                        {{ __('Total') }}
                    </x-table-header>
                    <x-table-header class="text-center">
                        {{ __('Action') }}
                    </x-table-header>
                </x-slot>
                <x-slot name="tableBody">
                    @foreach ($kasirs as $item)
                        <x-table-row>
                            <x-table-data>{{ $item->productBibit->product_name }}</x-table-data>
                            <x-table-data>Rp. {{ number_format($item->productBibit->harga_jual, 0, ',', '.') }}</x-table-data>
                            <x-table-data>{{ $item->quantity }}</x-table-data>
                            <x-table-data>Rp. {{ number_format($item->productBibit->harga_jual * $item->quantity, 0, ',', '.') }}</x-table-data>
                            <x-table-actions>
                                <div class="flex items-center justify-center gap-2">
                                    <form action="{{route(name: 'kasir.destroy', parameters: ['kasir' => $item->id], absolute: false)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="px-4 py-2 text-xs font-medium text-red-500 transition duration-150 rounded bg-red-50 hover:bg-red-500 hover:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                                                <path
                                                    d="M17 6H22V8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8H2V6H7V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V6ZM18 8H6V20H18V8ZM9 4V6H15V4H9Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </x-table-actions>
                        </x-table-row>
                    @endforeach
                </x-slot>
            </x-table>
                @else
                    <x-data-empty>
                        {{ __('Kasir`s Empty') }}
                    </x-data-empty>
                @endisset()

    {{-- Table End --}}
