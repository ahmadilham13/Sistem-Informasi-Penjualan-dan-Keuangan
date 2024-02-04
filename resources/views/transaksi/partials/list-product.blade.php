<div class="container mx-auto mt-8">
    <form action="{{ route('transaksi.create') }}" method="GET" class="flex gap-2 mb-3">
        @csrf
        @method('get')
        <x-text-input type="text" name="search" placeholder="Cari Produk" :value="$search"/>
        <x-button color="primary">
            {{ __('Search') }}
        </x-button>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4 overflow-y-auto max-h-96">
        @isset($products[0])
            @foreach($products as $product)
                <div class="p-4">
                    <div class="bg-white shadow-md rounded-md overflow-hidden">
                        <img src="{{ $product->media->last() != null ? $product->media->last()->getUrl() : Vite::asset('resources/images/default-product.jpg'); }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover object-center">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $product->product_name }}</h2>
                            <p class="text-blue-500 font-bold mt-2">Rp. {{ number_format($product->harga_jual, 0, ',', '.') }}</p>
                            <span class="text-sm">Stock: {{$product->stock}}</span>
                            @if ($product->stock == 0)
                                <p>
                                    <span class="text-red-600">out of stocks</span>
                                </p>
                            @else
                                <form action="{{ route(name: 'kasir.store', absolute: false) }}" method="POST">
                                    @csrf
                                    @method('post')
                                    <div class="mb-2">
                                        <x-text-input type="hidden" name="product_bibits_id" id="product_bibits_id" :value="$product->id"/>
                                            <div class="flex items-center gap-2 justify-center">
                                                <x-text-input type="number" name="quantity" id="quantity" :value="1" min="0" max="{{$product->stock}}"/>
                                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md">+</button>
                                            </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <x-data-empty>
                {{ __('Product`s Not Found') }}
            </x-data-empty>
        @endisset
    </div>
</div>