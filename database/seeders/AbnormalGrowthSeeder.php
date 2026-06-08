<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AbnormalGrowthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat User Orang Tua Baru (Kasus Pertumbuhan Tidak Normal)
        $orangTuaId = DB::table('users')->insertGetId([
            'nama' => 'Bapak Ranto (Kasus Abnormal)',
            'email' => 'ranto.kasus@gmail.com',
            'nomor_hp' => '085555555555',
            'alamat' => 'Desa Suka Maju, RT 02/RW 01',
            'password' => Hash::make('password123'),
            'role' => 'orang_tua',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 2. Buat Data Anak
        // Asumsi anak lahir 1 tahun yang lalu
        $tanggalLahir = Carbon::now()->subYear(); 
        
        $anakId = DB::table('anak')->insertGetId([
            'user_id' => $orangTuaId,
            'nama_anak' => 'Rian Hidayat',
            'tanggal_lahir' => $tanggalLahir->format('Y-m-d'),
            'usia_bulan' => 12,
            'jenis_kelamin' => 'L', // Laki-laki
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 3. Insert Data Pertumbuhan (Rutin 1 Tahun / 12 Bulan)
        // Skenario: Bulan 1-2 masih normal, Bulan 3-5 mulai terindikasi stunting/gizi kurang, 
        // Bulan 6-12 masuk ke Gizi Buruk dan Stunting Berat (berada di bawah SD -3)
        $dataPertumbuhan = [
            ['usia_bulan' => 1, 'bb' => 3.90, 'tb' => 52.80, 'z_score' => -1.00, 'status' => 'Normal'],
            ['usia_bulan' => 2, 'bb' => 4.40, 'tb' => 54.50, 'z_score' => -1.80, 'status' => 'Normal'],
            ['usia_bulan' => 3, 'bb' => 4.80, 'tb' => 56.00, 'z_score' => -2.20, 'status' => 'Gizi Kurang'],
            ['usia_bulan' => 4, 'bb' => 5.10, 'tb' => 57.50, 'z_score' => -2.80, 'status' => 'Stunting'],
            ['usia_bulan' => 5, 'bb' => 5.20, 'tb' => 58.00, 'z_score' => -3.10, 'status' => 'Stunting Berat'],
            ['usia_bulan' => 6, 'bb' => 5.40, 'tb' => 59.00, 'z_score' => -3.40, 'status' => 'Gizi Buruk'],
            ['usia_bulan' => 7, 'bb' => 5.50, 'tb' => 60.00, 'z_score' => -3.80, 'status' => 'Stunting Berat'],
            ['usia_bulan' => 8, 'bb' => 5.70, 'tb' => 61.50, 'z_score' => -4.10, 'status' => 'Stunting Berat'],
            ['usia_bulan' => 9, 'bb' => 5.80, 'tb' => 62.50, 'z_score' => -4.50, 'status' => 'Stunting Berat'],
            ['usia_bulan' => 10, 'bb' => 5.90, 'tb' => 63.50, 'z_score' => -4.80, 'status' => 'Stunting Berat'],
            ['usia_bulan' => 11, 'bb' => 6.00, 'tb' => 64.00, 'z_score' => -5.10, 'status' => 'Gizi Buruk'],
            ['usia_bulan' => 12, 'bb' => 6.10, 'tb' => 65.00, 'z_score' => -5.40, 'status' => 'Stunting Berat'],
        ];

        $insertDataPertumbuhan = [];
        foreach ($dataPertumbuhan as $data) {
            $tanggalPengukuran = (clone $tanggalLahir)->addMonths($data['usia_bulan']);
            
            $insertDataPertumbuhan[] = [
                'anak_id' => $anakId,
                'tanggal_pengukuran' => $tanggalPengukuran->format('Y-m-d'),
                'usia_bulan' => $data['usia_bulan'],
                'berat_badan' => $data['bb'],
                'tinggi_badan' => $data['tb'],
                'z_score' => $data['z_score'],
                'status_gizi' => $data['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('data_pertumbuhan')->insert($insertDataPertumbuhan);
    }
}