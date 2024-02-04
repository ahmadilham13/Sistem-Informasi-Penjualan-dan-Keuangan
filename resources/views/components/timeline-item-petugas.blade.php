<!-- start::Timeline item -->
<div class="flex items-start gap-8 w-full my-6 -ml-1.5">
    <div>
        <div class="mt-3 w-3.5 h-3.5 bg-indigo-600 rounded-full"></div>
    </div>
    <div>
        @php
            $carbonDateTime = \Carbon\Carbon::parse($item->created_at);
            $diffInHours = now()->diffInHours($carbonDateTime);
            $formattedTime = '';
            
            if ($diffInHours > 24) {
                $formattedTime = $carbonDateTime->format('H:i');
            } else {
                $formattedTime = $carbonDateTime->diffForHumans();
            }
        @endphp

        <p class="text-sm">
            <span class="font-bold text-indigo-600">{{ $item->user->name }}</span>
            Add Petugas <span
                class="font-bold text-indigo-600">{{ $item->petugas->name }}</span>.
        </p>
        <p class="text-xs text-gray-500">{{ $formattedTime }}</p>
    </div>
    {{-- @if($showProjectName) --}}
    <div class="ml-auto text-right">
        <a href="" class="font-bold text-indigo-600"></a>
    </div>
    {{-- @endif --}}
</div>
<!-- end::Timeline item -->