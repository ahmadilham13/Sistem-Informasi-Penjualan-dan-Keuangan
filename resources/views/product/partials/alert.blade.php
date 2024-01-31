{{-- start::Alert  --}}
@if (session('status') === 'product-created')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Product has been Created successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'product-updated')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Product has been Updated successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'product-deleted')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Product has been Deleted successfully!') }}</span>
    </x-alert>
@endif
{{-- end::Alert --}}