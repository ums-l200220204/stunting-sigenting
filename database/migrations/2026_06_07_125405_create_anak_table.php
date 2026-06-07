<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anak', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->string('nama_anak',100);

            $table->date('tanggal_lahir');

            $table->integer('usia_bulan')->nullable();

            $table->enum('jenis_kelamin',['L','P']);

            $table->timestamp('created_at')
                ->nullable()
                ->useCurrent();

            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrent()
                ->useCurrentOnUpdate();

            $table->index('user_id','fk_anak_user');

            $table->foreign('user_id','fk_anak_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};