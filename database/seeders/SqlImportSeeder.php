<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlImportSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('database/seeders/data/stunting.sql');

        if (!file_exists($path)) {
            die('File tidak ditemukan: '.$path);
        }

        $sql = file_get_contents($path);

        DB::unprepared($sql);
    }
}