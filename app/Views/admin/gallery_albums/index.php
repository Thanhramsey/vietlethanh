<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-folder-symlink me-2"></i> Chuyên Mục / Album Ảnh</h5>
        <a href="<?= base_url('admin/gallery-albums/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle"></i> Thêm Album</a>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Mã</th>
                        <th>Tên Album</th>
                        <th>Đường dẫn (Slug)</th>
                        <th>Thứ tự</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($albums)): ?>
                        <?php foreach ($albums as $album): ?>
                            <tr>
                                <td class="ps-4 fw-semibold">#<?= esc($album['id']) ?></td>
                                <td class="fw-bold"><?= esc($album['title']) ?></td>
                                <td><code><?= esc($album['slug']) ?></code></td>
                                <td><span class="badge bg-light text-dark border"><?= esc($album['sort_order']) ?></span></td>
                                <td>
                                    <?php if ($album['status'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Hiển thị</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning rounded-pill px-3">Ẩn</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d/m/Y', strtotime($album['created_at'])) ?></td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/gallery-albums/edit/' . $album['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil"></i> Sửa</a>
                                    <a href="<?= base_url('admin/gallery-albums/delete/' . $album['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa Album này? Hình ảnh trong album này sẽ được chuyển thành không thuộc chuyên mục nào.')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Chưa có Album ảnh nào được tạo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
