<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
     Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('jenis_kelamin', 100);
            $table->string('wa', 100);
            $table->string('alamat', 100);
            $table->BigInteger('buku_id')->index();
            $table->dateTime('tanggal_pinjam');
            $table->dateTime('tanggal_pengembalian');
            $table->string('status', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
