<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$homeHeroLabel = get_setting('home_hero_label', 'VIỆT LỆ THANH · GIA LAI');
$homeHeroTitle = get_setting('home_hero_title', 'CÔNG TY TNHH MTV VIỆT LỆ THANH');
$homeHeroSub = get_setting('home_hero_sub', 'Dịch vụ lưu trú ngắn ngày uy tín và thi công công trình chuyên nghiệp tại Gia Lai. Chất lượng — Uy tín — Tận tâm.');
$homeCtaText = get_setting('home_cta_text', 'Khám Phá Dịch Vụ');
$homeCtaLink = get_setting('home_cta_link', '/dich-vu');
$homeHeroContactText = get_setting('home_hero_contact_text', 'Liên Hệ Ngay');
$homeHeroContactLink = get_setting('home_hero_contact_link', '/lien-he');

$homeIntroTitle = get_setting('home_intro_title', 'Về chúng tôi');
$homeIntroText = get_setting('home_intro_text', 'Nội dung cấu hình trang chủ đang chuẩn bị triển khai ở giao diện frontend.');
$homeIntroEyebrow = get_setting('home_intro_eyebrow', 'Giới Thiệu Chung');
$homeIntroHeading = get_setting('home_intro_heading', 'CÔNG TY TNHH MTV VIỆT LỆ THANH');
$homeIntroBody1 = get_setting('home_intro_body1', 'Được thành lập từ năm 2017 tại huyện Đức Cơ, tỉnh Gia Lai, Công ty TNHH Một Thành Viên Việt Lệ Thanh đã và đang khẳng định vị thế là một trong những doanh nghiệp đa ngành uy tín hàng đầu trong khu vực.');
$homeIntroBody2 = get_setting('home_intro_body2', 'Lấy dịch vụ lưu trú ngắn ngày làm trọng tâm phát triển với hệ thống phòng nghỉ tiện nghi, sạch sẽ và an toàn. Bên cạnh đó, công ty còn phát triển mạnh mẽ mảng thi công xây dựng hạ tầng giao thông và trang trại chăn nuôi gia súc theo hướng bền vững.');
$homeIntroCardTitle = get_setting('home_intro_card_title', 'VIỆT LỆ THANH');
$homeIntroCardAddress = get_setting('home_intro_card_address', 'Trụ sở tại: 77 Quang Trung, thị trấn Chư Ty, Đức Cơ, Gia Lai');
$homeIntroFeature1Title = get_setting('home_intro_feature1_title', 'Uy Tín Hàng Đầu');
$homeIntroFeature1Sub = get_setting('home_intro_feature1_sub', 'Đặt chất lượng lên trên hết');
$homeIntroFeature2Title = get_setting('home_intro_feature2_title', 'Dịch Vụ Chu Đáo');
$homeIntroFeature2Sub = get_setting('home_intro_feature2_sub', 'Phục vụ khách hàng 24/7');
$homeIntroButtonText = get_setting('home_intro_button_text', 'Xem Chi Tiết');
$homeIntroButtonLink = get_setting('home_intro_button_link', '/gioi-thieu');

$homeWhyEyebrow = get_setting('home_why_eyebrow', 'Giá Trị Cốt Lõi');
$homeWhyTitle = get_setting('home_why_title', 'Tại Sao Nên Chọn Chúng Tôi');
$homeWhyCard1Title = get_setting('home_why_card1_title', 'Vị Trí Đắc Địa');
$homeWhyCard1Desc = get_setting('home_why_card1_desc', 'Nằm ngay trung tâm thị trấn Chư Ty, Đức Cơ, thuận tiện cho việc di chuyển, giao thương và lưu trú nghỉ dưỡng.');
$homeWhyCard2Title = get_setting('home_why_card2_title', 'Giá Cả Hợp Lý');
$homeWhyCard2Desc = get_setting('home_why_card2_desc', 'Cung cấp phòng lưu trú đầy đủ tiện nghi và các dịch vụ xây dựng với mức giá cạnh tranh nhất thị trường.');
$homeWhyCard3Title = get_setting('home_why_card3_title', 'Đội Ngũ Tận Tâm');
$homeWhyCard3Desc = get_setting('home_why_card3_desc', 'Đội ngũ kỹ sư xây dựng lành nghề và nhân viên khách sạn phục vụ chuyên nghiệp, chu đáo.');

$homeStats = [
    ['value' => get_setting('home_stats_item1_value', '9+'), 'title' => get_setting('home_stats_item1_title', 'Năm Hoạt Động')],
    ['value' => get_setting('home_stats_item2_value', '100%'), 'title' => get_setting('home_stats_item2_title', 'Khách Hàng Hài Lòng')],
    ['value' => get_setting('home_stats_item3_value', '50+'), 'title' => get_setting('home_stats_item3_title', 'Công Trình Đã Thi Công')],
    ['value' => get_setting('home_stats_item4_value', '24/7'), 'title' => get_setting('home_stats_item4_title', 'Hỗ Trợ Phục Vụ')],
];

$homeServicesEyebrow = get_setting('home_services_eyebrow', 'Lĩnh Vực Hoạt Động');
$homeServicesTitle = get_setting('home_services_title', 'Dịch Vụ Của Chúng Tôi');
$homeServicesEmptyText = get_setting('home_services_empty_text', 'Đang cập nhật danh sách dịch vụ...');

$homeGalleryEyebrow = get_setting('home_gallery_eyebrow', 'Hình Ảnh Thực Tế');
$homeGalleryTitle = get_setting('home_gallery_title', 'Thư Viện Ảnh Hoạt Động');
$homeGalleryViewAllText = get_setting('home_gallery_view_all_text', 'Xem Tất Cả Hình Ảnh');
$homeGalleryEmptyText = get_setting('home_gallery_empty_text', 'Đang cập nhật thư viện ảnh...');

$homeNewsEyebrow = get_setting('home_news_eyebrow', 'Tin Tức Mới Nhất');
$homeNewsTitle = get_setting('home_news_title', 'Bản Tin Việt Lệ Thanh');
$homeNewsEmptyText = get_setting('home_news_empty_text', 'Đang cập nhật tin tức mới...');
$homeNewsReadMoreText = get_setting('home_news_read_more_text', 'Đọc Tiếp');

$homePartnersEmptyPrefix = get_setting('home_partners_empty_prefix', 'Đối tác');

$homeSectionOrders = [
    'home-intro'        => (int) get_setting('home_section_order_intro', '10'),
    'home-why'          => (int) get_setting('home_section_order_why', '20'),
    'home-services'     => (int) get_setting('home_section_order_services', '30'),
    'home-gallery'      => (int) get_setting('home_section_order_gallery', '40'),
    'home-news'         => (int) get_setting('home_section_order_news', '50'),
    'home-partners'     => (int) get_setting('home_section_order_partners', '60'),
    'home-certificates' => (int) get_setting('home_section_order_certificates', '70'),
];

$extractYouTubeId = static function (string $url): ?string {
    $url = trim($url);
    if ($url === '') {
        return null;
    }

    if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{11})~i', $url, $m)) {
        return $m[1] ?? null;
    }

    return null;
};
?>

<!-- Hero Slider Section (Swiper) -->
<section class="hero-slider swiper">
    <div class="swiper-wrapper">
        <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $banner): ?>
                <div class="swiper-slide hero-slide-item" style="background-image: url('<?= base_url('uploads/banners/' . esc($banner['desktop_image'])) ?>');">
                    <div class="hero-slide-overlay"></div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <span class="hero-label"><i class="bi bi-building me-1"></i> <?= esc($homeHeroLabel) ?></span>
                            <h2 class="text-white fw-bold"><?= esc($banner['title']) ?></h2>
                            <p class="text-white-50"><?= esc($banner['subtitle']) ?></p>
                            <?php if (!empty($banner['button_text'])): ?>
                                <a href="<?= esc($banner['button_link']) ?>" class="btn btn-primary btn-custom btn-lg rounded-pill me-2">
                                    <?= esc($banner['button_text']) ?> <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?= base_url(ltrim($homeHeroContactLink, '/')) ?>" class="btn btn-outline-light btn-custom btn-lg rounded-pill">
                                <i class="bi bi-telephone me-1"></i> <?= esc($homeHeroContactText) ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Fallback Mock Banner -->
            <div class="swiper-slide hero-slide-item" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                <div class="hero-slide-overlay"></div>
                <!-- decorative circles -->
                <div style="position:absolute;width:500px;height:500px;border-radius:50%;border:1px solid rgba(255,255,255,0.06);top:-100px;right:-80px;z-index:1;"></div>
                <div style="position:absolute;width:320px;height:320px;border-radius:50%;border:1px solid rgba(255,255,255,0.08);top:80px;right:80px;z-index:1;"></div>
                <div class="container">
                    <div class="hero-slide-content">
                        <span class="hero-label"><i class="bi bi-building me-1"></i> <?= esc($homeHeroLabel) ?></span>
                        <h2 class="text-white fw-bold"><?= nl2br(esc($homeHeroTitle)) ?></h2>
                        <p class="text-white-50"><?= esc($homeHeroSub) ?></p>
                        <a href="<?= base_url(ltrim($homeCtaLink, '/')) ?>" class="btn btn-primary btn-custom btn-lg rounded-pill me-2">
                            <?= esc($homeCtaText) ?> <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="<?= base_url(ltrim($homeHeroContactLink, '/')) ?>" class="btn btn-outline-light btn-custom btn-lg rounded-pill">
                            <i class="bi bi-telephone me-1"></i> <?= esc($homeHeroContactText) ?>
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <!-- Add Pagination & Navigation -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next d-none d-md-flex"></div>
    <div class="swiper-button-prev d-none d-md-flex"></div>

    <!-- Bottom wave divider -->
    <div class="hero-wave-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" preserveAspectRatio="none">
            <path fill="#ffffff" fill-opacity="1" d="M0,40L60,34C120,28,240,16,360,18C480,20,600,36,720,40C840,44,960,36,1080,30C1200,24,1320,20,1380,18L1440,16L1440,60L1380,60C1320,60,1200,60,1080,60C960,60,840,60,720,60C600,60,480,60,360,60C240,60,120,60,60,60L0,60Z"></path>
        </svg>
    </div>
</section>

<!-- Company Introduction Section -->
<section class="section-padding home-sortable-section" data-home-section="home-intro" data-home-order="<?= $homeSectionOrders['home-intro'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center mb-4">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeIntroTitle) ?></span>
            <p class="text-muted mb-0"><?= esc($homeIntroText) ?></p>
        </div>
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <div class="bg-primary rounded-3 position-absolute" style="top: -15px; left: -15px; width: 100%; height: 100%; z-index: -1; opacity: 0.1;"></div>
                    <!-- Mock introduction image (we will use a premium colored div/gradient or placeholder) -->
                    <div class="rounded-3 shadow-md bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 400px; background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                        <div class="text-center p-4">
                            <i class="bi bi-building fs-1 mb-3"></i>
                            <h3><?= esc($homeIntroCardTitle) ?></h3>
                            <p class="mb-0"><?= esc($homeIntroCardAddress) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeIntroEyebrow) ?></span>
                <h2 class="section-title-left mb-4"><?= esc($homeIntroHeading) ?></h2>
                <p><?= esc($homeIntroBody1) ?></p>
                <p><?= esc($homeIntroBody2) ?></p>
                <div class="row g-4 mt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-patch-check-fill text-primary fs-3 me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold"><?= esc($homeIntroFeature1Title) ?></h5>
                                <small class="text-muted"><?= esc($homeIntroFeature1Sub) ?></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-shield-fill-check text-primary fs-3 me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold"><?= esc($homeIntroFeature2Title) ?></h5>
                                <small class="text-muted"><?= esc($homeIntroFeature2Sub) ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url(ltrim($homeIntroButtonLink, '/')) ?>" class="btn btn-outline-primary btn-custom rounded-pill mt-4"><?= esc($homeIntroButtonText) ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us & Statistics -->
<section class="section-padding bg-light-gray home-sortable-section" data-home-section="home-why" data-home-order="<?= $homeSectionOrders['home-why'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeWhyEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeWhyTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4><?= esc($homeWhyCard1Title) ?></h4>
                    <p class="text-muted mb-0"><?= esc($homeWhyCard1Desc) ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h4><?= esc($homeWhyCard2Title) ?></h4>
                    <p class="text-muted mb-0"><?= esc($homeWhyCard2Desc) ?></p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4><?= esc($homeWhyCard3Title) ?></h4>
                    <p class="text-muted mb-0"><?= esc($homeWhyCard3Desc) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stat-section home-sortable-section" data-home-section="home-why" data-home-order="<?= $homeSectionOrders['home-why'] + 1 ?>">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <?php foreach ($homeStats as $stat): ?>
                <?php $homeStatCount = preg_replace('/\D+/', '', (string) $stat['value']) ?: '0'; ?>
                <div class="col-6 col-md-3">
                    <div class="stat-item">
                        <div class="stat-number" data-count="<?= esc($homeStatCount) ?>"><?= esc($stat['value']) ?></div>
                        <div class="stat-title"><?= esc($stat['title']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding home-sortable-section" id="services" data-home-section="home-services" data-home-order="<?= $homeSectionOrders['home-services'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeServicesEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeServicesTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-img-wrapper">
                                <!-- Placeholders for demo, using stylized divs if file missing -->
                                <div class="w-100 h-100 bg-primary d-flex align-items-center justify-content-center text-white" style="background: linear-gradient(135deg, rgba(var(--primary-rgb),0.85), rgba(var(--primary-dark-rgb),0.92));">
                                    <i class="bi <?= esc($service['icon']) ?> fs-1"></i>
                                </div>
                                <div class="service-icon-badge">
                                    <i class="bi <?= esc($service['icon']) ?>"></i>
                                </div>
                            </div>
                            <div class="service-info">
                                <h3><a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>"><?= esc($service['title']) ?></a></h3>
                                <p class="text-muted mb-4"><?= esc($service['summary']) ?></p>
                                <a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>" class="btn btn-outline-primary btn-custom btn-sm rounded-pill">Xem thêm <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted"><?= esc($homeServicesEmptyText) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="section-padding home-sortable-section" id="gallery" data-home-section="home-gallery" data-home-order="<?= $homeSectionOrders['home-gallery'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeGalleryEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeGalleryTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($gallery)): ?>
                <?php foreach ($gallery as $item): ?>
                    <?php
                    $homeGalleryImagePath = !empty($item['image']) ? FCPATH . 'uploads/gallery/' . $item['image'] : '';
                    $homeGalleryImageUrl = !empty($item['image']) ? base_url('uploads/gallery/' . $item['image']) : '';
                    $homeGalleryVideoUrl = trim((string) ($item['video'] ?? ''));
                    $homeGalleryYouTubeId = $extractYouTubeId($homeGalleryVideoUrl);
                    $isHomeGalleryVideo = !empty($homeGalleryYouTubeId);
                    $homeGalleryVideoThumb = $isHomeGalleryVideo ? ('https://img.youtube.com/vi/' . $homeGalleryYouTubeId . '/hqdefault.jpg') : '';
                    $homeGalleryVideoEmbed = $isHomeGalleryVideo ? ('https://www.youtube.com/embed/' . $homeGalleryYouTubeId . '?autoplay=1&rel=0') : '';
                    $homeGalleryPreviewUrl = $isHomeGalleryVideo ? $homeGalleryVideoThumb : $homeGalleryImageUrl;
                    $homeGalleryHasPreview = $isHomeGalleryVideo || (!empty($homeGalleryImagePath) && file_exists($homeGalleryImagePath));
                    $homeGalleryOpenUrl = $isHomeGalleryVideo ? $homeGalleryVideoEmbed : (!empty($homeGalleryImageUrl) ? $homeGalleryImageUrl : '#');
                    ?>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="gallery-item">
                            <div class="w-100 h-100 bg-dark d-flex align-items-center justify-content-center text-white text-center position-relative">
                                <?php if ($homeGalleryHasPreview): ?>
                                    <img src="<?= $homeGalleryPreviewUrl ?>" alt="<?= esc($item['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                    <?php if ($isHomeGalleryVideo): ?>
                                        <span class="gallery-play-badge" aria-hidden="true"><i class="bi bi-play-fill"></i></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="p-3"><?= esc($item['title']) ?></span>
                                <?php endif; ?>
                                <a href="<?= $homeGalleryOpenUrl ?>" data-fancybox="gallery" <?= $isHomeGalleryVideo ? 'data-type="iframe"' : '' ?> data-caption="<?= esc($item['title']) ?>" class="gallery-overlay">
                                    <i class="bi <?= $isHomeGalleryVideo ? 'bi-play-circle' : 'bi-plus-circle' ?> gallery-icon"></i>
                                    <span class="fw-semibold"><?= esc($item['title']) ?></span>
                                    <small class="mt-1"><?= $isHomeGalleryVideo ? 'Xem video' : 'Xem ảnh lớn' ?></small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted"><?= esc($homeGalleryEmptyText) ?></p>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= base_url('thu-vien') ?>" class="btn btn-outline-primary btn-custom rounded-pill"><?= esc($homeGalleryViewAllText) ?></a>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="section-padding home-sortable-section" data-home-section="home-news" data-home-order="<?= $homeSectionOrders['home-news'] ?>">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc($homeNewsEyebrow) ?></span>
            <h2 class="section-title"><?= esc($homeNewsTitle) ?></h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <?php
                    $homeNewsImageRaw = (string) ($item['image'] ?? '');
                    $homeNewsImagePath = '';
                    $homeNewsImageUrl = '';
                    if ($homeNewsImageRaw !== '') {
                        if (strpos($homeNewsImageRaw, 'uploads/') === 0) {
                            $homeNewsImagePath = FCPATH . $homeNewsImageRaw;
                            $homeNewsImageUrl = base_url($homeNewsImageRaw);
                        } else {
                            $homeNewsImagePath = FCPATH . 'uploads/news/' . $homeNewsImageRaw;
                            $homeNewsImageUrl = base_url('uploads/news/' . $homeNewsImageRaw);
                        }
                    }
                    ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="news-card">
                            <div class="news-img-wrapper">
                                <?php if (!empty($homeNewsImagePath) && file_exists($homeNewsImagePath)): ?>
                                    <img src="<?= $homeNewsImageUrl ?>" alt="<?= esc($item['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                <?php else: ?>
                                    <div class="w-100 h-100 bg-secondary text-white d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                                        <i class="bi bi-newspaper fs-1"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="news-body">
                                <div class="news-meta">
                                    <i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($item['published_at'])) ?>
                                </div>
                                <h3 class="news-title"><a href="<?= base_url('tin-tuc/' . esc($item['slug'])) ?>"><?= esc($item['title']) ?></a></h3>
                                <p class="text-muted small"><?= esc($item['summary']) ?></p>
                                <a href="<?= base_url('tin-tuc/' . esc($item['slug'])) ?>" class="btn btn-link text-primary p-0 text-decoration-none fw-bold small"><?= esc($homeNewsReadMoreText) ?> <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted"><?= esc($homeNewsEmptyText) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="section-padding bg-light-gray home-sortable-section home-partners-section" data-home-section="home-partners" data-home-order="<?= $homeSectionOrders['home-partners'] ?>">
    <div class="container">
        <div class="swiper partners-slider">
            <div class="swiper-wrapper align-items-center">
                <?php if (!empty($partners)): ?>
                    <?php foreach ($partners as $partner): ?>
                        <div class="swiper-slide text-center">
                            <?php
                            $logoPath = !empty($partner['logo']) ? FCPATH . 'uploads/partners/' . $partner['logo'] : null;
                            $logoUrl = !empty($partner['logo']) ? base_url('uploads/partners/' . $partner['logo']) : '';
                            $hasLogo = $logoPath && file_exists($logoPath);
                            ?>
                            <?php if ($hasLogo): ?>
                                <?php if (!empty($partner['link']) && $partner['link'] !== '#'): ?>
                                    <a href="<?= esc($partner['link']) ?>" target="_blank" rel="noopener" class="d-inline-flex align-items-center justify-content-center p-3 bg-white shadow-sm rounded-3 border" style="height:80px;min-width:150px;">
                                        <img src="<?= $logoUrl ?>" alt="<?= esc($partner['name']) ?>" style="max-width:130px;max-height:56px;object-fit:contain;">
                                    </a>
                                <?php else: ?>
                                    <div class="d-inline-flex align-items-center justify-content-center p-3 bg-white shadow-sm rounded-3 border" style="height:80px;min-width:150px;">
                                        <img src="<?= $logoUrl ?>" alt="<?= esc($partner['name']) ?>" style="max-width:130px;max-height:56px;object-fit:contain;">
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="p-3 bg-white shadow-sm rounded-3 d-inline-block text-muted fw-bold border" style="min-width: 150px;">
                                    <?= esc($partner['name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php for($i=1; $i<=6; $i++): ?>
                        <div class="swiper-slide text-center">
                            <div class="p-3 bg-white shadow-sm rounded-3 d-inline-block text-muted fw-semibold border" style="min-width: 150px; font-size: 0.85rem;">
                                <i class="bi bi-building me-1"></i> <?= esc($homePartnersEmptyPrefix) ?> <?= $i ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Certificate Documents Section -->
<section class="section-padding home-sortable-section" id="certificates" data-home-section="home-certificates" data-home-order="<?= $homeSectionOrders['home-certificates'] ?>">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end flex-wrap gap-3 mb-4">
            <div class="section-title-wrapper text-start mb-0">
                <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc(lang('Site.legal_docs')) ?></span>
                <h2 class="section-title mb-0"><?= esc(lang('Site.certificates')) ?></h2>
            </div>
            <a href="<?= base_url('giay-to/loai/giay-chung-nhan') ?>" class="btn btn-outline-primary btn-custom rounded-pill"><?= esc(lang('Site.view_all')) ?></a>
        </div>

        <?php if (!empty($certificates)): ?>
            <div class="swiper certificates-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($certificates as $cert): ?>
                        <?php
                        $fileName = $cert['file_attachment'] ?: $cert['pdf_attachment'];
                        $fileUrl = '';
                        $fileExt = '';
                        $isImageFile = false;
                        if (!empty($fileName)) {
                            $fileExt = strtolower((string) pathinfo($fileName, PATHINFO_EXTENSION));
                            $mime = strtolower((string) ($cert['file_mime'] ?? ''));
                            $isImageFile = strpos($mime, 'image/') === 0 || in_array($fileExt, ['jpg', 'jpeg', 'png', 'webp', 'gif'], true);

                            if (file_exists(FCPATH . 'uploads/documents/' . $fileName)) {
                                $fileUrl = base_url('uploads/documents/' . $fileName);
                            } elseif (file_exists(FCPATH . 'uploads/certificates/' . $fileName)) {
                                $fileUrl = base_url('uploads/certificates/' . $fileName);
                            }
                        }

                        $imageUrl = '';
                        if (!empty($cert['image'])) {
                            if (file_exists(FCPATH . 'uploads/documents/' . $cert['image'])) {
                                $imageUrl = base_url('uploads/documents/' . $cert['image']);
                            } elseif (file_exists(FCPATH . 'uploads/certificates/' . $cert['image'])) {
                                $imageUrl = base_url('uploads/certificates/' . $cert['image']);
                            }
                        }

                        // Backward compatibility: if attachment itself is an image but image field is empty.
                        if (empty($imageUrl) && $isImageFile && !empty($fileUrl)) {
                            $imageUrl = $fileUrl;
                        }

                        $fileLabel = strtoupper($fileExt ?: 'file');
                        $fileIcon = 'bi-file-earmark-text';
                        $fileIconClass = 'text-primary';
                        if ($fileExt === 'pdf') {
                            $fileIcon = 'bi-file-earmark-pdf';
                            $fileIconClass = 'text-danger';
                        } elseif (in_array($fileExt, ['doc', 'docx'], true)) {
                            $fileIcon = 'bi-file-earmark-word';
                            $fileIconClass = 'text-primary';
                        } elseif (in_array($fileExt, ['xls', 'xlsx', 'csv'], true)) {
                            $fileIcon = 'bi-file-earmark-excel';
                            $fileIconClass = 'text-success';
                        } elseif (in_array($fileExt, ['zip', 'rar', '7z'], true)) {
                            $fileIcon = 'bi-file-earmark-zip';
                            $fileIconClass = 'text-warning';
                        }
                        ?>
                        <div class="swiper-slide">
                            <article class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                                <div class="ratio ratio-4x3 bg-white border-bottom d-flex align-items-center justify-content-center">
                                    <?php if (!empty($imageUrl)): ?>
                                        <a href="<?= $imageUrl ?>" data-fancybox="certificates" data-caption="<?= esc($cert['title']) ?>" class="d-block w-100 h-100">
                                            <img src="<?= $imageUrl ?>" alt="<?= esc($cert['title']) ?>" style="width:100%;height:100%;object-fit:contain;">
                                        </a>
                                    <?php else: ?>
                                        <div class="certificate-doc-placeholder">
                                            <div class="certificate-doc-icon-wrap">
                                                <i class="bi <?= esc($fileIcon) ?> <?= esc($fileIconClass) ?>"></i>
                                            </div>
                                            <div class="certificate-doc-meta">
                                                <span class="certificate-doc-label"><?= esc($fileLabel) ?></span>
                                                <span class="certificate-doc-sub"><?= esc(lang('Site.attachment_document')) ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="fw-bold mb-2" style="font-size:1rem;"><?= esc($cert['title']) ?></h5>
                                    <?php if (!empty($cert['organization']) || !empty($cert['issue_date'])): ?>
                                        <div class="small text-muted mb-2">
                                            <?php if (!empty($cert['organization'])): ?><div><i class="bi bi-building me-1"></i><?= esc($cert['organization']) ?></div><?php endif; ?>
                                            <?php if (!empty($cert['issue_date'])): ?><div><i class="bi bi-calendar3 me-1"></i><?= date('d/m/Y', strtotime($cert['issue_date'])) ?></div><?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (!empty($fileUrl) && !$isImageFile): ?>
                                        <a href="<?= $fileUrl ?>" target="_blank" class="btn btn-outline-primary btn-sm rounded-pill"><?= esc(lang('Site.view_file')) ?> <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php else: ?>
            <div class="text-center text-muted py-4"><?= esc(lang('Site.updating_certificates')) ?></div>
        <?php endif; ?>
    </div>
</section>

<script>
    (function () {
        var main = document.querySelector('main');
        if (!main) {
            return;
        }

        var sections = Array.prototype.slice.call(document.querySelectorAll('.home-sortable-section'));
        sections.sort(function (a, b) {
            var av = parseInt(a.getAttribute('data-home-order') || '9999', 10);
            var bv = parseInt(b.getAttribute('data-home-order') || '9999', 10);
            return av - bv;
        });

        sections.forEach(function (section) {
            main.appendChild(section);
        });
    })();
</script>

<?= $this->endSection() ?>
