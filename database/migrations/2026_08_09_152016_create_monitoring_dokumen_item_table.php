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
        Schema::create('monitoring_dokumen_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('monitoring_id');
            $table->integer('persyaratan_id');
            $table->string('nama_dokumen');
            $table->boolean('wajib')->default(true);
            $table->string('status')->default('Belum Ada');
            $table->string('file_path')->nullable();
            $table->string('link')->nullable();
            $table->text('catatan')->nullable();
            $table->unsignedInteger('verified_by')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            $table->foreign('monitoring_id', 'mdi_mon_fk')
                  ->references('id')
                  ->on('monitoring_dokumen')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_dokumen_item');
    }
};