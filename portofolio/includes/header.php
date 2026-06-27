<?php
/**
 * includes/header.php
 */
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio - <?= htmlspecialchars($profile['name']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($profile['tagline']) ?>">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="navbar" id="navbar">
    <div class="container navbar-inner">
        <a href="#home" class="logo"><?= htmlspecialchars($profile['name']) ?></a>

        <nav class="nav-links" id="navLinks">
            <a href="#home">Home</a>
            <a href="#about">Tentang</a>
            <a href="#skills">Keahlian</a>
            <a href="#projects">Project</a>
            <a href="#experience">Pengalaman</a>
            <a href="#contact">Kontak</a>
        </nav>

        <button class="burger" id="burgerBtn" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>
