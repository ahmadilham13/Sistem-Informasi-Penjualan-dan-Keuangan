<aside :class="menuOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed inset-y-0 left-0 z-10 w-64 overflow-y-auto transition duration-300 bg-slate-500 lg:translate-x-0 lg:inset-0 custom-scrollbar">
    <!-- start::Logo -->
    <div class="flex items-center justify-center h-16 bg-black bg-opacity-30">
      <h1 class="text-lg font-bold tracking-widest text-gray-100 uppercase">
        Rido Flowers
      </h1>
    </div>
    <!-- end::Logo -->
  
    <!-- start::Navigation -->
    <nav class="py-10 custom-scrollbar">
      <!-- start::Menu link -->
      <a x-data="{ linkHover: false }" @mouseover="linkHover = true" @mouseleave="linkHover = false" href="{{ route(name: 'index', absolute: false) }}" class="flex items-center px-6 py-3 text-gray-300 transition duration-200 cursor-pointer hover:bg-black hover:bg-opacity-30">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-200" :class="linkHover ? 'text-gray-100' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="ml-3 transition duration-200" :class="linkHover ? 'text-gray-100' : ''">
          Dashboard
        </span>
      </a>
      <!-- end::Menu link -->
  
      <!-- start::Menu link -->
      <div x-data="{ linkHover: false, linkActive: false }">
        <div @mouseover="linkHover = true" @mouseleave="linkHover = false" @click="linkActive = !linkActive" class="flex items-center justify-between px-6 py-3 text-gray-300 transition duration-200 cursor-pointer hover:text-gray-100 hover:bg-black hover:bg-opacity-30" :class=" linkActive ? 'bg-black bg-opacity-30 text-gray-100' : ''">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-200" :class=" linkHover || linkActive ? 'text-gray-100' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
            <span class="ml-3">Project</span>
          </div>
          <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </div>
        <!-- start::Submenu -->
        <ul x-show="linkActive" x-cloak x-collapse.duration.300ms class="text-gray-200">
          <!-- start::Submenu link -->
          <li class="py-2 pl-10 pr-6 transition duration-200 cursor-pointer hover:bg-black hover:bg-opacity-30 hover:text-gray-100">
            <a href="#" class="flex items-center">
              <span class="mr-2 text-sm">&bull;</span>
              <span class="overflow-ellipsis">Project</span>
            </a>
          </li>
          <!-- end::Submenu link -->
  
          <!-- start::Submenu link -->
          <li class="py-2 pl-10 pr-6 transition duration-200 cursor-pointer hover:bg-black hover:bg-opacity-30 hover:text-gray-100">
            <a href="#" class="flex items-center">
              <span class="mr-2 text-sm">&bull;</span>
              <span class="overflow-ellipsis">Project Group</span>
            </a>
          </li>
          <!-- end::Submenu link -->
  
          <!-- start::Submenu link -->
          <li class="py-2 pl-10 pr-6 transition duration-200 cursor-pointer hover:bg-black hover:bg-opacity-30 hover:text-gray-100">
            <a href="#" class="flex items-center">
              <span class="mr-2 text-sm">&bull;</span>
              <span class="overflow-ellipsis">Client</span>
            </a>
          </li>
          <!-- end::Submenu link -->
        </ul>
        <!-- end::Submenu -->
      </div>
      <!-- end::Menu link -->
  
      <!-- <p class="px-6 mt-10 mb-2 text-xs text-gray-300 uppercase">Apps</p> -->
    </nav>
    <!-- end::Navigation -->
  </aside>