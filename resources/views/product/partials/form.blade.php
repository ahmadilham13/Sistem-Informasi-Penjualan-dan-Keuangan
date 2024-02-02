<form 
    class="space-y-3" 
    enctype="multipart/form-data"
    x-data="{ form: $form(@js($method), '{{ $action }}', {
        product_id: '{{ old('product_id', isset($data['product_id']) ? $data['product_id'] : '') }}',
        product_name: '{{ old('product_name', isset($data['product_name']) ? $data['product_name'] : '') }}',
        harga_jual: '{{ old('harga_jual', isset($data['harga_jual']) ? $data['harga_jual'] : '') }}',
        stock: '{{ old('stock', isset($data['stock']) ? $data['stock'] : '') }}',
    }) }"
>
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- start::Product Id Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="product_id" :value="__('Bibit ID')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="product_id" name="product_id" type="text" placeholder="Bibit ID..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.product_id"
                required autofocus autocomplete="product_id" 
                :disabled="isset($data['product_id']) ? true : false"
                @change="form.validate('product_id')"/>
            <x-input-error class="mt-2" type="product_id" />
        </div>
        <!-- end::Product Id Input -->

        <!-- start::Product Name Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="product_name" :value="__('Nama Bibit')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="product_name" name="product_name" type="text" placeholder="Nama Bibit..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.product_name"
                required autofocus autocomplete="product_name" 
                @change="form.validate('product_name')"/>
            <x-input-error class="mt-2" type="product_name" />
        </div>
        <!-- end::Product Name Input -->

        <!-- end::Harga Beli Input -->

        <!-- start::Harga Jual Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="harga_jual" :value="__('Harga Jual')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="harga_jual" name="harga_jual" type="text" placeholder="Harga Jual..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.harga_jual"
                required autofocus autocomplete="harga_jual" 
                @change="form.validate('harga_jual')"/>
            <x-input-error class="mt-2" type="harga_jual" />
        </div>
        <!-- end::Harga Jual Input -->

        <!-- start::Stock Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="stock" :value="__('Stock')" class="font-normal" />
            </div>
            <x-text-input id="stock" name="stock" type="number" placeholder="Stock..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.stock"
                required autofocus autocomplete="stock" 
                @change="form.validate('stock')"/>
            <x-input-error class="mt-2" type="stock" />
        </div>
        <!-- end::Stock Input -->
    </div>
    
    <!-- start::Description Input -->
    <div class="flex flex-col">
        <x-input-label for="description" :value="__('Description')" />
        <x-textarea id="description" name="description" type="text" class="block w-full mt-1" :value="old('description', isset($data->description) ? $data->description : '')" autofocus autocomplete="description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')" />
    </div>
    <!-- end::Description Input -->

    <!-- start::Product Image File Input -->
    <div class="flex flex-col">
        <x-input-label for="product_image" :value="__('Avatar')" class="mb-3" />
        <x-file-input id="product_image" name="product_image" accept="{{ '.'.implode(', .', config('filesystems.allowed_extensions_avatar')) }}" autofocus  />
        <small class="text-gray-500">
            Upload a Product Image icon in either PNG or JPG format.
            Maximum file size: 2MB.
            Recommended resolution: 80x80 pixels.
        </small>
        <x-input-error class="mt-2" :messages="$errors->manageUserForm->get('product_image')" />
    </div>
    <!-- end::Product Image File Input -->
    <div class="flex justify-end gap-2 pt-8 pb-5">
        <button
            class="px-4 py-2 text-sm text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white"
            @click="modalForm = false">
            Save
        </button>
    </div>
</form>