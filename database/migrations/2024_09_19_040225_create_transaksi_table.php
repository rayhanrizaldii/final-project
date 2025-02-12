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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('tahun_id');
            $table->foreign('tahun_id')->references('id')->on('periode')->onDelete('cascade');
            $table->uuid('coa_id');
            $table->foreign('coa_id')->references('id')->on('coa')->onDelete('cascade');
            $table->integer('debit');
            $table->integer('kredit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
