<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<?php
$mainNewsImageRaw = (string) ($news['image'] ?? '');
$mainNewsImagePath = '';
$mainNewsImageUrl = '';
if ($mainNewsImageRaw !== '') {
    if (strpos($mainNewsImageRaw, 'uploads/') === 0) {
        $mainNewsImagePath = FCPATH . $mainNewsImageRaw;
        $mainNewsImageUrl = base_url($mainNewsImageRaw);
    } else {
        $mainNewsImagePath = FCPATH . 'uploads/news/' . $mainNewsImageRaw;
        $mainNewsImageUrl = base_url('uploads/news/' . $mainNewsImageRaw);
    }
}
?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1>Tin Tức Chi Tiết</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('tin-tuc') ?>">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($news['title']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- News Detail Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Left content column -->
            <div class="col-lg-8" data-aos="fade-right">
                <article class="news-detail-content">
                    <div class="mb-4 bg-secondary text-white d-flex align-items-center justify-content-center rounded-4 shadow-sm" style="height: 350px; background: linear-gradient(135deg, #2b5876 0%, #4e4376 100%);">
                        <?php if (!empty($mainNewsImagePath) && file_exists($mainNewsImagePath)): ?>
                            <img src="<?= $mainNewsImageUrl ?>" alt="<?= esc($news['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                        <?php else: ?>
                            <div class="text-center p-4">
                                <i class="bi bi-newspaper display-1 mb-3 text-white-50"></i>
                                <h2 class="fw-bold\><?= esc($news['title']) ?></h2>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="d-flex align-items-center gap-3 text-muted small mb-3">
                        <span><i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($news['published_at'])) ?></span>
                        <span><i class="bi bi-folder-fill me-1"></i> <?= esc($category['title'] ?? 'Tin hoạt động') ?></span>
                    </div>

                    <h2 class="mb-4 text-primary-color"><?= esc($news['title']) ?></h2>
                    
                    <!-- Content printed as HTML -->
                    <div class="content-body mt-4">
                        <?= $news['content'] ?>
                    </div>
                    
                    <?php if (!empty($news['tags'])): ?>
                        <div class="mt-5 border-top pt-3">
                            <h5 class="fw-bold d-inline-block me-3"><i class="bi bi-tags-fill text-primary"></i> Từ khóa:</h5>
                            <?php 
                                $tags = explode(',', $news['tags']);
                                foreach ($tags as $tag):
                                    $trimmedTag = trim($tag);
                                    if (!empty($trimmedTag)):
                            ?>
                                <span class="badge bg-light text-primary border px-3 py-2 rounded-pill me-2"><?= esc($trimmedTag) ?></span>
                            <?php 
                                    endif;
                                endforeach; 
                            ?>
                        </div>
                    <?php endif; ?>
                </article>
            </div>
            
            <!-- Right sidebar column -->
            <div class="col-lg-4" data-aos="fade-left">
                <!-- Related News Widget -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-light">
                    <h4 class="fw-bold mb-3 border-bottom pb-2">Tin Tức Liên Quan</h4>
                    <div class="d-flex flex-column gap-3">
                        <?php if (!empty($relatedNews)): ?>
                            <?php foreach ($relatedNews as $related): ?>
                                <?php
                                $relatedImageRaw = (string) ($related['image'] ?? '');
                                $relatedImagePath = '';
                                $relatedImageUrl = '';
                                if ($relatedImageRaw !== '') {
                                    if (strpos($relatedImageRaw, 'uploads/') === 0) {
                                        $relatedImagePath = FCPATH . $relatedImageRaw;
                                        $relatedImageUrl = base_url($relatedImageRaw);
                                    } else {
                                        $relatedImagePath = FCPATH . 'uploads/news/' . $relatedImageRaw;
                                        $relatedImageUrl = base_url('uploads/news/' . $relatedImageRaw);
                                    }
                                }
                                ?>
                                <div class="d-flex gap-3 align-items-start border-bottom pb-3">
                                    <div class="bg-secondary rounded text-white d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; min-width: 70px; background: linear-gradient(135deg, #2b5876 0%, #4e4376 100%);">
                                        <?php if (!empty($relatedImagePath) && file_exists($relatedImagePath)): ?>
                                            <img src="<?= $relatedImageUrl ?>" alt="<?= esc($related['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                        <?php else: ?>
                                            <i class="bi bi-newspaper text-white-50"></i>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold" style="font-size: 0.9rem; line-height: 1.3;">
                                            <a href="<?= base_url('tin-tuc/' . esc($related['slug'])) ?>" class="text-decoration-none text-dark hover-primary"><?= esc($related['title']) ?></a>
                                        </h6>
                                        <small class="text-muted"><i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($related['published_at'])) ?></small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted small mb-0">Không có tin tức liên quan nào khác.</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Contact Widget -->
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-primary text-white text-center">
                    <h4 class="fw-bold mb-3">Tư Vấn Trực Tuyến</h4>
                    <p class="mb-4 text-white-50">Đừng ngần ngại liên hệ với chúng tôi để nhận những tin tức sự kiện mới và dịch vụ hỗ trợ chu đáo nhất.</p>
                    <a href="<?= base_url('lien-he') ?>" class="btn btn-light btn-custom w-100 rounded-pill"><i class="bi bi-telephone-fill text-primary me-1"></i> Liên Hệ</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
