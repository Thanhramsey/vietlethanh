<!-- Top Bar -->
<?php
$currentLocale = service('request')->getLocale();
$switchRedirect = current_url();
$langViUrl = base_url('lang/vi?redirect=' . urlencode($switchRedirect));
$langEnUrl = base_url('lang/en?redirect=' . urlencode($switchRedirect));
$currentLangLabel = $currentLocale === 'vi' ? 'VN' : 'EN';
$currentFlagUrl = $currentLocale === 'vi' ? 'https://flagcdn.com/w20/vn.png' : 'https://flagcdn.com/w20/gb.png';
?>
<div class="bg-primary text-white py-2 d-none d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 small">
                <span class="me-3"><i class="bi bi-geo-alt-fill me-1"></i> <?= esc(get_setting('address')) ?></span>
            </div>
            <div class="col-md-4 text-end small">
                <span class="me-3"><i class="bi bi-telephone-fill me-1"></i> <?= esc(lang('Site.hotline')) ?>: <?= esc(get_setting('phone')) ?></span>
                <span><i class="bi bi-clock-fill me-1"></i> <?= esc(get_setting('working_hours', '24/7')) ?></span>
            </div>
        </div>
    </div>
</div>

<!-- Sticky Navbar -->
<header class="header-wrapper">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
            <a class="navbar-brand text-wrap" href="<?= base_url() ?>" style="max-width: 420px;">
                <div class="d-flex align-items-center">
                    <?php if (get_setting('site_logo')): ?>
                        <img src="<?= base_url('uploads/settings/' . get_setting('site_logo')) ?>" alt="<?= esc(get_setting('company_name', 'Việt Lệ Thanh')) ?>" style="max-height: 64px; width: auto;" class="me-1">
                    <?php else: ?>
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 42px; height: 42px; min-width: 42px;">
                            <span class="fw-bold fs-5">VLT</span>
                        </div>
                    <?php endif; ?>
                    <div class="lh-sm">
                        <span class="d-block fw-extrabold text-primary" style="font-size: 0.95rem; font-weight: 800; text-transform: uppercase;">VIỆT LỆ THANH</span>
                        <span class="d-block text-muted" style="font-size: 0.7rem; text-transform: uppercase;">Gia Lai</span>
                    </div>
                </div>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == '') ? 'active' : '' ?>" href="<?= base_url() ?>"><?= esc(lang('Site.home')) ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'gioi-thieu') ? 'active' : '' ?>" href="<?= base_url('gioi-thieu') ?>"><?= esc(lang('Site.about')) ?></a>
                    </li>

                    <!-- Dịch Vụ Dropdown -->
                    <?php
                    $navServiceModel = new \App\Models\ServiceModel();
                    $navServices = $navServiceModel->where('status', 1)->findAll();
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (uri_string() == 'dich-vu' || strpos(uri_string(), 'dich-vu/') === 0) ? 'active' : '' ?>" href="<?= base_url('dich-vu') ?>" id="serviceDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= esc(lang('Site.services')) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-animated" aria-labelledby="serviceDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('dich-vu') ?>"><i class="bi bi-grid-3x3-gap me-2 text-primary"></i><?= esc(lang('Site.all_services')) ?></a></li>
                            <?php if (!empty($navServices)): ?>
                                <li><hr class="dropdown-divider"></li>
                                <?php foreach ($navServices as $svc): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('dich-vu/' . $svc['slug']) ?>">
                                            <i class="bi bi-chevron-right me-2 text-primary" style="font-size: 0.75rem;"></i><?= esc($svc['title']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'thu-vien') ? 'active' : '' ?>" href="<?= base_url('thu-vien') ?>"><?= esc(lang('Site.gallery')) ?></a>
                    </li>

                    <!-- Tin Tức Dropdown -->
                    <?php
                    $navCatModel = new \App\Models\NewsCategoryModel();
                    $navCategories = $navCatModel->findAll();
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (uri_string() == 'tin-tuc' || strpos(uri_string(), 'tin-tuc/') === 0) ? 'active' : '' ?>" href="<?= base_url('tin-tuc') ?>" id="newsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= esc(lang('Site.news')) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-animated" aria-labelledby="newsDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('tin-tuc') ?>"><i class="bi bi-newspaper me-2 text-primary"></i><?= esc(lang('Site.all_news')) ?></a></li>
                            <?php if (!empty($navCategories)): ?>
                                <li><hr class="dropdown-divider"></li>
                                <?php foreach ($navCategories as $cat): ?>
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('tin-tuc/danh-muc/' . $cat['slug']) ?>">
                                            <i class="bi bi-folder2-open me-2 text-primary" style="font-size: 0.8rem;"></i><?= esc($cat['title']) ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <?php
                    $navDocCategories = [];
                    try {
                        $navDocCatModel = new \App\Models\DocumentCategoryModel();
                        $navDocCategories = $navDocCatModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll();
                    } catch (\Throwable $e) {
                        $navDocCategories = [];
                    }
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?= (uri_string() == 'giay-to' || strpos(uri_string(), 'giay-to/') === 0) ? 'active' : '' ?>" href="<?= base_url('giay-to') ?>" id="documentDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= esc(lang('Site.documents')) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-animated" aria-labelledby="documentDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('giay-to') ?>"><i class="bi bi-files me-2 text-primary"></i><?= esc(lang('Site.all_documents')) ?></a></li>
                            <?php if (!empty($navDocCategories)): ?>
                                <li><hr class="dropdown-divider"></li>
                                <?php foreach ($navDocCategories as $cat): ?>
                                    <li><a class="dropdown-item" href="<?= base_url('giay-to/loai/' . $cat['slug']) ?>"><i class="bi bi-chevron-right me-2 text-primary" style="font-size:0.75rem;"></i><?= esc($cat['title']) ?></a></li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link <?= (uri_string() == 'lien-he') ? 'active' : '' ?>" href="<?= base_url('lien-he') ?>"><?= esc(lang('Site.contact')) ?></a>
                    </li>
                </ul>
                <div class="dropdown ms-lg-2 me-lg-2 mb-2 mb-lg-0">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle d-inline-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="min-width:92px;">
                        <img src="<?= esc($currentFlagUrl) ?>" alt="<?= esc($currentLangLabel) ?>" style="width:18px;height:12px;object-fit:cover;border-radius:2px;">
                        <span><?= esc($currentLangLabel) ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 <?= $currentLocale === 'vi' ? 'active' : '' ?>" href="<?= esc($langViUrl) ?>">
                                <img src="https://flagcdn.com/w20/vn.png" alt="VN" style="width:18px;height:12px;object-fit:cover;border-radius:2px;">
                                <span>VN</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center gap-2 <?= $currentLocale === 'en' ? 'active' : '' ?>" href="<?= esc($langEnUrl) ?>">
                                <img src="https://flagcdn.com/w20/gb.png" alt="EN" style="width:18px;height:12px;object-fit:cover;border-radius:2px;">
                                <span>EN</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Theme Toggle Button -->
                <button id="theme-toggle-btn" class="btn btn-outline-secondary btn-sm ms-2 me-lg-2 mb-2 mb-lg-0 d-inline-flex align-items-center justify-content-center" style="width: 32px; height: 32px; border-radius: 50%;" title="Đổi giao diện">
                    <i class="bi bi-moon-fill" id="theme-toggle-icon"></i>
                </button>
            </div>
        </div>
    </nav>
</header>
