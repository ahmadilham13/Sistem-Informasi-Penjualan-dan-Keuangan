{{-- start::Alert  --}}
@if (session('status') === 'user-created')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('User has been Created successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'user-updated')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('User has been Updated successfully!') }}</span>
    </x-alert>
    @elseif (session('status') === 'user-deactivated')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('User has been Deactivated successfully!') }}</span>
    </x-alert>
@elseif (session('status') === 'user-activated')
    <x-alert type="success" :show="true">
        <span class="font-medium">{{ __('User has been Activated successfully!') }}</span>
    </x-alert>
@endif
{{-- end::Alert --}}