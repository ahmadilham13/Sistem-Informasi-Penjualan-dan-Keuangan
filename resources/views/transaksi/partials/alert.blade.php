{{-- start::Alert  --}}
@if (session('status') === 'kasir-added')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Product has been Added To Kasir!') }}</span>
    </x-alert>
@elseif (session('status') === 'kasir-deleted')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Product has been Deleted From Kasir!') }}</span>
    </x-alert>
@elseif (session('status') === 'transaksi-added')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('The Transaction has Been Added successfully!') }}</span>
    </x-alert>
@endif
{{-- end::Alert --}}