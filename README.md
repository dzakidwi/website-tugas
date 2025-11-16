# Warung Soto Vokasi - Website Terintegrasi

Website warung soto dengan frontend yang menggunakan desain static modern dan backend Laravel yang dinamis. Dilengkapi dengan admin dashboard untuk mengelola produk, kategori, testimoni, FAQ, dan pesan kontak.

## 🚀 Fitur

### Frontend (Public)
- **Homepage** - Hero section, menu unggulan, about section, layanan, dan testimoni
- **About** - Cerita warung, fitur-fitur, dan informasi founder
- **Menu** - Daftar produk dengan filter kategori
- **Testimoni** - Tampilan testimoni pelanggan dan form submit testimoni baru
- **FAQ** - Pertanyaan yang sering diajukan dengan accordion
- **Contact** - Form kontak untuk menghubungi warung

### Backend (Admin Dashboard)
- **Dashboard** - Statistik overview
- **Manajemen Produk** - CRUD produk dengan upload gambar
- **Manajemen Kategori** - CRUD kategori produk
- **Manajemen Testimoni** - Approve/reject testimoni dari pelanggan
- **Manajemen FAQ** - CRUD FAQ
- **Pesan Kontak** - Lihat dan kelola pesan dari pelanggan
- **Manajemen Admin** - CRUD admin (untuk superadmin)

## 📋 Requirements

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM (untuk asset compilation - opsional)

## 🛠️ Instalasi

### 1. Clone atau Extract Project
```bash
cd /path/to/your/webserver
# Jika dari zip, extract di sini
```

### 2. Install Dependencies
```bash
cd warung-soto-integrated
composer install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=warung_soto_vokasi
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Buat Database
Buat database baru di MySQL:
```sql
CREATE DATABASE warung_soto_vokasi;
```

### 5. Jalankan Migration
```bash
php artisan migrate
```

### 6. Buat Storage Link
```bash
php artisan storage:link
```

### 7. Seed Database (Opsional)
Untuk membuat admin default:
```bash
php artisan db:seed --class=AdminSeeder
```

Credentials admin default:
- **Email**: admin@sotovokasi.com
- **Password**: password

### 8. Jalankan Server
```bash
php artisan serve
```

Website akan berjalan di: `http://localhost:8000`

## 📁 Struktur File Penting

```
warung-soto-integrated/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Controllers admin
│   │   └── Public/         # Controllers frontend
│   ├── Models/             # Database models
│   └── Helpers/            # Helper functions (formatRupiah, dll)
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── admin.blade.php      # Layout admin (JANGAN DIUBAH)
│       │   └── frontend.blade.php   # Layout frontend baru
│       ├── admin/                    # Views admin (JANGAN DIUBAH)
│       └── public/
│           ├── home-new.blade.php
│           ├── about-new.blade.php
│           ├── menu-new.blade.php
│           ├── faq-new.blade.php
│           ├── contact-new.blade.php
│           └── testimonial-new.blade.php
├── public/
│   ├── css/            # CSS dari website static
│   ├── js/             # JavaScript dari website static
│   └── images/         # Semua gambar dari website static
├── routes/
│   └── web.php         # Route definitions
└── database/
    └── migrations/     # Database migrations
```

## 🎨 Cara Menggunakan

### Frontend
1. Buka `http://localhost:8000` untuk melihat homepage
2. Navigasi melalui menu navbar:
   - Home - Halaman utama
   - About - Tentang warung
   - Menu - Daftar produk
   - Testimoni - Testimoni pelanggan
   - FAQ - Pertanyaan umum
   - Contact - Hubungi kami

### Admin Dashboard
1. Akses admin: `http://localhost:8000/admin/login`
2. Login menggunakan credentials admin
3. Kelola konten melalui menu sidebar:
   - Dashboard - Overview statistik
   - Products - Kelola produk
   - Categories - Kelola kategori
   - Testimoni - Approve/reject testimoni
   - FAQs - Kelola FAQ
   - Contact Messages - Lihat pesan kontak

## 🔧 Konfigurasi Tambahan

### Upload Gambar
Pastikan folder `storage/app/public` memiliki permission yang benar:
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Asset Compilation (Opsional)
Jika ingin compile CSS/JS:
```bash
npm install
npm run dev
```

## 📝 Database Schema

### Products
- id, name, description, price, image, category_id, timestamps

### Categories
- id, name, description, timestamps

### Testimonials (Testimoni)
- id, name, email, location, message, rating, image, is_approved, timestamps

### FAQs
- id, question, answer, order, timestamps

### Contact Messages
- id, name, email, phone, subject, message, timestamps

### Admins
- id, name, email, password, timestamps

## 🎯 Tips Penggunaan

1. **Menambah Produk**: 
   - Login ke admin → Products → Create
   - Upload gambar produk
   - Pilih kategori
   - Set harga

2. **Approve Testimoni**:
   - Login ke admin → Testimoni
   - Klik tombol "Approve" untuk testimoni baru
   - Testimoni yang approved akan muncul di frontend

3. **Mengelola FAQ**:
   - Login ke admin → FAQs → Create
   - Gunakan field "Order" untuk mengatur urutan tampilan

4. **Mengubah Tampilan**:
   - CSS: Edit `public/css/style.css`
   - Layout: Edit `resources/views/layouts/frontend.blade.php`
   - Views: Edit file di `resources/views/public/`

## ⚠️ Catatan Penting

1. **Admin Dashboard** - Jangan mengubah file-file di `resources/views/admin/` dan `resources/views/layouts/admin.blade.php` karena sudah dikonfigurasi dengan baik.

2. **Gambar Static** - Semua gambar dari website static sudah tersedia di folder `public/images/`. Gambar ini akan digunakan sebagai fallback jika produk belum memiliki gambar.

3. **Database** - Jangan lupa backup database secara berkala.

4. **Storage Link** - Pastikan `php artisan storage:link` sudah dijalankan untuk upload gambar.

## 🐛 Troubleshooting

### Error: Class not found
```bash
composer dump-autoload
```

### Error: Permission denied
```bash
chmod -R 775 storage bootstrap/cache
```

### Gambar tidak muncul
```bash
php artisan storage:link
```

### CSS tidak load
Pastikan file `public/css/style.css` ada dan dapat diakses.

## 📧 Support

Jika ada pertanyaan atau masalah, silakan hubungi:
- Email: info@sotovokasi.com
- WhatsApp: +62 877 8571 1752

## 📄 License

Proprietary - © 2025 Soto Vokasi. All rights reserved.
