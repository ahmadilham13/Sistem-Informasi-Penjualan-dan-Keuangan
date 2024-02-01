{{-- start::Alert  --}}
@if (session('status') === 'saldo-added')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Saldo has been Added successfully!') }}</span>
    </x-alert>
@endif
{{-- end::Alert --}}