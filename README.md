<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>



# 📚 SIAKAD LPK - Sistem Informasi Akademik

SIAKAD LPK adalah sistem informasi akademik berbasis Laravel 12 yang digunakan untuk mengelola data siswa, guru, dan admin (staff) dalam lembaga pelatihan kerja (LPK). Sistem ini memiliki **multi-role user** yang masing-masing memiliki dashboard panel tersendiri.

## 🎯 Fitur Utama

- Manajemen akun untuk **Siswa**, **Guru**, dan **Admin (Staff)**
- Autentikasi dan otorisasi multi-role
- Panel dashboard terpisah sesuai peran
- Seeder user default untuk kemudahan uji coba
- Dibangun menggunakan Laravel 12 (PHP 8.2+)

---

## 🛠️ Instalasi dan Setup

Ikuti langkah-langkah berikut untuk menjalankan project ini secara lokal:

### 1. Clone Repository

```bash
git clone https://github.com/fiebryhoga/siakad-lpk.git
cd siakad-lpk
````

### 2. Install Dependensi

```bash
composer install
npm install && npm run dev
```

### 3. Setup Environment

```bash
cp .env.example .env
```

Edit `.env` untuk menyesuaikan konfigurasi database kamu, lalu jalankan:

```bash
php artisan key:generate
```

### 4. Setup Database

Pastikan database sudah dibuat, lalu jalankan:

```bash
php artisan migrate --seed
```

Seeder akan membuat akun-akun default untuk setiap role.

---

## 👤 Akun Default (Seeder)

| Role  | Email                      | Password |
| ----- | -------------------------- | -------- |
| Admin | admin@lpk.com              | password |
| Guru  | ani.guru@lpk.com           | password |
| Siswa | budi.santoso@lpk.com       | password |

Silakan login ke aplikasi menggunakan email dan password di atas sebagai contoh yang sudah dimasukkan dalam seeder.

---

## 🔐 Login & Role-Based Access

Setelah login, pengguna akan diarahkan ke dashboard masing-masing berdasarkan peran:

* `/admin/dashboard` untuk **Admin**
* `/guru/dashboard` untuk **Guru**
* `/siswa/dashboard` untuk **Siswa**

---

## 📦 Stack Teknologi

* Laravel 12
* PHP 8.2+
* MySQL / MariaDB
* TailwindCSS (optional)
* Vite & Laravel Mix

---

## 🤝 Kontribusi & 📄 Lisensi

Project ini sepenuhnya punya hafa tech hub - silahkan lakukan Pull request dan masukan sangat diterima dengan menyatakan nama dan kontak untuk dihubungi oleh pihak developer. Silakan buat fork, lakukan perubahan, dan kirim PR.
