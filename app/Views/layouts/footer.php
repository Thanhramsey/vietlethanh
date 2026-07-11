<!-- Contact CTA Box outside footer -->
<?php if (uri_string() !== 'lien-he'): ?>
<section class="container mt-5">
    <div class="cta-section text-center py-5 px-4" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-3 text-white">Bạn đang tìm kiếm phòng nghỉ hoặc đối tác thi công uy tín?</h3>
                <p class="mb-4 text-white-50">Hãy liên hệ với Việt Lệ Thanh ngay hôm nay để nhận thông tin tư vấn dịch vụ chi tiết và ưu đãi tốt nhất.</p>
                <a href="<?= base_url('lien-he') ?>" class="btn btn-light btn-custom text-primary btn-lg rounded-pill"><i class="bi bi-telephone-outbound-fill me-2"></i> Liên Hệ Ngay</a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Mega Footer -->
<footer class="footer mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- Company Intro -->
            <div class="col-lg-4 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <?php if (get_setting('site_logo')): ?>
                        <img src="<?= base_url('uploads/settings/' . get_setting('site_logo')) ?>" alt="<?= esc(get_setting('company_name', 'Việt Lệ Thanh')) ?>" style="max-height: 48px; width: auto;" class="me-2 bg-white p-1 rounded">
                    <?php else: ?>
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 45px; height: 45px;">
                            <span class="fw-bold fs-5">VLT</span>
                        </div>
                    <?php endif; ?>
                    <span class="h5 mb-0 text-white fw-bold">VIỆT LỆ THANH</span>
                </div>
                <p class="text-white-50 mb-4">CÔNG TY TNHH MỘT THÀNH VIỆT LỆ THANH - Đơn vị hoạt động đa ngành nghề tại Gia Lai, nổi bật với dịch vụ lưu trú ngắn ngày chất lượng cao, xây dựng công trình giao thông và phát triển trang trại chăn nuôi sạch.</p>
                <div class="d-flex gap-2">
                    <a href="<?= esc(get_setting('facebook')) ?>" class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-facebook"></i></a>
                    <a href="https://zalo.me/<?= esc(get_setting('zalo')) ?>" class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-chat-text-fill"></i></a>
                    <a href="mailto:<?= esc(get_setting('email')) ?>" class="btn btn-outline-light btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-envelope-fill"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h4>Liên Kết Nhanh</h4>
                <ul class="footer-links">
                    <li><a href="<?= base_url() ?>">Trang chủ</a></li>
                    <li><a href="<?= base_url('gioi-thieu') ?>">Giới thiệu</a></li>
                    <li><a href="<?= base_url('dich-vu') ?>">Dịch vụ</a></li>
                    <li><a href="<?= base_url('thu-vien') ?>">Thư viện ảnh</a></li>
                    <li><a href="<?= base_url('tin-tuc') ?>">Tin tức & Sự kiện</a></li>
                    <li><a href="<?= base_url('lien-he') ?>">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h4>Thông Tin Liên Hệ</h4>
                <div class="footer-contact-info">
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span><?= esc(get_setting('address')) ?></span>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i>
                        <span>Hotline: <?= esc(get_setting('phone')) ?></span>
                    </p>
                    <p>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email: <?= esc(get_setting('email')) ?></span>
                    </p>
                    <p>
                        <i class="bi bi-clock-fill"></i>
                        <span><?= esc(get_setting('working_hours', 'Mở cửa 24/7')) ?></span>
                    </p>
                </div>
            </div>

            <!-- Map View -->
            <div class="col-lg-3 col-md-6">
                <h4>Bản Đồ Chỉ Đường</h4>
                <div class="footer-map-container">
                    <iframe src="<?= get_setting('map_embed') ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row footer-bottom">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; <?= date('Y') ?> CÔNG TY TNHH MTV VIỆT LỆ THANH. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <p class="mb-0 text-white-50">Thiết kế bởi <a href="#" class="text-white text-decoration-none fw-bold">Antigravity</a></p>
            </div>
        </div>
    </div>
</footer>
