<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();

            $table->string('nama',100);

            $table->string('email',100)->unique('email');

            $table->string('nomor_hp',20)->nullable();

            $table->text('alamat')->nullable();

            $table->string('password');

            $table->rememberToken();

            $table->enum('role',[
                'admin',
                'kader',
                'orang_tua'
            ]);

            $table->timestamp('created_at')
                ->nullable()
                ->useCurrent();

            $table->timestamp('updated_at')
                ->nullable()
                ->useCurrent()
                ->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};