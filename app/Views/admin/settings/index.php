<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-4 p-md-5">
        <form action="<?= base_url('admin/settings/save') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <!-- Tabs for organization -->
            <ul class="nav nav-pills mb-4 border-bottom pb-3" id="settingsTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-pill px-4" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true"><i class="bi bi-info-circle me-1"></i> Thông Tin Chung</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab" aria-controls="seo" aria-selected="false"><i class="bi bi-search me-1"></i> Cấu Hình SEO</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4" id="map-tab" data-bs-toggle="tab" data-bs-target="#map" type="button" role="tab" aria-controls="map" aria-selected="false"><i class="bi bi-map me-1"></i> Bản Đồ & Liên Kết</button>
                </li>
            </ul>
            
            <div class="tab-content" id="settingsTabContent">
                <!-- General Info Tab -->
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tên công ty (Tiếng Việt)</label>
                            <input type="text" class="form-control" name="company_name" value="<?= esc(get_setting('company_name')) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tên công ty (Tiếng Anh)</label>
                            <input type="text" class="form-control" name="company_name_en" value="<?= esc(get_setting('company_name_en')) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Địa chỉ trụ sở</label>
                            <input type="text" class="form-control" name="address" value="<?= esc(get_setting('address')) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Hotline</label>
                            <input type="text" class="form-control" name="phone" value="<?= esc(get_setting('phone')) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email nhận liên hệ</label>
                            <input type="email" class="form-control" name="email" value="<?= esc(get_setting('email')) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Giờ làm việc</label>
                            <input type="text" class="form-control" name="working_hours" value="<?= esc(get_setting('working_hours')) ?>">
                        </div>
                        <!-- Logo Upload -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Logo đơn vị</label>
                            <?php if (get_setting('site_logo')): ?>
                                <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                                    <img src="<?= base_url('uploads/settings/' . get_setting('site_logo')) ?>" alt="Site Logo" style="max-height: 50px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="site_logo" accept="image/*">
                            <small class="text-muted">Định dạng hỗ trợ: png, jpg, webp, svg. Kích thước khuyến nghị: dạng ngang, chiều cao khoảng 45px - 50px.</small>
                        </div>
                    </div>
                </div>
                
                <!-- SEO Tab -->
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">SEO Title mặc định</label>
                            <input type="text" class="form-control" name="seo_title" value="<?= esc(get_setting('seo_title')) ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">SEO Meta Description mặc định</label>
                            <textarea class="form-control" name="seo_description" rows="3" required><?= esc(get_setting('seo_description')) ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">SEO Keywords mặc định</label>
                            <input type="text" class="form-control" name="seo_keywords" value="<?= esc(get_setting('seo_keywords')) ?>">
                            <small class="text-muted">Các từ khóa cách nhau bằng dấu phẩy (vd: viet le thanh, khach san duc co...)</small>
                        </div>
                    </div>
                </div>
                
                <!-- Map & Links Tab -->
                <div class="tab-pane fade" id="map" role="tabpanel" aria-labelledby="map-tab">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Link nhúng bản đồ Google Map (iframe src URL)</label>
                            <textarea class="form-control" name="map_embed" rows="3" required><?= esc(get_setting('map_embed')) ?></textarea>
                            <small class="text-muted">Chỉ dán phần đường dẫn trong thuộc tính <code>src="..."</code> của mã nhúng Google Maps iframe.</small>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Link Facebook</label>
                            <input type="url" class="form-control" name="facebook" value="<?= esc(get_setting('facebook')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Hotline/SĐT Zalo</label>
                            <input type="text" class="form-control" name="zalo" value="<?= esc(get_setting('zalo')) ?>">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 border-top pt-3 text-end">
                <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save me-1"></i> Lưu Cấu Hình</button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
