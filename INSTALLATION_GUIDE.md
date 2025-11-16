# PANDUAN INSTALASI LENGKAP
## Website Warung Soto Vokasi

Panduan ini akan membantu Anda menginstal dan menjalankan website Warung Soto Vokasi dari awal hingga akhir.

---

## 📋 Persiapan

### Yang Anda Butuhkan:
1. **XAMPP** atau **Laragon** atau web server lainnya
2. **Composer** - Download dari https://getcomposer.org
3. **Text Editor** - VSCode, Sublime, atau Notepad++
4. **Browser** - Chrome, Firefox, atau Edge

---

## 🔧 LANGKAH 1: Install XAMPP (Jika belum punya)

1. Download XAMPP dari: https://www.apachefriends.org
2. Install XAMPP (pilih Apache dan MySQL saja sudah cukup)
3. Jalankan XAMPP Control Panel
4. Start Apache dan MySQL

---

## 📦 LANGKAH 2: Install Composer (Jika belum punya)

1. Download Composer dari: https://getcomposer.org/download/
2. Install Composer
3. Setelah install, buka Command Prompt/Terminal
4. Ketik: `composer --version` untuk memastikan terinstall dengan benar

---

## 📁 LANGKAH 3: Extract Project

1. Extract file `warung-soto-integrated.zip`
2. Copy folder `warung-soto-integrated` ke:
   - **XAMPP**: `C:\xampp\htdocs\`
   - **Laragon**: `C:\laragon\www\`

Hasil akhir path-nya seperti ini:
- `C:\xampp\htdocs\warung-soto-integrated\`

---

## 🎯 LANGKAH 4: Install Dependencies

1. Buka Command Prompt/Terminal
2. Masuk ke folder project:
```cmd
cd C:\xampp\htdocs\warung-soto-integrated
```

3. Install dependencies dengan Composer:
```cmd
composer install
```

**Catatan**: Proses ini mungkin memakan waktu 2-5 menit tergantung koneksi internet Anda.

---

## ⚙️ LANGKAH 5: Setup Environment

1. Di folder project, cari file `.env.example`
2. Copy file tersebut dan rename menjadi `.env`
   - Atau lewat command prompt: `copy .env.example .env`

3. Generate Application Key:
```cmd
php artisan key:generate
```

4. Buka file `.env` dengan text editor
5. Edit bagian database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=warung_soto_vokasi
DB_USERNAME=root
DB_PASSWORD=
```

**PENTING**: 
- Jika Anda pakai password MySQL, isi `DB_PASSWORD` dengan password Anda
- Jika tidak pakai password (default XAMPP), biarkan kosong

---

## 💾 LANGKAH 6: Buat Database

### Cara 1: Lewat phpMyAdmin (Mudah)
1. Buka browser, ke: http://localhost/phpmyadmin
2. Klik tab "Databases"
3. Di "Create database", ketik: `warung_soto_vokasi`
4. Klik "Create"

### Cara 2: Lewat Command Line
1. Buka Command Prompt
2. Masuk ke MySQL:
```cmd
mysql -u root -p
```
(Tekan Enter jika tidak ada password)

3. Buat database:
```sql
CREATE DATABASE warung_soto_vokasi;
exit;
```

---

## 🏗️ LANGKAH 7: Jalankan Migration

Migration akan membuat semua table yang dibutuhkan di database.

```cmd
php artisan migrate
```

Ketik `yes` jika ada pertanyaan.

---

## 🖼️ LANGKAH 8: Setup Storage untuk Upload Gambar

```cmd
php artisan storage:link
```

Command ini membuat symbolic link agar gambar yang diupload bisa diakses.

---

## 👤 LANGKAH 9: Buat Admin Default

```cmd
php artisan db:seed --class=AdminSeeder
```

Ini akan membuat akun admin dengan:
- **Email**: admin@sotovokasi.com
- **Password**: password

**PENTING**: Setelah login pertama kali, GANTI PASSWORD ini!

---

## 🚀 LANGKAH 10: Jalankan Website

Ada 2 cara menjalankan website:

### Cara 1: Pakai PHP Built-in Server (Untuk Development)
```cmd
php artisan serve
```

Website akan berjalan di: **http://localhost:8000**

### Cara 2: Pakai XAMPP (Untuk Production)
1. Pastikan Apache sudah running di XAMPP
2. Buka browser, ke: **http://localhost/warung-soto-integrated/public**

---

## ✅ LANGKAH 11: Testing

### Test Frontend:
1. Buka: http://localhost:8000 (atau sesuai setup Anda)
2. Cek semua halaman:
   - Home
   - About
   - Menu
   - Testimoni
   - FAQ
   - Contact

### Test Admin Dashboard:
1. Buka: http://localhost:8000/admin/login
2. Login dengan:
   - Email: admin@sotovokasi.com
   - Password: password
3. Coba kelola produk, kategori, testimoni, dll

---

## 🔐 LANGKAH 12: Ganti Password Admin

**WAJIB dilakukan untuk keamanan!**

1. Login ke admin dashboard
2. Klik menu "Admins" atau profile
3. Edit profil admin
4. Ganti password
5. Save

---

## 🎨 LANGKAH 13: Tambah Konten

### Menambah Kategori:
1. Login admin → Categories → Create
2. Isi nama kategori (contoh: "Makanan", "Minuman")
3. Save

### Menambah Produk:
1. Login admin → Products → Create
2. Isi form:
   - Nama produk
   - Deskripsi
   - Harga
   - Upload gambar
   - Pilih kategori
3. Save

### Menambah FAQ:
1. Login admin → FAQs → Create
2. Isi pertanyaan dan jawaban
3. Atur order (urutan tampilan)
4. Save

---

## 📸 Upload Gambar

### Untuk Produk:
- Ukuran recommended: 800x600 px
- Format: JPG, PNG, atau WEBP
- Max size: 2MB

### Untuk Testimoni:
- Ukuran recommended: 400x400 px
- Format: JPG, PNG
- Max size: 2MB

---

## 🐛 Troubleshooting

### Problem: "Class not found" Error
**Solusi**:
```cmd
composer dump-autoload
php artisan clear-compiled
php artisan config:clear
php artisan cache:clear
```

### Problem: Gambar tidak muncul
**Solusi**:
```cmd
php artisan storage:link
```

Cek juga permission folder storage:
```cmd
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

### Problem: CSS/JS tidak load
**Solusi**:
1. Cek apakah folder `public/css` dan `public/js` ada
2. Cek apakah `public/images` ada
3. Clear browser cache (Ctrl+F5)

### Problem: Database connection error
**Solusi**:
1. Pastikan MySQL running di XAMPP
2. Cek kredensial di file `.env`
3. Pastikan database sudah dibuat

### Problem: "Permission denied" pada storage
**Solusi**:
```cmd
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

Atau di Windows, klik kanan folder → Properties → Security → Edit → Full Control

---

## 📱 Akses dari Perangkat Lain (Opsional)

Jika ingin akses website dari HP/tablet di jaringan yang sama:

1. Cari IP komputer Anda:
```cmd
ipconfig
```
Cari "IPv4 Address" (contoh: 192.168.1.5)

2. Edit file `.env`:
```env
APP_URL=http://192.168.1.5:8000
```

3. Jalankan server dengan:
```cmd
php artisan serve --host=0.0.0.0
```

4. Di HP/tablet, buka: http://192.168.1.5:8000

---

## 🔄 Update Website

Jika ada update dari developer:

1. Backup database dulu!
```cmd
php artisan backup:database
```
(atau export lewat phpMyAdmin)

2. Replace file project dengan yang baru
3. Jalankan migration baru:
```cmd
php artisan migrate
```

4. Clear cache:
```cmd
php artisan cache:clear
php artisan config:clear
```

---

## 📞 Bantuan

Jika masih ada masalah:
1. Cek file README.md untuk info lebih lanjut
2. Screenshot error yang muncul
3. Hubungi developer

---

## ✨ Selamat!

Website Anda sudah siap digunakan! 🎉

Jangan lupa:
- ✅ Ganti password admin
- ✅ Tambah produk
- ✅ Isi FAQ
- ✅ Test semua fitur
- ✅ Backup database secara berkala

---

## 📚 Sumber Daya Tambahan

- **Laravel Documentation**: https://laravel.com/docs
- **PHP Documentation**: https://www.php.net/docs.php
- **MySQL Documentation**: https://dev.mysql.com/doc/

---

**© 2025 Soto Vokasi - All Rights Reserved**
