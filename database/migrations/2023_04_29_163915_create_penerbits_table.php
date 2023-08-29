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
        Schema::create('penerbit', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('penerbit_id')->index();
            $table->string('terbitan_populer', 100);
            $table->string('alamat', 100);
            $table->string('no_telepon', 14);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerbit');
    }
};
