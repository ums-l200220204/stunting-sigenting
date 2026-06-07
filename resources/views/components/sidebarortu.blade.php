{{-- resources/views/components/sidebarortu.blade.php --}}

<div class="w-full bg-white pb-6 h-full flex flex-col relative">

    {{-- 1. PROFILE BUTTON & DROPDOWN --}}
    <div class="px-4 py-4 border-b border-slate-100 relative">
        
        {{-- Tombol Profil --}}
        <button id="profileBtn" onclick="toggleProfileMenu()" 
                class="w-full flex items-center justify-between gap-2 px-4 py-3.5 rounded-2xl transition-all duration-200 hover:shadow-md"
                style="background: #EEF4FF; border: 1px solid #C7D9F8;">
            
            <div class="flex items-center gap-3 overflow-hidden">
                {{-- Avatar --}}
                <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 shadow-inner"
                     style="background: linear-gradient(135deg, #005BA9, #0EA5E9);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                
                <div class="overflow-hidden text-left">
                    <p class="font-bold text-sm text-slate-800 truncate leading-snug">
                        {{ Auth::user()?->nama ?? 'User' }}
                    </p>
                    <span class="inline-block mt-0.5 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-wide uppercase"
                          style="background: rgba(124,77,255,0.12); color: #7C4DFF;">
                        {{ str_replace('_', ' ', Auth::user()?->role ?? 'Orang Tua') }}
                    </span>
                </div>
            </div>

            {{-- Panah (Chevron) --}}
            <svg id="profileChevron" xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-slate-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        {{-- Dropdown Menu (Muncul saat ditekan) --}}
        <div id="profileDropdown" 
             class="absolute left-4 right-4 top-[85px] mt-2 bg-white border border-slate-100 shadow-xl rounded-2xl z-50 opacity-0 invisible translate-y-[-10px] transition-all duration-300">
            <form action="{{ route('logout') }}" method="POST" class="p-1.5">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center gap-3 px-3 py-3 rounded-xl font-semibold text-sm text-red-500 hover:bg-red-50 hover:text-red-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>

    </div>

    {{-- 2. MENU NAVIGATION --}}
    <nav class="flex-1 px-4 py-5 space-y-1 overflow-y-auto">

        <p class="px-3 pb-3 text-[10px] font-bold tracking-widest uppercase text-slate-400">
            Menu Utama
        </p>

        {{-- DASHBOARD --}}
        <a href="/orangtua"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->is('orangtua') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->is('orangtua') ? 'background: linear-gradient(135deg, #0D2B6B, #1A4A9A);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->is('orangtua') ? 'background: rgba(255,255,255,0.15);' : 'background: #EEF4FF;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                     stroke="{{ request()->is('orangtua') ? 'white' : '#1A4A9A' }}" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
            </div>
            Dashboard
        </a>

        {{-- INPUT --}}
        <a href="{{ route('orangtua.input') }}"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->is('orangtua/input') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->is('orangtua/input') ? 'background: linear-gradient(135deg, #FD4BC7, #e0289e);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->is('orangtua/input') ? 'background: rgba(255,255,255,0.15);' : 'background: #FFF0FA;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                     stroke="{{ request()->is('orangtua/input') ? 'white' : '#FD4BC7' }}" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            Input Perkembangan
        </a>

        {{-- PERKEMBANGAN --}}
        <a href="{{ route('orangtua.perkembangan') }}"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->is('orangtua/perkembangan') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->is('orangtua/perkembangan') ? 'background: linear-gradient(135deg, #00B894, #00957a);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->is('orangtua/perkembangan') ? 'background: rgba(255,255,255,0.15);' : 'background: #F0FFFA;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                     stroke="{{ request()->is('orangtua/perkembangan') ? 'white' : '#00B894' }}" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
            </div>
            Cek Perkembangan
        </a>

        {{-- REKOMENDASI --}}
        <a href="{{ route('orangtua.rekomendasi') }}"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->is('orangtua/rekomendasi*') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->is('orangtua/rekomendasi*') ? 'background: linear-gradient(135deg, #7C4DFF, #5e35b1);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->is('orangtua/rekomendasi*') ? 'background: rgba(255,255,255,0.15);' : 'background: #F5F1FF;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                     stroke="{{ request()->is('orangtua/rekomendasi*') ? 'white' : '#7C4DFF' }}" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.414 14.881A2 2 0 004 16.732V21a1 1 0 001 1h14a1 1 0 001-1v-4.268a2 2 0 00-.572-1.304zM12 4a4 4 0 110 8 4 4 0 010-8z"/>
                </svg>
            </div>
            Rekomendasi Nutrisi
        </a>

    </nav>

</div>

{{-- 3. JAVASCRIPT UNTUK ANIMASI DROPDOWN --}}
<script>
    function toggleProfileMenu() {
        const dropdown = document.getElementById('profileDropdown');
        const chevron = document.getElementById('profileChevron');
        
        // Toggle visibility and animation classes
        if (dropdown.classList.contains('invisible')) {
            dropdown.classList.remove('invisible', 'opacity-0', 'translate-y-[-10px]');
            dropdown.classList.add('opacity-100', 'translate-y-0');
            chevron.classList.add('rotate-180');
        } else {
            dropdown.classList.add('invisible', 'opacity-0', 'translate-y-[-10px]');
            dropdown.classList.remove('opacity-100', 'translate-y-0');
            chevron.classList.remove('rotate-180');
        }
    }

    // Menutup dropdown jika user mengklik area lain di luar tombol profil
    window.addEventListener('click', function(e) {
        const profileBtn = document.getElementById('profileBtn');
        const dropdown = document.getElementById('profileDropdown');
        const chevron = document.getElementById('profileChevron');
        
        if (profileBtn && dropdown && chevron) {
            if (!profileBtn.contains(e.target) && !dropdown.contains(e.target)) {
                dropdown.classList.add('invisible', 'opacity-0', 'translate-y-[-10px]');
                dropdown.classList.remove('opacity-100', 'translate-y-0');
                chevron.classList.remove('rotate-180');
            }
        }
    });
</script>