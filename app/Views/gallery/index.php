<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
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

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1>Thư Viện Ảnh</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thư viện ảnh</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Gallery Grid -->
<section class="section-padding">
    <div class="container">
        <!-- Filter controls -->
        <div class="row mb-5" data-aos="fade-up">
            <div class="col-12 text-center">
                <button class="btn btn-outline-primary btn-custom rounded-pill active me-2 filter-btn" data-filter="all">Tất Cả</button>
                <?php if (!empty($albums)): ?>
                    <?php foreach ($albums as $alb): ?>
                        <button class="btn btn-outline-primary btn-custom rounded-pill me-2 filter-btn" data-filter="<?= esc($alb['slug']) ?>"><?= esc($alb['title']) ?></button>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="row g-4" id="gallery-grid">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $item): ?>
                    <?php
                    $galleryImagePath = !empty($item['image']) ? FCPATH . 'uploads/gallery/' . $item['image'] : '';
                    $galleryImageUrl = !empty($item['image']) ? base_url('uploads/gallery/' . $item['image']) : '';
                    $galleryVideoUrl = trim((string) ($item['video'] ?? ''));
                    $galleryYouTubeId = $extractYouTubeId($galleryVideoUrl);
                    $isGalleryVideo = !empty($galleryYouTubeId);
                    $galleryVideoThumb = $isGalleryVideo ? ('https://img.youtube.com/vi/' . $galleryYouTubeId . '/hqdefault.jpg') : '';
                    $galleryVideoEmbed = $isGalleryVideo ? ('https://www.youtube.com/embed/' . $galleryYouTubeId . '?autoplay=1&rel=0') : '';
                    $galleryPreviewUrl = $isGalleryVideo ? $galleryVideoThumb : $galleryImageUrl;
                    $galleryHasPreview = $isGalleryVideo || (!empty($galleryImagePath) && file_exists($galleryImagePath));
                    $galleryOpenUrl = $isGalleryVideo ? $galleryVideoEmbed : (!empty($galleryImageUrl) ? $galleryImageUrl : '#');
                    ?>
                    <div class="col-lg-4 col-md-6 gallery-card" data-category="<?= esc($item['album']) ?>" data-aos="zoom-in">
                        <div class="gallery-item">
                            <div class="w-100 h-100 bg-dark d-flex align-items-center justify-content-center text-white text-center position-relative">
                                <?php if ($galleryHasPreview): ?>
                                    <img src="<?= $galleryPreviewUrl ?>" alt="<?= esc($item['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                    <?php if ($isGalleryVideo): ?>
                                        <span class="gallery-play-badge" aria-hidden="true"><i class="bi bi-play-fill"></i></span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="p-3"><?= esc($item['title']) ?></span>
                                <?php endif; ?>
                                <a href="<?= $galleryOpenUrl ?>" data-fancybox="gallery" <?= $isGalleryVideo ? 'data-type="iframe"' : '' ?> data-caption="<?= esc($item['title']) ?>" class="gallery-overlay">
                                    <i class="bi <?= $isGalleryVideo ? 'bi-play-circle' : 'bi-plus-circle' ?> gallery-icon"></i>
                                    <span><?= $isGalleryVideo ? 'Xem Video' : 'Xem Ảnh Lớn' ?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback premium styled items for demo and initial use -->
                <div class="col-lg-4 col-md-6 gallery-card" data-category="accommodation" data-aos="zoom-in" data-aos-delay="100">
                    <div class="gallery-item">
                        <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                            <div class="text-center p-3">
                                <i class="bi bi-door-open fs-2 mb-2"></i>
                                <h6>Phòng đơn sạch sẽ, thoáng mát</h6>
                            </div>
                            <div class="gallery-overlay">
                                <i class="bi bi-search gallery-icon"></i>
                                <span>Phòng Nghỉ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-card" data-category="accommodation" data-aos="zoom-in" data-aos-delay="200">
                    <div class="gallery-item">
                        <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                            <div class="text-center p-3">
                                <i class="bi bi-tv fs-2 mb-2"></i>
                                <h6>Trang bị nội thất phòng đôi đầy đủ tiện nghi</h6>
                            </div>
                            <div class="gallery-overlay">
                                <i class="bi bi-search gallery-icon"></i>
                                <span>Phòng Nghỉ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-card" data-category="construction" data-aos="zoom-in" data-aos-delay="300">
                    <div class="gallery-item">
                        <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, #3a6073 0%, #3a7bd5 100%);">
                            <div class="text-center p-3">
                                <i class="bi bi-cone-striped fs-2 mb-2"></i>
                                <h6>Công trình thảm nhựa tuyến đường liên xã</h6>
                            </div>
                            <div class="gallery-overlay">
                                <i class="bi bi-search gallery-icon"></i>
                                <span>Xây Dựng</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-card" data-category="construction" data-aos="zoom-in" data-aos-delay="400">
                    <div class="gallery-item">
                        <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, #3a6073 0%, #3a7bd5 100%);">
                            <div class="text-center p-3">
                                <i class="bi bi-cone fs-2 mb-2"></i>
                                <h6>Thi công móng cống thoát nước công lộ</h6>
                            </div>
                            <div class="gallery-overlay">
                                <i class="bi bi-search gallery-icon"></i>
                                <span>Xây Dựng</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-card" data-category="husbandry" data-aos="zoom-in" data-aos-delay="500">
                    <div class="gallery-item">
                        <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, #134e5e 0%, #71b280 100%);">
                            <div class="text-center p-3">
                                <i class="bi bi-egg fs-2 mb-2"></i>
                                <h6>Trang trại chăn nuôi bò thịt Đức Cơ</h6>
                            </div>
                            <div class="gallery-overlay">
                                <i class="bi bi-search gallery-icon"></i>
                                <span>Chăn Nuôi</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-card" data-category="husbandry" data-aos="zoom-in" data-aos-delay="600">
                    <div class="gallery-item">
                        <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, #134e5e 0%, #71b280 100%);">
                            <div class="text-center p-3">
                                <i class="bi bi-egg-fried fs-2 mb-2"></i>
                                <h6>Chuồng nuôi khép kín theo tiêu chuẩn sạch</h6>
                            </div>
                            <div class="gallery-overlay">
                                <i class="bi bi-search gallery-icon"></i>
                                <span>Chăn Nuôi</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Filter Script -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const filterBtns = document.querySelectorAll(".filter-btn");
        const cards = document.querySelectorAll(".gallery-card");
        
        filterBtns.forEach(btn => {
            btn.addEventListener("click", function() {
                // Remove active class
                filterBtns.forEach(b => b.classList.remove("active"));
                // Add active class to clicked button
                this.classList.add("active");
                
                const filterValue = this.getAttribute("data-filter");
                
                cards.forEach(card => {
                    const cardCategory = card.getAttribute("data-category");
                    if (filterValue === "all" || cardCategory === filterValue) {
                        card.style.display = "block";
                        // Re-trigger AOS if possible
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });
    });
</script>

<?= $this->endSection() ?>
