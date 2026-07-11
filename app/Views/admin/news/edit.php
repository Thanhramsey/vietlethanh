<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-pencil me-2"></i> Chỉnh sửa bài viết</h5>
        <a href="<?= base_url('admin/news') ?>" class="btn btn-outline-secondary btn-custom rounded-pill btn-sm"><i class="bi bi-arrow-left"></i> Quay lại</a>
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

        <form action="<?= base_url('admin/news/update/' . $news['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row g-4">
                <!-- Title -->
                <div class="col-md-8">
                    <label for="title" class="form-label fw-semibold">Tiêu đề bài viết <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $news['title']) ?>" required>
                </div>
                
                <!-- Category -->
                <div class="col-md-4">
                    <label for="category_id" class="form-label fw-semibold">Danh mục <span class="text-danger">*</span></label>
                    <select class="form-select" id="category_id" name="category_id" required>
                        <option value="">-- Chọn danh mục --</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= old('category_id', $news['category_id']) == $cat['id'] ? 'selected' : '' ?>><?= esc($cat['title']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Summary -->
                <div class="col-12">
                    <label for="summary" class="form-label fw-semibold">Tóm tắt ngắn <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="summary" name="summary" rows="3" required><?= old('summary', $news['summary']) ?></textarea>
                </div>
                
                <!-- Content -->
                <div class="col-12">
                    <label for="content" class="form-label fw-semibold">Nội dung chi tiết <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="12" required><?= old('content', $news['content']) ?></textarea>
                </div>
                
                <!-- Image upload and preview -->
                <div class="col-md-6">
                    <label for="image" class="form-label fw-semibold">Hình ảnh đại diện</label>
                    <?php if (!empty($news['image'])): ?>
                        <div class="mb-2">
                            <span class="text-muted d-block small mb-1">Ảnh hiện tại:</span>
                            <div class="p-2 border rounded d-inline-block bg-light">
                                <span class="text-dark small"><i class="bi bi-file-earmark-image"></i> <?= esc(basename($news['image'])) ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="text-muted">Định dạng hỗ trợ: jpg, png, webp. Tối đa 20MB. Chọn ảnh mới sẽ thay thế ảnh cũ.</small>
                </div>
                
                <!-- Status & Featured -->
                <div class="col-md-3">
                    <label for="status" class="form-label fw-semibold">Trạng thái đăng <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="draft" <?= old('status', $news['status']) === 'draft' ? 'selected' : '' ?>>Nháp</option>
                        <option value="published" <?= old('status', $news['status']) === 'published' ? 'selected' : '' ?>>Xuất bản ngay</option>
                    </select>
                </div>
                
                <div class="col-md-3 d-flex align-items-end pb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" <?= old('is_featured', $news['is_featured']) ? 'checked' : '' ?>>
                        <label class="form-check-label fw-semibold" for="is_featured">
                            Bài viết nổi bật
                        </label>
                    </div>
                </div>

                <!-- SEO Title -->
                <div class="col-12 border-top pt-4 mt-5">
                    <h5 class="fw-bold mb-3 text-primary"><i class="bi bi-search"></i> Cấu hình SEO bài viết (Tùy chọn)</h5>
                </div>

                <div class="col-md-6">
                    <label for="seo_title" class="form-label fw-semibold">SEO Title</label>
                    <input type="text" class="form-control" id="seo_title" name="seo_title" value="<?= old('seo_title', $news['seo_title']) ?>">
                </div>

                <div class="col-md-6">
                    <label for="seo_keywords" class="form-label fw-semibold">SEO Keywords</label>
                    <input type="text" class="form-control" id="seo_keywords" name="seo_keywords" value="<?= old('seo_keywords', $news['seo_keywords']) ?>">
                </div>

                <div class="col-12">
                    <label for="seo_description" class="form-label fw-semibold">SEO Meta Description</label>
                    <textarea class="form-control" id="seo_description" name="seo_description" rows="2"><?= old('seo_description', $news['seo_description']) ?></textarea>
                </div>
                
                <!-- Tags -->
                <div class="col-12">
                    <label for="tags" class="form-label fw-semibold">Tags bài viết</label>
                    <input type="text" class="form-control" id="tags" name="tags" value="<?= old('tags', $news['tags']) ?>">
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save-fill"></i> Cập Nhật Bài Viết</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
