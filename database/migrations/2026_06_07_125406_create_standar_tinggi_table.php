<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('standar_tinggi', function (Blueprint $table) {

            $table->id();

            $table->integer('usia_bulan');

            $table->enum('jenis_kelamin',['L','P']);

            $table->decimal('median',5,2);

            $table->decimal('sd_minus_1',5,2);
            $table->decimal('sd_minus_2',5,2);
            $table->decimal('sd_minus_3',5,2);

            $table->decimal('sd_plus_1',5,2);
            $table->decimal('sd_plus_2',5,2);
            $table->decimal('sd_plus_3',5,2);

            $table->timestamp('created_at')->nullable();

            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('standar_tinggi');
    }
};