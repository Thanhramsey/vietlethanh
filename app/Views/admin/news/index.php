<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-newspaper me-2"></i> Danh sách bài viết</h5>
        <a href="<?= base_url('admin/news/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle"></i> Thêm bài viết</a>
    </div>
    
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width: 100px;">Ảnh</th>
                        <th class="ps-4">Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Trạng thái</th>
                        <th>Nổi bật</th>
                        <th>Ngày đăng</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($newsList)): ?>
                        <?php foreach ($newsList as $news): ?>
                            <tr>
                                <td class="ps-4">
                                    <?php
                                    $newsImageRaw = (string) ($news['image'] ?? '');
                                    $newsImagePath = '';
                                    $newsImageUrl = '';
                                    if ($newsImageRaw !== '') {
                                        if (strpos($newsImageRaw, 'uploads/') === 0) {
                                            $newsImagePath = FCPATH . $newsImageRaw;
                                            $newsImageUrl = base_url($newsImageRaw);
                                        } else {
                                            $newsImagePath = FCPATH . 'uploads/news/' . $newsImageRaw;
                                            $newsImageUrl = base_url('uploads/news/' . $newsImageRaw);
                                        }
                                    }
                                    ?>
                                    <div class="border rounded bg-light overflow-hidden d-flex align-items-center justify-content-center" style="width: 70px; height: 52px;">
                                        <?php if (!empty($newsImagePath) && file_exists($newsImagePath)): ?>
                                            <img src="<?= $newsImageUrl ?>" alt="<?= esc($news['title']) ?>" style="width:100%;height:100%;object-fit:cover;">
                                        <?php else: ?>
                                            <i class="bi bi-image text-muted"></i>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="ps-4 fw-semibold text-wrap" style="max-width: 300px;"><?= esc($news['title']) ?></td>
                                <td><?= esc($news['category_title'] ?? 'Chưa phân loại') ?></td>
                                <td>
                                    <?php if ($news['status'] === 'published'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Đã đăng</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-subtle text-warning border border-warning rounded-pill px-3">Nháp</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($news['is_featured'] == 1): ?>
                                        <span class="badge bg-primary rounded-pill px-3">Có</span>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted border rounded-pill px-3">Không</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $news['published_at'] ? date('d/m/Y H:i', strtotime($news['published_at'])) : '-' ?>
                                </td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/news/edit/' . $news['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-pencil"></i> Sửa</a>
                                    <a href="<?= base_url('admin/news/delete/' . $news['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Chưa có bài viết nào được tạo.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
