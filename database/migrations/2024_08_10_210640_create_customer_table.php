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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sales');
            $table->unsignedBigInteger('id_paket');
            $table->string('nama_customer', 50);
            $table->date('tgl_gabung');
            $table->timestamps();

            $table->foreign('id_sales')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('id_paket')->references('id')->on('paket_layanan')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
