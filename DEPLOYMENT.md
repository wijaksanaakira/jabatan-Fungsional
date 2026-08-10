# Panduan Deployment cPanel

Aplikasi ini disiapkan untuk di-hosting menggunakan cPanel atau shared hosting dengan environment MariaDB/MySQL.

## Skenario A: Laravel di luar `public_html` (Direkomendasikan)
1. Upload folder Laravel ke directory seperti `/home/account/laravel-app`.
2. Hapus folder `public_html` yang lama, dan buat symbolic link dari `public_html` ke folder `public` di dalam Laravel:
   `ln -s /home/account/laravel-app/public /home/account/public_html`
3. Berikan permission 755 untuk folder `storage` dan `bootstrap/cache`. Jangan gunakan 777.
4. Buat database dan user MySQL melalui cPanel, tambahkan privileges, dan masukkan konfigurasi tersebut di `.env`.
5. Import SQL atau jalankan migrasi via terminal cPanel (jika tersedia).
6. Build assets secara lokal (`npm run build`) lalu upload jika node tidak tersedia di cPanel.

## Skenario B: Subfolder
1. Jika menggunakan subfolder, letakkan aplikasi dalam folder di dalam `public_html`.
2. Buat file `.htaccess` di root folder tersebut untuk meredirect traffic ke folder `public`:
   ```apache
   <IfModule mod_rewrite.c>
       RewriteEngine On
       RewriteRule ^(.*)$ public/$1 [L]
   </IfModule>
   ```

## Perintah Deployment
Jika menggunakan SSH di cPanel:
```bash
composer install --no-dev --optimize-autoloader
php artisan optimize:clear
php artisan migrate --force
php artisan db:seed --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm install
npm run build
```