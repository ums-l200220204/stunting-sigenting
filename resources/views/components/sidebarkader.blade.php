{{-- Wrapper Utama --}}
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
                        {{ Auth::user()?->nama ?? 'Kader' }}
                    </p>
                    <span class="inline-block mt-0.5 px-2 py-0.5 rounded-full text-[9px] font-bold tracking-wide uppercase"
                          style="background: rgba(124,77,255,0.12); color: #7C4DFF;">
                        {{ str_replace('_', ' ', Auth::user()?->role ?? 'Kader Posyandu') }}
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
    <nav class="flex-1 px-4 py-5 space-y-2 overflow-y-auto">

        <p class="px-3 pb-3 text-[10px] font-bold tracking-widest uppercase text-slate-400">
            Menu Utama
        </p>

        {{-- DATA ANAK --}}
        <a href="{{ route('kader.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->routeIs('kader.dashboard') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->routeIs('kader.dashboard') ? 'background: linear-gradient(135deg, #0D2B6B, #1A4A9A);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->routeIs('kader.dashboard') ? 'background: rgba(255,255,255,0.15);' : 'background: #EEF4FF;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                     stroke="{{ request()->routeIs('kader.dashboard') ? 'white' : '#1A4A9A' }}" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>
            Data Anak
        </a>

        {{-- REKOMENDASI NUTRISI --}}
        <a href="{{ route('kader.rekomendasi') }}"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->routeIs('kader.rekomendasi') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->routeIs('kader.rekomendasi') ? 'background: linear-gradient(135deg, #7C4DFF, #5e35b1);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->routeIs('kader.rekomendasi') ? 'background: rgba(255,255,255,0.15);' : 'background: #F5F1FF;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                    stroke="{{ request()->is('kader.rekomendasi*') ? 'white' : '#7C4DFF' }}" stroke-width="1.75">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 11h16a8 8 0 01-16 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 19h12"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 4c0 1.5-1.5 2-1.5 3.5"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c0 1.5-1.5 2-1.5 3.5"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 4c0 1.5-1.5 2-1.5 3.5"/>
                </svg>
            </div>
            Buat Rekomendasi Nutrisi
        </a>

        {{-- DATA LAPORAN --}}
        <a href="{{ route('kader.laporan') }}"
           class="flex items-center gap-3 px-4 py-3.5 rounded-2xl font-semibold text-sm transition-all duration-200
                  {{ request()->routeIs('kader.laporan') ? 'text-white shadow-md' : 'text-slate-600 hover:bg-slate-50' }}"
           style="{{ request()->routeIs('kader.laporan') ? 'background: linear-gradient(135deg, #00B894, #00957a);' : '' }}">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center flex-shrink-0"
                 style="{{ request()->routeIs('kader.laporan') ? 'background: rgba(255,255,255,0.15);' : 'background: #F0FFFA;' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] h-[18px]" fill="none" viewBox="0 0 24 24"
                     stroke="{{ request()->routeIs('kader.laporan') ? 'white' : '#00B894' }}" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            Data Laporan
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