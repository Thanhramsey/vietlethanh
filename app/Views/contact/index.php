<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Page Header / Breadcrumbs -->
<div class="page-header">
    <div class="container" data-aos="fade-down">
        <h1><?= esc(lang('Site.contact_with_us')) ?></h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= esc(lang('Site.home')) ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= esc(lang('Site.contact')) ?></li>
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
                <h5 class="fw-bold"><i class="bi bi-x-circle-fill me-2"></i> <?= esc(lang('Site.validation_error')) ?></h5>
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
                <span class="text-primary fw-bold text-uppercase d-block mb-2"><?= esc(lang('Site.contact_info')) ?></span>
                <h2 class="section-title-left mb-4"><?= esc(lang('Site.connect_with_us')) ?></h2>
                <p class="text-muted mb-4"><?= esc(lang('Site.contact_intro_desc')) ?></p>
                
                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-geo-alt-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1"><?= esc(lang('Site.head_office_address')) ?></h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('address')) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-telephone-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1"><?= esc(lang('Site.contact_phone')) ?></h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('phone')) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-envelope-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1"><?= esc(lang('Site.email')) ?></h5>
                        <p class="text-muted mb-0"><?= esc(get_setting('email')) ?></p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="bg-primary-light text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; min-width: 50px;">
                        <i class="bi bi-clock-fill fs-5"></i>
                    </div>
                    <div>
                        <h5 class="fw-bold mb-1"><?= esc(lang('Site.service_hours')) ?></h5>
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
                    <h3 class="fw-bold mb-4 text-primary-color"><i class="bi bi-envelope-paper-fill me-2"></i> <?= esc(lang('Site.send_message_to_us')) ?></h3>
                    
                    <form action="<?= base_url('lien-he/gui') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold"><?= esc(lang('Site.full_name')) ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>" placeholder="<?= esc(lang('Site.placeholder_name')) ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold"><?= esc(lang('Site.phone_number')) ?> <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?= old('phone') ?>" placeholder="<?= esc(lang('Site.placeholder_phone')) ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="email" class="form-label fw-semibold"><?= esc(lang('Site.email_address')) ?></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" placeholder="example@email.com">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="subject" class="form-label fw-semibold"><?= esc(lang('Site.subject')) ?></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-chat-right-text"></i></span>
                                    <input type="text" class="form-control" id="subject" name="subject" value="<?= old('subject') ?>" placeholder="<?= esc(lang('Site.placeholder_subject')) ?>">
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold"><?= esc(lang('Site.message_content')) ?> <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="<?= esc(lang('Site.placeholder_message')) ?>" required><?= old('message') ?></textarea>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-custom btn-lg w-100 rounded-pill"><i class="bi bi-send-fill me-2"></i> <?= esc(lang('Site.send_message_now')) ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
