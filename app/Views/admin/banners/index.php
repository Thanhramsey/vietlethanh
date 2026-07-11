<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-images me-2"></i> Banner & Slide Trang Chủ</h5>
        <a href="<?= base_url('admin/banners/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle"></i> Thêm Banner</a>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 150px;">Ảnh Desktop</th>
                        <th>Tiêu đề</th>
                        <th>Nút bấm / Link</th>
                        <th>Thứ tự</th>
                        <th>Trạng thái</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($banners)): ?>
                        <?php foreach ($banners as $banner): ?>
                            <tr>
                                <td class="ps-4">
                                    <div class="border rounded bg-light overflow-hidden d-flex align-items-center justify-content-center" style="width: 120px; height: 60px;">
                                        <i class="bi bi-image text-muted"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold"><?= esc($banner['title'] ?: 'Không có tiêu đề') ?></div>
                                    <small class="text-muted"><?= esc($banner['subtitle']) ?></small>
                                </td>
                                <td>
                                    <?php if (!empty($banner['button_text'])): ?>
                                        <span class="badge bg-primary"><?= esc($banner['button_text']) ?></span>
                                        <small class="text-muted d-block"><?= esc($banner['button_link']) ?></small>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?= esc($banner['sort_order']) ?></span></td>
                                <td>
                                    <?php if ($banner['status'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Hiển thị</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning rounded-pill px-3">Ẩn</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/banners/edit/' . $banner['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil"></i> Sửa</a>
                                    <a href="<?= base_url('admin/banners/delete/' . $banner['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa banner này không?')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Chưa có banner nào được tạo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
