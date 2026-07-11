<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1>Dịch Vụ Nổi Bật</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dịch vụ</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Services List Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-img-wrapper">
                                <!-- Mock image display using styled div -->
                                <div class="w-100 h-100 bg-primary d-flex align-items-center justify-content-center text-white" style="background: linear-gradient(135deg, rgba(11,94,215,0.8), rgba(10,54,157,0.9));">
                                    <i class="bi <?= esc($service['icon']) ?> fs-1"></i>
                                </div>
                                <div class="service-icon-badge">
                                    <i class="bi <?= esc($service['icon']) ?>"></i>
                                </div>
                            </div>
                            <div class="service-info">
                                <h3><a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>"><?= esc($service['title']) ?></a></h3>
                                <p class="text-muted mb-4"><?= esc($service['summary']) ?></p>
                                <a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>" class="btn btn-outline-primary btn-custom btn-sm rounded-pill">Chi Tiết Dịch Vụ <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Đang cập nhật các ngành nghề và dịch vụ...</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
