{{-- resources/views/components/navbar.blade.php --}}

<nav class="w-full h-16 sm:h-20 lg:h-24
            bg-[#005BA9]
            border-b border-[#0A6BC0]
            px-4 sm:px-6 lg:px-10
            flex items-center justify-between
            shadow-lg sticky top-0 z-40">

    {{-- LEFT --}}
    <div class="flex items-center gap-3 sm:gap-5">

        {{-- BUTTON SIDEBAR --}}
        <button
            @click="sidebarOpen = !sidebarOpen"
            class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl
                   bg-white/15
                   flex items-center justify-center
                   hover:bg-white/25
                   transition duration-300 focus:outline-none">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 sm:w-6 sm:h-6 text-white"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>

            </svg>

        </button>

        {{-- LOGO --}}
        <div class="flex flex-col justify-center mt-0.5">

            <h1 class="text-xl sm:text-2xl lg:text-3xl font-black
                       text-white tracking-tight leading-none">
                SIGENTING
            </h1>

            <p class="text-[10px] sm:text-xs lg:text-sm text-white/80 mt-1">
                Sistem Generasi Anti Stunting
            </p>

        </div>

    </div>

</nav>