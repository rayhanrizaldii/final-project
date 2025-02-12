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
        Schema::create('coa', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->integer('kode');
            $table->string('nama');
            $table->uuid('kategori_coa_id');
            $table->foreign('kategori_coa_id')->references('id')->on('kategori_coa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('coa');
    }
};
