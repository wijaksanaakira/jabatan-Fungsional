# Keamanan Aplikasi

## Password Hash
Semua password disimpan menggunakan fitur `Hash::make()` dari Laravel. Sistem tidak pernah menyimpan password dalam format plain text.

## Role & Hak Akses (RBAC)
Hak akses diatur melalui service `PermissionService`.
- **Super Admin**: Memiliki kontrol penuh atas semua fitur, termasuk QR Authentication dan melihat Audit Log. Akun Super Admin tidak bisa dihapus dengan sengaja.
- **Admin**: Dapat melakukan CRUD pada data operasional. Tidak memiliki akses mengubah Super Admin atau mengelola QR dan Log.
- **Operator / User**: Mode Read-Only.

## CSRF, XSS, & SQL Injection
- Form-form pada sistem menggunakan token CSRF milik Laravel.
- Blade templating (`{{ }}`) digunakan untuk mencegah XSS.
- Eloquent ORM dan PDO binding digunakan untuk mencegah SQL Injection.
- Akses dibatasi menggunakan rate limiting.

## QR Authentication
QR Code tidak menyimpan kredensial atau password dalam bentuk teks maupun hash yang dapat di-decode. QR Code hanya berisi token acak.
- Raw token di-hash (`sha256`) sebelum disimpan ke database (`user_auth_tokens`).
- Token tervalidasi menggunakan expiry time, status aktif, dan juga terikat pada status aktif/nonaktifnya akun pengguna.
- Token dapat di-generate, regenerate (membatalkan token lama), dan revoke kapanpun oleh Super Admin.

## Audit Log
Setiap aksi penting (Login, Logout, Create, Update, Delete) tercatat ke tabel `audit_logs` secara otomatis melalui `AuditLogService`.
- Password dan token tidak akan disave dalam column `old_values` atau `new_values`.
- Audit Log bersifat immutable dan tidak dapat dihapus/dimanipulasi melalui antarmuka UI.