<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-file-earmark-text me-2 text-primary"></i> Giấy tờ</h5>
        <a href="<?= base_url('admin/documents/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm">
            <i class="bi bi-plus-circle"></i> Thêm giấy tờ
        </a>
    </div>
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width:70px;">ID</th>
                        <th>Tiêu đề</th>
                        <th>Loại</th>
                        <th style="width:90px;">File</th>
                        <th style="width:90px;">Thứ tự</th>
                        <th style="width:90px;">Trạng thái</th>
                        <th class="text-end" style="width:220px;">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($documents)): ?>
                        <?php foreach ($documents as $item): ?>
                            <?php $file = $item['file_attachment'] ?: $item['pdf_attachment']; ?>
                            <tr>
                                <td>#<?= esc($item['id']) ?></td>
                                <td class="fw-semibold"><?= esc($item['title']) ?></td>
                                <td><?= esc($item['category_title'] ?? '-') ?></td>
                                <td>
                                    <?php if (!empty($file)): ?>
                                        <a class="btn btn-outline-secondary btn-sm rounded-pill" target="_blank" href="<?= base_url('uploads/documents/' . $file) ?>">Xem</a>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= esc($item['sort_order']) ?></td>
                                <td><?= (int) $item['status'] === 1 ? '<span class="badge bg-success-subtle text-success">Hiển thị</span>' : '<span class="badge bg-secondary-subtle text-secondary">Ẩn</span>' ?></td>
                                <td class="text-end">
                                    <a href="<?= base_url('admin/documents/edit/' . $item['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">Sửa</a>
                                    <a href="<?= base_url('admin/documents/delete/' . $item['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Xóa giấy tờ này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center text-muted py-5">Chưa có giấy tờ nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
