<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white" style="max-width: 600px;">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2"></i> Thêm Danh Mục mới</h5>
        <a href="<?= base_url('admin/news-categories') ?>" class="btn btn-outline-secondary btn-custom rounded-pill btn-sm"><i class="bi bi-arrow-left"></i> Quay lại</a>
    </div>
    
    <div class="card-body p-4">
        
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

        <form action="<?= base_url('admin/news-categories/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="mb-4">
                <label for="title" class="form-label fw-semibold">Tên danh mục tin tức <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" placeholder="Nhập tên danh mục (ví dụ: Thông cáo báo chí, Khuyến mãi...)" required autofocus>
            </div>
            
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-plus-circle-fill"></i> Thêm Danh Mục</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
