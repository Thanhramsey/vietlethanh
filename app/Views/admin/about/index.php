<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="row g-4">
    <!-- About Page Info Config -->
    <div class="col-12">
        <form action="<?= base_url('admin/about/save') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i><?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- HERO SECTION -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-primary text-white rounded-top-4 px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-layout-text-window me-2"></i>Phần Banner đầu trang</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Nhãn hero (nhỏ phía trên)</label>
                            <input type="text" name="about_hero_label" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_hero_label', 'Về Chúng Tôi')) ?>">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Tiêu đề hero</label>
                            <input type="text" name="about_hero_title" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_hero_title', 'Công ty TNHH MTV Việt Lệ Thanh')) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Mô tả ngắn dưới tiêu đề</label>
                            <input type="text" name="about_hero_sub" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_hero_sub', 'Uy tín — Chất lượng — Tận tâm phục vụ từ năm 2017 tại Gia Lai')) ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STATS -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Số liệu nổi bật (Stats Strip)</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Năm thành lập</label>
                            <input type="text" name="about_stat_year" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_stat_year', '2017')) ?>">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Năm kinh nghiệm</label>
                            <input type="text" name="about_stat_exp" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_stat_exp', '7+')) ?>">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Lĩnh vực hoạt động</label>
                            <input type="text" name="about_stat_sectors" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_stat_sectors', '3')) ?>">
                        </div>
                        <div class="col-sm-3">
                            <label class="form-label fw-semibold">Cam kết chất lượng</label>
                            <input type="text" name="about_stat_quality" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_stat_quality', '100%')) ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- COMPANY INFO -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-building me-2 text-primary"></i>Thông tin doanh nghiệp</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tên đầy đủ (Tiếng Việt)</label>
                            <input type="text" name="about_company_name_vi" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_company_name_vi', 'CÔNG TY TNHH MỘT THÀNH VIÊN VIỆT LỆ THANH')) ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Tên quốc tế</label>
                            <input type="text" name="about_company_name_en" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_company_name_en', 'VIET LE THANH ONE MEMBER COMPANY LIMITED')) ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Mã số thuế</label>
                            <input type="text" name="about_tax_code" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_tax_code', '5901061783')) ?>">
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-semibold">Đại diện pháp luật</label>
                            <input type="text" name="about_legal_rep" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_legal_rep', 'NGUYỄN HỮU VIỆT')) ?>">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Ngày cấp phép</label>
                            <input type="text" name="about_license_date" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_license_date', '30/05/2017')) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Địa chỉ trụ sở</label>
                            <input type="text" name="about_address" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_address', '77 Quang Trung, khu phố II, Thị trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai')) ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- STORY -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-book me-2 text-primary"></i>Câu chuyện công ty (Story Section)</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tiêu đề nhỏ</label>
                            <input type="text" name="about_story_heading" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_story_heading', 'Hành Trình Phát Triển & Khẳng Định Uy Tín')) ?>">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label fw-semibold">Đoạn giới thiệu (lead)</label>
                            <input type="text" name="about_story_intro" class="form-control rounded-3"
                                   value="<?= esc(get_setting('about_story_intro', '')) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nội dung đoạn 1</label>
                            <textarea name="about_story_body1" class="form-control rounded-3" rows="3"><?= esc(get_setting('about_story_body1', '')) ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Nội dung đoạn 2</label>
                            <textarea name="about_story_body2" class="form-control rounded-3" rows="3"><?= esc(get_setting('about_story_body2', '')) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- VISION / MISSION / VALUES -->
            <div class="card border-0 shadow-sm rounded-4 mb-4">
                <div class="card-header bg-white border-bottom px-4 py-3">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-stars me-2 text-primary"></i>Tầm nhìn — Sứ mệnh — Giá trị cốt lõi</h6>
                </div>
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Tầm nhìn</label>
                            <textarea name="about_vision" class="form-control rounded-3" rows="4"><?= esc(get_setting('about_vision', '')) ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Sứ mệnh</label>
                            <textarea name="about_mission" class="form-control rounded-3" rows="4"><?= esc(get_setting('about_mission', '')) ?></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Giá trị cốt lõi</label>
                            <textarea name="about_values" class="form-control rounded-3" rows="4"><?= esc(get_setting('about_values', '')) ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5">
                    <i class="bi bi-save me-2"></i>Lưu cấu hình Giới Thiệu
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
