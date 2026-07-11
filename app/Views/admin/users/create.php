<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white" style="max-width: 800px;">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2"></i> Thêm thành viên mới</h5>
        <a href="<?= base_url('admin/users') ?>" class="btn btn-outline-secondary btn-custom rounded-pill btn-sm"><i class="bi bi-arrow-left"></i> Quay lại</a>
    </div>
    
    <div class="card-body p-4 p-md-5">
        
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show rounded-3 p-3 mb-4" role="alert">
                <ul class="mb-0 small">
                    <?php foreach (session()->getFlashdata('errors') as $err): ?>
                        <li><?= esc($err) ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/users/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="row g-4">
                <!-- Username -->
                <div class="col-md-6">
                    <label for="username" class="form-label fw-semibold">Tên đăng nhập <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" placeholder="Nhập tên đăng nhập viết liền không dấu..." required autofocus>
                </div>

                <!-- Fullname -->
                <div class="col-md-6">
                    <label for="fullname" class="form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= old('fullname') ?>" placeholder="Nguyễn Văn A" required>
                </div>
                
                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label fw-semibold">Địa chỉ Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" placeholder="example@vietlethanh.com" required>
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label for="password" class="form-label fw-semibold">Mật khẩu <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu (tối thiểu 5 ký tự)..." required>
                </div>
                
                <!-- Role -->
                <div class="col-md-6">
                    <label for="role" class="form-label fw-semibold">Vai trò phân quyền <span class="text-danger">*</span></label>
                    <select class="form-select" id="role" name="role" required>
                        <option value="admin" <?= old('role') == 'admin' || !old('role') ? 'selected' : '' ?>>Admin (Trình biên tập nội dung)</option>
                        <option value="superadmin" <?= old('role') == 'superadmin' ? 'selected' : '' ?>>Super Admin (Toàn quyền hệ thống)</option>
                    </select>
                </div>
                
                <!-- Status -->
                <div class="col-md-6">
                    <label for="status" class="form-label fw-semibold">Trạng thái tài khoản <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" <?= old('status') == '1' || !old('status') ? 'selected' : '' ?>>Kích hoạt</option>
                        <option value="0" <?= old('status') == '0' ? 'selected' : '' ?>>Khóa tài khoản</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-plus-circle-fill"></i> Thêm Thành Viên</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
