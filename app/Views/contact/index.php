<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1>Liên Hệ Với Chúng Tôi</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Contact Content -->
<section class="section-padding">
    <div class="container">
        
        <!-- Alerts for feedback -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-5 p-4 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-5 p-4 shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger alert-dismissible fade show rounded-3 mb-5 p-4 shadow-sm" role="alert">
                <h5 class="fw-bold"><i class="bi bi-x-circle-fill me-2"></i> Lỗi xác thực dữ liệu:</h5>
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row g-5">
            <!-- Left: Contact Details & Map -->
            <div class="col-lg-5" data-aos="fade-right">
                <span class="text-primary fw-bold text-uppercase d-block mb-2">Thông Tin Liên Hệ</span>
                <h2 class="section-title-left mb-4">Kết Nối Với Việt Lệ Thanh</h2>
                <p class="text-muted mb-4">Quý khách hàng hoặc đối tác có nhu cầu liên hệ làm việc, giải đáp thắc mắc, đặt phòng lưu trú ngắn ngày hay thi công công trình vui lòng sử dụng các thông tin dưới đây hoặc gửi thư liên hệ cho chúng tôi.</p>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-geo-alt-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Địa chỉ trụ sở</h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('address')) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-telephone-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Số điện thoại liên hệ</h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('phone')) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-envelope-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Thư điện tử (Email)</h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('email')) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-clock-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1">Thời gian phục vụ</h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('working_hours', '24/7')) ?></p>
                    </div>
                </div>

                <hr class="my-4">

                <!-- Responsive Google Map embed -->
                <div class="rounded-4 overflow-hidden border shadow-sm" style="height: 250px;">
                    <iframe src="<?= get_setting('map_embed') ?>" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <!-- Right: Contact Form -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="card border-0 shadow-md rounded-4 p-4 p-md-5 bg-white">
                    <h3 class="fw-bold mb-4 text-primary-color"><i class="bi bi-envelope-paper-fill me-2"></i> Gửi Tin Nhắn Cho Chúng Tôi</h3>
                    
                    <form action="<?= base_url('lien-he/gui') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold">Họ và tên <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" placeholder="Nguyễn Văn A" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold">Số điện thoại <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>" placeholder="09xxxxxxxx" required>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="email" class="form-label fw-semibold">Địa chỉ Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" placeholder="example@email.com">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold">Chủ đề cần tư vấn</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-chat-right-text"></i></span>
                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= old('subject') ?>" placeholder="Đặt phòng khách sạn / Hợp tác thi công...">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold">Nội dung tin nhắn <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Nội dung chi tiết..." required><?= old('message') ?></textarea>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-custom btn-lg w-100 rounded-pill"><i class="bi bi-send-fill me-2"></i> Gửi Tin Nhắn Ngay</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
