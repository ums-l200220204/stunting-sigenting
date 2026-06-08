<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StuntingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Insert Default Users (Admin, Kader, Orang Tua)
        $usersId = DB::table('users')->insertGetId([
            'nama' => 'Bapak Admin',
            'email' => 'admin.default@gmail.com',
            'nomor_hp' => '081111111111',
            'alamat' => 'Kantor Pusat Posyandu',
            'password' => Hash::make('kader123'),
            'role' => 'admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $kaderId = DB::table('users')->insertGetId([
            'nama' => 'Kader',
            'email' => 'kader@gmail.com',
            'nomor_hp' => '082222222222',
            'alamat' => 'Posyandu Melati 1',
            'password' => Hash::make('kader123'),
            'role' => 'kader',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $orangTuaId = DB::table('users')->insertGetId([
            'nama' => 'Joko',
            'email' => 'joko@gmail.com',
            'nomor_hp' => '083333333333',
            'alamat' => 'Jl. Kenanga No. 4, Surakarta',
            'password' => Hash::make('joko123'),
            'role' => 'orang_tua',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 2. Insert Data Anak berelasi dengan Orang Tua
        // Asumsi anak lahir 1 tahun yang lalu dari hari ini
        $tanggalLahir = Carbon::now()->subYear(); 
        
        $anakId = DB::table('anak')->insertGetId([
            'user_id' => $orangTuaId,
            'nama_anak' => 'Raka',
            'tanggal_lahir' => $tanggalLahir->format('Y-m-d'),
            'usia_bulan' => 12,
            'jenis_kelamin' => 'L',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 3. Insert Data Pertumbuhan (Rutin 1 Tahun / 12 Bulan)
        // Data diambil mendekati median standar WHO anak laki-laki dari tabel database kamu
        $dataPertumbuhan = [
            ['usia_bulan' => 1, 'bb' => 4.50, 'tb' => 54.70, 'z_score' => 0.00, 'status' => 'Normal'],
            ['usia_bulan' => 2, 'bb' => 5.60, 'tb' => 58.40, 'z_score' => 0.10, 'status' => 'Normal'],
            ['usia_bulan' => 3, 'bb' => 6.40, 'tb' => 61.40, 'z_score' => -0.05, 'status' => 'Normal'],
            ['usia_bulan' => 4, 'bb' => 7.00, 'tb' => 63.90, 'z_score' => 0.00, 'status' => 'Normal'],
            ['usia_bulan' => 5, 'bb' => 7.50, 'tb' => 65.90, 'z_score' => 0.02, 'status' => 'Normal'],
            ['usia_bulan' => 6, 'bb' => 7.90, 'tb' => 67.60, 'z_score' => -0.10, 'status' => 'Normal'],
            ['usia_bulan' => 7, 'bb' => 8.30, 'tb' => 69.20, 'z_score' => 0.05, 'status' => 'Normal'],
            ['usia_bulan' => 8, 'bb' => 8.60, 'tb' => 70.60, 'z_score' => 0.00, 'status' => 'Normal'],
            ['usia_bulan' => 9, 'bb' => 8.90, 'tb' => 72.00, 'z_score' => -0.05, 'status' => 'Normal'],
            ['usia_bulan' => 10, 'bb' => 9.20, 'tb' => 73.30, 'z_score' => 0.08, 'status' => 'Normal'],
            ['usia_bulan' => 11, 'bb' => 9.40, 'tb' => 74.50, 'z_score' => 0.00, 'status' => 'Normal'],
            ['usia_bulan' => 12, 'bb' => 9.60, 'tb' => 75.70, 'z_score' => -0.02, 'status' => 'Normal'],
        ];

        $insertDataPertumbuhan = [];
        foreach ($dataPertumbuhan as $data) {
            // Tanggal pengukuran dihitung berdasarkan bulan ke-n dari tanggal lahir
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