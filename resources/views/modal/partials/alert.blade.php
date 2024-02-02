{{-- start::Alert  --}}
@if (session('status') === 'modal-created')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Modal has been Created successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'modal-updated')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Modal has been Updated successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'modal-deleted')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Modal has been Deleted successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'modal-deleted')
    <x-alert type="danger" :show="true">
        <span class="font-medium">{{ __('Saldo And Kurang!') }}</span>
    </x-alert>
@endif
{{-- end::Alert --}}