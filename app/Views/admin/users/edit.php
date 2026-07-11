<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white" style="max-width: 800px;">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-pencil me-2"></i> Chỉnh sửa thông tin thành viên</h5>
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

        <form action="<?= base_url('admin/users/update/' . $user['id']) ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="row g-4">
                <!-- Username -->
                <div class="col-md-6">
                    <label for="username" class="form-label fw-semibold">Tên đăng nhập <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= old('username', $user['username']) ?>" required>
                </div>

                <!-- Fullname -->
                <div class="col-md-6">
                    <label for="fullname" class="form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="fullname" name="fullname" value="<?= old('fullname', $user['fullname']) ?>" required>
                </div>
                
                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label fw-semibold">Địa chỉ Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email', $user['email']) ?>" required>
                </div>

                <!-- Password -->
                <div class="col-md-6">
                    <label for="password" class="form-label fw-semibold">Mật khẩu mới</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Chỉ nhập nếu muốn đổi mật khẩu...">
                    <small class="text-muted">Để trống nếu muốn giữ nguyên mật khẩu cũ.</small>
                </div>
                
                <!-- Role -->
                <div class="col-md-6">
                    <label for="role" class="form-label fw-semibold">Vai trò phân quyền <span class="text-danger">*</span></label>
                    <!-- Superadmin cannot change their own role to prevent losing access -->
                    <?php if ($user['id'] === (int)session()->get('admin_id')): ?>
                        <input type="hidden" name="role" value="<?= esc($user['role']) ?>">
                        <select class="form-select" disabled>
                            <option selected><?= $user['role'] === 'superadmin' ? 'Super Admin' : 'Admin' ?></option>
                        </select>
                        <small class="text-muted">Bạn không thể tự thay đổi vai trò của chính mình.</small>
                    <?php else: ?>
                        <select class="form-select" id="role" name="role" required>
                            <option value="admin" <?= old('role', $user['role']) === 'admin' ? 'selected' : '' ?>>Admin (Trình biên tập nội dung)</option>
                            <option value="superadmin" <?= old('role', $user['role']) === 'superadmin' ? 'selected' : '' ?>>Super Admin (Toàn quyền hệ thống)</option>
                        </select>
                    <?php endif; ?>
                </div>
                
                <!-- Status -->
                <div class="col-md-6">
                    <label for="status" class="form-label fw-semibold">Trạng thái tài khoản <span class="text-danger">*</span></label>
                    <!-- Superadmin cannot disable themselves -->
                    <?php if ($user['id'] === (int)session()->get('admin_id')): ?>
                        <input type="hidden" name="status" value="1">
                        <select class="form-select" disabled>
                            <option selected>Kích hoạt</option>
                        </select>
                        <small class="text-muted">Bạn không thể tự khóa tài khoản của chính mình.</small>
                    <?php else: ?>
                        <select class="form-select" id="status" name="status" required>
                            <option value="1" <?= old('status', $user['status']) == '1' ? 'selected' : '' ?>>Kích hoạt</option>
                            <option value="0" <?= old('status', $user['status']) == '0' ? 'selected' : '' ?>>Khóa tài khoản</option>
                        </select>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save-fill"></i> Cập Nhật Thành Viên</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
