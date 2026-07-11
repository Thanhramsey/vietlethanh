<!DOCTYPE html>
<html lang="vi">
<head>
    <?php
    $fontPresets = [
        'inter_outfit' => [
            'google'  => 'family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800',
            'heading' => "'Outfit', 'Inter', sans-serif",
            'body'    => "'Inter', sans-serif",
        ],
        'manrope_plusjakarta' => [
            'google'  => 'family=Manrope:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800',
            'heading' => "'Plus Jakarta Sans', 'Manrope', sans-serif",
            'body'    => "'Manrope', sans-serif",
        ],
        'nunito_poppins' => [
            'google'  => 'family=Nunito:wght@400;500;600;700;800&family=Poppins:wght@400;500;600;700;800',
            'heading' => "'Poppins', 'Nunito', sans-serif",
            'body'    => "'Nunito', sans-serif",
        ],
        'montserrat_lato' => [
            'google'  => 'family=Lato:wght@400;700;900&family=Montserrat:wght@400;500;600;700;800',
            'heading' => "'Montserrat', 'Lato', sans-serif",
            'body'    => "'Lato', sans-serif",
        ],
        'spacemono_dmsans' => [
            'google'  => 'family=DM+Sans:wght@400;500;700;800&family=Space+Grotesk:wght@400;500;600;700',
            'heading' => "'Space Grotesk', 'DM Sans', sans-serif",
            'body'    => "'DM Sans', sans-serif",
        ],
        'playfair_sourcesans' => [
            'google'  => 'family=Playfair+Display:wght@500;600;700&family=Source+Sans+3:wght@400;500;600;700',
            'heading' => "'Playfair Display', 'Source Sans 3', serif",
            'body'    => "'Source Sans 3', sans-serif",
        ],
        'merriweather_worksans' => [
            'google'  => 'family=Merriweather:wght@400;700;900&family=Work+Sans:wght@400;500;600;700',
            'heading' => "'Merriweather', 'Work Sans', serif",
            'body'    => "'Work Sans', sans-serif",
        ],
        'raleway_urbanist' => [
            'google'  => 'family=Raleway:wght@500;600;700;800&family=Urbanist:wght@400;500;600;700',
            'heading' => "'Raleway', 'Urbanist', sans-serif",
            'body'    => "'Urbanist', sans-serif",
        ],
        'oswald_mulish' => [
            'google'  => 'family=Mulish:wght@400;500;600;700;800&family=Oswald:wght@400;500;600;700',
            'heading' => "'Oswald', 'Mulish', sans-serif",
            'body'    => "'Mulish', sans-serif",
        ],
    ];

    $colorPresets = [
        'ocean_blue' => [
            'primary' => '#0b5ed7', 'dark' => '#0a369d', 'light' => '#eef2ff', 'accent' => '#f59e0b',
            'text' => '#2c3e50', 'muted' => '#6c757d', 'bg_light' => '#f8f9fa',
            'primary_rgb' => '11, 94, 215', 'dark_rgb' => '10, 54, 157',
        ],
        'emerald' => [
            'primary' => '#0f766e', 'dark' => '#115e59', 'light' => '#e8f7f5', 'accent' => '#d97706',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#f6faf9',
            'primary_rgb' => '15, 118, 110', 'dark_rgb' => '17, 94, 89',
        ],
        'sunset_orange' => [
            'primary' => '#ea580c', 'dark' => '#c2410c', 'light' => '#fff1e9', 'accent' => '#0369a1',
            'text' => '#2b2b2b', 'muted' => '#6b7280', 'bg_light' => '#fffaf7',
            'primary_rgb' => '234, 88, 12', 'dark_rgb' => '194, 65, 12',
        ],
        'ruby_red' => [
            'primary' => '#c81e3a', 'dark' => '#9f1239', 'light' => '#ffecef', 'accent' => '#0e7490',
            'text' => '#1f2937', 'muted' => '#6b7280', 'bg_light' => '#fff9fa',
            'primary_rgb' => '200, 30, 58', 'dark_rgb' => '159, 18, 57',
        ],
        'indigo_night' => [
            'primary' => '#4338ca', 'dark' => '#312e81', 'light' => '#eeedff', 'accent' => '#0891b2',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#f7f7ff',
            'primary_rgb' => '67, 56, 202', 'dark_rgb' => '49, 46, 129',
        ],
        'teal_cyan' => [
            'primary' => '#0f766e', 'dark' => '#155e75', 'light' => '#e9fbfb', 'accent' => '#f59e0b',
            'text' => '#0f172a', 'muted' => '#64748b', 'bg_light' => '#f5fcfc',
            'primary_rgb' => '15, 118, 110', 'dark_rgb' => '21, 94, 117',
        ],
        'royal_purple' => [
            'primary' => '#6d28d9', 'dark' => '#4c1d95', 'light' => '#f3e8ff', 'accent' => '#f59e0b',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#faf5ff',
            'primary_rgb' => '109, 40, 217', 'dark_rgb' => '76, 29, 149',
        ],
        'rose_pink' => [
            'primary' => '#e11d48', 'dark' => '#9f1239', 'light' => '#ffe4ec', 'accent' => '#0e7490',
            'text' => '#1f2937', 'muted' => '#6b7280', 'bg_light' => '#fff7fa',
            'primary_rgb' => '225, 29, 72', 'dark_rgb' => '159, 18, 57',
        ],
        'forest_green' => [
            'primary' => '#166534', 'dark' => '#14532d', 'light' => '#eaf7ee', 'accent' => '#d97706',
            'text' => '#1f2937', 'muted' => '#64748b', 'bg_light' => '#f4fbf6',
            'primary_rgb' => '22, 101, 52', 'dark_rgb' => '20, 83, 45',
        ],
    ];

    $fontKey = get_setting('theme_font_preset', 'inter_outfit');
    if (!array_key_exists($fontKey, $fontPresets)) {
        $fontKey = 'inter_outfit';
    }
    $fontPreset = $fontPresets[$fontKey];

    $colorKey = get_setting('theme_color_preset', 'ocean_blue');
    if (!array_key_exists($colorKey, $colorPresets)) {
        $colorKey = 'ocean_blue';
    }
    $themeColors = $colorPresets[$colorKey];

    $siteLogoFile = (string) get_setting('site_logo', '');
    $faviconUrl = base_url('favicon.ico');
    if ($siteLogoFile !== '' && file_exists(FCPATH . 'uploads/settings/' . $siteLogoFile)) {
        $faviconUrl = base_url('uploads/settings/' . $siteLogoFile);
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- SEO Meta Tags -->
    <title><?= esc($seo_title ?? get_setting('seo_title')) ?></title>
    <meta name="description" content="<?= esc($seo_description ?? get_setting('seo_description')) ?>">
    <meta name="keywords" content="<?= esc($seo_keywords ?? get_setting('seo_keywords')) ?>">
    <link rel="canonical" href="<?= esc($canonical_url ?? current_url()) ?>">
    <link rel="icon" href="<?= esc($faviconUrl) ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= esc($faviconUrl) ?>" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?= esc($faviconUrl) ?>">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= esc(current_url()) ?>">
    <meta property="og:title" content="<?= esc($seo_title ?? get_setting('seo_title')) ?>">
    <meta property="og:description" content="<?= esc($seo_description ?? get_setting('seo_description')) ?>">
    <meta property="og:image" content="<?= esc($og_image ?? base_url('uploads/settings/og_default.webp')) ?>">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?<?= esc($fontPreset['google']) ?>&display=swap" rel="stylesheet">
    
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
    <style>
        :root {
            --primary-color: <?= esc($themeColors['primary']) ?>;
            --primary-dark: <?= esc($themeColors['dark']) ?>;
            --primary-light: <?= esc($themeColors['light']) ?>;
            --accent-color: <?= esc($themeColors['accent']) ?>;
            --text-color: <?= esc($themeColors['text']) ?>;
            --text-muted: <?= esc($themeColors['muted']) ?>;
            --bg-light: <?= esc($themeColors['bg_light']) ?>;
            --primary-rgb: <?= esc($themeColors['primary_rgb']) ?>;
            --primary-dark-rgb: <?= esc($themeColors['dark_rgb']) ?>;
            --font-heading: <?= $fontPreset['heading'] ?>;
            --font-body: <?= $fontPreset['body'] ?>;

            /* Sync Bootstrap semantic colors with site theme */
            --bs-primary: <?= esc($themeColors['primary']) ?>;
            --bs-primary-rgb: <?= esc($themeColors['primary_rgb']) ?>;
            --bs-link-color: <?= esc($themeColors['primary']) ?>;
            --bs-link-hover-color: <?= esc($themeColors['dark']) ?>;

            --bs-btn-hover-bg: <?= esc($themeColors['dark']) ?>;
            --bs-btn-hover-border-color: <?= esc($themeColors['dark']) ?>;
            --bs-btn-active-bg: <?= esc($themeColors['dark']) ?>;
            --bs-btn-active-border-color: <?= esc($themeColors['dark']) ?>;
        }
    </style>
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

        if (document.querySelector('.certificates-slider')) {
            const certificatesSwiper = new Swiper('.certificates-slider', {
                slidesPerView: 1,
                spaceBetween: 18,
                loop: true,
                autoplay: {
                    delay: 3200,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    576: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    }
                }
            });
        }

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

        // Animate counters when statistic blocks enter viewport.
        (function () {
            var counters = Array.prototype.slice.call(document.querySelectorAll('.stat-number[data-count]'));
            if (!counters.length) {
                return;
            }

            var runCounter = function (el) {
                if (el.dataset.animated === '1') {
                    return;
                }

                var target = parseInt(el.getAttribute('data-count') || '0', 10);
                if (!Number.isFinite(target) || target < 0) {
                    target = 0;
                }

                var originalText = (el.textContent || '').trim();
                var prefixMatch = originalText.match(/^\D+/);
                var suffixMatch = originalText.match(/\D+$/);
                var prefix = prefixMatch ? prefixMatch[0] : '';
                var suffix = suffixMatch ? suffixMatch[0] : '';
                var duration = parseInt(el.getAttribute('data-duration') || '1400', 10);
                var start = null;

                var step = function (timestamp) {
                    if (start === null) {
                        start = timestamp;
                    }
                    var progress = Math.min((timestamp - start) / duration, 1);
                    var current = Math.ceil(target * progress);
                    el.textContent = prefix + current.toLocaleString('vi-VN') + suffix;

                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    } else {
                        el.dataset.animated = '1';
                    }
                };

                window.requestAnimationFrame(step);
            };

            if ('IntersectionObserver' in window) {
                var observer = new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (entry) {
                        if (!entry.isIntersecting) {
                            return;
                        }
                        runCounter(entry.target);
                        obs.unobserve(entry.target);
                    });
                }, { threshold: 0.35 });

                counters.forEach(function (counter) {
                    observer.observe(counter);
                });
            } else {
                counters.forEach(function (counter) {
                    runCounter(counter);
                });
            }
        })();
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
