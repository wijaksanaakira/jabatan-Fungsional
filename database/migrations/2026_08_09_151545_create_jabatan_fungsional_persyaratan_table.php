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
        Schema::create('jabatan_fungsional_persyaratan', function (Blueprint $table) {
            $table->id();
            $table->integer('jabatan_fungsional_id');
            $table->integer('persyaratan_id'); // maps to dokumen.id
            $table->boolean('wajib')->default(true);
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->unique(['jabatan_fungsional_id', 'persyaratan_id'], 'jf_persyaratan_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan_fungsional_persyaratan');
    }
};