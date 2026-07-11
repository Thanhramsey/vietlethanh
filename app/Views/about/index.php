<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$heroLabel = get_setting('about_hero_label', 'Về Chúng Tôi');
$heroTitle = get_setting('about_hero_title', 'Công ty TNHH MTV Việt Lệ Thanh');
$heroSub = get_setting('about_hero_sub', 'Uy tín — Chất lượng — Tận tâm phục vụ từ năm 2017 tại Gia Lai');

$statYear = get_setting('about_stat_year', '2017');
$statExp = get_setting('about_stat_exp', '7+');
$statSectors = get_setting('about_stat_sectors', '3');
$statQuality = get_setting('about_stat_quality', '100%');

$storyHeading = get_setting('about_story_heading', 'Hành Trình Phát Triển & Khẳng Định Uy Tín');
$storyIntro = get_setting('about_story_intro', 'Được thành lập năm 2017 tại huyện Đức Cơ, Công ty TNHH MTV Việt Lệ Thanh đã vươn lên trở thành doanh nghiệp đa ngành uy tín hàng đầu khu vực cửa khẩu Tây Nguyên.');
$storyBody1 = get_setting('about_story_body1', 'Khởi nghiệp từ dịch vụ lưu trú, đáp ứng nhu cầu của du khách và doanh nhân công tác tại Đức Cơ — khu kinh tế cửa khẩu sầm uất nhất Gia Lai. Với phương châm "Khách hàng là thượng đế", cơ sở liên tục được đầu tư nâng cấp.');
$storyBody2 = get_setting('about_story_body2', 'Song song đó, nhận thấy tiềm năng phát triển hạ tầng và nông nghiệp tại Tây Nguyên, công ty mạnh dạn mở rộng đầu tư vào thi công đường bộ giao thông nông thôn và mô hình chăn nuôi trâu, bò, heo hữu cơ khép kín.');

$companyInfos = [
    ['icon' => 'bi-building-fill', 'label' => lang('Site.full_name'), 'value' => get_setting('about_company_name_vi', 'CÔNG TY TNHH MỘT THÀNH VIÊN VIỆT LỆ THANH')],
    ['icon' => 'bi-globe', 'label' => lang('Site.international_name'), 'value' => get_setting('about_company_name_en', 'VIET LE THANH ONE MEMBER COMPANY LIMITED')],
    ['icon' => 'bi-hash', 'label' => lang('Site.tax_code'), 'value' => get_setting('about_tax_code', '5901061783')],
    ['icon' => 'bi-person-fill-check', 'label' => lang('Site.legal_representative'), 'value' => get_setting('about_legal_rep', 'NGUYỄN HỮU VIỆT')],
    ['icon' => 'bi-calendar-event', 'label' => lang('Site.license_date'), 'value' => get_setting('about_license_date', '30/05/2017')],
    ['icon' => 'bi-geo-alt-fill', 'label' => lang('Site.head_office'), 'value' => get_setting('about_address', '77 Quang Trung, khu phố II, Thị trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai')],
];

$vision = get_setting('about_vision', 'Trở thành biểu tượng uy tín hàng đầu tại Đức Cơ — Gia Lai trong lĩnh vực dịch vụ lưu trú chất lượng cao, đồng thời là nhà thầu thi công hạ tầng giao thông tin cậy của tỉnh nhà.');
$mission = get_setting('about_mission', 'Cung cấp giải pháp lưu trú ấm cúng, an toàn; xây dựng những tuyến đường giao thông bền vững thúc đẩy giao thương biên giới; cung cấp thực phẩm sạch từ nông nghiệp hữu cơ cho cộng đồng.');
$valuesRaw = get_setting('about_values', "Chất lượng: Đảm bảo tuyệt đối ở mọi dịch vụ\nTận tâm: Luôn đặt khách hàng là trung tâm\nTrách nhiệm: Đóng góp tích cực cho địa phương");
$valueLines = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $valuesRaw))));
if (empty($valueLines)) {
    $valueLines = [
        'Chất lượng: Đảm bảo tuyệt đối ở mọi dịch vụ',
        'Tận tâm: Luôn đặt khách hàng là trung tâm',
        'Trách nhiệm: Đóng góp tích cực cho địa phương',
    ];
}
?>

<!-- ===================== PAGE HERO BANNER ===================== -->
<div class="about-hero-banner">
    <div class="about-hero-overlay"></div>
    <!-- Animated decorative circles -->
    <div class="about-hero-deco deco-1"></div>
    <div class="about-hero-deco deco-2"></div>
    <div class="about-hero-deco deco-3"></div>
    <div class="container position-relative" style="z-index:2;">
        <div data-aos="fade-up" data-aos-duration="900">
            <span class="about-hero-label"><i class="bi bi-building me-2"></i><?= esc($heroLabel) ?></span>
            <h1 class="about-hero-title"><?= nl2br(esc($heroTitle)) ?></h1>
            <p class="about-hero-sub"><?= esc($heroSub) ?></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= esc(lang('Site.home')) ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= esc(lang('Site.about')) ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="about-hero-wave">
        <svg viewBox="0 0 1440 80" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path fill="#ffffff" d="M0,40 C240,80 480,0 720,40 C960,80 1200,10 1440,40 L1440,80 L0,80 Z"/>
        </svg>
    </div>
</div>

<!-- ===================== STATS STRIP ===================== -->
<div class="about-stats-strip">
    <div class="container">
        <div class="row g-0">
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="0">
                <div class="stat-item">
                    <div class="stat-number" data-count="<?= esc(preg_replace('/\D+/', '', (string) $statYear) ?: '0') ?>"><?= esc($statYear) ?></div>
                    <div class="stat-label"><?= esc(lang('Site.founded_year')) ?></div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-number" data-count="<?= esc(preg_replace('/\D+/', '', (string) $statExp) ?: '0') ?>"><?= esc($statExp) ?></div>
                    <div class="stat-label"><?= esc(lang('Site.years_experience')) ?></div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-number" data-count="<?= esc(preg_replace('/\D+/', '', (string) $statSectors) ?: '0') ?>"><?= esc($statSectors) ?></div>
                    <div class="stat-label"><?= esc(lang('Site.business_sectors')) ?></div>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-number" data-count="<?= esc(preg_replace('/\D+/', '', (string) $statQuality) ?: '0') ?>"><?= esc($statQuality) ?></div>
                    <div class="stat-label"><?= esc(lang('Site.quality_commitment')) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===================== STORY SECTION ===================== -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- Image side -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="900">
                <div class="about-img-wrapper">
                    <div class="about-img-main">
                        <div class="about-img-placeholder">
                            <i class="bi bi-building"></i>
                            <p>VIỆT LỆ THANH</p>
                            <small>Đức Cơ · Gia Lai</small>
                        </div>
                    </div>
                    <div class="about-img-badge">
                        <i class="bi bi-patch-check-fill fs-2 text-primary mb-2"></i>
                        <div class="fw-bold">Uy tín</div>
                        <small class="text-muted">Hàng đầu khu vực</small>
                    </div>
                    <div class="about-img-years">
                        <span class="display-4 fw-black text-primary">7+</span>
                        <div class="fw-semibold lh-1" style="font-size:0.85rem;">Năm<br>kinh nghiệm</div>
                    </div>
                </div>
            </div>

            <!-- Text side -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="900">
                <span class="section-eyebrow"><i class="bi bi-building me-2"></i><?= esc(lang('Site.our_story')) ?></span>
                <h2 class="section-title-left mb-4"><?= esc($storyHeading) ?></h2>
                <p class="lead text-muted"><?= esc($storyIntro) ?></p>
                <p class="text-muted"><?= esc($storyBody1) ?></p>
                <p class="text-muted"><?= esc($storyBody2) ?></p>

                <!-- Feature list -->
                <div class="row g-3 mt-2">
                    <div class="col-sm-6">
                        <div class="about-feat-item">
                            <i class="bi bi-house-heart-fill text-primary"></i>
                            <span><?= esc(lang('Site.short_stay_service')) ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feat-item">
                            <i class="bi bi-hammer text-primary"></i>
                            <span><?= esc(lang('Site.infrastructure_construction')) ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feat-item">
                            <i class="bi bi-tree-fill text-primary"></i>
                            <span><?= esc(lang('Site.organic_agriculture')) ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="about-feat-item">
                            <i class="bi bi-shield-fill-check text-primary"></i>
                            <span><?= esc(lang('Site.service_247')) ?></span>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('lien-he') ?>" class="btn btn-primary btn-custom rounded-pill mt-4">
                    <i class="bi bi-chat-dots me-1"></i> <?= esc(lang('Site.contact_consultation')) ?>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===================== COMPANY INFO SECTION ===================== -->
<section class="section-padding" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%); position:relative; overflow:hidden;">
    <!-- BG decorations -->
    <div style="position:absolute;width:600px;height:600px;border-radius:50%;border:1px solid rgba(255,255,255,0.05);top:-200px;right:-150px;"></div>
    <div style="position:absolute;width:400px;height:400px;border-radius:50%;border:1px solid rgba(255,255,255,0.07);bottom:-100px;left:-100px;"></div>
    <div class="container position-relative" style="z-index:1;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-eyebrow" style="color:rgba(255,255,255,0.7)"><i class="bi bi-file-earmark-text me-2"></i><?= esc(lang('Site.legal_information')) ?></span>
            <h2 class="section-title text-white"><?= esc(lang('Site.business_registration_info')) ?></h2>
        </div>
        <div class="row g-4">
            <?php
            foreach ($companyInfos as $i => $info):
            ?>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="<?= $i * 80 ?>">
                <div class="about-info-card">
                    <div class="about-info-icon">
                        <i class="bi <?= $info['icon'] ?>"></i>
                    </div>
                    <div>
                        <div class="about-info-label"><?= $info['label'] ?></div>
                        <div class="about-info-value"><?= $info['value'] ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ===================== VISION / MISSION / VALUES ===================== -->
<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-eyebrow"><i class="bi bi-stars me-2"></i><?= esc(lang('Site.development_orientation')) ?></span>
            <h2 class="section-title"><?= esc(lang('Site.vision_mission_values')) ?></h2>
        </div>
        <div class="row g-4">
            <!-- Tầm nhìn -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="vmv-card vmv-vision">
                    <div class="vmv-icon-wrap">
                        <i class="bi bi-eye-fill"></i>
                    </div>
                    <div class="vmv-number">01</div>
                    <h4 class="vmv-title"><?= esc(lang('Site.vision')) ?></h4>
                    <p class="vmv-text"><?= esc($vision) ?></p>
                    <div class="vmv-line"></div>
                </div>
            </div>
            <!-- Sứ mệnh -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="vmv-card vmv-mission">
                    <div class="vmv-icon-wrap">
                        <i class="bi bi-compass-fill"></i>
                    </div>
                    <div class="vmv-number">02</div>
                    <h4 class="vmv-title"><?= esc(lang('Site.mission')) ?></h4>
                    <p class="vmv-text"><?= esc($mission) ?></p>
                    <div class="vmv-line"></div>
                </div>
            </div>
            <!-- Giá trị -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="vmv-card vmv-values">
                    <div class="vmv-icon-wrap">
                        <i class="bi bi-award-fill"></i>
                    </div>
                    <div class="vmv-number">03</div>
                    <h4 class="vmv-title"><?= esc(lang('Site.core_values')) ?></h4>
                    <ul class="vmv-list">
                        <?php foreach ($valueLines as $line): ?>
                            <?php
                            $parts = explode(':', $line, 2);
                            $head = trim($parts[0]);
                            $tail = trim($parts[1] ?? '');
                            ?>
                            <li>
                                <i class="bi bi-check-circle-fill"></i>
                                <?php if ($tail !== ''): ?>
                                    <strong><?= esc($head) ?>:</strong> <?= esc($tail) ?>
                                <?php else: ?>
                                    <?= esc($line) ?>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="vmv-line"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== TIMELINE SECTION ===================== -->
<section class="section-padding timeline-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-eyebrow"><i class="bi bi-clock-history me-2"></i><?= esc(lang('Site.development_history')) ?></span>
            <h2 class="section-title"><?= esc(lang('Site.vlt_timeline')) ?></h2>
        </div>

        <?php if (!empty($milestones)): ?>
            <div class="timeline-shell" data-aos="fade-up" data-aos-delay="80">
                <div class="timeline-years" role="tablist" aria-label="Các mốc thời gian">
                    <?php foreach ($milestones as $idx => $m): ?>
                        <button
                            type="button"
                            class="timeline-year-btn<?= $idx === 0 ? ' active' : '' ?>"
                            data-target="timeline-item-<?= (int) $m['id'] ?>"
                            aria-selected="<?= $idx === 0 ? 'true' : 'false' ?>">
                            <span class="dot"></span>
                            <span class="year-text"><?= esc($m['year']) ?></span>
                        </button>
                    <?php endforeach; ?>
                </div>

                <div class="timeline-details-wrap">
                    <?php foreach ($milestones as $idx => $m): ?>
                        <article
                            id="timeline-item-<?= (int) $m['id'] ?>"
                            class="timeline-detail<?= $idx === 0 ? ' active' : '' ?>"
                            role="tabpanel"
                            <?= $idx === 0 ? '' : 'hidden' ?>>
                            <div class="timeline-detail-grid">
                                <div class="timeline-detail-content">
                                    <div class="timeline-chip"><?= esc(lang('Site.milestone_year')) ?> <?= esc($m['year']) ?></div>
                                    <h3 class="timeline-title"><?= esc($m['title']) ?></h3>
                                    <p class="timeline-description"><?= nl2br(esc($m['description'] ?? '')) ?></p>
                                </div>
                                <div class="timeline-detail-media">
                                    <?php if (!empty($m['image'])): ?>
                                        <img src="<?= base_url('uploads/milestones/' . $m['image']) ?>" alt="<?= esc($m['title']) ?>">
                                    <?php else: ?>
                                        <div class="timeline-media-placeholder">
                                            <i class="bi bi-image"></i>
                                            <span><?= esc(lang('Site.no_image_for_milestone')) ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- ===================== 3 CORE SECTORS ===================== -->
<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="section-eyebrow"><i class="bi bi-grid-3x3-gap me-2"></i><?= esc(lang('Site.business_sectors')) ?></span>
            <h2 class="section-title"><?= esc(lang('Site.three_development_pillars')) ?></h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="sector-card sector-hotel">
                    <div class="sector-icon-ring">
                        <i class="bi bi-house-heart-fill"></i>
                    </div>
                    <h4><?= esc(lang('Site.short_stay_service')) ?></h4>
                    <p>Hệ thống phòng nghỉ tiện nghi, sạch sẽ và an toàn dành cho du khách và doanh nhân công tác tại Đức Cơ — cửa khẩu giao thương quốc tế sầm uất.</p>
                    <a href="<?= base_url('dich-vu') ?>" class="sector-link"><?= esc(lang('Site.view_detail')) ?> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="150">
                <div class="sector-card sector-construction">
                    <div class="sector-icon-ring">
                        <i class="bi bi-hammer"></i>
                    </div>
                    <h4><?= esc(lang('Site.infrastructure_construction')) ?></h4>
                    <p>Chuyên thi công các tuyến đường giao thông nông thôn, cầu cống và công trình dân dụng với tiêu chuẩn kỹ thuật cao, đảm bảo tiến độ và chất lượng.</p>
                    <a href="<?= base_url('dich-vu') ?>" class="sector-link"><?= esc(lang('Site.view_detail')) ?> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="sector-card sector-farm">
                    <div class="sector-icon-ring">
                        <i class="bi bi-tree-fill"></i>
                    </div>
                    <h4><?= esc(lang('Site.organic_farm')) ?></h4>
                    <p>Mô hình chăn nuôi trâu, bò, heo hữu cơ khép kín theo hướng bền vững, cung cấp thực phẩm sạch an toàn cho cộng đồng địa phương và khu vực.</p>
                    <a href="<?= base_url('dich-vu') ?>" class="sector-link"><?= esc(lang('Site.view_detail')) ?> <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================== CTA SECTION ===================== -->
<section class="about-cta-section">
    <div class="container" data-aos="fade-up">
        <div class="about-cta-inner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h3 class="text-white fw-bold mb-2">Sẵn sàng hợp tác cùng Việt Lệ Thanh?</h3>
                    <p class="text-white-50 mb-0">Liên hệ ngay để được tư vấn dịch vụ và nhận báo giá tốt nhất từ đội ngũ chuyên nghiệp của chúng tôi.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="<?= base_url('lien-he') ?>" class="btn btn-light btn-custom btn-lg rounded-pill me-2">
                        <i class="bi bi-chat-dots-fill me-1"></i> Liên Hệ Ngay
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Page-specific CSS -->
<style>
/* ===== ABOUT HERO BANNER ===== */
.about-hero-banner {
    position: relative;
    background: linear-gradient(135deg, color-mix(in srgb, var(--primary-dark) 75%, #000 25%) 0%, var(--primary-dark) 45%, var(--primary-color) 100%);
    padding: 120px 0 100px;
    overflow: hidden;
    text-align: center;
    color: #fff;
}
.about-hero-overlay {
    position: absolute; inset: 0;
    background: radial-gradient(ellipse at 70% 50%, rgba(41,115,232,0.18) 0%, transparent 70%);
}
.about-hero-deco {
    position: absolute;
    border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.07);
    animation: heroDeco 6s ease-in-out infinite;
}
.deco-1 { width: 600px; height: 600px; top:-200px; right:-100px; animation-delay: 0s; }
.deco-2 { width: 380px; height: 380px; bottom:-100px; left:-80px; animation-delay: 1.5s; }
.deco-3 { width: 200px; height: 200px; top:60px; left:15%; animation-delay: 3s; }
@keyframes heroDeco {
    0%,100% { transform: scale(1); opacity: 0.5; }
    50%      { transform: scale(1.06); opacity: 0.9; }
}
.about-hero-label {
    display: inline-block;
    background: rgba(255,255,255,0.12);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 30px;
    padding: 6px 22px;
    font-size: 0.82rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 20px;
}
.about-hero-title {
    font-size: clamp(2rem, 5vw, 3.6rem);
    font-weight: 800;
    line-height: 1.15;
    margin-bottom: 16px;
}
.about-hero-highlight {
    background: linear-gradient(90deg, #60a5fa, #a78bfa, #34d399);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.about-hero-sub {
    font-size: 1.1rem;
    color: rgba(255,255,255,0.75);
    margin-bottom: 24px;
}
.about-hero-wave {
    position: absolute;
    bottom: -1px; left: 0; width: 100%;
    line-height: 0;
}
.about-hero-wave svg { display: block; width: 100%; height: 60px; }

/* ===== STATS STRIP ===== */
.about-stats-strip {
    background: #fff;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    position: relative;
    z-index: 10;
}
.stat-item {
    text-align: center;
    padding: 28px 20px;
    border-right: 1px solid #f0f0f0;
}
.stat-item:last-child { border-right: none; }
.stat-number {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary-color);
    line-height: 1;
    margin-bottom: 6px;
}
.stat-label {
    font-size: 0.82rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #888;
    font-weight: 500;
}

/* ===== ABOUT IMAGE WRAPPER ===== */
.about-img-wrapper {
    position: relative;
    padding-bottom: 40px;
    padding-right: 40px;
}
.about-img-main {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 60px rgba(30,60,114,0.2);
}
.about-img-placeholder {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
    height: 420px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;
}
.about-img-placeholder i { font-size: 5rem; opacity: 0.5; margin-bottom: 16px; }
.about-img-placeholder p { font-size: 1.5rem; font-weight: 700; margin: 0 0 6px; }
.about-img-placeholder small { opacity: 0.6; font-size: 0.9rem; }
.about-img-badge {
    position: absolute;
    bottom: 0; right: 0;
    background: #fff;
    border-radius: 16px;
    padding: 20px 24px;
    text-align: center;
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    min-width: 130px;
}
.about-img-years {
    position: absolute;
    top: -20px; left: -20px;
    background: var(--primary-color);
    color: #fff;
    border-radius: 16px;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    gap: 8px;
    box-shadow: 0 8px 24px rgba(30,60,114,0.35);
}
.about-img-years .display-4 { font-size: 2.2rem; line-height: 1; }

/* ===== EYEBROW ===== */
.section-eyebrow {
    display: inline-block;
    background: rgba(var(--primary-dark-rgb), 0.08);
    color: var(--primary-color);
    font-size: 0.78rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    padding: 5px 16px;
    border-radius: 20px;
    margin-bottom: 14px;
}

/* ===== FEATURE ITEMS ===== */
.about-feat-item {
    display: flex;
    align-items: center;
    gap: 12px;
    background: #f8faff;
    border: 1px solid rgba(var(--primary-dark-rgb), 0.08);
    border-radius: 10px;
    padding: 12px 16px;
    font-weight: 500;
    font-size: 0.9rem;
    transition: all 0.2s;
}
.about-feat-item:hover {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
}
.about-feat-item:hover i { color: #fff !important; }
.about-feat-item i { font-size: 1.2rem; }

/* ===== COMPANY INFO CARDS ===== */
.about-info-card {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    background: rgba(255,255,255,0.07);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 14px;
    padding: 20px 22px;
    transition: background 0.25s, transform 0.25s;
}
.about-info-card:hover {
    background: rgba(255,255,255,0.13);
    transform: translateY(-3px);
}
.about-info-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    background: rgba(255,255,255,0.15);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem;
    color: #fff;
    flex-shrink: 0;
}
.about-info-label {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255,255,255,0.5);
    margin-bottom: 4px;
}
.about-info-value {
    font-weight: 600;
    color: #fff;
    font-size: 0.92rem;
    line-height: 1.4;
}

/* ===== VMV CARDS ===== */
.vmv-card {
    position: relative;
    background: #fff;
    border-radius: 20px;
    padding: 40px 32px 32px;
    height: 100%;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}
.vmv-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 48px rgba(30,60,114,0.15);
}
.vmv-icon-wrap {
    width: 64px; height: 64px;
    border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.7rem;
    color: #fff;
    margin-bottom: 20px;
}
.vmv-vision .vmv-icon-wrap  { background: linear-gradient(135deg, var(--primary-dark), var(--primary-color)); }
.vmv-mission .vmv-icon-wrap { background: linear-gradient(135deg, var(--accent-color), var(--primary-dark)); }
.vmv-values .vmv-icon-wrap  { background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); }
.vmv-number {
    position: absolute;
    top: 20px; right: 28px;
    font-size: 4rem;
    font-weight: 900;
    color: rgba(0,0,0,0.04);
    line-height: 1;
}
.vmv-title {
    font-size: 1.15rem;
    font-weight: 700;
    margin-bottom: 14px;
    color: #1a1a2e;
}
.vmv-text {
    color: #666;
    line-height: 1.75;
    font-size: 0.9rem;
}
.vmv-list {
    list-style: none;
    padding: 0;
    margin: 0;
}
.vmv-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    color: #555;
    font-size: 0.88rem;
    margin-bottom: 10px;
    line-height: 1.5;
}
.vmv-list li i { color: var(--accent-color); flex-shrink: 0; margin-top: 2px; }
.vmv-line {
    position: absolute;
    bottom: 0; left: 0;
    height: 4px; width: 100%;
}
.vmv-vision .vmv-line  { background: linear-gradient(90deg, var(--primary-dark), var(--primary-color)); }
.vmv-mission .vmv-line { background: linear-gradient(90deg, var(--accent-color), var(--primary-dark)); }
.vmv-values .vmv-line  { background: linear-gradient(90deg, var(--primary-color), var(--accent-color)); }

/* ===== SECTOR CARDS ===== */
.sector-card {
    position: relative;
    background: #fff;
    border-radius: 20px;
    padding: 40px 30px 36px;
    height: 100%;
    box-shadow: 0 4px 24px rgba(0,0,0,0.06);
    overflow: hidden;
    transition: all 0.35s;
    border-top: 4px solid transparent;
}
.sector-hotel      { border-top-color: var(--primary-color); }
.sector-construction { border-top-color: var(--accent-color); }
.sector-farm       { border-top-color: var(--primary-dark); }
.sector-card:hover { transform: translateY(-8px); box-shadow: 0 20px 56px rgba(0,0,0,0.12); }
.sector-icon-ring {
    width: 72px; height: 72px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.8rem;
    color: #fff;
    margin-bottom: 22px;
}
.sector-hotel .sector-icon-ring      { background: linear-gradient(135deg, var(--primary-dark), var(--primary-color)); }
.sector-construction .sector-icon-ring { background: linear-gradient(135deg, var(--accent-color), var(--primary-color)); }
.sector-farm .sector-icon-ring       { background: linear-gradient(135deg, var(--primary-dark), var(--accent-color)); }
.sector-card h4 { font-weight: 700; margin-bottom: 14px; color: #1a1a2e; }
.sector-card p  { color: #666; font-size: 0.9rem; line-height: 1.75; margin-bottom: 20px; }
.sector-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    font-size: 0.85rem;
    text-decoration: none;
    transition: gap 0.2s;
}
.sector-hotel .sector-link      { color: var(--primary-color); }
.sector-construction .sector-link { color: var(--accent-color); }
.sector-farm .sector-link       { color: var(--primary-dark); }
.sector-link:hover { gap: 12px; }

/* ===== CTA SECTION ===== */
.about-cta-section { padding: 60px 0; }
.about-cta-inner {
    background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);
    border-radius: 24px;
    padding: 48px 52px;
    box-shadow: 0 20px 60px rgba(30,60,114,0.3);
}

/* ===== TIMELINE SECTION ===== */
.timeline-section {
    background: linear-gradient(180deg, #f8fbff 0%, #eef5ff 100%);
}
.timeline-shell {
    background: #fff;
    border-radius: 24px;
    padding: 32px;
    box-shadow: 0 18px 45px rgba(15, 32, 68, 0.08);
}
.timeline-years {
    display: flex;
    gap: 10px;
    overflow-x: auto;
    padding: 10px 6px 16px;
    margin-bottom: 24px;
    border-bottom: 1px solid #e5edf8;
}
.timeline-year-btn {
    border: 1px solid #d7e3f4;
    background: #f7faff;
    border-radius: 999px;
    padding: 10px 16px;
    font-weight: 700;
    color: #27406b;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s ease;
    white-space: nowrap;
}
.timeline-year-btn .dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #8ea6cc;
}
.timeline-year-btn.active,
.timeline-year-btn:hover {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
}
.timeline-year-btn.active .dot,
.timeline-year-btn:hover .dot {
    background: #fff;
}
.timeline-detail {
    display: none;
}
.timeline-detail.active {
    display: block;
    animation: fadeInTimeline 0.25s ease;
}
@keyframes fadeInTimeline {
    from { opacity: 0; transform: translateY(8px); }
    to { opacity: 1; transform: translateY(0); }
}
.timeline-detail-grid {
    display: grid;
    grid-template-columns: 1.15fr 1fr;
    gap: 24px;
    align-items: stretch;
}
.timeline-chip {
    display: inline-block;
    font-size: 0.78rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
    color: var(--primary-color);
    background: rgba(30, 60, 114, 0.1);
    border-radius: 999px;
    padding: 6px 12px;
    margin-bottom: 10px;
}
.timeline-title {
    font-size: 1.5rem;
    font-weight: 800;
    color: #1a2b49;
    margin-bottom: 14px;
}
.timeline-description {
    color: #5c6b84;
    line-height: 1.8;
    margin-bottom: 0;
}
.timeline-detail-media {
    min-height: 260px;
    border-radius: 16px;
    overflow: hidden;
    background: #f3f7ff;
    border: 1px solid #d8e5f6;
}
.timeline-detail-media img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.timeline-media-placeholder {
    min-height: 260px;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    align-items: center;
    justify-content: center;
    color: #8ba0bf;
    font-weight: 600;
}
.timeline-media-placeholder i {
    font-size: 2rem;
}
@media (max-width: 768px) {
    .about-img-placeholder { height: 280px; }
    .about-img-years { top: -10px; left: -10px; }
    .about-cta-inner { padding: 32px 24px; }
    .stat-item { padding: 20px 10px; }
    .stat-number { font-size: 1.8rem; }
    .timeline-shell { padding: 18px; }
    .timeline-detail-grid { grid-template-columns: 1fr; }
}
</style>

<?php if (!empty($milestones)): ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.timeline-year-btn');
    const details = document.querySelectorAll('.timeline-detail');

    function activate(targetId, clickedBtn) {
        buttons.forEach((btn) => {
            const isActive = btn === clickedBtn;
            btn.classList.toggle('active', isActive);
            btn.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        details.forEach((panel) => {
            const isActive = panel.id === targetId;
            panel.classList.toggle('active', isActive);
            if (isActive) {
                panel.removeAttribute('hidden');
            } else {
                panel.setAttribute('hidden', 'hidden');
            }
        });
    }

    buttons.forEach((btn) => {
        btn.addEventListener('click', function () {
            activate(this.dataset.target, this);
        });
    });
});
</script>
<?php endif; ?>

<?= $this->endSection() ?>
