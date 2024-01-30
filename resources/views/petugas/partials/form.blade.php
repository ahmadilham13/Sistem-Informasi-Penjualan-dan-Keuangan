<form 
    class="space-y-3" 
    enctype="multipart/form-data"
    x-data="{ form: $form(@js($method), '{{ $action }}', {
        name: '{{ old('name', isset($data['name']) ? $data['name'] : '') }}',
        email: '{{ old('email', isset($data['email']) ? $data['email'] : '') }}'
    }) }"
>
    @csrf
    @method($method)

    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- start::Name Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="name" :value="__('Full Name')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="name" name="name" type="text" placeholder="Full Name..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.name"
                required autofocus autocomplete="name" 
                @change="form.validate('name')"/>
            <x-input-error class="mt-2" type="name" />
        </div>
        <!-- end::Name Input -->

        <!-- start::Email Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="email" :value="__('Email')" class="font-normal" />
                <span class="text-red-400">*</span>
            </div>
            <x-text-input id="email" name="email" type="text" placeholder="Email..."
                class="py-1 mt-2 border-gray-300 focus:border-gray-300 focus:outline-none focus:ring-0"
                x-model="form.email"
                required autofocus autocomplete="email" 
                :disabled="isset($data['email']) ? true : false"
                @change="form.validate('email')"/>
            <x-input-error class="mt-2" type="email" />
        </div>
        <!-- end::Email Input -->

        <!-- start::Password Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="password" :value="__('Password')" />
                @if ($method == "POST")
                    <span class="text-red-400">*</span>
                @endif
            </div>
            <x-text-input name="password" type="password" id="password" autofocus />
            <x-input-error class="mt-2" :messages="$errors->manageUserForm->get('password')" />
        </div>
        <!-- end::Password Input -->
    
        <!-- start::Confirm Password Input -->
        <div class="flex flex-col">
            <div class="flex">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                @if ($method == "POST")
                    <span class="text-red-400">*</span>
                @endif
            </div>
            <x-text-input name="password_confirmation" type="password" id="password_confirmation" autofocus />
            <x-input-error class="mt-2" :messages="$errors->manageUserForm->get('password')" />
        </div>
        <!-- end::Confirm Password Input -->
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