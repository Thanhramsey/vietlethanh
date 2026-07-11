<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i>Thêm loại giấy tờ</h6>
                <a href="<?= base_url('admin/document-categories') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">Quay lại</a>
            </div>
            <div class="card-body p-4">
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0"><?php foreach ((array) session()->getFlashdata('errors') as $err): ?><li><?= esc($err) ?></li><?php endforeach; ?></ul>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('admin/document-categories/store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row g-3">
                        <div class="col-md-8"><label class="form-label fw-semibold">Tên loại</label><input type="text" class="form-control" name="title" value="<?= old('title') ?>" required></div>
                        <div class="col-md-4"><label class="form-label fw-semibold">Slug (tuỳ chọn)</label><input type="text" class="form-control" name="slug" value="<?= old('slug') ?>"></div>
                        <div class="col-12"><label class="form-label fw-semibold">Mô tả</label><textarea class="form-control" rows="3" name="description"><?= old('description') ?></textarea></div>
                        <div class="col-md-4"><label class="form-label fw-semibold">Thứ tự</label><input type="number" class="form-control" name="sort_order" value="<?= old('sort_order', 0) ?>" min="0"></div>
                        <div class="col-md-4"><label class="form-label fw-semibold">Trạng thái</label><select class="form-select" name="status"><option value="1" selected>Hiển thị</option><option value="0">Ẩn</option></select></div>
                    </div>
                    <div class="mt-4 text-end">
                        <button class="btn btn-primary btn-custom rounded-pill px-5" type="submit"><i class="bi bi-save me-1"></i>Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
