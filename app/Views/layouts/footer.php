<!-- Contact CTA Box outside footer -->
<?php if (uri_string() !== 'lien-he'): ?>
<section class="container mt-5">
    <div class="cta-section text-center py-5 px-4" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h3 class="mb-3 text-white"><?= esc(lang('Site.footer_cta_title')) ?></h3>
                <p class="mb-4 text-white-50"><?= esc(lang('Site.footer_cta_desc')) ?></p>
                <a href="<?= base_url('lien-he') ?>" class="btn btn-light btn-custom text-primary btn-lg rounded-pill"><i class="bi bi-telephone-outbound-fill me-2"></i> <?= esc(lang('Site.contact_now')) ?></a>
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
                    <span class="h5 mb-0 text-dark fw-bold">VIỆT LỆ THANH</span>
                </div>
                <p class="text-muted mb-4"><?= esc(lang('Site.footer_company_desc')) ?></p>
                <div class="d-flex gap-2">
                    <a href="<?= esc(get_setting('facebook')) ?>" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-facebook"></i></a>
                    <a href="https://zalo.me/<?= esc(get_setting('zalo')) ?>" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-chat-text-fill"></i></a>
                    <a href="mailto:<?= esc(get_setting('email')) ?>" class="btn btn-outline-primary btn-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;"><i class="bi bi-envelope-fill"></i></a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <h4 class="text-dark"><?= esc(lang('Site.quick_links')) ?></h4>
                <ul class="footer-links">
                    <li><a href="<?= base_url() ?>"><?= esc(lang('Site.home')) ?></a></li>
                    <li><a href="<?= base_url('gioi-thieu') ?>"><?= esc(lang('Site.about')) ?></a></li>
                    <li><a href="<?= base_url('dich-vu') ?>"><?= esc(lang('Site.services')) ?></a></li>
                    <li><a href="<?= base_url('thu-vien') ?>"><?= esc(lang('Site.gallery')) ?></a></li>
                    <li><a href="<?= base_url('tin-tuc') ?>"><?= esc(lang('Site.news_events')) ?></a></li>
                    <li><a href="<?= base_url('lien-he') ?>"><?= esc(lang('Site.contact')) ?></a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-dark"><?= esc(lang('Site.contact_info')) ?></h4>
                <div class="footer-contact-info">
                    <p>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span class="text-dark"><?= esc(get_setting('address')) ?></span>
                    </p>
                    <p>
                        <i class="bi bi-telephone-fill"></i>
                        <span class="text-dark"><?= esc(lang('Site.hotline')) ?>: <?= esc(get_setting('phone')) ?></span>
                    </p>
                    <p>
                        <i class="bi bi-envelope-fill"></i>
                        <span class="text-dark">Email: <?= esc(get_setting('email')) ?></span>
                    </p>
                    <p>
                        <i class="bi bi-clock-fill"></i>
                        <span class="text-dark"><?= esc(get_setting('working_hours', 'Mở cửa 24/7')) ?></span>
                    </p>
                </div>
            </div>

            <!-- Map View -->
            <div class="col-lg-3 col-md-6">
                <h4 class="text-dark"><?= esc(lang('Site.map_direction')) ?></h4>
                <div class="footer-map-container">
                    <iframe src="<?= get_setting('map_embed') ?>" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row footer-bottom border-top pt-3 mt-4">
            <div class="col-md-6 text-center text-md-start text-dark">
                <p class="mb-0">&copy; <?= date('Y') ?> CÔNG TY TNHH MTV VIỆT LỆ THANH. <?= esc(lang('Site.all_rights_reserved')) ?></p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0 text-dark">
                <p class="mb-0 text-muted"><?= esc(lang('Site.designed_by')) ?> <a href="#" class="text-dark text-decoration-none fw-bold">Antigravity</a></p>
            </div>
        </div>
    </div>
</footer>
