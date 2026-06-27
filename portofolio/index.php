<?php
/**
 * index.php
 * Halaman utama website portofolio.
 */

session_start();
require_once 'config.php';
include 'includes/header.php';

// Ambil status pengiriman form kontak (jika ada)
$contactStatus = $_SESSION['contact_status'] ?? null;
$contactErrors = $_SESSION['contact_errors'] ?? [];
unset($_SESSION['contact_status'], $_SESSION['contact_errors']);
?>

<!-- ================= HERO / HOME ================= -->
<section id="home" class="hero">
    <div class="container hero-inner">
        <div class="hero-text">
            <p class="hero-greet"><span class="dot"></span> Tersedia untuk project baru</p>
            <h1>Halo, saya <span class="gradient-text"><?= htmlspecialchars($profile['name']) ?></span></h1>
            <h2 class="hero-title"><?= htmlspecialchars($profile['title']) ?></h2>
            <p class="hero-tagline"><?= htmlspecialchars($profile['tagline']) ?></p>

            <div class="hero-buttons">
                <a href="#projects" class="btn btn-primary">Lihat Project &rarr;</a>
                <a href="<?= htmlspecialchars($profile['cv_file']) ?>" class="btn btn-outline" download>Download CV</a>
            </div>

            <div class="hero-socials">
                <?php foreach ($socials as $s): ?>
                    <a href="<?= htmlspecialchars($s['url']) ?>" target="_blank" rel="noopener" title="<?= htmlspecialchars($s['name']) ?>">
                        <?= htmlspecialchars(substr($s['name'], 0, 2)) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="hero-image">
            <div class="hero-image-frame">
                <img src="<?= htmlspecialchars($profile['photo']) ?>" alt="Foto <?= htmlspecialchars($profile['name']) ?>"
                     onerror="this.src='https://via.placeholder.com/400x400?text=Foto+Profil'">
            </div>
        </div>
    </div>

    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="mouse"></div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="section">
    <div class="container">
        <div class="reveal">
            <p class="section-tag">Tentang Saya</p>
            <h2 class="section-title">Kenalan Lebih Dekat</h2>
        </div>

        <div class="about-grid">
            <div class="about-text reveal">
                <p><?= nl2br(htmlspecialchars($profile['about'])) ?></p>

                <div class="about-info">
                    <div class="info-item">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?= htmlspecialchars($profile['email']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Telepon</span>
                        <span class="info-value"><?= htmlspecialchars($profile['phone']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Lokasi</span>
                        <span class="info-value"><?= htmlspecialchars($profile['location']) ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Status</span>
                        <span class="info-value">Available</span>
                    </div>
                </div>
            </div>

            <div class="about-stats reveal">
                <div class="stat-card">
                    <div class="stat-number"><?= count($projects) ?>+</div>
                    <div class="stat-label">Project</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?= count($experiences) ?>+</div>
                    <div class="stat-label">Pengalaman</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?= count($skills) ?>+</div>
                    <div class="stat-label">Skill</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= SKILLS ================= -->
<section id="skills" class="section section-alt">
    <div class="container">
        <div class="reveal">
            <p class="section-tag">Keahlian</p>
            <h2 class="section-title">Tools &amp; Teknologi</h2>
            <p class="section-subtitle">Beberapa teknologi yang sering saya gunakan untuk membangun produk digital.</p>
        </div>
        <div class="skills-grid reveal">
            <?php foreach ($skills as $skill):
                // Konversi angka level (0-100) menjadi label dan jumlah dot (skala 1-5)
                $level = (int)$skill['level'];
                $dotsFilled = max(1, min(5, (int)ceil($level / 20)));

                if ($level >= 90)      $label = 'Expert';
                elseif ($level >= 75)  $label = 'Mahir';
                elseif ($level >= 50)  $label = 'Menengah';
                else                    $label = 'Pemula';
            ?>
                <div class="skill-item">
                    <div class="skill-icon"><?= htmlspecialchars(strtoupper(substr($skill['name'], 0, 2))) ?></div>
                    <div class="skill-info">
                        <div class="skill-head">
                            <span class="skill-name"><?= htmlspecialchars($skill['name']) ?></span>
                            <span class="skill-label"><?= $label ?></span>
                        </div>
                        <div class="skill-dots">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="dot <?= $i <= $dotsFilled ? 'filled' : '' ?>"></span>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= PROJECTS ================= -->
<section id="projects" class="section">
    <div class="container">
        <div class="reveal">
            <p class="section-tag">Portofolio</p>
            <h2 class="section-title">Project Pilihan</h2>
            <p class="section-subtitle">Beberapa project yang sudah saya kerjakan, mulai dari web app hingga landing page.</p>
        </div>
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-card reveal">
                    <div class="project-image">
                        <img src="<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['title']) ?>"
                             onerror="this.src='https://via.placeholder.com/400x250?text=Project'">
                    </div>
                    <div class="project-body">
                        <h3><?= htmlspecialchars($project['title']) ?></h3>
                        <p><?= htmlspecialchars($project['description']) ?></p>
                        <div class="project-tech">
                            <?php foreach ($project['tech'] as $t): ?>
                                <span class="tech-badge"><?= htmlspecialchars($t) ?></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="project-links">
                            <a href="<?= htmlspecialchars($project['link']) ?>" target="_blank" rel="noopener">Live Demo &rarr;</a>
                            <a href="<?= htmlspecialchars($project['github']) ?>" target="_blank" rel="noopener">Source Code</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= EXPERIENCE ================= -->
<section id="experience" class="section section-alt">
    <div class="container">
        <div class="reveal">
            <p class="section-tag">Riwayat</p>
            <h2 class="section-title">Pengalaman Kerja</h2>
        </div>
        <div class="timeline reveal">
            <?php foreach ($experiences as $exp): ?>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-period"><?= htmlspecialchars($exp['period']) ?></span>
                        <h3><?= htmlspecialchars($exp['role']) ?></h3>
                        <p class="timeline-place"><?= htmlspecialchars($exp['place']) ?></p>
                        <p><?= htmlspecialchars($exp['desc']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ================= CONTACT ================= -->
<section id="contact" class="section">
    <div class="container">
        <div class="reveal">
            <p class="section-tag">Kontak</p>
            <h2 class="section-title">Mari Berkolaborasi</h2>
            <p class="section-subtitle">Punya project atau ingin diskusi? Kirim pesan, saya akan balas secepatnya.</p>
        </div>

        <div class="contact-grid">
            <div class="contact-info reveal">
                <div class="contact-info-list">
                    <div class="contact-info-card">
                        <div class="contact-info-icon">@</div>
                        <div>
                            <span class="ci-label">Email</span>
                            <span class="ci-value"><?= htmlspecialchars($profile['email']) ?></span>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-info-icon">&#9742;</div>
                        <div>
                            <span class="ci-label">Telepon</span>
                            <span class="ci-value"><?= htmlspecialchars($profile['phone']) ?></span>
                        </div>
                    </div>
                    <div class="contact-info-card">
                        <div class="contact-info-icon">&#128205;</div>
                        <div>
                            <span class="ci-label">Lokasi</span>
                            <span class="ci-value"><?= htmlspecialchars($profile['location']) ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="contact-form-wrap reveal">
                <?php if ($contactStatus === 'success'): ?>
                    <div class="alert alert-success">Pesan berhasil dikirim! Terima kasih sudah menghubungi saya.</div>
                <?php elseif ($contactStatus === 'error'): ?>
                    <div class="alert alert-error">
                        <?php foreach ($contactErrors as $err): ?>
                            <p><?= htmlspecialchars($err) ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form action="contact_handler.php" method="POST" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" placeholder="Nama lengkap kamu" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="email@kamu.com" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tulis pesan kamu..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan &rarr;</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
