<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- Vite --}}

    <title>@yield('title')</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body class="bg-[#F5F7FA] overflow-x-hidden">

    {{-- WRAPPER --}}
    <div x-data="{ sidebarOpen: false }"
        class="relative min-h-screen">

        {{-- NAVBAR --}}
        @include('components.navbar')

        {{-- OVERLAY --}}
        <div x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"

            class="fixed inset-0
                   bg-black/40
                   backdrop-blur-sm
                   z-40">
        </div>

        {{-- SIDEBAR --}}
        <aside
            x-show="sidebarOpen"

            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"

            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"

            class="fixed top-0 left-0
                   w-[320px] h-screen
                   bg-white
                   shadow-2xl
                   z-50
                   overflow-hidden
                   flex flex-col">

            {{-- SIDEBAR HEADER --}}
            <div class="h-24 px-7
                        border-b border-[#E7EEF6]
                        flex items-center justify-between
                        bg-white shrink-0">

                {{-- LOGO --}}
                <div>

                    <h1 class="text-3xl
                               font-black
                               text-[#005BA9]
                               tracking-tight">

                        SIGENTING

                    </h1>

                    <p class="text-sm
                              text-gray-500 mt-1">

                        Sistem Generasi Anti Stunting

                    </p>

                </div>

                {{-- CLOSE BUTTON --}}
                <button
                    @click="sidebarOpen = false"

                    class="w-11 h-11
                           rounded-2xl
                           bg-[#F5F7FA]
                           hover:bg-[#EAF1F8]
                           text-[#005BA9]
                           font-bold
                           transition duration-300
                           flex items-center justify-center">

                    ✕

                </button>

            </div>

            {{-- SIDEBAR CONTENT --}}
            <div class="flex-1 overflow-y-auto">

                {{-- ORANG TUA --}}
                @if(Auth::user()?->role == 'orang_tua')

                    @include('components.sidebarortu')

                {{-- ADMIN --}}
                @elseif(Auth::user()?->role == 'admin')

                    @include('components.sidebaradmin')

                {{-- KADER --}}
                @elseif(Auth::user()?->role == 'kader')

                    @include('components.sidebarkader')

                @endif

            </div>

        </aside>

        {{-- CONTENT --}}
        <main class="relative z-10
                     p-6 md:p-8 lg:p-10">

            @yield('content')

        </main>

    </div>

    {{-- ALPINE JS --}}
    <script defer
        src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js">
    </script>

</body>
</html>