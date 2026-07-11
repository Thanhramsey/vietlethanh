<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-pencil me-2"></i> Chỉnh sửa hình ảnh</h5>
        <a href="<?= base_url('admin/gallery') ?>" class="btn btn-outline-secondary btn-custom rounded-pill btn-sm"><i class="bi bi-arrow-left"></i> Quay lại</a>
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

        <form action="<?= base_url('admin/gallery/update/' . $image['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row g-4">
                <!-- Title -->
                <div class="col-md-8">
                    <label for="title" class="form-label fw-semibold">Mô tả / Tiêu đề ảnh <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $image['title']) ?>" required>
                </div>
                
                <!-- Album / Category -->
                <div class="col-md-4">
                    <label for="album_id" class="form-label fw-semibold">Chuyên mục / Album <span class="text-danger">*</span></label>
                    <select class="form-select" id="album_id" name="album_id" required>
                        <option value="">-- Chọn Album --</option>
                        <?php foreach ($albums as $alb): ?>
                            <option value="<?= $alb['id'] ?>" <?= old('album_id', $image['album_id']) == $alb['id'] ? 'selected' : '' ?>><?= esc($alb['title']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Image File -->
                <div class="col-md-6">
                    <label for="image" class="form-label fw-semibold">Hình ảnh</label>
                    <?php if (!empty($image['image'])): ?>
                        <div class="mb-2">
                            <span class="text-muted d-block small mb-1">Ảnh hiện tại:</span>
                            <div class="p-2 border rounded d-inline-block bg-light">
                                <span class="text-dark small"><i class="bi bi-file-earmark-image"></i> <?= esc($image['image']) ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="text-muted">Định dạng hỗ trợ: jpg, png, webp. Dung lượng tối đa 20MB. Chọn ảnh mới sẽ thay thế ảnh cũ.</small>
                </div>

                <!-- Video Link (Optional) -->
                <div class="col-md-6">
                    <label for="video" class="form-label fw-semibold">Đường dẫn Video (Tùy chọn)</label>
                    <input type="url" class="form-control" id="video" name="video" value="<?= old('video', $image['video']) ?>" placeholder="https://youtube.com/watch?v=...">
                    <small class="text-muted">Nhập link Youtube nếu đây là ảnh đại diện video.</small>
                </div>
                
                <!-- Sort Order -->
                <div class="col-md-4">
                    <label for="sort_order" class="form-label fw-semibold">Thứ tự hiển thị <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="sort_order" name="sort_order" value="<?= old('sort_order', $image['sort_order']) ?>" required>
                </div>

                <!-- Featured Status -->
                <div class="col-md-4 d-flex align-items-end pb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" <?= old('is_featured', $image['is_featured']) ? 'checked' : '' ?>>
                        <label class="form-check-label fw-semibold" for="is_featured">
                            Đặt làm ảnh nổi bật ngoài trang chủ
                        </label>
                    </div>
                </div>
                
                <!-- Status -->
                <div class="col-md-4">
                    <label for="status" class="form-label fw-semibold">Trạng thái hiển thị <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" <?= old('status', $image['status']) == '1' ? 'selected' : '' ?>>Hiển thị</option>
                        <option value="0" <?= old('status', $image['status']) == '0' ? 'selected' : '' ?>>Ẩn</option>
                    </select>
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save-fill"></i> Cập Nhật Hình Ảnh</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
