@extends('components.main')

@section('title', 'Input Data Perkembangan')

@section('content')

<div class="w-full min-h-screen bg-[#F5F7FA]">

    {{-- HEADER --}}
    <div class="mb-10">
        <h1 class="text-5xl font-black text-[#1E293B]">
            Input Data Perkembangan
        </h1>
        <p class="text-gray-500 text-lg mt-3">
            Masukkan data perkembangan anak untuk
            mengetahui status gizi dan hasil pertumbuhan.
        </p>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="mb-6 px-6 py-4 rounded-2xl bg-green-100 text-green-700 font-medium">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 px-6 py-4 rounded-2xl bg-red-100 text-red-600 font-medium">
            {{ session('error') }}
        </div>
    @endif

    {{-- CARD --}}
    <div class="relative overflow-hidden bg-white rounded-[40px] shadow-lg border border-[#E5EDF6] p-10 md:p-14">

        {{-- BACKGROUND --}}
        <div class="absolute -top-20 -right-20 w-72 h-72 rounded-full bg-[#EEF5FD]"></div>
        <div class="absolute -bottom-20 -left-20 w-72 h-72 rounded-full bg-[#FFF0FA]"></div>

        <div class="relative z-10">

            <form action="{{ route('kader.perkembangan.store') }}" method="POST" class="space-y-8">
                @csrf

                <input type="hidden" name="anak_id" value="{{ $anak->id }}">

                {{-- TANGGAL --}}
                <div>
                    <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                        Tanggal Pengukuran
                    </label>
                    <input type="date"
                           id="tanggal"
                           name="tanggal_pengukuran"
                           value="{{ date('Y-m-d') }}"
                           readonly
                           class="w-full h-16 rounded-2xl border border-[#D6E4F0] bg-[#F8FBFF] px-6 text-lg">
                </div>

                {{-- BERAT --}}
                <div>
                    <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                        Berat Badan
                    </label>
                    <div class="flex gap-4">
                        <input type="number"
                               id="berat"
                               name="berat_badan"
                               step="0.1"
                               required
                               min="0"
                               placeholder="Masukkan berat badan"
                               class="non-scroll-number flex-1 h-16 rounded-2xl border border-[#D6E4F0] px-6 text-lg">
                        <div class="w-28 h-16 rounded-2xl bg-[#005BA9] text-white flex items-center justify-center font-bold text-lg">
                            KG
                        </div>
                    </div>
                </div>

                {{-- TINGGI --}}
                <div>
                    <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                        Tinggi Badan
                    </label>
                    <div class="flex gap-4">
                        <input type="number"
                               id="tinggi"
                               name="tinggi_badan"
                               step="0.1"
                               required
                               min="0"
                               placeholder="Masukkan tinggi badan"
                               class="non-scroll-number flex-1 h-16 rounded-2xl border border-[#D6E4F0] px-6 text-lg">
                        <div class="w-28 h-16 rounded-2xl bg-[#FD4BC7] text-white flex items-center justify-center font-bold text-lg">
                            CM
                        </div>
                    </div>
                </div>

                {{-- USIA --}}
                <div>
                    <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                        Usia
                    </label>
                    
                    @php
                        $umurBulan = (int) \Carbon\Carbon::parse($anak->tanggal_lahir)->diffInMonths(\Carbon\Carbon::now());
                    @endphp

                    <div class="flex gap-4">
                        <input type="text"
                               readonly
                               value="{{ intval($umurBulan) }}"
                               class="flex-1 h-16 rounded-2xl border border-[#D6E4F0] bg-[#F8FBFF] px-6 text-lg">
                        <div class="w-28 h-16 rounded-2xl bg-[#0078C1] text-white flex items-center justify-center font-bold text-lg">
                            BULAN
                        </div>
                    </div>
                </div>

                {{-- JK --}}
                <div>
                    <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                        Jenis Kelamin
                    </label>
                    <input type="text"
                           readonly
                           value="{{ $anak->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}"
                           class="w-full h-16 rounded-2xl border border-[#D6E4F0] bg-[#F8FBFF] px-6 text-lg">
                </div>

                {{-- PREVIEW --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Z SCORE --}}
                    <div>
                        <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                            Preview Z-Score
                        </label>
                        <input type="text"
                               id="preview_zscore"
                               readonly
                               class="w-full h-16 rounded-2xl border border-[#D6E4F0] bg-[#EEF5FD] px-6 text-lg font-bold text-[#005BA9]">
                    </div>

                    {{-- STATUS --}}
                    <div>
                        <label class="block text-lg font-semibold text-[#1E293B] mb-3">
                            Preview Status Gizi
                        </label>
                        <input type="text"
                               id="preview_status"
                               readonly
                               class="w-full h-16 rounded-2xl border border-[#D6E4F0] bg-[#FFF0FA] px-6 text-lg font-bold text-[#FD4BC7]">
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="pt-6 flex justify-center">
                    <button type="submit"
                            class="px-12 py-5 rounded-2xl bg-gradient-to-r from-[#005BA9] to-[#0078C1] text-white text-lg font-bold shadow-lg">
                        Simpan Data
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- SCRIPT --}}
<script>

    async function previewGizi() {
        let tinggi = document.getElementById('tinggi').value;
        let berat = document.getElementById('berat').value;

        if (!tinggi || !berat) {
            return;
        }

        let response = await fetch(
            "{{ route('kader.preview.gizi') }}",
            {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    anak_id: '{{ $anak->id }}',
                    tinggi_badan: tinggi,
                    berat_badan: berat,
                    tanggal_pengukuran: document.getElementById('tanggal').value
                })
            }
        );

        let data = await response.json();

        document.getElementById('preview_zscore').value = data.z_score;
        document.getElementById('preview_status').value = data.status_gizi;
    }

    document.getElementById('tinggi').addEventListener('input', previewGizi);
    document.getElementById('berat').addEventListener('input', previewGizi);

    // Fungsi untuk mematikan scroll pada input type number
    document.addEventListener("DOMContentLoaded", function() {
        const numberInputs = document.querySelectorAll('.non-scroll-number');
        numberInputs.forEach(function(input) {
            input.addEventListener('wheel', function(e) {
                e.preventDefault(); 
            }, { passive: false });
        });
    });

</script>

@endsection