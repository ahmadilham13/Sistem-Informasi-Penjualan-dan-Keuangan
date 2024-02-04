<form 
    class="space-y-3" 
    enctype="multipart/form-data"
    x-data="{ form: $form(@js($method), '{{ $action }}', {
        karyawan_id: '{{ old('karyawan_id', isset($data['karyawan_id']) ? $data['karyawan_id'] : '') }}',
        nominal: '{{ old('nominal', isset($data['nominal']) ? $data['nominal'] : '') }}',
    }) }"
>
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- start::Name Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="karyawan_id" :value="__('Karyawan')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-select :name="'karyawan_id'" class="block w-full mt-1" :options="$users" :placeholder="'Select Karyawan'" :defaultValue="old('karyawan_id', isset($data->karyawan_id) ? $data->karyawan_id : '')" autofocus />

            <x-input-error class="mt-2" type="name" />
        </div>
        <!-- end::Name Input -->

        <!-- start::Gaji Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="nominal" :value="__('Nominal')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="nominal" name="nominal" type="text" placeholder="Nominal..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.nominal"
                required autofocus autocomplete="nomainal" 
                @change="form.validate('nomainal')"/>
            <x-input-error class="mt-2" type="nominal" />
        </div>
        <!-- end::Gaji Input -->
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