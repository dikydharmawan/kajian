# Kajian Akbar UKM IMAM 2025

Aplikasi web pendaftaran dan manajemen peserta untuk acara Kajian Akbar UKM IMAM 2025. Dibangun menggunakan Laravel.

---

## Fitur

- **Pendaftaran Peserta**  
  Formulir online untuk pendaftaran peserta acara.

- **Manajemen Divisi (Admin)**  
  CRUD data divisi dan pengelolaan peserta tiap divisi.

- **Pengaturan Acara (Admin)**  
  Pengaturan informasi acara dan ekspor data peserta.

- **Verifikasi Admin**  
  Akses admin dilindungi password verifikasi.

---

## Instalasi Lokal

1. **Clone repository**
   ```
   git clone <repo-url>
   cd kajian-akbar
   ```

2. **Install dependency**
   ```
   composer install
   ```

3. **Copy file environment**
   ```
   cp .env.example .env
   ```

4. **Generate key**
   ```
   php artisan key:generate
   ```

5. **Atur konfigurasi database**  
   Edit `.env` dan sesuaikan DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD.

6. **Migrasi database**
   ```
   php artisan migrate
   ```

7. **Jalankan server**
   ```
   php artisan serve
   ```

---

## Akun Admin

- Untuk akses admin, buka `/admin/verify` dan masukkan password:
  ```
  adminukmimam2025
  ```

---

## Struktur Folder Penting

- `app/Http/Controllers` — Controller aplikasi
- `app/Http/Middleware` — Middleware (termasuk verifikasi admin)
- `routes/web.php` — Routing aplikasi
- `resources/views` — Blade template

---

## Kontribusi

Pull request dan issue sangat terbuka untuk pengembangan lebih lanjut.

---

## Lisensi

MIT License