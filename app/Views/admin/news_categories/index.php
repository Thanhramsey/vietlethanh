<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-folder2-open me-2"></i> Danh Mục Tin Tức</h5>
        <a href="<?= base_url('admin/news-categories/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle"></i> Thêm Danh Mục</a>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Mã</th>
                        <th>Tên danh mục</th>
                        <th>Đường dẫn (Slug)</th>
                        <th>Ngày tạo</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $cat): ?>
                            <tr>
                                <td class="ps-4 fw-semibold">#<?= esc($cat['id']) ?></td>
                                <td class="fw-bold"><?= esc($cat['title']) ?></td>
                                <td><code><?= esc($cat['slug']) ?></code></td>
                                <td><?= date('d/m/Y H:i', strtotime($cat['created_at'])) ?></td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/news-categories/edit/' . $cat['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil"></i> Sửa</a>
                                    <a href="<?= base_url('admin/news-categories/delete/' . $cat['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này? Tất cả bài viết thuộc danh mục này sẽ chuyển về trạng thái không thuộc danh mục nào.')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Chưa có danh mục nào được tạo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
