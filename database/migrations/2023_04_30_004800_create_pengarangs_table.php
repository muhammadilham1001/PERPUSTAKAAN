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
        Schema::create('pengarang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pengarang_id')->index();
            $table->string('jenis_kelamin', 100);
            $table->string('alamat', 100);
            $table->string('karya_pengarang', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengarang');
    }
};
