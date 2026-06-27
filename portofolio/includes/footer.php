<?php
/**
 * includes/footer.php
 */
?>
<footer class="footer">
    <div class="container footer-inner">
        <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($profile['name']) ?>.
        <div class="footer-socials">
            <?php foreach ($socials as $s): ?>
                <a href="<?= htmlspecialchars($s['url']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($s['name']) ?></a>
            <?php endforeach; ?>
        </div>
    </div>
</footer>

<a href="#home" class="back-to-top" id="backToTop">&uarr;</a>

<script src="assets/js/main.js"></script>
</body>
</html>
