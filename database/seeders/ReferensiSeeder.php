<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReferensiSeeder extends Seeder
{
    public function run(): void
    {
        // ==========================================
        // 1. SEEDER REKOMENDASI NUTRISI
        // ==========================================
        $rekomendasi = [
            ['judul' => 'Nutrisi Tepat untuk Ibu Menyusui agar ASI Berkualitas', 'kategori_usia' => '0-6 Bulan', 'deskripsi' => 'Kualitas ASI sangat dipengaruhi oleh apa yang dikonsumsi oleh ibu. Selama masa menyusui 6 bulan pertama, ibu harus makan dengan porsi lebih banyak dari biasanya (tambah sekitar 400-500 kalori per hari). Pastikan piring ibu selalu mengandung protein hewani tinggi seperti telur, ikan gabus, ayam, atau daging, karena protein ini akan disalurkan melalui ASI untuk pertumbuhan sel bayi. Jangan lupa minum air putih minimal 3 liter sehari, mengonsumsi sayuran hijau (seperti daun katuk, bayam, kelor) yang dipercaya dapat melancarkan produksi ASI, serta istirahat yang cukup agar produksi hormon prolaktin tetap stabil.', 'gambar' => 'rekomendasi/AgBjiIslAHTevyAUP0VKJlmFNe8yYEce5sh4ZEjM.jpg'],
            ['judul' => 'Pentingnya Pemantauan Bayi Secara Rutin', 'kategori_usia' => '0-6 Bulan', 'deskripsi' => 'Meskipun bayi hanya mengonsumsi ASI eksklusif, pertumbuhan fisiknya harus dipantau secara ketat setiap bulan di Posyandu. Kenaikan berat badan bayi di trimester pertama (0-3 bulan) idealnya sangat pesat, yaitu minimal 750-900 gram per bulan. Jika grafik berat badan bayi mendatar atau tidak naik sesuai Garis Merah (KMS), ini adalah peringatan dini (red flag) risiko stunting. Jika ini terjadi, segera konsultasikan teknik pelekatan menyusui (latch on) ke konselor laktasi atau bidan desa agar ASI dapat dihisap bayi dengan maksimal.', 'gambar' => 'rekomendasi/Y8ozHVtzXchLDU11UZJv6fvlsmS2VpiFQSrVt9EK.jpg'],
            ['judul' => 'Panduan Menaikkan Tekstur MPASI Secara Bertahap', 'kategori_usia' => '7-12 Bulan', 'deskripsi' => 'Kemampuan mengunyah bayi harus dilatih agar struktur rahangnya berkembang sempurna. Mulailah MPASI di usia 6 bulan dengan tekstur lumat (saring halus). Saat bayi menginjak 8 bulan, naikkan teksturnya menjadi cincang halus (mashed). Di usia 9-10 bulan, bayi sudah bisa makan makanan cincang kasar atau makanan seukuran jari (finger food) yang bisa dipegang sendiri. Jangan menahan bayi di tekstur bubur halus terlalu lama, karena hal ini sering menjadi penyebab anak malas mengunyah, melepeh makanan, dan akhirnya mengalami gagal tumbuh atau stunting.', 'gambar' => 'rekomendasi/9DAksJW6kvVoErXNgJtfWrFn6WJU8bAZUa82e6W1.jpg'],
            ['judul' => 'Berikan Protein Hewani', 'kategori_usia' => '7-12 Bulan', 'deskripsi' => 'Anak di bawah 1 tahun sangat rentan mengalami anemia defisiensi besi yang merupakan salah satu akar masalah stunting. Hati ayam, hati sapi, dan telur (terutama telur puyuh) adalah bahan makanan lokal yang murah namun kandungan zat besi dan protein hewani-nya sangat tinggi, bahkan lebih baik dari daging mahal. Selalu sertakan minimal satu sumber protein hewani ke dalam setiap porsi makan utama bayi (3 kali sehari). Ingat, sayur dan buah hanya bersifat pengenalan pada usia ini, prioritas utama di piring bayi adalah karbohidrat dan protein hewani.', 'gambar' => 'rekomendasi/0k4Do66xPdS2B2yGlWjASkJkXyNZJETErjkTap5t.jpg'],
            ['judul' => 'Sumber Kalsium dan Zat Besi Alami Ibu Menyusui', 'kategori_usia' => '0-6 Bulan', 'deskripsi' => 'Selama menyusui, zat besi dan kalsium ibu akan diserap habis-habisan untuk memproduksi ASI. Ibu perlu mengonsumsi sayuran hijau gelap seperti daun katuk, bayam merah, dan kelor. Daun kelor sangat istimewa karena merupakan superfood lokal yang kandungan kalsiumnya 4 kali lipat dari susu sapi, serta zat besinya 3 kali lipat dari bayam biasa. Kombinasikan sayuran ini dengan sumber vitamin C (seperti perasan jeruk nipis pada kuah sayur) agar zat besi dari sayur dapat diserap tubuh dengan maksimal dan diteruskan ke ASI.', 'gambar' => 'rekomendasi/EtQotHeI3dDep2CHLbZoVn2Ej8CuYvMh6HUAZJXk.jpg'],
            ['judul' => 'Takaran Porsi MPASI', 'kategori_usia' => '7-12 Bulan', 'deskripsi' => 'Pastikan setiap mangkuk MPASI memiliki komponen yang lengkap. Gunakan rasio ini: 35-40% Karbohidrat (nasi putih, kentang, atau ubi jalar), 30% Protein Hewani (telur puyuh, ikan lele, belut, atau daging sapi), 10-15% Lemak (minyak, santan, atau mentega), dan hanya 10% Sayur/Buah. Perlu diingat, sayur dan buah yang terlalu banyak akan membuat perut bayi cepat penuh karena serat, sehingga ia tidak sanggup menghabiskan protein dan lemak yang justru merupakan kunci utama pencegah stunting.', 'gambar' => 'rekomendasi/o1rgvlaTT9BmW209qLGJceHw3b1Dth5wZWTduySw.jpg'],
            ['judul' => 'Kalsium Tinggi dari Olahan Susu dan Teri', 'kategori_usia' => '1-3 Tahun', 'deskripsi' => 'Masa batita adalah masa krusial pertumbuhan tinggi badan tulang rawan. Makanan harian harus kaya akan kalsium. Berikan susu segar (UHT/Pasteurisasi) secara teratur (maksimal 500ml sehari agar tidak mengganggu nafsu makan). Kenalkan keju sebagai pelengkap taburan di atas nasi hangat atau roti. Jika mencari opsi lokal yang sangat murah dan ampuh, ikan teri nasi kering (teri jengki) adalah jawabannya. Teri bisa dihaluskan menjadi bubuk kaldu dan ditaburkan ke atas makanan, memberikan asupan kalsium utuh langsung dari tulangnya.', 'gambar' => 'rekomendasi/q7BrH1gpwrxTOx7mUoRw38fRNxh7adAO31fp0KgJ.jpg'],
            ['judul' => 'Strategi Makanan Padat Kalori untuk Batita', 'kategori_usia' => '1-3 Tahun', 'deskripsi' => 'Lambung anak usia ini masih sebesar kepalan tangannya, sehingga mereka tidak bisa makan banyak sekaligus. Fokuslah pada makanan bervolume kecil tapi tinggi kalori (padat gizi). Buat perkedel kentang yang dicampur daging cincang dan digoreng dengan telur. Buat puding susu yang dicampur dengan alpukat lumat, atau sajikan alpukat yang dihancurkan dengan keju parut sebagai camilan sore. Hindari memberikan kaldu bening yang hanya berisi air, selalu gunakan kaldu tulang asli (bone broth) yang kaya kolagen dan sumsum untuk menanak nasinya.', 'gambar' => 'rekomendasi/7GkFrPwWrYKXnKyEsK6C9X7kSVXArstR1Z264udY.jpg'],
            ['judul' => 'Kombinasi Lauk Ganda', 'kategori_usia' => '4-5 Tahun', 'deskripsi' => 'Kebutuhan aktivitas fisik yang tinggi membutuhkan asupan otot yang kuat. Berikan strategi Double Protein (dua jenis protein hewani dalam satu piring). Misalnya: Nasi dengan Sup Bola Daging Sapi ditambah Telur Dadar Cincang, atau Nasi dengan Ikan Kembung Goreng ditambah Tumis Udang Rebon. Ikan kembung lokal sangat direkomendasikan karena kandungan Omega-3 (untuk kecerdasan otak) lebih tinggi dari ikan salmon harganya jauh lebih terjangkau.', 'gambar' => 'rekomendasi/OuKYUV66viDYCKPVUlJm8hUWT2amWOvmqhs8mYDW.jpg'],
            ['judul' => 'Ganti Makanan Kemasan dengan Camilan Pangan Utuh', 'kategori_usia' => '4-5 Tahun', 'deskripsi' => 'Gula berlebih dari biskuit, cokelat, atau permen kemasan akan menekan hormon pertumbuhan (HGH) anak. Ganti camilan harian dengan bahan pangan utuh (real food). Sajikan jagung manis rebus dengan olesan mentega, kacang hijau rebus yang dipipil dengan keju, pisang yang disiram yoghurt murni, atau ubi Cilembu panggang. Jika anak meminta makanan manis, buatkan smoothie dari mangga beku dan susu segar tanpa tambahan gula pasir sama sekali. Pangan utuh ini memastikan gula yang masuk diolah menjadi energi, bukan tumpukan lemak yang menghambat penyerapan gizi penting.', 'gambar' => 'rekomendasi/uJxZlhcFvkmuRC3F53h1oiyLBsRWNnVRigNpC4bf.jpg']
        ];

        $rekomendasiData = array_map(function ($item) {
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            return $item;
        }, $rekomendasi);

        DB::table('rekomendasi_nutrisi')->insert($rekomendasiData);


        // ==========================================
        // 2. SEEDER STANDAR BERAT (LENGKAP 0-60 BULAN)
        // ==========================================
        // [usia_bulan, jenis_kelamin, median, sd-1, sd-2, sd-3, sd+1, sd+2, sd+3]
        $rawStandarBerat = [
            // Laki-Laki (0-60 Bulan)
            [0, 'L', 3.30, 2.90, 2.50, 2.10, 3.90, 4.40, 5.00], [1, 'L', 4.50, 3.90, 3.40, 2.90, 5.10, 5.80, 6.60],
            [2, 'L', 5.60, 4.90, 4.30, 3.80, 6.30, 7.10, 8.00], [3, 'L', 6.40, 5.70, 5.00, 4.40, 7.20, 8.00, 9.00],
            [4, 'L', 7.00, 6.20, 5.60, 4.90, 7.80, 8.70, 9.70], [5, 'L', 7.50, 6.70, 6.00, 5.30, 8.40, 9.30, 10.40],
            [6, 'L', 7.90, 7.10, 6.40, 5.70, 8.80, 9.80, 10.90], [7, 'L', 8.30, 7.40, 6.70, 5.90, 9.20, 10.30, 11.40],
            [8, 'L', 8.60, 7.70, 6.90, 6.20, 9.60, 10.70, 11.90], [9, 'L', 8.90, 8.00, 7.10, 6.40, 9.90, 11.00, 12.30],
            [10, 'L', 9.20, 8.20, 7.40, 6.60, 10.20, 11.40, 12.70], [11, 'L', 9.40, 8.40, 7.60, 6.80, 10.50, 11.70, 13.00],
            [12, 'L', 9.60, 8.60, 7.70, 6.90, 10.80, 12.00, 13.30], [13, 'L', 9.90, 8.80, 7.90, 7.10, 11.00, 12.30, 13.70],
            [14, 'L', 10.10, 9.00, 8.10, 7.20, 11.30, 12.60, 14.00], [15, 'L', 10.30, 9.20, 8.30, 7.40, 11.50, 12.80, 14.30],
            [16, 'L', 10.50, 9.40, 8.40, 7.50, 11.70, 13.10, 14.60], [17, 'L', 10.70, 9.60, 8.60, 7.70, 12.00, 13.40, 14.90],
            [18, 'L', 10.90, 9.80, 8.80, 7.80, 12.20, 13.70, 15.30], [19, 'L', 11.10, 10.00, 8.90, 8.00, 12.50, 13.90, 15.60],
            [20, 'L', 11.30, 10.10, 9.10, 8.10, 12.70, 14.20, 15.90], [21, 'L', 11.50, 10.30, 9.20, 8.20, 12.90, 14.50, 16.20],
            [22, 'L', 11.80, 10.50, 9.40, 8.40, 13.20, 14.70, 16.50], [23, 'L', 12.00, 10.70, 9.50, 8.50, 13.40, 15.00, 16.80],
            [24, 'L', 12.20, 10.80, 9.70, 8.60, 13.60, 15.30, 17.10], [25, 'L', 12.40, 11.00, 9.80, 8.80, 13.90, 15.50, 17.50],
            [26, 'L', 12.50, 11.20, 10.00, 8.90, 14.10, 15.80, 17.80], [27, 'L', 12.70, 11.30, 10.10, 9.00, 14.30, 16.10, 18.10],
            [28, 'L', 12.90, 11.50, 10.20, 9.10, 14.50, 16.30, 18.40], [29, 'L', 13.10, 11.70, 10.40, 9.20, 14.80, 16.60, 18.70],
            [30, 'L', 13.30, 11.80, 10.50, 9.40, 15.00, 16.90, 19.00], [31, 'L', 13.50, 12.00, 10.70, 9.50, 15.20, 17.10, 19.30],
            [32, 'L', 13.70, 12.10, 10.80, 9.60, 15.40, 17.40, 19.60], [33, 'L', 13.80, 12.30, 10.90, 9.70, 15.60, 17.60, 19.90],
            [34, 'L', 14.00, 12.40, 11.00, 9.80, 15.80, 17.80, 20.20], [35, 'L', 14.20, 12.60, 11.20, 9.90, 16.00, 18.10, 20.40],
            [36, 'L', 14.30, 12.70, 11.30, 10.00, 16.20, 18.30, 20.70], [37, 'L', 14.50, 12.90, 11.40, 10.10, 16.40, 18.60, 21.00],
            [38, 'L', 14.70, 13.00, 11.50, 10.20, 16.60, 18.80, 21.30], [39, 'L', 14.80, 13.10, 11.60, 10.30, 16.80, 19.00, 21.60],
            [40, 'L', 15.00, 13.30, 11.80, 10.40, 17.00, 19.30, 21.90], [41, 'L', 15.20, 13.40, 11.90, 10.50, 17.20, 19.50, 22.10],
            [42, 'L', 15.30, 13.60, 12.00, 10.60, 17.40, 19.70, 22.40], [43, 'L', 15.50, 13.70, 12.10, 10.70, 17.60, 20.00, 22.70],
            [44, 'L', 15.70, 13.80, 12.20, 10.80, 17.80, 20.20, 23.00], [45, 'L', 15.80, 14.00, 12.40, 10.90, 18.00, 20.50, 23.30],
            [46, 'L', 16.00, 14.10, 12.50, 11.00, 18.20, 20.70, 23.60], [47, 'L', 16.20, 14.30, 12.60, 11.10, 18.40, 20.90, 23.90],
            [48, 'L', 16.30, 14.40, 12.70, 11.20, 18.60, 21.20, 24.20], [49, 'L', 16.50, 14.50, 12.80, 11.30, 18.80, 21.40, 24.50],
            [50, 'L', 16.70, 14.70, 12.90, 11.40, 19.00, 21.70, 24.80], [51, 'L', 16.80, 14.80, 13.10, 11.50, 19.20, 21.90, 25.10],
            [52, 'L', 17.00, 15.00, 13.20, 11.60, 19.40, 22.20, 25.40], [53, 'L', 17.20, 15.10, 13.30, 11.70, 19.60, 22.40, 25.70],
            [54, 'L', 17.30, 15.20, 13.40, 11.80, 19.80, 22.70, 26.00], [55, 'L', 17.50, 15.40, 13.50, 11.90, 20.00, 22.90, 26.30],
            [56, 'L', 17.70, 15.50, 13.60, 12.00, 20.20, 23.20, 26.60], [57, 'L', 17.80, 15.60, 13.70, 12.10, 20.40, 23.40, 26.90],
            [58, 'L', 18.00, 15.80, 13.80, 12.20, 20.60, 23.70, 27.20], [59, 'L', 18.20, 15.90, 14.00, 12.30, 20.80, 23.90, 27.60],
            [60, 'L', 18.30, 16.00, 14.10, 12.40, 21.00, 24.20, 27.90],
            
            // Perempuan (0-60 Bulan)
            [0, 'P', 3.20, 2.80, 2.40, 2.00, 3.70, 4.20, 4.80], [1, 'P', 4.20, 3.60, 3.20, 2.70, 4.80, 5.50, 6.20],
            [2, 'P', 5.10, 4.50, 3.90, 3.40, 5.80, 6.60, 7.50], [3, 'P', 5.80, 5.20, 4.50, 4.00, 6.60, 7.50, 8.50],
            [4, 'P', 6.40, 5.70, 5.00, 4.40, 7.30, 8.20, 9.30], [5, 'P', 6.90, 6.10, 5.40, 4.80, 7.80, 8.80, 10.00],
            [6, 'P', 7.30, 6.50, 5.70, 5.10, 8.20, 9.30, 10.60], [7, 'P', 7.60, 6.80, 6.00, 5.30, 8.60, 9.80, 11.10],
            [8, 'P', 7.90, 7.00, 6.30, 5.60, 9.00, 10.20, 11.60], [9, 'P', 8.20, 7.30, 6.50, 5.80, 9.30, 10.50, 12.00],
            [10, 'P', 8.50, 7.50, 6.70, 5.90, 9.60, 10.90, 12.40], [11, 'P', 8.70, 7.70, 6.90, 6.10, 9.90, 11.20, 12.80],
            [12, 'P', 8.90, 7.90, 7.00, 6.30, 10.10, 11.50, 13.10], [13, 'P', 9.20, 8.10, 7.20, 6.40, 10.40, 11.80, 13.50],
            [14, 'P', 9.40, 8.30, 7.40, 6.60, 10.60, 12.10, 13.80], [15, 'P', 9.60, 8.50, 7.60, 6.70, 10.90, 12.40, 14.10],
            [16, 'P', 9.80, 8.70, 7.70, 6.90, 11.10, 12.60, 14.50], [17, 'P', 10.00, 8.90, 7.90, 7.00, 11.40, 12.90, 14.80],
            [18, 'P', 10.20, 9.10, 8.10, 7.20, 11.60, 13.20, 15.10], [19, 'P', 10.40, 9.20, 8.20, 7.30, 11.80, 13.50, 15.40],
            [20, 'P', 10.60, 9.40, 8.40, 7.50, 12.10, 13.70, 15.70], [21, 'P', 10.90, 9.60, 8.60, 7.60, 12.30, 14.00, 16.00],
            [22, 'P', 11.10, 9.80, 8.70, 7.80, 12.50, 14.30, 16.40], [23, 'P', 11.30, 10.00, 8.90, 7.90, 12.80, 14.60, 16.70],
            [24, 'P', 11.50, 10.20, 9.00, 8.10, 13.00, 14.80, 17.00], [25, 'P', 11.70, 10.30, 9.20, 8.20, 13.30, 15.10, 17.30],
            [26, 'P', 11.90, 10.50, 9.40, 8.40, 13.50, 15.40, 17.70], [27, 'P', 12.10, 10.70, 9.50, 8.50, 13.70, 15.70, 18.00],
            [28, 'P', 12.30, 10.90, 9.70, 8.60, 14.00, 16.00, 18.30], [29, 'P', 12.50, 11.10, 9.80, 8.80, 14.20, 16.20, 18.70],
            [30, 'P', 12.70, 11.20, 10.00, 8.90, 14.40, 16.50, 19.00], [31, 'P', 12.90, 11.40, 10.10, 9.00, 14.70, 16.80, 19.30],
            [32, 'P', 13.10, 11.60, 10.30, 9.10, 14.90, 17.10, 19.60], [33, 'P', 13.30, 11.70, 10.40, 9.30, 15.10, 17.30, 20.00],
            [34, 'P', 13.50, 11.90, 10.50, 9.40, 15.40, 17.60, 20.30], [35, 'P', 13.70, 12.00, 10.70, 9.50, 15.60, 17.90, 20.60],
            [36, 'P', 13.90, 12.20, 10.80, 9.60, 15.80, 18.10, 20.90], [37, 'P', 14.00, 12.40, 10.90, 9.70, 16.00, 18.40, 21.30],
            [38, 'P', 14.20, 12.50, 11.10, 9.80, 16.30, 18.70, 21.60], [39, 'P', 14.40, 12.70, 11.20, 9.90, 16.50, 19.00, 22.00],
            [40, 'P', 14.60, 12.80, 11.30, 10.10, 16.70, 19.20, 22.30], [41, 'P', 14.80, 13.00, 11.50, 10.20, 16.90, 19.50, 22.70],
            [42, 'P', 15.00, 13.10, 11.60, 10.30, 17.20, 19.80, 23.00], [43, 'P', 15.20, 13.30, 11.70, 10.40, 17.40, 20.10, 23.40],
            [44, 'P', 15.30, 13.40, 11.80, 10.50, 17.60, 20.40, 23.70], [45, 'P', 15.50, 13.60, 12.00, 10.60, 17.80, 20.70, 24.10],
            [46, 'P', 15.70, 13.70, 12.10, 10.70, 18.10, 20.90, 24.50], [47, 'P', 15.90, 13.90, 12.20, 10.80, 18.30, 21.20, 24.80],
            [48, 'P', 16.10, 14.00, 12.30, 10.90, 18.50, 21.50, 25.20], [49, 'P', 16.30, 14.20, 12.40, 11.00, 18.80, 21.80, 25.50],
            [50, 'P', 16.40, 14.30, 12.60, 11.10, 19.00, 22.10, 25.90], [51, 'P', 16.60, 14.50, 12.70, 11.20, 19.20, 22.40, 26.30],
            [52, 'P', 16.80, 14.60, 12.80, 11.30, 19.40, 22.60, 26.60], [53, 'P', 17.00, 14.80, 12.90, 11.40, 19.70, 22.90, 27.00],
            [54, 'P', 17.20, 14.90, 13.00, 11.50, 19.90, 23.20, 27.40], [55, 'P', 17.30, 15.10, 13.20, 11.60, 20.10, 23.50, 27.70],
            [56, 'P', 17.50, 15.20, 13.30, 11.70, 20.30, 23.80, 28.10], [57, 'P', 17.70, 15.30, 13.40, 11.80, 20.60, 24.10, 28.50],
            [58, 'P', 17.90, 15.50, 13.50, 11.90, 20.80, 24.40, 28.80], [59, 'P', 18.00, 15.60, 13.60, 12.00, 21.00, 24.60, 29.20],
            [60, 'P', 18.20, 15.80, 13.70, 12.10, 21.20, 24.90, 29.50]
        ];

        $insertStandarBerat = [];
        foreach ($rawStandarBerat as $row) {
            $insertStandarBerat[] = [
                'usia_bulan' => $row[0],
                'jenis_kelamin' => $row[1],
                'median' => $row[2],
                'sd_minus_1' => $row[3],
                'sd_minus_2' => $row[4],
                'sd_minus_3' => $row[5],
                'sd_plus_1' => $row[6],
                'sd_plus_2' => $row[7],
                'sd_plus_3' => $row[8],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('standar_berat')->insert($insertStandarBerat);


        // ==========================================
        // 3. SEEDER STANDAR TINGGI (LENGKAP 0-60 BULAN)
        // ==========================================
        // [usia_bulan, jenis_kelamin, median, sd-1, sd-2, sd-3, sd+1, sd+2, sd+3]
        $rawStandarTinggi = [
            // Laki-Laki (0-60 Bulan)
            [0, 'L', 49.90, 48.00, 46.10, 44.20, 51.80, 53.70, 55.60], [1, 'L', 54.70, 52.80, 50.80, 48.90, 56.70, 58.60, 60.60],
            [2, 'L', 58.40, 56.40, 54.40, 52.40, 60.40, 62.40, 64.40], [3, 'L', 61.40, 59.40, 57.30, 55.30, 63.50, 65.50, 67.60],
            [4, 'L', 63.90, 61.80, 59.70, 57.60, 66.00, 68.00, 70.10], [5, 'L', 65.90, 63.80, 61.70, 59.60, 68.00, 70.10, 72.20],
            [6, 'L', 67.60, 65.50, 63.30, 61.20, 69.80, 71.90, 74.00], [7, 'L', 69.20, 67.00, 64.80, 62.70, 71.30, 73.50, 75.70],
            [8, 'L', 70.60, 68.40, 66.20, 64.00, 72.80, 75.00, 77.20], [9, 'L', 72.00, 69.70, 67.50, 65.20, 74.20, 76.50, 78.70],
            [10, 'L', 73.30, 71.00, 68.70, 66.40, 75.60, 77.90, 80.10], [11, 'L', 74.50, 72.20, 69.90, 67.60, 76.90, 79.20, 81.50],
            [12, 'L', 75.70, 73.40, 71.00, 68.60, 78.10, 80.50, 82.90], [13, 'L', 76.90, 74.50, 72.10, 69.60, 79.30, 81.80, 84.20],
            [14, 'L', 78.00, 75.60, 73.10, 70.60, 80.50, 83.00, 85.50], [15, 'L', 79.10, 76.60, 74.10, 71.60, 81.70, 84.20, 86.70],
            [16, 'L', 80.20, 77.60, 75.00, 72.50, 82.80, 85.40, 88.00], [17, 'L', 81.20, 78.60, 76.00, 73.30, 83.90, 86.50, 89.20],
            [18, 'L', 82.30, 79.60, 76.90, 74.20, 85.00, 87.70, 90.40], [19, 'L', 83.20, 80.50, 77.70, 75.00, 86.00, 88.80, 91.50],
            [20, 'L', 84.20, 81.40, 78.60, 75.80, 87.00, 89.80, 92.60], [21, 'L', 85.10, 82.30, 79.40, 76.50, 88.00, 90.90, 93.80],
            [22, 'L', 86.00, 83.10, 80.20, 77.20, 89.00, 91.90, 94.90], [23, 'L', 86.90, 83.90, 81.00, 78.00, 89.90, 92.90, 95.90],
            [24, 'L', 87.80, 84.80, 81.70, 78.70, 90.90, 93.90, 97.00], [25, 'L', 88.00, 84.90, 81.70, 78.60, 91.10, 94.20, 97.30],
            [26, 'L', 88.80, 85.60, 82.50, 79.30, 92.00, 95.20, 98.30], [27, 'L', 89.60, 86.40, 83.10, 79.90, 92.90, 96.10, 99.30],
            [28, 'L', 90.40, 87.10, 83.80, 80.50, 93.70, 97.00, 100.30], [29, 'L', 91.20, 87.80, 84.50, 81.10, 94.50, 97.90, 101.20],
            [30, 'L', 91.90, 88.50, 85.10, 81.70, 95.30, 98.70, 102.10], [31, 'L', 92.70, 89.20, 85.70, 82.30, 96.10, 99.60, 103.00],
            [32, 'L', 93.40, 89.90, 86.40, 82.80, 96.90, 100.40, 103.90], [33, 'L', 94.10, 90.50, 86.90, 83.40, 97.60, 101.20, 104.80],
            [34, 'L', 94.80, 91.10, 87.50, 83.90, 98.40, 102.00, 105.60], [35, 'L', 95.40, 91.80, 88.10, 84.40, 99.10, 102.70, 106.40],
            [36, 'L', 96.10, 92.40, 88.70, 85.00, 99.80, 103.50, 107.20], [37, 'L', 96.70, 93.00, 89.20, 85.50, 100.50, 104.20, 108.00],
            [38, 'L', 97.40, 93.60, 89.80, 86.00, 101.20, 105.00, 108.80], [39, 'L', 98.00, 94.20, 90.30, 86.50, 101.80, 105.70, 109.50],
            [40, 'L', 98.60, 94.70, 90.90, 87.00, 102.50, 106.40, 110.30], [41, 'L', 99.20, 95.30, 91.40, 87.50, 103.20, 107.10, 111.00],
            [42, 'L', 99.90, 95.90, 91.90, 88.00, 103.80, 107.80, 111.70], [43, 'L', 100.40, 96.40, 92.40, 88.40, 104.50, 108.50, 112.50],
            [44, 'L', 101.00, 97.00, 93.00, 88.90, 105.10, 109.10, 113.20], [45, 'L', 101.60, 97.50, 93.50, 89.40, 105.70, 109.80, 113.90],
            [46, 'L', 102.20, 98.10, 94.00, 89.80, 106.30, 110.40, 114.60], [47, 'L', 102.80, 98.60, 94.40, 90.30, 106.90, 111.10, 115.20],
            [48, 'L', 103.30, 99.10, 94.90, 90.70, 107.50, 111.70, 115.90], [49, 'L', 103.90, 99.70, 95.40, 91.20, 108.10, 112.40, 116.60],
            [50, 'L', 104.40, 100.20, 95.90, 91.60, 108.70, 113.00, 117.30], [51, 'L', 105.00, 100.70, 96.40, 92.10, 109.30, 113.60, 117.90],
            [52, 'L', 105.60, 101.20, 96.90, 92.50, 109.90, 114.20, 118.60], [53, 'L', 106.10, 101.70, 97.40, 93.00, 110.50, 114.90, 119.20],
            [54, 'L', 106.70, 102.30, 97.80, 93.40, 111.10, 115.50, 119.90], [55, 'L', 107.20, 102.80, 98.30, 93.90, 111.70, 116.10, 120.60],
            [56, 'L', 107.80, 103.30, 98.80, 94.30, 112.30, 116.70, 121.20], [57, 'L', 108.30, 103.80, 99.30, 94.70, 112.80, 117.40, 121.90],
            [58, 'L', 108.90, 104.30, 99.70, 95.20, 113.40, 118.00, 122.60], [59, 'L', 109.40, 104.80, 100.20, 95.60, 114.00, 118.60, 123.20],
            [60, 'L', 110.00, 105.30, 100.70, 96.10, 114.60, 119.20, 123.90],

            // Perempuan (0-60 Bulan)
            [0, 'P', 49.10, 47.30, 45.40, 43.60, 51.00, 52.90, 54.70], [1, 'P', 53.70, 51.70, 49.80, 47.80, 55.60, 57.60, 59.50],
            [2, 'P', 57.10, 55.00, 53.00, 51.00, 59.10, 61.10, 63.20], [3, 'P', 59.80, 57.70, 55.60, 53.50, 61.90, 64.00, 66.10],
            [4, 'P', 62.10, 59.90, 57.80, 55.60, 64.30, 66.40, 68.60], [5, 'P', 64.00, 61.80, 59.60, 57.40, 66.20, 68.50, 70.70],
            [6, 'P', 65.70, 63.50, 61.20, 58.90, 68.00, 70.30, 72.50], [7, 'P', 67.30, 65.00, 62.70, 60.30, 69.60, 71.90, 74.20],
            [8, 'P', 68.70, 66.40, 64.00, 61.70, 71.10, 73.50, 75.80], [9, 'P', 70.10, 67.70, 65.30, 62.90, 72.60, 75.00, 77.40],
            [10, 'P', 71.50, 69.00, 66.50, 64.10, 73.90, 76.40, 78.90], [11, 'P', 72.80, 70.30, 67.70, 65.20, 75.30, 77.80, 80.30],
            [12, 'P', 74.00, 71.40, 68.90, 66.30, 76.60, 79.20, 81.70], [13, 'P', 75.20, 72.60, 70.00, 67.30, 77.80, 80.50, 83.10],
            [14, 'P', 76.40, 73.70, 71.00, 68.30, 79.10, 81.70, 84.40], [15, 'P', 77.50, 74.80, 72.00, 69.30, 80.20, 83.00, 85.70],
            [16, 'P', 78.60, 75.80, 73.00, 70.20, 81.40, 84.20, 87.00], [17, 'P', 79.70, 76.80, 74.00, 71.10, 82.50, 85.40, 88.20],
            [18, 'P', 80.70, 77.80, 74.90, 72.00, 83.60, 86.50, 89.40], [19, 'P', 81.70, 78.80, 75.80, 72.80, 84.70, 87.60, 90.60],
            [20, 'P', 82.70, 79.70, 76.70, 73.70, 85.70, 88.70, 91.70], [21, 'P', 83.70, 80.60, 77.50, 74.50, 86.70, 89.80, 92.90],
            [22, 'P', 84.60, 81.50, 78.40, 75.20, 87.70, 90.80, 94.00], [23, 'P', 85.50, 82.30, 79.20, 76.00, 88.70, 91.90, 95.00],
            [24, 'P', 86.40, 83.20, 80.00, 76.70, 89.60, 92.90, 96.10], [25, 'P', 86.60, 83.30, 80.00, 76.80, 89.90, 93.10, 96.40],
            [26, 'P', 87.40, 84.10, 80.80, 77.50, 90.80, 94.10, 97.40], [27, 'P', 88.30, 84.90, 81.50, 78.10, 91.70, 95.00, 98.40],
            [28, 'P', 89.10, 85.70, 82.20, 78.80, 92.50, 96.00, 99.40], [29, 'P', 89.90, 86.40, 82.90, 79.50, 93.40, 96.90, 100.30],
            [30, 'P', 90.70, 87.10, 83.60, 80.10, 94.20, 97.70, 101.30], [31, 'P', 91.40, 87.90, 84.30, 80.70, 95.00, 98.60, 102.20],
            [32, 'P', 92.20, 88.60, 84.90, 81.30, 95.80, 99.40, 103.10], [33, 'P', 92.90, 89.30, 85.60, 81.90, 96.60, 100.30, 103.90],
            [34, 'P', 93.60, 89.90, 86.20, 82.50, 97.40, 101.10, 104.80], [35, 'P', 94.40, 90.60, 86.80, 83.10, 98.10, 101.90, 105.60],
            [36, 'P', 95.10, 91.20, 87.40, 83.60, 98.90, 102.70, 106.50], [37, 'P', 95.70, 91.90, 88.00, 84.20, 99.60, 103.40, 107.30],
            [38, 'P', 96.40, 92.50, 88.60, 84.70, 100.30, 104.20, 108.10], [39, 'P', 97.10, 93.10, 89.20, 85.30, 101.00, 105.00, 108.90],
            [40, 'P', 97.70, 93.80, 89.80, 85.80, 101.70, 105.70, 109.70], [41, 'P', 98.40, 94.40, 90.40, 86.30, 102.40, 106.40, 110.50],
            [42, 'P', 99.00, 95.00, 90.90, 86.80, 103.10, 107.20, 111.20], [43, 'P', 99.70, 95.60, 91.50, 87.40, 103.80, 107.90, 112.00],
            [44, 'P', 100.30, 96.20, 92.00, 87.90, 104.50, 108.60, 112.70], [45, 'P', 100.90, 96.70, 92.50, 88.40, 105.10, 109.30, 113.50],
            [46, 'P', 101.50, 97.30, 93.10, 88.90, 105.80, 110.00, 114.20], [47, 'P', 102.10, 97.90, 93.60, 89.30, 106.40, 110.70, 114.90],
            [48, 'P', 102.70, 98.40, 94.10, 89.80, 107.00, 111.30, 115.70], [49, 'P', 103.30, 99.00, 94.60, 90.30, 107.70, 112.00, 116.40],
            [50, 'P', 103.90, 99.50, 95.10, 90.70, 108.30, 112.70, 117.10], [51, 'P', 104.50, 100.10, 95.60, 91.20, 108.90, 113.30, 117.70],
            [52, 'P', 105.00, 100.60, 96.10, 91.70, 109.50, 114.00, 118.40], [53, 'P', 105.60, 101.10, 96.60, 92.10, 110.10, 114.60, 119.10],
            [54, 'P', 106.20, 101.60, 97.10, 92.60, 110.70, 115.20, 119.80], [55, 'P', 106.70, 102.20, 97.60, 93.00, 111.30, 115.90, 120.40],
            [56, 'P', 107.30, 102.70, 98.10, 93.40, 111.90, 116.50, 121.10], [57, 'P', 107.80, 103.20, 98.50, 93.90, 112.50, 117.10, 121.80],
            [58, 'P', 108.40, 103.70, 99.00, 94.30, 113.00, 117.70, 122.40], [59, 'P', 108.90, 104.20, 99.50, 94.70, 113.60, 118.30, 123.10],
            [60, 'P', 109.40, 104.70, 99.90, 95.20, 114.20, 118.90, 123.70]
        ];

        $insertStandarTinggi = [];
        foreach ($rawStandarTinggi as $row) {
            $insertStandarTinggi[] = [
                'usia_bulan' => $row[0],
                'jenis_kelamin' => $row[1],
                'median' => $row[2],
                'sd_minus_1' => $row[3],
                'sd_minus_2' => $row[4],
                'sd_minus_3' => $row[5],
                'sd_plus_1' => $row[6],
                'sd_plus_2' => $row[7],
                'sd_plus_3' => $row[8],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        DB::table('standar_tinggi')->insert($insertStandarTinggi);
    }
}