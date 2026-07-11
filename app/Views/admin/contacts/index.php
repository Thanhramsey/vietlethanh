<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Họ và tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Chủ đề</th>
                        <th>Ngày gửi</th>
                        <th>Trạng thái</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($contacts)): ?>
                        <?php foreach ($contacts as $contact): ?>
                            <tr>
                                <td class="ps-4 fw-semibold"><?= esc($contact['name']) ?></td>
                                <td><?= esc($contact['phone']) ?></td>
                                <td><?= esc($contact['email'] ?? '-') ?></td>
                                <td><?= esc($contact['subject'] ?? '-') ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($contact['created_at'])) ?></td>
                                <td>
                                    <?php if ($contact['is_read'] == 1): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-3">Đã đọc</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger rounded-pill px-3">Chưa đọc</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="<?= base_url('admin/contacts/view/' . $contact['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1"><i class="bi bi-eye"></i> Xem</a>
                                    <a href="<?= base_url('admin/contacts/delete/' . $contact['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tin nhắn này không?')" class="btn btn-outline-danger btn-sm rounded-pill px-3"><i class="bi bi-trash"></i> Xóa</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Không tìm thấy tin nhắn liên hệ nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links('default', 'default_full') ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
