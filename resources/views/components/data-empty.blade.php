<div class="flex items-center justify-center my-20">
  <span class="flex flex-col items-center gap-5 text-center text-gray-500">
      <img src="{{ Vite::asset('resources/images/not-found.png') }}" alt="not-found"
          width="150" height="150" />
      {{ $slot }}
  </span>
</div>