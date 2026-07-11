<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Hệ thống quản trị') ?> - Việt Lệ Thanh</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    
    <!-- Jodit Editor CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit/es2015/jodit.min.css">
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 px-0 admin-sidebar">
            <div class="p-4 border-bottom border-secondary d-flex align-items-center">
                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 38px; height: 38px;">
                    <span class="fw-bold">VLT</span>
                </div>
                <span class="h5 mb-0 text-white fw-bold">Admin CMS</span>
            </div>
            
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>" href="<?= base_url('admin/dashboard') ?>">
                        <i class="bi bi-speedometer2"></i> Tổng Quan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/contacts') ? 'active' : '' ?>" href="<?= base_url('admin/contacts') ?>">
                        <i class="bi bi-envelope-paper"></i> Tin Nhắn Liên Hệ
                    </a>
                </li>
                <?php if (session()->get('admin_role') === 'superadmin'): ?>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/settings') ? 'active' : '' ?>" href="<?= base_url('admin/settings') ?>">
                        <i class="bi bi-gear"></i> Cấu Hình Chung
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/users') ? 'active' : '' ?>" href="<?= base_url('admin/users') ?>">
                        <i class="bi bi-people"></i> Quản Lý Thành Viên
                    </a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/banners') ? 'active' : '' ?>" href="<?= base_url('admin/banners') ?>">
                        <i class="bi bi-images"></i> Quản Lý Banners
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/services') ? 'active' : '' ?>" href="<?= base_url('admin/services') ?>">
                        <i class="bi bi-briefcase"></i> Quản Lý Dịch Vụ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/news') ? 'active' : '' ?>" href="<?= base_url('admin/news') ?>">
                        <i class="bi bi-newspaper"></i> Quản Lý Tin Tức
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/news-categories') ? 'active' : '' ?>" href="<?= base_url('admin/news-categories') ?>">
                        <i class="bi bi-folder2-open"></i> Danh Mục Tin Tức
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos(uri_string(), 'admin/document-categories') === 0) ? 'active' : '' ?>" href="<?= base_url('admin/document-categories') ?>">
                        <i class="bi bi-tags"></i> Loại Giấy Tờ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (strpos(uri_string(), 'admin/documents') === 0) ? 'active' : '' ?>" href="<?= base_url('admin/documents') ?>">
                        <i class="bi bi-file-earmark-text"></i> Quản Lý Giấy Tờ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/gallery') ? 'active' : '' ?>" href="<?= base_url('admin/gallery') ?>">
                        <i class="bi bi-image"></i> Thư Viện Ảnh
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= (uri_string() == 'admin/gallery-albums') ? 'active' : '' ?>" href="<?= base_url('admin/gallery-albums') ?>">
                        <i class="bi bi-folder-symlink"></i> Album Ảnh
                    </a>
                </li>
                <li class="nav-item mt-4 border-top border-secondary">
                    <a class="nav-link text-danger" href="<?= base_url('admin/logout') ?>">
                        <i class="bi bi-box-arrow-left text-danger"></i> Đăng Thoát
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Main Content Area -->
        <div class="col-md-9 col-lg-10 px-0">
            <!-- Admin Top Header -->
            <header class="admin-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-bold"><?= esc($title ?? 'Hệ Thống Quản Trị') ?></h4>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded-pill" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle me-1"></i> Xin chào, <?= esc(session()->get('admin_fullname')) ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                        <li><a class="dropdown-item py-2" href="<?= base_url() ?>" target="_blank"><i class="bi bi-globe me-2"></i> Xem Website</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item py-2 text-danger" href="<?= base_url('admin/logout') ?>"><i class="bi bi-box-arrow-left me-2"></i> Đăng thoát</a></li>
                    </ul>
                </div>
            </header>
            
            <!-- Content Wrapper -->
            <main class="admin-content">
                <!-- Alerts feedback -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show rounded-3 p-3 mb-4" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Jodit Editor JS -->
<script src="https://cdn.jsdelivr.net/npm/jodit/es2015/jodit.min.js"></script>
<script>
    // Initialize Jodit Editor on #content if present
    if (document.getElementById('content')) {
        Jodit.make('#content', {
            height: 400,
            placeholder: 'Nhập nội dung chi tiết tại đây...',
            language: 'vi'
        });
    }
</script>
</body>
</html>
