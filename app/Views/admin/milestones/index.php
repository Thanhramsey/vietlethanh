<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i> Lịch Sử Công Ty (Timeline)</h5>
        <a href="<?= base_url('admin/milestones/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm">
            <i class="bi bi-plus-circle"></i> Thêm Mốc Lịch Sử
        </a>
    </div>

    <div class="card-body p-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4" style="width:80px;">Mã</th>
                        <th style="width:90px;">Năm</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th style="width:80px;">Thứ tự</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($milestones)): ?>
                        <?php foreach ($milestones as $m): ?>
                            <tr>
                                <td class="ps-4 fw-semibold">#<?= esc($m['id']) ?></td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary fw-bold fs-6 rounded-pill px-3">
                                        <?= esc($m['year']) ?>
                                    </span>
                                </td>
                                <td class="fw-semibold"><?= esc($m['title']) ?></td>
                                <td>
                                    <?php if (!empty($m['image'])): ?>
                                        <img src="<?= base_url('uploads/milestones/' . $m['image']) ?>"
                                             alt="<?= esc($m['title']) ?>"
                                             style="width:56px;height:42px;object-fit:cover;border-radius:8px;">
                                    <?php else: ?>
                                        <span class="text-muted small">—</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center"><?= esc($m['sort_order']) ?></td>
                                <td class="text-end pe-4 text-nowrap">
                                    <a href="<?= base_url('admin/milestones/edit/' . $m['id']) ?>"
                                       class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">
                                        <i class="bi bi-pencil"></i> Sửa
                                    </a>
                                    <a href="<?= base_url('admin/milestones/delete/' . $m['id']) ?>"
                                       onclick="return confirm('Bạn có chắc muốn xóa mốc lịch sử này?')"
                                       class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                        <i class="bi bi-trash"></i> Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-clock-history d-block mb-2" style="font-size:2rem;opacity:0.3;"></i>
                                Chưa có mốc lịch sử nào. <a href="<?= base_url('admin/milestones/create') ?>">Thêm ngay</a>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
