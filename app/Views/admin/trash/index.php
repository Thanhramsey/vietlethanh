<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-trash3 me-2"></i> Thùng rác (Xóa mềm)</h5>
        <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">Tổng: <?= count($items ?? []) ?></span>
    </div>

    <div class="card-body p-4 p-md-5">
        <?php if (!empty($items)): ?>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Loại dữ liệu</th>
                            <th>Tên/Nội dung</th>
                            <th class="text-center" style="width:110px;">ID</th>
                            <th style="width:190px;">Xóa lúc</th>
                            <th class="text-end" style="width:220px;">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><span class="badge bg-secondary-subtle text-secondary"><?= esc($item['label']) ?></span></td>
                                <td class="fw-semibold"><?= esc($item['name']) ?></td>
                                <td class="text-center">#<?= esc($item['id']) ?></td>
                                <td><?= esc(date('d/m/Y H:i', strtotime($item['deleted_at']))) ?></td>
                                <td class="text-end">
                                    <a href="<?= base_url('admin/trash/restore/' . $item['type'] . '/' . $item['id']) ?>" class="btn btn-sm btn-outline-success rounded-pill px-3 me-1" onclick="return confirm('Khôi phục bản ghi này?')">
                                        <i class="bi bi-arrow-counterclockwise me-1"></i> Khôi phục
                                    </a>
                                    <a href="<?= esc($item['admin_url']) ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Mở module
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="bi bi-trash3" style="font-size: 2rem;"></i>
                <p class="mb-0 mt-2">Thùng rác đang trống.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
