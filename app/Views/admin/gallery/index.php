<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-image me-2"></i> Thư Viện Hình Ảnh</h5>
        <a href="<?= base_url('admin/gallery/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle"></i> Thêm Ảnh</a>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 120px;">Hình ảnh</th>
                        <th>Tiêu đề</th>
                        <th>Chuyên mục (Album)</th>
                        <th>Nổi bật</th>
                        <th>Thứ tự</th>
                        <th>Trạng thái</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($images)): ?>
                        <?php foreach ($images as $img): ?>
                            <tr>
                                <td class="ps-4">
                                    <?php
                                    $galleryImagePath = !empty($img['image']) ? FCPATH . 'uploads/gallery/' . $img['image'] : '';
                                    $galleryImageUrl = !empty($img['image']) ? base_url('uploads/gallery/' . $img['image']) : '';
                                    ?>
                                    <div class="border rounded bg-light overflow-hidden d-flex align-items-center justify-content-center" style="width: 80px; height: 60px;">
                                        <?php if (!empty($galleryImagePath) && file_exists($galleryImagePath)): ?>
                                            <img src="<?= $galleryImageUrl ?>" alt="<?= esc($img['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                        <?php else: ?>
                                            <i class="bi bi-image text-muted"></i>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="fw-semibold"><?= esc($img['title']) ?></td>
                                <td><?= esc($img['album_title'] ?? 'Chưa phân loại') ?></td>
                                <td>
                                    <?php if ($img['is_featured'] == 1): ?>
                                        <span class="badge bg-primary rounded-pill px-3">Có</span>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted border rounded-pill px-3">Không</span>
                                    <?php endif; ?>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?= esc($img['sort_order']) ?></span></td>
                                <td>
                                    <?php if ($img['status'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Hiển thị</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning rounded-pill px-3">Ẩn</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/gallery/edit/' . $img['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil"></i> Sửa</a>
                                    <a href="<?= base_url('admin/gallery/delete/' . $img['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hình ảnh này không?')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Chưa có hình ảnh nào được tải lên.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
