<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-people me-2"></i> Danh Sách Thành Viên</h5>
        <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle"></i> Thêm Thành Viên</a>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Tài khoản</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="ps-4 fw-bold">
                                    <span class="d-block text-dark"><?= esc($user['username']) ?></span>
                                </td>
                                <td><?= esc($user['fullname']) ?></td>
                                <td><?= esc($user['email']) ?></td>
                                <td>
                                    <?php if ($user['role'] === 'superadmin'): ?>
                                        <span class="badge bg-danger rounded-pill px-3">Super Admin</span>
                                    <?php else: ?>
                                        <span class="badge bg-primary rounded-pill px-3">Admin (Editor)</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($user['status'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Kích hoạt</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning rounded-pill px-3">Khóa</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/users/edit/' . $user['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil"></i> Sửa</a>
                                    <?php if ($user['id'] !== (int)session()->get('admin_id')): ?>
                                        <a href="<?= base_url('admin/users/delete/' . $user['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa thành viên này?')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                    <?php else: ?>
                                        <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" disabled><i class="bi bi-trash"></i> Xóa</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Chưa có thành viên nào được tạo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
