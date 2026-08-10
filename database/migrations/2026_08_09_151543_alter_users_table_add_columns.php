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
        Schema::table('user', function (Blueprint $table) {
            if (!Schema::hasColumn('user', 'email')) {
                $table->string('email')->nullable()->after('nama')->unique();
            }
            if (!Schema::hasColumn('user', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('auth_act');
            }
            if (!Schema::hasColumn('user', 'last_login_at')) {
                $table->timestamp('last_login_at')->nullable();
            }
            if (!Schema::hasColumn('user', 'last_login_ip')) {
                $table->string('last_login_ip', 45)->nullable();
            }
            if (!Schema::hasColumn('user', 'remember_token')) {
                $table->rememberToken();
            }
            if (!Schema::hasColumn('user', 'created_at')) {
                $table->timestamps();
            }
            if (!Schema::hasColumn('user', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        // Other tables
        Schema::table('jabatan_fungsional', function (Blueprint $table) {
            if (!Schema::hasColumn('jabatan_fungsional', 'status')) {
                $table->string('status')->default('Aktif')->after('nama');
            }
            if (!Schema::hasColumn('jabatan_fungsional', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('status');
            }
            if (!Schema::hasColumn('jabatan_fungsional', 'created_by')) {
                $table->unsignedInteger('created_by')->nullable();
            }
            if (!Schema::hasColumn('jabatan_fungsional', 'updated_by')) {
                $table->unsignedInteger('updated_by')->nullable();
            }
            if (!Schema::hasColumn('jabatan_fungsional', 'created_at')) {
                $table->timestamps();
            }
        });

        Schema::table('dokumen_jabatan_fungsional', function (Blueprint $table) {
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'jenis_dokumen_id')) {
                $table->unsignedBigInteger('jenis_dokumen_id')->nullable()->after('id_jabatan_fungsional');
            }
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'keterangan')) {
                $table->text('keterangan')->nullable();
            }
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'status')) {
                $table->string('status')->default('Aktif');
            }
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'file_path')) {
                $table->string('file_path')->nullable();
            }
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'created_by')) {
                $table->unsignedInteger('created_by')->nullable();
            }
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'updated_by')) {
                $table->unsignedInteger('updated_by')->nullable();
            }
            if (!Schema::hasColumn('dokumen_jabatan_fungsional', 'created_at')) {
                $table->timestamps();
            }
        });

        Schema::table('dokumen', function (Blueprint $table) {
            if (!Schema::hasColumn('dokumen', 'kategori')) {
                $table->string('kategori')->nullable()->after('nama_file');
            }
            if (!Schema::hasColumn('dokumen', 'file_path')) {
                $table->string('file_path')->nullable()->after('link');
            }
            if (!Schema::hasColumn('dokumen', 'keterangan')) {
                $table->text('keterangan')->nullable()->after('file_path');
            }
            if (!Schema::hasColumn('dokumen', 'status')) {
                $table->string('status')->default('Aktif')->after('keterangan');
            }
            if (!Schema::hasColumn('dokumen', 'urutan')) {
                $table->integer('urutan')->default(0)->after('status');
            }
            if (!Schema::hasColumn('dokumen', 'created_by')) {
                $table->unsignedInteger('created_by')->nullable();
            }
            if (!Schema::hasColumn('dokumen', 'updated_by')) {
                $table->unsignedInteger('updated_by')->nullable();
            }
            if (!Schema::hasColumn('dokumen', 'updated_at')) {
                $table->timestamp('updated_at')->nullable();
            }
            if (!Schema::hasColumn('dokumen', 'deleted_at')) {
                $table->softDeletes();
            }
        });

        Schema::table('pegawai', function (Blueprint $table) {
            if (!Schema::hasColumn('pegawai', 'jabatan_fungsional_id')) {
                $table->integer('jabatan_fungsional_id')->nullable();
            }
            if (!Schema::hasColumn('pegawai', 'unit_kerja')) {
                $table->string('unit_kerja')->nullable();
            }
            if (!Schema::hasColumn('pegawai', 'nomor_hp')) {
                $table->string('nomor_hp')->nullable();
            }
            if (!Schema::hasColumn('pegawai', 'email')) {
                $table->string('email')->nullable();
            }
            if (!Schema::hasColumn('pegawai', 'status')) {
                $table->string('status')->default('Aktif');
            }
            if (!Schema::hasColumn('pegawai', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Don't drop these as it might destroy existing data unexpectedly if rolled back in production
    }
};