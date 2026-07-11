<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold"><i class="bi bi-pencil me-2 text-primary"></i>Sửa giấy tờ</h6>
                <a href="<?= base_url('admin/documents') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">Quay lại</a>
            </div>
            <div class="card-body p-4">
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger"><ul class="mb-0"><?php foreach ((array) session()->getFlashdata('errors') as $err): ?><li><?= esc($err) ?></li><?php endforeach; ?></ul></div>
                <?php endif; ?>
                <form action="<?= base_url('admin/documents/update/' . $document['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="row g-3">
                        <div class="col-md-8"><label class="form-label fw-semibold">Tiêu đề</label><input class="form-control" name="title" value="<?= old('title', $document['title']) ?>" required></div>
                        <div class="col-md-4"><label class="form-label fw-semibold">Loại giấy tờ</label><select class="form-select" name="category_id" required><option value="">-- Chọn loại --</option><?php foreach ($categories as $cat): ?><option value="<?= $cat['id'] ?>" <?= (int) old('category_id', $document['category_id']) === (int) $cat['id'] ? 'selected' : '' ?>><?= esc($cat['title']) ?></option><?php endforeach; ?></select></div>
                        <div class="col-md-6"><label class="form-label fw-semibold">Cơ quan cấp</label><input class="form-control" name="organization" value="<?= old('organization', $document['organization']) ?>"></div>
                        <div class="col-md-3"><label class="form-label fw-semibold">Ngày cấp</label><input type="date" class="form-control" name="issue_date" value="<?= old('issue_date', $document['issue_date']) ?>"></div>
                        <div class="col-md-3"><label class="form-label fw-semibold">Thứ tự</label><input type="number" class="form-control" name="sort_order" value="<?= old('sort_order', $document['sort_order']) ?>" min="0"></div>
                        <div class="col-12"><label class="form-label fw-semibold">Mô tả</label><textarea class="form-control" rows="3" name="description"><?= old('description', $document['description']) ?></textarea></div>
                        <div class="col-md-8"><label class="form-label fw-semibold">Đổi file giấy tờ (nếu cần)</label><input type="file" class="form-control" name="attachment" accept=".jpg,.jpeg,.png,.webp,.pdf,.doc,.docx,.xls,.xlsx,image/*,application/pdf"></div>
                        <div class="col-md-4"><label class="form-label fw-semibold">Trạng thái</label><select class="form-select" name="status"><option value="1" <?= (int) old('status', $document['status']) === 1 ? 'selected' : '' ?>>Hiển thị</option><option value="0" <?= (int) old('status', $document['status']) === 0 ? 'selected' : '' ?>>Ẩn</option></select></div>
                    </div>
                    <div class="mt-4 text-end"><button class="btn btn-primary btn-custom rounded-pill px-5" type="submit"><i class="bi bi-save me-1"></i>Cập nhật</button></div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
