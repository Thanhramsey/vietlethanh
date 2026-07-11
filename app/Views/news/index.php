<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1>Tin Tức & Sự Kiện</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
            </ol>
        </nav>
    </div>
</div>

<!-- News Section -->
<section class="section-padding">
    <div class="container">
        <div class="row g-4">
            <!-- News list -->
            <div class="col-lg-8">
                <div class="row g-4">
                    <?php if (!empty($newsList)): ?>
                        <?php foreach ($newsList as $news): ?>
                            <div class="col-md-6" data-aos="fade-up">
                                <div class="news-card">
                                    <div class="news-img-wrapper">
                                        <div class="w-100 h-100 bg-secondary text-white d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #2b5876 0%, #4e4376 100%);">
                                            <i class="bi bi-newspaper fs-1"></i>
                                        </div>
                                    </div>
                                    <div class="news-body">
                                        <div class="news-meta">
                                            <i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($news['published_at'])) ?>
                                        </div>
                                        <h3 class="news-title">
                                            <a href="<?= base_url('tin-tuc/' . esc($news['slug'])) ?>"><?= esc($news['title']) ?></a>
                                        </h3>
                                        <p class="text-muted small"><?= esc($news['summary']) ?></p>
                                        <a href="<?= base_url('tin-tuc/' . esc($news['slug'])) ?>" class="btn btn-link text-primary p-0 text-decoration-none fw-bold small">Đọc Tiếp <i class="bi bi-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Đang cập nhật các bài viết mới...</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center mt-5">
                    <?= $pager->links('default', 'default_full') ?>
                </div>
            </div>

            <!-- News Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-light mb-4" data-aos="fade-left">
                    <h4 class="fw-bold mb-3 border-bottom pb-2">Danh Mục Tin Tức</h4>
                    <ul class="list-unstyled">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $cat): ?>
                                <li class="py-2 border-bottom">
                                    <a href="#" class="text-decoration-none text-dark d-flex justify-content-between align-items-center">
                                        <span><i class="bi bi-folder-fill text-primary me-2"></i> <?= esc($cat['title']) ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted small">Chưa có danh mục nào.</li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-primary text-white text-center" data-aos="fade-left">
                    <h4 class="fw-bold mb-3">Nhận Bản Tin</h4>
                    <p class="text-white-50 small mb-4">Đăng ký để nhận các thông tin tin tức, ưu đãi phòng nghỉ và cập nhật công trình mới nhất từ Việt Lệ Thanh.</p>
                    <form action="#" class="d-flex gap-2">
                        <input type="email" class="form-control rounded-pill border-0" placeholder="Email của bạn" required>
                        <button type="submit" class="btn btn-light rounded-pill px-3"><i class="bi bi-send-fill text-primary"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
