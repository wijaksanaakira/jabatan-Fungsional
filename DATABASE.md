# Database Documentation

## Tabel Existing (Dipertahankan)
- `user`, `level_user`, `level_user_hak_akses`, `modul`
- `jabatan_fungsional`, `dokumen_jabatan_fungsional`
- `dokumen`
- `pegawai`, `jenis_pegawai`
- `jenis_sk`, `data_sk`, `sk_pegawai`
- `gelar`

## Tabel Baru
- `jenis_dokumen`: Menyimpan jenis-jenis dokumen.
- `jabatan_fungsional_persyaratan`: Tabel pivot antara jabatan fungsional dan persyaratan dokumen.
- `monitoring_dokumen`: Menyimpan data monitoring kelengkapan dokumen tiap pegawai.
- `monitoring_dokumen_item`: Menyimpan item-item checklist dari setiap monitoring.
- `user_auth_tokens`: Menyimpan token hash untuk fitur QR Authentication.
- `audit_logs`: Menyimpan histori perubahan data dan aktivitas penting.
- `system_settings`: Menyimpan konfigurasi sistem.

## Kebijakan Migrasi
- Migrasi dibuat incremental untuk menambahkan kolom-kolom baru (`email`, `is_active`, `deleted_at`, dll) tanpa melakukan aksi destruktif (DROP) pada tabel existing.
- Foreign Key telah dikonfigurasi dengan aman, memprioritaskan "cascade" untuk relasi yang kuat dan "set null" untuk audit log agar histori terjaga meskipun user dihapus.
- Penamaan index telah dipendekkan (contoh: `mdi_mon_fk`, `al_user_fk`) untuk menghindari error pada hosting (MariaDB/cPanel).

## Warning
JANGAN PERNAH menjalankan `php artisan migrate:fresh` pada environment production yang memuat data existing. Gunakan `php artisan migrate` saja.