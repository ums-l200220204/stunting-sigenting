<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('anak_id');

            $table->unsignedBigInteger('pertumbuhan_id');

            $table->date('tanggal_laporan');

            $table->string('hasil_status',50)->nullable();

            $table->text('catatan')->nullable();

            $table->timestamp('created_at')
                ->nullable()
                ->useCurrent();

            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->index('anak_id','fk_laporan_anak');

            $table->index(
                'pertumbuhan_id',
                'fk_laporan_pertumbuhan'
            );

            $table->foreign(
                'anak_id',
                'fk_laporan_anak'
            )
            ->references('id')
            ->on('anak')
            ->onDelete('cascade');

            $table->foreign(
                'pertumbuhan_id',
                'fk_laporan_pertumbuhan'
            )
            ->references('id')
            ->on('data_pertumbuhan')
            ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};