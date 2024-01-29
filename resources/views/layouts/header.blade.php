<div class="flex flex-col">
    <header class="flex items-center justify-between h-16 px-6 py-4 bg-white">
      <!-- start::Mobile menu button -->
      <div class="flex items-center">
        <button @click="menuOpen = true" class="text-gray-500 transition duration-200 hover:text-primary focus:outline-none lg:hidden">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
          </svg>
        </button>
      </div>
      <!-- end::Mobile menu button -->
  
      <!-- start::Right side top menu -->
      <div class="flex items-center">
        <!-- start::Search input -->
        {{-- <form class="relative mx-6">
          <input type="text" placeholder="Search..." class="w-48 py-2 pl-4 text-sm bg-white rounded-lg lg:w-72 focus:ring-0 focus:outline-none" />
          <button class="absolute right-2 top-2.5">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
          </button>
        </form> --}}
        <!-- end::Search input -->
  
        <!-- start::Profile -->
        <div x-data="{ linkActive: false }" class="relative">
          <!-- start::Main link -->
          <div @click="linkActive = !linkActive" class="cursor-pointer">
            <img src="https://source.unsplash.com/500x500/?user" class="w-10 rounded-full" />
          </div>
          <!-- end::Main link -->
  
          <!-- start::Submenu -->
          <div x-show="linkActive" @click.away="linkActive = false" x-cloak class="absolute right-0 z-20 w-40 border border-gray-300 top-11">
            <!-- start::Submenu content -->
            <div class="bg-white rounded">
              <!-- start::Submenu link -->
              <a x-data="{ linkHover: false }" href="{{ route(name: 'profile.edit', absolute: false) }}" class="flex items-center justify-between px-3 py-2 hover:bg-gray-100 bg-opacity-20" @mouseover="linkHover = true" @mouseleave="linkHover = false">
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                  </svg>
                  <div class="ml-3 text-sm">
                    <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                      Profile
                    </p>
                  </div>
                </div>
              </a>
              <!-- end::Submenu link -->
              <!-- start::Submenu link -->
              <a x-data="{ linkHover: false }" href="./pages/email/inbox.html" class="flex items-center justify-between px-3 py-2 hover:bg-gray-100 bg-opacity-20" @mouseover="linkHover = true" @mouseleave="linkHover = false">
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                  </svg>
                  <div class="ml-3 text-sm">
                    <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                      Inbox
                      <span class="bg-red-600 text-gray-100 text-xs px-1.5 py-0.5 ml-2 rounded">3</span>
                    </p>
                  </div>
                </div>
              </a>
              <!-- end::Submenu link -->
              <!-- start::Submenu link -->
              <a x-data="{ linkHover: false }" href="./pages/settings.html" class="flex items-center justify-between px-3 py-2 hover:bg-gray-100 bg-opacity-20" @mouseover="linkHover = true" @mouseleave="linkHover = false">
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg>
                  <div class="ml-3 text-sm">
                    <p class="font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                      Settings
                    </p>
                  </div>
                </div>
              </a>
              <!-- end::Submenu link -->
  
              <hr />
  
              <!-- start::Submenu link -->
              <form method="POST" action="{{ route(name: 'logout', absolute: false) }}" x-data="{ linkHover: false }" class="flex items-center justify-between px-3 py-2 hover:bg-gray-100 bg-opacity-20" @mouseover="linkHover = true" @mouseleave="linkHover = false">
                @csrf
                <div class="flex items-center">
                  <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                  </svg>
                  {{-- <button class="ml-3 text-sm font-bold text-gray-600 capitalize" :class=" linkHover ? 'text-primary' : ''">
                    Log out
                  </button> --}}
                  <x-dropdown-link :href="route(name: 'logout', absolute: false)"
                          onclick="event.preventDefault();
                                      this.closest('form').submit();"
                          class="ml-3 text-sm font-bold text-gray-600 capitalize">
                      {{ __('Log Out') }}
                  </x-dropdown-link>
                </div>
              </form>
              <!-- end::Submenu link -->
            </div>
            <!-- end::Submenu content -->
          </div>
          <!-- end::Submenu -->
        </div>
        <!-- end::Profile -->
      </div>
      <!-- end::Right side top menu -->
    </header>
  </div>