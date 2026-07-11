<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= esc($seo_title ?? get_setting('seo_title')) ?></title>
    <meta name="description" content="<?= esc($seo_description ?? get_setting('seo_description')) ?>">
    <meta name="keywords" content="<?= esc($seo_keywords ?? get_setting('seo_keywords')) ?>">
    <link rel="canonical" href="<?= esc($canonical_url ?? current_url()) ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc(current_url()) ?>">
    <meta property="og:title" content="<?= esc($seo_title ?? get_setting('seo_title')) ?>">
    <meta property="og:description" content="<?= esc($seo_description ?? get_setting('seo_description')) ?>">
    <meta property="og:image" content="<?= esc($og_image ?? base_url('uploads/settings/og_default.webp')) ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Swiper JS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    
    <!-- AOS Animation CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

    <!-- Header Section -->
    <?= $this->include('layouts/header') ?>

    <!-- Main Content Body -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Section -->
    <?= $this->include('layouts/footer') ?>

    <!-- JS CDN Scripts -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    
    <!-- Custom scripts -->
    <script>
        // Init AOS (Animations)
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Init Swiper sliders
        const heroSwiper = new Swiper('.hero-slider', {
            loop: true,
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        // Partners Swiper slider
        const partnersSwiper = new Swiper('.partners-slider', {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            breakpoints: {
                576: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 5,
                }
            }
        });

        // Sticky header transition on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header-wrapper');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            }
        });

        // Bind Fancybox
        Fancybox.bind("[data-fancybox]", {});
    </script>

    <!-- ===== FLOATING ACTION BUTTONS ===== -->
    <?php $zaloNumber = get_setting('zalo') ?: get_setting('phone'); ?>
    <div class="floating-buttons" id="floatingButtons">
        <!-- Phone / Zalo Button -->
        <a href="https://zalo.me/<?= esc($zaloNumber) ?>" target="_blank" rel="noopener" class="float-btn float-btn-zalo" aria-label="Liên hệ Zalo">
            <div class="float-btn-icon">
                <i class="bi bi-telephone-fill"></i>
            </div>
            <span class="float-btn-label">Gọi Zalo</span>
        </a>
        <!-- Contact Button -->
        <a href="<?= base_url('lien-he') ?>" class="float-btn float-btn-contact" aria-label="Liên hệ">
            <div class="float-btn-icon">
                <i class="bi bi-chat-dots-fill"></i>
            </div>
            <span class="float-btn-label">Liên Hệ</span>
        </a>
    </div>

    <!-- Scroll To Top Button -->
    <button id="scrollTopBtn" class="scroll-top-btn" aria-label="Scroll to top">
        <i class="bi bi-chevron-up"></i>
    </button>

    <!-- Scroll To Top Logic (placed after button is in DOM) -->
    <script>
        (function() {
            var btn = document.getElementById('scrollTopBtn');
            if (!btn) return;

            // Show/hide on scroll
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    btn.classList.add('visible');
                } else {
                    btn.classList.remove('visible');
                }
            });

            // Smooth scroll to top on click
            btn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        })();
    </script>

</body>
</html>
