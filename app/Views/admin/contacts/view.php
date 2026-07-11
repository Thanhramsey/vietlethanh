<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-header bg-white border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold"><i class="bi bi-chat-left-text me-2"></i> Chi tiết tin nhắn</h5>
        <a href="<?= base_url('admin/contacts') ?>" class="btn btn-outline-secondary btn-custom rounded-pill btn-sm"><i class="bi bi-arrow-left"></i> Quay lại</a>
    </div>
    <div class="card-body p-4 p-md-5">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label text-muted small uppercase">Họ và tên</label>
                <div class="fw-bold fs-5"><?= esc($contact['name']) ?></div>
            </div>
            
            <div class="col-md-6">
                <label class="form-label text-muted small uppercase">Số điện thoại</label>
                <div class="fw-bold fs-5"><a href="tel:<?= esc($contact['phone']) ?>" class="text-decoration-none"><?= esc($contact['phone']) ?></a></div>
            </div>
            
            <div class="col-md-6">
                <label class="form-label text-muted small uppercase">Địa chỉ Email</label>
                <div class="fw-bold fs-5"><?= esc($contact['email'] ?? '-') ?></div>
            </div>
            
            <div class="col-md-6">
                <label class="form-label text-muted small uppercase">Thời gian gửi</label>
                <div class="fw-bold fs-5"><?= date('d/m/Y H:i:s', strtotime($contact['created_at'])) ?></div>
            </div>

            <div class="col-12">
                <label class="form-label text-muted small uppercase">Chủ đề cần tư vấn</label>
                <div class="fw-bold fs-5"><?= esc($contact['subject'] ?? '-') ?></div>
            </div>
            
            <div class="col-12 border-top pt-3 mt-4">
                <label class="form-label text-muted small uppercase">Nội dung tin nhắn</label>
                <div class="bg-light p-4 rounded-3 text-dark fs-6" style="white-space: pre-wrap; line-height: 1.6; min-height: 150px;"><?= esc($contact['message']) ?></div>
            </div>
        </div>
        
        <div class="mt-4 border-top pt-3 text-end">
            <a href="<?= base_url('admin/contacts/delete/' . $contact['id']) ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tin nhắn này không?')" class="btn btn-danger btn-custom rounded-pill"><i class="bi bi-trash"></i> Xóa tin nhắn</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
