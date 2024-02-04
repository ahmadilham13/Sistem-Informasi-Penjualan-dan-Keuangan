{{-- start::Alert  --}}
@if (session('status') === 'gaji-sended')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('Data has been Sended successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'user-updated')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('User has been Updated successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'user-deleted')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('User has been Deleted successfully!') }}</span>
    </x-alert>
@endif
{{-- end::Alert --}}