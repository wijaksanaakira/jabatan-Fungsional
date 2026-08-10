<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisDokumen = [
            ['nama' => 'Dasar Hukum', 'slug' => Str::slug('Dasar Hukum'), 'keterangan' => 'Dokumen dasar hukum jabatan'],
            ['nama' => 'Peraturan', 'slug' => Str::slug('Peraturan'), 'keterangan' => 'Peraturan terkait jabatan'],
            ['nama' => 'Tunjangan Fungsional', 'slug' => Str::slug('Tunjangan Fungsional'), 'keterangan' => 'Dokumen tunjangan fungsional'],
            ['nama' => 'Petunjuk Teknis', 'slug' => Str::slug('Petunjuk Teknis'), 'keterangan' => 'Petunjuk teknis pelaksanaan tugas'],
            ['nama' => 'Persyaratan', 'slug' => Str::slug('Persyaratan'), 'keterangan' => 'Dokumen persyaratan'],
            ['nama' => 'Surat', 'slug' => Str::slug('Surat'), 'keterangan' => 'Surat-menyurat'],
            ['nama' => 'Panduan', 'slug' => Str::slug('Panduan'), 'keterangan' => 'Panduan kerja'],
            ['nama' => 'Lainnya', 'slug' => Str::slug('Lainnya'), 'keterangan' => 'Dokumen lainnya'],
        ];

        foreach ($jenisDokumen as $jenis) {
            DB::table('jenis_dokumen')->updateOrInsert(
                ['slug' => $jenis['slug']],
                $jenis
            );
        }

        $settings = [
            ['key' => 'app_name', 'value' => 'Sistem Informasi Jabatan Fungsional', 'type' => 'string', 'group' => 'general', 'label' => 'Nama Aplikasi'],
            ['key' => 'instansi_name', 'value' => 'Pemerintah', 'type' => 'string', 'group' => 'general', 'label' => 'Nama Instansi'],
            ['key' => 'qr_login_enabled', 'value' => 'true', 'type' => 'boolean', 'group' => 'auth', 'label' => 'QR Login Enabled'],
            ['key' => 'qr_default_expiry', 'value' => '30', 'type' => 'integer', 'group' => 'auth', 'label' => 'QR Default Expiry (Days)'],
            ['key' => 'items_per_page', 'value' => '10', 'type' => 'integer', 'group' => 'ui', 'label' => 'Items Per Page'],
        ];

        foreach ($settings as $setting) {
            DB::table('system_settings')->updateOrInsert(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}