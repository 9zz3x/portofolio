# Website Portofolio (PHP)

## Struktur Folder
```
portofolio/
├── index.php              -> Halaman utama
├── config.php              -> EDIT DI SINI: nama, foto, project, skill, dll
├── contact_handler.php     -> Pemroses form kontak
├── includes/
│   ├── header.php
│   └── footer.php
└── assets/
    ├── css/style.css
    ├── js/main.js
    └── img/                -> Letakkan foto profil & gambar project di sini
```

## Cara Menjalankan

### 1. Pakai XAMPP / Laragon (lokal di komputer)
1. Install XAMPP (https://www.apachefriends.org) atau Laragon.
2. Copy folder `portofolio` ke dalam folder `htdocs` (XAMPP) atau `www` (Laragon).
3. Jalankan Apache dari Control Panel XAMPP/Laragon.
4. Buka browser, akses: `http://localhost/portofolio/`

### 2. Pakai PHP built-in server (cepat, tanpa install XAMPP)
Buka terminal di folder `portofolio`, lalu jalankan:
```
php -S localhost:8000
```
Lalu buka browser ke: `http://localhost:8000`

### 3. Upload ke Hosting
Upload semua file ke hosting yang mendukung PHP (misalnya melalui cPanel/FTP),
lalu akses domain kamu seperti biasa.

## Cara Edit Isi Website
Semua data (nama, foto, project, skill, pengalaman, sosial media) ada di file
**`config.php`**. Kamu tidak perlu menyentuh file lain untuk mengubah teks.

- Ganti foto profil: letakkan file foto di `assets/img/profile.jpg`
  (atau ubah path-nya di `config.php`)
- Ganti foto project: letakkan di `assets/img/project1.jpg`, dst.
- Tambah CV: letakkan file PDF di `assets/cv.pdf`

## Form Kontak
Pesan dari pengunjung akan otomatis tersimpan ke file `messages.txt`
di folder utama. Jika ingin mengirim ke email langsung, buka file
`contact_handler.php` dan aktifkan bagian `mail()` yang sudah disediakan
(perlu hosting yang mendukung fungsi mail PHP).

## Catatan
- Pastikan folder portofolio punya izin tulis (writable) supaya `messages.txt`
  bisa dibuat otomatis.
- Tampilan sudah responsif untuk HP, tablet, dan desktop.
