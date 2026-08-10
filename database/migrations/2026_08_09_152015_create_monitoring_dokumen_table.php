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
        Schema::create('monitoring_dokumen', function (Blueprint $table) {
            $table->id();
            $table->integer('pegawai_id')->nullable();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->integer('jabatan_fungsional_id');
            $table->string('unit_kerja')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('status')->default('Belum Diproses');
            $table->text('catatan')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status'], 'mon_status_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_dokumen');
    }
};