<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2 text-primary"></i>Thêm Mốc Lịch Sử Mới</h6>
                <a href="<?= base_url('admin/milestones') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
                    <i class="bi bi-arrow-left me-1"></i>Quay lại
                </a>
            </div>
            <div class="card-body p-4">
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php foreach ((array)session()->getFlashdata('errors') as $err): ?>
                                <li><?= esc($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('admin/milestones/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Năm <span class="text-danger">*</span></label>
                            <input type="number" name="year" class="form-control rounded-3"
                                   min="1990" max="2100" placeholder="vd: 2017"
                                   value="<?= old('year') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control rounded-3"
                                   placeholder="Tên mốc sự kiện..."
                                   value="<?= old('title') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Thứ tự hiển thị</label>
                            <input type="number" name="sort_order" class="form-control rounded-3"
                                   value="<?= old('sort_order', 0) ?>" min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nội dung mô tả</label>
                            <textarea name="description" class="form-control rounded-3" rows="5"
                                      placeholder="Mô tả chi tiết về giai đoạn này..."><?= old('description') ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Ảnh minh hoạ</label>
                            <input type="file" name="image" class="form-control rounded-3" accept="image/*"
                                   id="milestoneImageInput">
                            <div class="mt-2" id="milestoneImagePreview"></div>
                            <small class="text-muted">Ảnh nên có tỷ lệ 16:9 hoặc 4:3, dung lượng dưới 2MB.</small>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2 justify-content-end">
                        <a href="<?= base_url('admin/milestones') ?>" class="btn btn-secondary rounded-pill px-4">Hủy</a>
                        <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5">
                            <i class="bi bi-save me-1"></i>Lưu mốc lịch sử
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('milestoneImageInput').addEventListener('change', function(e) {
    const preview = document.getElementById('milestoneImagePreview');
    preview.innerHTML = '';
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(ev) {
            preview.innerHTML = '<img src="' + ev.target.result + '" style="max-height:160px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);">';
        };
        reader.readAsDataURL(file);
    }
});
</script>

<?= $this->endSection() ?>
