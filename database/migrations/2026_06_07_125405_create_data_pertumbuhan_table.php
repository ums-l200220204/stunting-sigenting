<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_pertumbuhan', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('anak_id');

            $table->date('tanggal_pengukuran');

            $table->integer('usia_bulan');

            $table->decimal('berat_badan',5,2);

            $table->decimal('tinggi_badan',5,2);

            $table->decimal('z_score',5,2)->nullable();

            $table->string('status_gizi',50)->nullable();

            $table->timestamp('created_at')
                ->nullable()
                ->useCurrent();

            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->index('anak_id','fk_pertumbuhan_anak');

            $table->foreign('anak_id','fk_pertumbuhan_anak')
                ->references('id')
                ->on('anak')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_pertumbuhan');
    }
};