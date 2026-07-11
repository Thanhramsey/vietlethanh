<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="row g-4 mb-4">
    <!-- Card Unread Contact -->
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
            <div class="d-flex align-items-center">
                <div class="bg-danger text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="bi bi-envelope-exclamation fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small uppercase">Liên Hệ Mới</h6>
                    <h3 class="fw-bold mb-0 text-danger"><?= esc($unread_contacts) ?></h3>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Card Total Contacts -->
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
            <div class="d-flex align-items-center">
                <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="bi bi-envelope-paper fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small uppercase">Tổng Liên Hệ</h6>
                    <h3 class="fw-bold mb-0"><?= esc($total_contacts) ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total News -->
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
            <div class="d-flex align-items-center">
                <div class="bg-success text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="bi bi-newspaper fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small uppercase">Tin Tức / Bài Viết</h6>
                    <h3 class="fw-bold mb-0"><?= esc($total_news) ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Services -->
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm rounded-4 p-3 bg-white h-100">
            <div class="d-flex align-items-center">
                <div class="bg-warning text-white rounded-3 d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                    <i class="bi bi-briefcase fs-4"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small uppercase">Ngành Nghề Dịch Vụ</h6>
                    <h3 class="fw-bold mb-0"><?= esc($total_services) ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages Table -->
<div class="card border-0 shadow-sm rounded-4 bg-white mb-4">
    <div class="card-header bg-white border-0 py-3">
        <h5 class="mb-0 fw-bold text-dark"><i class="bi bi-chat-left-text me-2"></i> Liên Hệ Gần Đây</h5>
    </div>
    <div class="card-body p-0">
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
                    <?php if (!empty($recent_contacts)): ?>
                        <?php foreach ($recent_contacts as $contact): ?>
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
                                    <a href="<?= base_url('admin/contacts/view/' . $contact['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3"><i class="bi bi-eye"></i> Xem</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Chưa nhận được tin nhắn liên hệ nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
