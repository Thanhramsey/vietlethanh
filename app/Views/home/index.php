<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Hero Slider Section (Swiper) -->
<section class="hero-slider swiper">
    <div class="swiper-wrapper">
        <?php if (!empty($banners)): ?>
            <?php foreach ($banners as $banner): ?>
                <div class="swiper-slide hero-slide-item" style="background-image: url('<?= base_url('uploads/banners/' . esc($banner['desktop_image'])) ?>');">
                    <div class="hero-slide-overlay"></div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <span class="hero-label"><i class="bi bi-building me-1"></i> Việt Lệ Thanh · Gia Lai</span>
                            <h2 class="text-white fw-bold"><?= esc($banner['title']) ?></h2>
                            <p class="text-white-50"><?= esc($banner['subtitle']) ?></p>
                            <?php if (!empty($banner['button_text'])): ?>
                                <a href="<?= esc($banner['button_link']) ?>" class="btn btn-primary btn-custom btn-lg rounded-pill me-2">
                                    <?= esc($banner['button_text']) ?> <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?= base_url('lien-he') ?>" class="btn btn-outline-light btn-custom btn-lg rounded-pill">
                                <i class="bi bi-telephone me-1"></i> Liên Hệ Ngay
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- Fallback Mock Banner -->
            <div class="swiper-slide hero-slide-item" style="background: linear-gradient(135deg, #0f2044 0%, #1e3c72 45%, #2a5298 100%);">
                <div class="hero-slide-overlay"></div>
                <!-- decorative circles -->
                <div style="position:absolute;width:500px;height:500px;border-radius:50%;border:1px solid rgba(255,255,255,0.06);top:-100px;right:-80px;z-index:1;"></div>
                <div style="position:absolute;width:320px;height:320px;border-radius:50%;border:1px solid rgba(255,255,255,0.08);top:80px;right:80px;z-index:1;"></div>
                <div class="container">
                    <div class="hero-slide-content">
                        <span class="hero-label"><i class="bi bi-building me-1"></i> Việt Lệ Thanh · Gia Lai</span>
                        <h2 class="text-white fw-bold">CÔNG TY TNHH MTV<br>VIỆT LỆ THANH</h2>
                        <p class="text-white-50">Dịch vụ lưu trú ngắn ngày uy tín và thi công công trình chuyên nghiệp tại Gia Lai. Chất lượng — Uy tín — Tận tâm.</p>
                        <a href="<?= base_url('dich-vu') ?>" class="btn btn-primary btn-custom btn-lg rounded-pill me-2">
                            Khám Phá Dịch Vụ <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                        <a href="<?= base_url('lien-he') ?>" class="btn btn-outline-light btn-custom btn-lg rounded-pill">
                            <i class="bi bi-telephone me-1"></i> Liên Hệ Ngay
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
<section class="section-padding">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <div class="bg-primary rounded-3 position-absolute" style="top: -15px; left: -15px; width: 100%; height: 100%; z-index: -1; opacity: 0.1;"></div>
                    <!-- Mock introduction image (we will use a premium colored div/gradient or placeholder) -->
                    <div class="rounded-3 shadow-md bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 400px; background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-color) 100%);">
                        <div class="text-center p-4">
                            <i class="bi bi-building fs-1 mb-3"></i>
                            <h3>VIỆT LỆ THANH</h3>
                            <p class="mb-0">Trụ sở tại: 77 Quang Trung, thị trấn Chư Ty, Đức Cơ, Gia Lai</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <span class="text-primary fw-bold text-uppercase d-block mb-2">Giới Thiệu Chung</span>
                <h2 class="section-title-left mb-4">CÔNG TY TNHH MTV VIỆT LỆ THANH</h2>
                <p>Được thành lập từ năm 2017 tại huyện Đức Cơ, tỉnh Gia Lai, <strong>Công ty TNHH Một Thành Viên Việt Lệ Thanh</strong> đã và đang khẳng định vị thế là một trong những doanh nghiệp đa ngành uy tín hàng đầu trong khu vực.</p>
                <p>Lấy dịch vụ lưu trú ngắn ngày làm trọng tâm phát triển với hệ thống phòng nghỉ tiện nghi, sạch sẽ và an toàn. Bên cạnh đó, công ty còn phát triển mạnh mẽ mảng thi công xây dựng hạ tầng giao thông và trang trại chăn nuôi gia súc theo hướng bền vững.</p>
                <div class="row g-4 mt-2">
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-patch-check-fill text-primary fs-3 me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">Uy Tín Hàng Đầu</h5>
                                <small class="text-muted">Đặt chất lượng lên trên hết</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-shield-fill-check text-primary fs-3 me-3"></i>
                            <div>
                                <h5 class="mb-0 fw-bold">Dịch Vụ Chu Đáo</h5>
                                <small class="text-muted">Phục vụ khách hàng 24/7</small>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('gioi-thieu') ?>" class="btn btn-outline-primary btn-custom rounded-pill mt-4">Xem Chi Tiết</a>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us & Statistics -->
<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2">Giá Trị Cốt Lõi</span>
            <h2 class="section-title">Tại Sao Nên Chọn Chúng Tôi</h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h4>Vị Trí Đắc Địa</h4>
                    <p class="text-muted mb-0">Nằm ngay trung tâm thị trấn Chư Ty, Đức Cơ, thuận tiện cho việc di chuyển, giao thương và lưu trú nghỉ dưỡng.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-cash-coin"></i>
                    </div>
                    <h4>Giá Cả Hợp Lý</h4>
                    <p class="text-muted mb-0">Cung cấp phòng lưu trú đầy đủ tiện nghi và các dịch vụ xây dựng với mức giá cạnh tranh nhất thị trường.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="why-card">
                    <div class="why-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Đội Ngũ Tận Tâm</h4>
                    <p class="text-muted mb-0">Đội ngũ kỹ sư xây dựng lành nghề và nhân viên khách sạn phục vụ chuyên nghiệp, chu đáo.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="stat-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-number">9+</div>
                    <div class="stat-title">Năm Hoạt Động</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-number">100%</div>
                    <div class="stat-title">Khách Hàng Hài Lòng</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-title">Công Trình Đã Thi Công</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-title">Hỗ Trợ Phục Vụ</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding" id="services">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2">Lĩnh Vực Hoạt Động</span>
            <h2 class="section-title">Dịch Vụ Của Chúng Tôi</h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="service-card">
                            <div class="service-img-wrapper">
                                <!-- Placeholders for demo, using stylized divs if file missing -->
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
                                <a href="<?= base_url('dich-vu/' . esc($service['slug'])) ?>" class="btn btn-outline-primary btn-custom btn-sm rounded-pill">Xem thêm <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Đang cập nhật danh sách dịch vụ...</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="section-padding bg-light-gray" id="gallery">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2">Hình Ảnh Thực Tế</span>
            <h2 class="section-title">Thư Viện Ảnh Hoạt Động</h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($gallery)): ?>
                <?php foreach ($gallery as $item): ?>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in">
                        <div class="gallery-item">
                            <!-- In a production app, the image would load from uploads/gallery/ -->
                            <div class="w-100 h-100 bg-dark d-flex align-items-center justify-content-center text-white text-center position-relative">
                                <span class="p-3"><?= esc($item['title']) ?></span>
                                <a href="<?= base_url('uploads/gallery/' . esc($item['image'])) ?>" data-fancybox="gallery" data-caption="<?= esc($item['title']) ?>" class="gallery-overlay">
                                    <i class="bi bi-plus-circle gallery-icon"></i>
                                    <span>Xem Ảnh Lớn</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Mock images using stylized divs for nice demo layout -->
                <?php for($i=1; $i<=6; $i++): ?>
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="<?= $i * 100 ?>">
                        <div class="gallery-item">
                            <div class="w-100 h-100 bg-primary text-white d-flex align-items-center justify-content-center position-relative" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
                                <div class="text-center p-3">
                                    <i class="bi bi-image fs-2 mb-2"></i>
                                    <h6>Hình ảnh hoạt động <?= $i ?></h6>
                                </div>
                                <div class="gallery-overlay">
                                    <i class="bi bi-search gallery-icon"></i>
                                    <span>Xem chi tiết</span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= base_url('thu-vien') ?>" class="btn btn-outline-primary btn-custom rounded-pill">Xem Tất Cả Hình Ảnh</a>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="section-padding">
    <div class="container">
        <div class="section-title-wrapper text-center">
            <span class="text-primary fw-bold text-uppercase d-block mb-2">Tin Tức Mới Nhất</span>
            <h2 class="section-title">Bản Tin Việt Lệ Thanh</h2>
        </div>
        
        <div class="row g-4">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="news-card">
                            <div class="news-img-wrapper">
                                <!-- Mock layout if image is missing -->
                                <div class="w-100 h-100 bg-secondary text-white d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #2b5876 0%, #4e4376 100%);">
                                    <i class="bi bi-newspaper fs-1"></i>
                                </div>
                            </div>
                            <div class="news-body">
                                <div class="news-meta">
                                    <i class="bi bi-calendar3 me-1"></i> <?= date('d/m/Y', strtotime($item['published_at'])) ?>
                                </div>
                                <h3 class="news-title"><a href="<?= base_url('tin-tuc/' . esc($item['slug'])) ?>"><?= esc($item['title']) ?></a></h3>
                                <p class="text-muted small"><?= esc($item['summary']) ?></p>
                                <a href="<?= base_url('tin-tuc/' . esc($item['slug'])) ?>" class="btn btn-link text-primary p-0 text-decoration-none fw-bold small">Đọc Tiếp <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Đang cập nhật tin tức mới...</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Partners Section -->
<section class="section-padding bg-light-gray">
    <div class="container">
        <div class="swiper partners-slider">
            <div class="swiper-wrapper align-items-center">
                <?php if (!empty($partners)): ?>
                    <?php foreach ($partners as $partner): ?>
                        <div class="swiper-slide text-center">
                            <!-- Mock Partner Logo block -->
                            <div class="p-3 bg-white shadow-sm rounded-3 d-inline-block text-muted fw-bold border" style="min-width: 150px;">
                                <?= esc($partner['name']) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php for($i=1; $i<=6; $i++): ?>
                        <div class="swiper-slide text-center">
                            <div class="p-3 bg-white shadow-sm rounded-3 d-inline-block text-muted fw-semibold border" style="min-width: 150px; font-size: 0.85rem;">
                                <i class="bi bi-building me-1"></i> Đối tác <?= $i ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
