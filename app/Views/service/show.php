<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1><?= esc($service['title']) ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('dich-vu') ?>">Dịch vụ</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc($service['title']) ?></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Service Detail Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-5">
            <!-- Left content column -->
            <div class="col-lg-8" data-aos="fade-right">
                <div class="service-detail-content">
                    <div class="mb-4 bg-primary text-white d-flex align-items-center justify-content-center rounded-4 shadow-sm" style="height: 350px; background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                        <div class="text-center p-4">
                            <i class="bi <?= esc($service['icon']) ?> display-1 mb-3"></i>
                            <h2 class="fw-bold"><?= esc($service['title']) ?></h2>
                        </div>
                    </div>
                    
                    <h2 class="mb-3 text-primary-color"><?= esc($service['title']) ?></h2>
                    
                    <!-- Content printed as HTML (since it can contain CKEditor markup) -->
                    <div class="content-body mt-4">
                        <?= $service['content'] ?>
                    </div>
                </div>
            </div>
            
            <!-- Right sidebar column -->
            <div class="col-lg-4" data-aos="fade-left">
                <!-- Sidebar widgets -->
                <div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-light">
                    <h4 class="fw-bold mb-3 border-bottom pb-2">Liên Hệ Tư Vấn</h4>
                    <p class="text-muted small">Hãy liên hệ với chúng tôi để nhận báo giá và thông tin chi tiết về dịch vụ.</p>
                    <hr>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-telephone-fill text-primary fs-4 me-3"></i>
                        <div>
                            <small class="text-muted d-block">Hotline</small>
                            <a href="tel:<?= esc(get_setting('phone')) ?>" class="fw-bold text-decoration-none text-dark"><?= esc(get_setting('phone')) ?></a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-envelope-fill text-primary fs-4 me-3"></i>
                        <div>
                            <small class="text-muted d-block">Email</small>
                            <a href="mailto:<?= esc(get_setting('email')) ?>" class="fw-bold text-decoration-none text-dark"><?= esc(get_setting('email')) ?></a>
                        </div>
                    </div>
                    <a href="<?= base_url('lien-he') ?>" class="btn btn-primary btn-custom w-100 rounded-pill mt-3"><i class="bi bi-chat-left-dots-fill me-1"></i> Gửi Tin Nhắn</a>
                </div>
                
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-primary text-white text-center">
                    <h4 class="fw-bold mb-3">Phục Vụ 24/7</h4>
                    <p class="mb-4 text-white-50">Đối với dịch vụ lưu trú khách sạn, chúng tôi phục vụ check-in check-out liên tục kể cả ngày lễ.</p>
                    <i class="bi bi-clock-history display-3 text-white-50"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
