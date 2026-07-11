<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-4">
        <ul class="nav nav-pills gap-2 mb-4" id="pageContentTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'home') === 'home' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#tab-home" type="button" role="tab" aria-selected="<?= ($activeTab ?? 'home') === 'home' ? 'true' : 'false' ?>">
                    <i class="bi bi-house-door me-1"></i> Nội dung Trang Chủ
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'home') === 'about' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#tab-about" type="button" role="tab" aria-selected="<?= ($activeTab ?? 'home') === 'about' ? 'true' : 'false' ?>">
                    <i class="bi bi-info-circle me-1"></i> Nội dung Trang Giới Thiệu
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'home') === 'timeline' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#tab-timeline" type="button" role="tab" aria-selected="<?= ($activeTab ?? 'home') === 'timeline' ? 'true' : 'false' ?>">
                    <i class="bi bi-clock-history me-1"></i> Lịch Sử Thành Lập
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade <?= ($activeTab ?? 'home') === 'home' ? 'show active' : '' ?>" id="tab-home" role="tabpanel">
                <form action="<?= base_url('admin/about/save') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="active_tab" value="home">

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-window-stack me-2 text-primary"></i>Hero Trang Chủ</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Nhãn hero</label>
                                    <input type="text" name="home_hero_label" class="form-control rounded-3" value="<?= esc(get_setting('home_hero_label', 'VIỆT LỆ THANH')) ?>">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Tiêu đề chính</label>
                                    <input type="text" name="home_hero_title" class="form-control rounded-3" value="<?= esc(get_setting('home_hero_title', 'Đối tác tin cậy trong lưu trú, xây dựng và nông nghiệp sạch')) ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Mô tả ngắn</label>
                                    <textarea name="home_hero_sub" class="form-control rounded-3" rows="3"><?= esc(get_setting('home_hero_sub', 'Doanh nghiệp đa ngành tại Đức Cơ - Gia Lai với cam kết chất lượng và uy tín bền vững.')) ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nút CTA - Nội dung</label>
                                    <input type="text" name="home_cta_text" class="form-control rounded-3" value="<?= esc(get_setting('home_cta_text', 'Liên hệ tư vấn')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nút CTA - Link</label>
                                    <input type="text" name="home_cta_link" class="form-control rounded-3" value="<?= esc(get_setting('home_cta_link', '/lien-he')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nút liên hệ phụ - Nội dung</label>
                                    <input type="text" name="home_hero_contact_text" class="form-control rounded-3" value="<?= esc(get_setting('home_hero_contact_text', 'Liên Hệ Ngay')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nút liên hệ phụ - Link</label>
                                    <input type="text" name="home_hero_contact_link" class="form-control rounded-3" value="<?= esc(get_setting('home_hero_contact_link', '/lien-he')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-card-text me-2 text-primary"></i>Giới thiệu nhanh Trang Chủ</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold">Tiêu đề khối giới thiệu</label>
                                    <input type="text" name="home_intro_title" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_title', 'Về chúng tôi')) ?>">
                                </div>
                                <div class="col-md-7">
                                    <label class="form-label fw-semibold">Nội dung tóm tắt</label>
                                    <textarea name="home_intro_text" class="form-control rounded-3" rows="3"><?= esc(get_setting('home_intro_text', 'Nội dung cấu hình trang chủ đang chuẩn bị triển khai ở giao diện frontend.')) ?></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Nhãn section (eyebrow)</label>
                                    <input type="text" name="home_intro_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_eyebrow', 'Giới Thiệu Chung')) ?>">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Tiêu đề lớn section</label>
                                    <input type="text" name="home_intro_heading" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_heading', 'CÔNG TY TNHH MTV VIỆT LỆ THANH')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Đoạn mô tả 1</label>
                                    <textarea name="home_intro_body1" class="form-control rounded-3" rows="3"><?= esc(get_setting('home_intro_body1', 'Được thành lập từ năm 2017 tại huyện Đức Cơ, tỉnh Gia Lai, Công ty TNHH Một Thành Viên Việt Lệ Thanh đã và đang khẳng định vị thế là một trong những doanh nghiệp đa ngành uy tín hàng đầu trong khu vực.')) ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Đoạn mô tả 2</label>
                                    <textarea name="home_intro_body2" class="form-control rounded-3" rows="3"><?= esc(get_setting('home_intro_body2', 'Lấy dịch vụ lưu trú ngắn ngày làm trọng tâm phát triển với hệ thống phòng nghỉ tiện nghi, sạch sẽ và an toàn. Bên cạnh đó, công ty còn phát triển mạnh mẽ mảng thi công xây dựng hạ tầng giao thông và trang trại chăn nuôi gia súc theo hướng bền vững.')) ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Khối ảnh mô phỏng - Tiêu đề</label>
                                    <input type="text" name="home_intro_card_title" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_card_title', 'VIỆT LỆ THANH')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Khối ảnh mô phỏng - Địa chỉ</label>
                                    <input type="text" name="home_intro_card_address" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_card_address', 'Trụ sở tại: 77 Quang Trung, thị trấn Chư Ty, Đức Cơ, Gia Lai')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Feature 1 - Tiêu đề</label>
                                    <input type="text" name="home_intro_feature1_title" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_feature1_title', 'Uy Tín Hàng Đầu')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Feature 1 - Mô tả</label>
                                    <input type="text" name="home_intro_feature1_sub" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_feature1_sub', 'Đặt chất lượng lên trên hết')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Feature 2 - Tiêu đề</label>
                                    <input type="text" name="home_intro_feature2_title" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_feature2_title', 'Dịch Vụ Chu Đáo')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Feature 2 - Mô tả</label>
                                    <input type="text" name="home_intro_feature2_sub" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_feature2_sub', 'Phục vụ khách hàng 24/7')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nút "Xem Chi Tiết" - Nội dung</label>
                                    <input type="text" name="home_intro_button_text" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_button_text', 'Xem Chi Tiết')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nút "Xem Chi Tiết" - Link</label>
                                    <input type="text" name="home_intro_button_link" class="form-control rounded-3" value="<?= esc(get_setting('home_intro_button_link', '/gioi-thieu')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-stars me-2 text-primary"></i>Section "Tại sao chọn chúng tôi"</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Nhãn section</label>
                                    <input type="text" name="home_why_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_why_eyebrow', 'Giá Trị Cốt Lõi')) ?>">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Tiêu đề section</label>
                                    <input type="text" name="home_why_title" class="form-control rounded-3" value="<?= esc(get_setting('home_why_title', 'Tại Sao Nên Chọn Chúng Tôi')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Card 1 - Tiêu đề</label>
                                    <input type="text" name="home_why_card1_title" class="form-control rounded-3" value="<?= esc(get_setting('home_why_card1_title', 'Vị Trí Đắc Địa')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Card 1 - Mô tả</label>
                                    <textarea name="home_why_card1_desc" class="form-control rounded-3" rows="2"><?= esc(get_setting('home_why_card1_desc', 'Nằm ngay trung tâm thị trấn Chư Ty, Đức Cơ, thuận tiện cho việc di chuyển, giao thương và lưu trú nghỉ dưỡng.')) ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Card 2 - Tiêu đề</label>
                                    <input type="text" name="home_why_card2_title" class="form-control rounded-3" value="<?= esc(get_setting('home_why_card2_title', 'Giá Cả Hợp Lý')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Card 2 - Mô tả</label>
                                    <textarea name="home_why_card2_desc" class="form-control rounded-3" rows="2"><?= esc(get_setting('home_why_card2_desc', 'Cung cấp phòng lưu trú đầy đủ tiện nghi và các dịch vụ xây dựng với mức giá cạnh tranh nhất thị trường.')) ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Card 3 - Tiêu đề</label>
                                    <input type="text" name="home_why_card3_title" class="form-control rounded-3" value="<?= esc(get_setting('home_why_card3_title', 'Đội Ngũ Tận Tâm')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Card 3 - Mô tả</label>
                                    <textarea name="home_why_card3_desc" class="form-control rounded-3" rows="2"><?= esc(get_setting('home_why_card3_desc', 'Đội ngũ kỹ sư xây dựng lành nghề và nhân viên khách sạn phục vụ chuyên nghiệp, chu đáo.')) ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-bar-chart-line me-2 text-primary"></i>Section thống kê</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 1 - Giá trị</label>
                                    <input type="text" name="home_stats_item1_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item1_value', '9+')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 1 - Tiêu đề</label>
                                    <input type="text" name="home_stats_item1_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item1_title', 'Năm Hoạt Động')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 2 - Giá trị</label>
                                    <input type="text" name="home_stats_item2_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item2_value', '100%')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 2 - Tiêu đề</label>
                                    <input type="text" name="home_stats_item2_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item2_title', 'Khách Hàng Hài Lòng')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 3 - Giá trị</label>
                                    <input type="text" name="home_stats_item3_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item3_value', '50+')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 3 - Tiêu đề</label>
                                    <input type="text" name="home_stats_item3_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item3_title', 'Công Trình Đã Thi Công')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 4 - Giá trị</label>
                                    <input type="text" name="home_stats_item4_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item4_value', '24/7')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Số liệu 4 - Tiêu đề</label>
                                    <input type="text" name="home_stats_item4_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item4_title', 'Hỗ Trợ Phục Vụ')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-layers me-2 text-primary"></i>Tiêu đề các section dữ liệu</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Services - Nhãn section</label>
                                    <input type="text" name="home_services_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_services_eyebrow', 'Lĩnh Vực Hoạt Động')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Services - Tiêu đề section</label>
                                    <input type="text" name="home_services_title" class="form-control rounded-3" value="<?= esc(get_setting('home_services_title', 'Dịch Vụ Của Chúng Tôi')) ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Services - Text khi rỗng</label>
                                    <input type="text" name="home_services_empty_text" class="form-control rounded-3" value="<?= esc(get_setting('home_services_empty_text', 'Đang cập nhật danh sách dịch vụ...')) ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gallery - Nhãn section</label>
                                    <input type="text" name="home_gallery_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_eyebrow', 'Hình Ảnh Thực Tế')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gallery - Tiêu đề section</label>
                                    <input type="text" name="home_gallery_title" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_title', 'Thư Viện Ảnh Hoạt Động')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gallery - Nút xem tất cả</label>
                                    <input type="text" name="home_gallery_view_all_text" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_view_all_text', 'Xem Tất Cả Hình Ảnh')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Gallery - Text khi rỗng</label>
                                    <input type="text" name="home_gallery_empty_text" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_empty_text', 'Đang cập nhật thư viện ảnh...')) ?>">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">News - Nhãn section</label>
                                    <input type="text" name="home_news_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_news_eyebrow', 'Tin Tức Mới Nhất')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">News - Tiêu đề section</label>
                                    <input type="text" name="home_news_title" class="form-control rounded-3" value="<?= esc(get_setting('home_news_title', 'Bản Tin Việt Lệ Thanh')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">News - Text khi rỗng</label>
                                    <input type="text" name="home_news_empty_text" class="form-control rounded-3" value="<?= esc(get_setting('home_news_empty_text', 'Đang cập nhật tin tức mới...')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">News - Nút đọc tiếp</label>
                                    <input type="text" name="home_news_read_more_text" class="form-control rounded-3" value="<?= esc(get_setting('home_news_read_more_text', 'Đọc Tiếp')) ?>">
                                </div>

                                <div class="col-12">
                                    <label class="form-label fw-semibold">Partners fallback - tiền tố tên</label>
                                    <input type="text" name="home_partners_empty_prefix" class="form-control rounded-3" value="<?= esc(get_setting('home_partners_empty_prefix', 'Đối tác')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary btn-custom rounded-pill px-5">
                            <i class="bi bi-save me-2"></i>Lưu nội dung Trang Chủ
                        </button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade <?= ($activeTab ?? 'home') === 'about' ? 'show active' : '' ?>" id="tab-about" role="tabpanel">
                <form action="<?= base_url('admin/about/save') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="active_tab" value="about">

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-primary text-white rounded-top-4 px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-layout-text-window me-2"></i>Phần Banner đầu trang</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Nhãn hero (nhỏ phía trên)</label>
                                    <input type="text" name="about_hero_label" class="form-control rounded-3" value="<?= esc(get_setting('about_hero_label', 'Về Chúng Tôi')) ?>">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Tiêu đề hero</label>
                                    <input type="text" name="about_hero_title" class="form-control rounded-3" value="<?= esc(get_setting('about_hero_title', 'Công ty TNHH MTV Việt Lệ Thanh')) ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Mô tả ngắn dưới tiêu đề</label>
                                    <input type="text" name="about_hero_sub" class="form-control rounded-3" value="<?= esc(get_setting('about_hero_sub', 'Uy tín — Chất lượng — Tận tâm phục vụ từ năm 2017 tại Gia Lai')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Số liệu nổi bật</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-sm-3">
                                    <label class="form-label fw-semibold">Năm thành lập</label>
                                    <input type="text" name="about_stat_year" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_year', '2017')) ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label fw-semibold">Năm kinh nghiệm</label>
                                    <input type="text" name="about_stat_exp" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_exp', '7+')) ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label fw-semibold">Lĩnh vực hoạt động</label>
                                    <input type="text" name="about_stat_sectors" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_sectors', '3')) ?>">
                                </div>
                                <div class="col-sm-3">
                                    <label class="form-label fw-semibold">Cam kết chất lượng</label>
                                    <input type="text" name="about_stat_quality" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_quality', '100%')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-building me-2 text-primary"></i>Thông tin doanh nghiệp</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tên đầy đủ (Tiếng Việt)</label>
                                    <input type="text" name="about_company_name_vi" class="form-control rounded-3" value="<?= esc(get_setting('about_company_name_vi', 'CÔNG TY TNHH MỘT THÀNH VIÊN VIỆT LỆ THANH')) ?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Tên quốc tế</label>
                                    <input type="text" name="about_company_name_en" class="form-control rounded-3" value="<?= esc(get_setting('about_company_name_en', 'VIET LE THANH ONE MEMBER COMPANY LIMITED')) ?>">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Mã số thuế</label>
                                    <input type="text" name="about_tax_code" class="form-control rounded-3" value="<?= esc(get_setting('about_tax_code', '5901061783')) ?>">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label fw-semibold">Đại diện pháp luật</label>
                                    <input type="text" name="about_legal_rep" class="form-control rounded-3" value="<?= esc(get_setting('about_legal_rep', 'NGUYỄN HỮU VIỆT')) ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Ngày cấp phép</label>
                                    <input type="text" name="about_license_date" class="form-control rounded-3" value="<?= esc(get_setting('about_license_date', '30/05/2017')) ?>">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Địa chỉ trụ sở</label>
                                    <input type="text" name="about_address" class="form-control rounded-3" value="<?= esc(get_setting('about_address', '77 Quang Trung, khu phố II, Thị trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai')) ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-white border-bottom px-4 py-3">
                            <h6 class="mb-0 fw-bold"><i class="bi bi-book me-2 text-primary"></i>Câu chuyện công ty</h6>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold">Tiêu đề nhỏ</label>
                                    <input type="text" name="about_story_heading" class="form-control rounded-3" value="<?= esc(get_setting('about_story_heading', 'Hành Trình Phát Triển & Khẳng Định Uy Tín')) ?>">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label fw-semibold">Đoạn giới thiệu (lead)</label>
                                    <input type="text" name="about_story_intro" class="form-control rounded-3" value="<?= esc(get_setting('about_story_intro', '')) ?>">
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
                            <i class="bi bi-save me-2"></i>Lưu nội dung Trang Giới Thiệu
                        </button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade <?= ($activeTab ?? 'home') === 'timeline' ? 'show active' : '' ?>" id="tab-timeline" role="tabpanel">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 fw-bold">Quản lý timeline lịch sử thành lập</h6>
                    <a href="<?= base_url('admin/milestones/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Thêm Mốc Lịch Sử
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:80px;" class="ps-3">Mã</th>
                                <th style="width:90px;">Năm</th>
                                <th>Tiêu đề</th>
                                <th style="width:90px;">Ảnh</th>
                                <th style="width:90px;" class="text-center">Thứ tự</th>
                                <th class="text-end pe-3" style="width:220px;">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($milestones)): ?>
                                <?php foreach ($milestones as $m): ?>
                                    <tr>
                                        <td class="ps-3">#<?= esc($m['id']) ?></td>
                                        <td><span class="badge bg-primary-subtle text-primary fw-bold"><?= esc($m['year']) ?></span></td>
                                        <td><?= esc($m['title']) ?></td>
                                        <td>
                                            <?php if (!empty($m['image'])): ?>
                                                <img src="<?= base_url('uploads/milestones/' . $m['image']) ?>" alt="<?= esc($m['title']) ?>" style="width:52px;height:38px;object-fit:cover;border-radius:8px;">
                                            <?php else: ?>
                                                <span class="text-muted">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center"><?= esc($m['sort_order']) ?></td>
                                        <td class="text-end pe-3">
                                            <a href="<?= base_url('admin/milestones/edit/' . $m['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">
                                                <i class="bi bi-pencil"></i> Sửa
                                            </a>
                                            <a href="<?= base_url('admin/milestones/delete/' . $m['id']) ?>" onclick="return confirm('Bạn có chắc muốn xóa mốc lịch sử này?')" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                                                <i class="bi bi-trash"></i> Xóa
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">Chưa có mốc lịch sử nào. Bấm "Thêm Mốc Lịch Sử" để tạo mới.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = document.querySelectorAll('#pageContentTabs .nav-link');
    tabButtons.forEach((button) => {
        button.addEventListener('shown.bs.tab', function (event) {
            const paneId = event.target.getAttribute('data-bs-target');
            const tabMap = {
                '#tab-home': 'home',
                '#tab-about': 'about',
                '#tab-timeline': 'timeline'
            };
            const tab = tabMap[paneId] || 'home';
            const url = new URL(window.location.href);
            url.searchParams.set('tab', tab);
            history.replaceState({}, '', url.toString());
        });
    });
});
</script>

<?= $this->endSection() ?>
