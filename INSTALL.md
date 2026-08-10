## Local Installation

1. Clone atau upload repository ini.
2. Jalankan `composer install`
3. Copy `.env.example` ke `.env`
4. Sesuaikan konfigurasi database di `.env` (contoh: DB_DATABASE, DB_USERNAME, DB_PASSWORD).
5. Generate application key: `php artisan key:generate`
6. Jalankan migrasi: `php artisan migrate`
   (Jangan gunakan `migrate:fresh` jika ada data yang perlu dipertahankan)
7. Jalankan seeder: `php artisan db:seed`
8. Instalasi dan build assets NPM: `npm install && npm run build`
9. Buat symbolic link storage: `php artisan storage:link`
10. Akses aplikasi Anda. Akun Super Admin default: `admin@example.com` / `admin1993Ab!`