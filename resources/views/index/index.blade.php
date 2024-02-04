<x-app-layout>
    <div class="h-full px-4 bg-gray-200 2xl:px-8">
        @if (session('status') === 'login-success')
            <div>
                <p class="text-sm text-gray-600">{{ \Carbon\Carbon::now()->format('D, j M Y') }}</p>
                <h1 class="text-xl font-bold">Welcome Back, {{ auth()->user()->name }}!</h1>
            </div>
        @endif
        <!-- start::Activities -->
        <div class="flex flex-col my-8 space-y-4 xl:flex-row xl:space-y-0 xl:space-x-4">
            <!-- start::acitivity feed -->
            <div class="w-full px-4 py-6 overflow-y-hidden bg-white rounded-lg shadow-xl lg:w-1/2 xl:w-2/3">
                <!-- start::title -->
                <div class="px-4 pb-2">
                    <h3 class="text-lg font-semibold">Overview</h3>
                </div>
                <hr>
                <!-- end::title -->
                <div class="mt-4">
                    @php
                        $previousDate = null;
                    @endphp

                    @foreach ($activities as $item)
                        @php
                            $currentDate = \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
                        @endphp

                        @if ($previousDate !== null && $previousDate !== $currentDate)
                </div> {{-- Close the previous div if dates are different --}}
            </div>
            @endif

            @if ($currentDate != $previousDate)
                @php
                    $carbonDate = \Carbon\Carbon::parse($item->created_at);
                    $formattedDate = '';

                    if ($carbonDate->isToday()) {
                        $formattedDate = 'Today';
                    } elseif ($carbonDate->isYesterday()) {
                        $formattedDate = 'Yesterday';
                    } else {
                        $formattedDate = $carbonDate->format('D, M j. Y');
                    }
                @endphp

                <div>
                    <h4 class="px-6 pb-3 font-semibold capitalize text">{{ $formattedDate }}</h4>
                    <div class="relative h-full px-8 pt-2">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
            @endif

            @switch($item->type)
                @case(App\Enums\ActivityTypes::PETUGAS)
                    <x-timeline-item-petugas :item="$item" />
                @break
                @case(App\Enums\ActivityTypes::MODAL)
                    <x-timeline-item-modal :item="$item" />
                @break
                @case(App\Enums\ActivityTypes::PRODUCT)
                    <x-timeline-item-product :item="$item" />
                @break
            @endswitch

            @php
                $previousDate = $currentDate;
            @endphp
            @endforeach

            @if (!empty($previousDate))
        </div> {{-- Close the last div --}}
    </div>
     @endif
    {{$activities->links()}}
    </div>
    <!-- end::Activities -->
    </div>
    <!-- end::acitivity feed -->
    <div class="flex flex-col w-full gap-4 lg:w-1/2 xl:w-1/3">
        <!-- start::online users -->
        <div class="px-4 py-6 overflow-y-hidden bg-white rounded-lg shadow-xl h-fit">
            <h4 class="mb-2 text-lg font-semibold">Recently Online</h4>
            <hr>
            @foreach ($onlineUsers as $onlineUser)
                <div class="mt-2">
                    <div class="flex items-center justify-between px-3 py-2 text-sm">
                        <div class="flex items-center gap-3">
                            <div class="relative">
                                <img class="object-cover w-10 h-10 rounded-full"
                                    src="{{ $onlineUser->media->first() != null ? $onlineUser->media->first()->getUrl() : Vite::asset('resources/images/default-avatar.png'); }}"
                                    alt="{{ $onlineUser->name }}">
                                <span
                                    class="bottom-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"></span>
                            </div>
                            <span>{{ $onlineUser->name }}</span>
                        </div>
                        <div class="flex items-center gap-2 text-right">
                            <span>{{ \Carbon\Carbon::parse($onlineUser->last_seen)->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- end::online users -->
    </div>
    </div>
    <!-- end::Activities -->
</x-app-layout>
