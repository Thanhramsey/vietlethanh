<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2"></i> Thêm Banner mới</h5>
        <a href="<?= base_url('admin/banners') ?>" class="btn btn-outline-secondary btn-custom rounded-pill btn-sm"><i class="bi bi-arrow-left"></i> Quay lại</a>
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

        <form action="<?= base_url('admin/banners/store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row g-4">
                <!-- Title -->
                <div class="col-md-6">
                    <label for="title" class="form-label fw-semibold">Tiêu đề chính</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" placeholder="Chào mừng đến với Việt Lệ Thanh...">
                </div>
                
                <!-- Subtitle -->
                <div class="col-md-6">
                    <label for="subtitle" class="form-label fw-semibold">Tiêu đề phụ / Mô tả ngắn</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?= old('subtitle') ?>" placeholder="Dịch vụ lưu trú ngắn ngày uy tín...">
                </div>

                <!-- Desktop Image -->
                <div class="col-md-6">
                    <label for="desktop_image" class="form-label fw-semibold">Ảnh Desktop (Bắt buộc) <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="desktop_image" name="desktop_image" accept="image/*" required>
                    <small class="text-muted">Độ phân giải tối ưu: 1920x600 px. Định dạng: jpg, png, webp.</small>
                </div>

                <!-- Mobile Image -->
                <div class="col-md-6">
                    <label for="mobile_image" class="form-label fw-semibold">Ảnh Mobile (Tùy chọn)</label>
                    <input type="file" class="form-control" id="mobile_image" name="mobile_image" accept="image/*">
                    <small class="text-muted">Độ phân giải tối ưu: 768x400 px. Nếu trống sẽ dùng ảnh Desktop.</small>
                </div>
                
                <!-- Button Text -->
                <div class="col-md-4">
                    <label for="button_text" class="form-label fw-semibold">Chữ hiển thị trên Nút</label>
                    <input type="text" class="form-control" id="button_text" name="button_text" value="<?= old('button_text') ?>" placeholder="Đặt phòng ngay / Xem dịch vụ...">
                </div>
                
                <!-- Button Link -->
                <div class="col-md-4">
                    <label for="button_link" class="form-label fw-semibold">Đường dẫn khi nhấn Nút</label>
                    <input type="text" class="form-control" id="button_link" name="button_link" value="<?= old('button_link') ?>" placeholder="#contact / #services / giới thiệu...">
                </div>

                <!-- Sort Order -->
                <div class="col-md-2">
                    <label for="sort_order" class="form-label fw-semibold">Thứ tự hiển thị <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?= old('sort_order', '0') ?>" required>
                </div>
                
                <!-- Status -->
                <div class="col-md-2">
                    <label for="status" class="form-label fw-semibold">Trạng thái hiển thị <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" <?= old('status') == '1' ? 'selected' : '' ?>>Hiển thị</option>
                        <option value="0" <?= old('status') == '0' ? 'selected' : '' ?>>Ẩn</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-plus-circle-fill"></i> Thêm Banner</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
