{{-- resources/views/admin/laporan-pdf.blade.php --}}

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Laporan Data Pertumbuhan Anak
    </title>

    <style>

        @page {

            size: A4 portrait;

            margin: 35px;

        }

        body {

            font-family: Arial, sans-serif;

            font-size: 11px;

            color: #111827;

            line-height: 1.5;

        }

        /* =========================
           TITLE
        ========================= */

        .laporan-title {

            text-align: center;

            margin-bottom: 30px;

        }

        .laporan-title h3 {

            margin: 0;

            font-size: 18px;

            text-transform: uppercase;

            text-decoration: underline;

            letter-spacing: 1px;

        }

        .laporan-title p {

            margin-top: 6px;

            color: #4B5563;

        }

        /* =========================
           INFO
        ========================= */

        .info {

            margin-bottom: 20px;

        }

        .info table {

            width: 100%;

        }

        .info td {

            padding: 3px 0;

            vertical-align: top;

        }

        /* =========================
           SECTION TITLE
        ========================= */

        .section-title {

            margin-top: 20px;

            margin-bottom: 10px;

            font-size: 13px;

            font-weight: bold;

            text-transform: uppercase;

        }

        /* =========================
           SUMMARY
        ========================= */

        .summary-table {

            width: 100%;

            border-collapse: collapse;

            margin-bottom: 10px;

            table-layout: fixed;

        }

        .summary-table td {

            border: 1px solid #D1D5DB;

            padding: 6px 4px;

            vertical-align: middle;

            text-align: center;

        }

        .summary-label {

            font-size: 9px;

            color: #6B7280;

            margin-bottom: 3px;

        }

        .summary-value {

            font-size: 13px;

            font-weight: bold;

            color: #111827;

        }

        .status-table td {

            padding: 5px 2px;

        }

        /* =========================
           TABLE DATA
        ========================= */

        .data-table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 10px;

        }

        .data-table th {

            background: #E5E7EB;

            border: 1px solid #9CA3AF;

            padding: 8px 5px;

            font-size: 9px;

            text-align: center;

        }

        .data-table td {

            border: 1px solid #D1D5DB;

            padding: 7px 5px;

            font-size: 9px;

            text-align: center;

            word-wrap: break-word;

        }

        .data-table tbody tr:nth-child(even) {

            background: #F9FAFB;

        }

        /* =========================
           FOOTER
        ========================= */

        .footer {

            margin-top: 60px;

            width: 100%;

        }

        .signature {

            width: 240px;

            float: right;

            text-align: center;

        }

        .signature .name {

            margin-top: 70px;

            font-weight: bold;

            text-decoration: underline;

        }

    </style>

</head>

<body>

    {{-- =========================
         JUDUL LAPORAN
    ========================== --}}
    <div class="laporan-title">

        <h3>

            LAPORAN DATA PERTUMBUHAN ANAK

        </h3>

        <p>

            @if($bulan && $tahun)

                Periode
                {{ $namaBulan[$bulan] }}
                {{ $tahun }}

            @elseif($bulan)

                Periode
                {{ $namaBulan[$bulan] }}

            @elseif($tahun)

                Tahun
                {{ $tahun }}

            @else

                Semua Periode

            @endif

        </p>

    </div>

    {{-- =========================
         INFORMASI LAPORAN
    ========================== --}}
    <div class="info">

        <table>

            <tr>

                <td width="170">

                    <strong>
                        Tanggal Cetak
                    </strong>

                </td>

                <td width="10">

                    :

                </td>

                <td>

                    {{ date('d F Y') }}

                </td>

            </tr>

            <tr>

                <td>

                    <strong>
                        Total Data Anak
                    </strong>

                </td>

                <td>

                    :

                </td>

                <td>

                    {{ $totalAnak }} Anak

                </td>

            </tr>

        </table>

    </div>

    {{-- =========================
         RINGKASAN STATISTIK
    ========================== --}}
    <div class="section-title">

        Ringkasan Statistik

    </div>

    {{-- GENDER --}}
    <table class="summary-table">

        <tr>

            <td width="50%">

                <div class="summary-label">

                    Anak Laki-Laki

                </div>

                <div class="summary-value">

                    {{ $laki }}

                </div>

            </td>

            <td width="50%">

                <div class="summary-label">

                    Anak Perempuan

                </div>

                <div class="summary-value">

                    {{ $perempuan }}

                </div>

            </td>

        </tr>

    </table>

    {{-- STATUS GIZI --}}
    <table class="summary-table status-table">

        <tr>

            <td width="25%">

                <div class="summary-label">

                    Normal

                </div>

                <div class="summary-value">

                    {{ $normal }}

                </div>

            </td>

            <td width="25%">

                <div class="summary-label">

                    Tinggi

                </div>

                <div class="summary-value">

                    {{ $tinggi }}

                </div>

            </td>

            <td width="25%">

                <div class="summary-label">

                    Stunting

                </div>

                <div class="summary-value">

                    {{ $stunting }}

                </div>

            </td>

            <td width="25%">

                <div class="summary-label">

                    Stunting Berat

                </div>

                <div class="summary-value">

                    {{ $stuntingBerat }}

                </div>

            </td>

        </tr>

    </table>

    {{-- =========================
         TABEL DATA
    ========================== --}}
    <div class="section-title">

        Data Anak dan Status Pertumbuhan

    </div>

    <table class="data-table">

        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="15%">
                    Nama Anak
                </th>

                <th width="7%">
                    JK
                </th>

                <th width="9%">
                    Usia
                </th>

                <th width="15%">
                    Orang Tua
                </th>

                <th width="9%">
                    BB
                </th>

                <th width="9%">
                    TB
                </th>

                <th width="9%">
                    Z-Score
                </th>

                <th width="11%">
                    Status
                </th>

                <th width="11%">
                    Tanggal
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($anak as $item)

            <tr>

                <td>

                    {{ $loop->iteration }}

                </td>

                <td>

                    {{ $item->nama_anak }}

                </td>

                <td>

                    {{ $item->jenis_kelamin }}

                </td>

                <td>

                    {{ $item->usia_bulan ?? '-' }} Bulan

                </td>

                <td>

                    {{ $item->nama_orangtua }}

                </td>

                <td>

                    {{ $item->berat_badan ?? '-' }} Kg

                </td>

                <td>

                    {{ $item->tinggi_badan ?? '-' }} Cm

                </td>

                <td>

                    {{ $item->z_score ?? '-' }}

                </td>

                <td>

                    {{ $item->status_gizi ?? '-' }}

                </td>

                <td>

                    @if($item->tanggal_pengukuran)

                        {{ date('d-m-Y', strtotime($item->tanggal_pengukuran)) }}

                    @else

                        -

                    @endif

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="10">

                    Tidak ada data tersedia.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

    {{-- =========================
         TANDA TANGAN
    ========================== --}}
    <div class="footer">

        <div class="signature">

            <p>

                {{ date('d F Y') }}

            </p>

            <p>

                Petugas Posyandu

            </p>

            <div class="name">

                ....................................

            </div>

        </div>

    </div>

</body>

</html>