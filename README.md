# TEFA
## Panduan Inisialisasi Project Laravel

Ikuti langkah-langkah di bawah ini untuk menjalankan project yang baru saja di-clone:

### Langkah Instalasi
1. **Install Dependencies:** `composer install`
2. **Setup Environment:** `cp .env.example .env`
3. **Generate Key:** `php artisan key:generate`
4. **Konfigurasi Database:** Edit file `.env` dan sesuaikan `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.
atau dapat copy paste saja .env pada projek sebelumnya 
5. **Migrasi Database:** `php artisan migrate`
6. **Install Frontend (Jika ada):** `npm install && npm run dev`
7. **Jalankan Server:** `php artisan serve`
---


**Note:** Pastikan PHP dan Composer sudah terinstall.

