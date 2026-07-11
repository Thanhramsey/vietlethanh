<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white border-bottom px-4 py-3 d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold"><i class="bi bi-pencil me-2 text-primary"></i>Chỉnh Sửa Mốc Lịch Sử</h6>
                <a href="<?= base_url('admin/settings?tab=page-content&contentTab=timeline') ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
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

                <form action="<?= base_url('admin/milestones/update/' . $milestone['id']) ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>

                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Năm <span class="text-danger">*</span></label>
                            <input type="number" name="year" class="form-control rounded-3"
                                   min="1990" max="2100"
                                   value="<?= old('year', $milestone['year']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control rounded-3"
                                   value="<?= old('title', $milestone['title']) ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Thứ tự hiển thị</label>
                            <input type="number" name="sort_order" class="form-control rounded-3"
                                   value="<?= old('sort_order', $milestone['sort_order']) ?>" min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nội dung mô tả</label>
                            <textarea name="description" class="form-control rounded-3" rows="5"><?= old('description', $milestone['description']) ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Ảnh minh hoạ</label>
                            <?php if (!empty($milestone['image'])): ?>
                                <div class="mb-2">
                                    <img src="<?= base_url('uploads/milestones/' . $milestone['image']) ?>"
                                         alt="current image"
                                         style="max-height:160px;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.1);"
                                         id="currentMilestoneImg">
                                    <small class="d-block text-muted mt-1">Ảnh hiện tại. Chọn file mới để thay thế.</small>
                                </div>
                            <?php endif; ?>
                            <input type="file" name="image" class="form-control rounded-3" accept="image/*"
                                   id="milestoneImageInput">
                            <div class="mt-2" id="milestoneImagePreview"></div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2 justify-content-end">
                        <a href="<?= base_url('admin/settings?tab=page-content&contentTab=timeline') ?>" class="btn btn-secondary rounded-pill px-4">Hủy</a>
                        <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5">
                            <i class="bi bi-save me-1"></i>Cập nhật
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
    const cur = document.getElementById('currentMilestoneImg');
    if (cur) cur.style.display = 'none';
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
