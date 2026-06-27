<?php
/**
 * config.php
 * Semua data portofolio diletakkan di sini.
 * Edit bagian ini untuk mengganti isi website tanpa menyentuh HTML.
 */

// ===== DATA DIRI =====
$profile = [
    'name'      => 'Ahmad Fauzan',
    'title'     => 'Web Developer & Programmer',
    'tagline'   => 'Saya membangun website yang cepat, rapi, dan enak dipakai.',
    'about'     => 'Halo! Saya adalah seorang developer yang suka membangun aplikasi web menggunakan PHP, JavaScript, dan berbagai teknologi modern lainnya. Saya senang belajar hal baru dan mengubah ide menjadi produk nyata.',
    'photo'     => 'assets/img/foto.jpg', 
    'email'     => 'ahmadfauzan@gmail.com',
    'phone'     => '+62 819-0230-5750',
    'location'  => 'Jakarta, Indonesia',
    'cv_file'   => 'assets/cv.pdf', // letakkan CV kamu di sini jika ada
];

// ===== SOSIAL MEDIA =====
$socials = [
    ['name' => 'GitHub',   'url' => 'https://github.com/9zz3x',   'icon' => 'github'],
    ['name' => 'LinkedIn', 'url' => 'https://linkedin.com/in/ahmad-fauzan-b95488412', 'icon' => 'linkedin'],
    ['name' => 'Instagram','url' => 'https://instagram.com/afzn01', 'icon' => 'instagram'],
    ['name' => 'Discord', 'url' => 'https://discord.gg/SnzCUbKeZ',      'icon' => 'discord'],
];

// ===== SKILL / KEAHLIAN =====
$skills = [
    ['name' => 'PHP',        'level' => 90],
    ['name' => 'JavaScript', 'level' => 80],
    ['name' => 'HTML & CSS', 'level' => 95],
    ['name' => 'MySQL',      'level' => 75],
    ['name' => 'Laravel',    'level' => 70],
    ['name' => 'Git',        'level' => 50],
];

// ===== PROJECT / PORTOFOLIO =====
$projects = [
    [
        'title'       => 'Website Inventari Barang',
        'description' => 'Aplikasi web untuk manajemen inventaris barang dengan fitur CRUD dan laporan.',
        'image'       => 'assets/img/project1.jpg',
        'tech'        => ['PHP', 'MySQL', 'Bootstrap'],
        'link'        => '#',
        'github'      => '#',
    ],
    [
        'title'       => 'Website Sepatu',
        'description' => 'Website e-commerce untuk penjualan sepatu dengan fitur keranjang belanja dan checkout.',
        'image'       => 'assets/img/project2.jpg',
        'tech'        => ['HTML', 'JavaScript', 'CSS'],
        'link'        => '#',
        'github'      => '#',
    ],
    [
        'title'       => 'Perpustakaan Sederhana',
        'description' => 'Aplikasi manajemen perpustakaan sederhana dengan fitur peminjaman dan pengembalian buku.',
        'image'       => 'assets/img/project3.jpg',
        'tech'        => ['PHP', 'CSS', 'MySQL'],
        'link'        => 'http://localhost/perpustkaan/index.php',
        'github'      => 'https://github.com/9zz3x/Website-Perpustakaan-sederhana-menggunakan-PHP',
    ],
];

// ===== PENGALAMAN / RIWAYAT =====
$experiences = [
    [
        'role'   => 'Content Creator',
        'place'  => 'PT Inventing',
        'period' => 'Juni - Agustus 2026',
        'desc'   => 'Membuat konten promosi mengenai produk dan layanan perusahaan.',
    ],
    [
        'role'   => 'Data Analyst',
        'place'  => 'PPKD Jakarta Selatan',
        'period' => 'Januari - Maret 2026',
        'desc'   => 'Menganalisis data keuangan dan membuat laporan untuk pengambilan keputusan.',
    ],
];
