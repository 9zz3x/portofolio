document.addEventListener('DOMContentLoaded', () => {

    /* ===== MOBILE MENU TOGGLE ===== */
    const burgerBtn = document.getElementById('burgerBtn');
    const navLinks = document.getElementById('navLinks');

    burgerBtn?.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        burgerBtn.classList.toggle('active');
    });

    navLinks?.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('active');
            burgerBtn.classList.remove('active');
        });
    });

    /* ===== SCROLL REVEAL ANIMATION ===== */
    const revealEls = document.querySelectorAll('.reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    revealEls.forEach(el => revealObserver.observe(el));

    /* ===== ANIMASI SKILL DOT SAAT TERLIHAT ===== */
    const skillItems = document.querySelectorAll('.skill-item');

    const skillObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const dots = entry.target.querySelectorAll('.dot.filled');
                dots.forEach((dot, i) => {
                    dot.style.transitionDelay = (i * 0.08) + 's';
                });
                entry.target.classList.add('animated');
                skillObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.3 });

    skillItems.forEach(item => skillObserver.observe(item));

    /* ===== BACK TO TOP BUTTON ===== */
    const backToTop = document.getElementById('backToTop');
    const navbar = document.getElementById('navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 400) {
            backToTop?.classList.add('show');
        } else {
            backToTop?.classList.remove('show');
        }

        if (window.scrollY > 30) {
            navbar?.classList.add('scrolled');
        } else {
            navbar?.classList.remove('scrolled');
        }
    });

    /* ===== NAVBAR ACTIVE LINK SAAT SCROLL ===== */
    const sections = document.querySelectorAll('section');
    const navItems = document.querySelectorAll('.nav-links a');

    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });

        navItems.forEach(item => {
            item.classList.remove('active-link');
            if (item.getAttribute('href') === '#' + current) {
                item.classList.add('active-link');
            }
        });
    });

});
