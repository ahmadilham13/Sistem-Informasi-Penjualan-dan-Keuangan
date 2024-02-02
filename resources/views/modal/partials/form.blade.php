<form 
    class="space-y-3" 
    enctype="multipart/form-data"
    x-data="{ form: $form(@js($method), '{{ $action }}', {
        name: '{{ old('name', isset($data['name']) ? $data['name'] : '') }}',
        description: '{{ old('description', isset($data['description']) ? $data['description'] : '') }}'
    }) }"
>
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- start::Name Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="name" :value="__('Name')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="name" name="name" type="text" placeholder="Name..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.name"
                required autofocus autocomplete="name" 
                @change="form.validate('name')"/>
            <x-input-error class="mt-2" type="name" />
        </div>
        <!-- end::Name Input -->

        <!-- start::Description Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="description" :value="__('Description')" class="font-normal" />
            </div>
            <x-text-input id="description" name="description" type="text" placeholder="Description..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.description"
                autofocus autocomplete="description" 
                @change="form.validate('description')"/>
            <x-input-error class="mt-2" type="description" />
        </div>
        <!-- end::Description Input -->

        <!-- start::Harga Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="harga" :value="__('Harga')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="harga" name="harga" type="text" placeholder="Harga..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.harga"
                required autofocus autocomplete="harga" 
                @change="form.validate('harga')"/>
            <x-input-error class="mt-2" type="harga" />
        </div>
        <!-- end::Email Input -->
    </div>
    <div class="flex justify-end gap-2 pt-8 pb-5">
        {{-- <button
            class="px-4 py-2 text-sm text-red-500 transition duration-150 rounded bg-red-50 hover:bg-red-500 hover:text-white"
            @click="modalForm = false">
            Cancel
        </button> --}}
        <button
            class="px-4 py-2 text-sm text-indigo-500 transition duration-150 rounded bg-indigo-50 hover:bg-indigo-500 hover:text-white"
            @click="modalForm = false">
            Save
        </button>
    </div>
</form>