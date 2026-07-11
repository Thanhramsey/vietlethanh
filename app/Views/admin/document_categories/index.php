<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-tags me-2 text-primary"></i> Loại giấy tờ</h5>
        <a href="<?= base_url('admin/document-categories/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm">
            <i class="bi bi-plus-circle"></i> Thêm loại
        </a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:70px;">ID</th>
                        <th>Tên loại</th>
                        <th>Slug</th>
                        <th style="width:90px;">Thứ tự</th>
                        <th style="width:90px;">Trạng thái</th>
                        <th class="text-end" style="width:220px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $item): ?>
                            <tr>
                                <td>#<?= esc($item['id']) ?></td>
                                <td class="fw-semibold"><?= esc($item['title']) ?></td>
                                <td><code><?= esc($item['slug']) ?></code></td>
                                <td><?= esc($item['sort_order']) ?></td>
                                <td>
                                    <?php if ((int) $item['status'] === 1): ?>
                                        <span class="badge bg-success-subtle text-success">Hiển thị</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary-subtle text-secondary">Ẩn</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?= base_url('admin/document-categories/edit/' . $item['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">Sửa</a>
                                    <a href="<?= base_url('admin/document-categories/delete/' . $item['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Xóa loại giấy tờ này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="6" class="text-center text-muted py-5">Chưa có loại giấy tờ nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
