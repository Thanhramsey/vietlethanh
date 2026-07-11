<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="card border-0 shadow-sm rounded-4 bg-white">
    <div class="card-body p-4 p-md-5">
        <ul class="nav nav-pills mb-4 border-bottom pb-3" id="settingsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'general') === 'general' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab"><i class="bi bi-info-circle me-1"></i> Thông Tin Chung</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'general') === 'seo' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab"><i class="bi bi-search me-1"></i> Cấu Hình SEO</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'general') === 'map' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#map" type="button" role="tab"><i class="bi bi-map me-1"></i> Bản Đồ & Liên Kết</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'general') === 'page-content' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#page-content" type="button" role="tab"><i class="bi bi-layout-text-window-reverse me-1"></i> Nội Dung Trang</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link rounded-pill px-4 <?= ($activeTab ?? 'general') === 'partners' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#partners" type="button" role="tab"><i class="bi bi-people me-1"></i> Đối Tác</button>
            </li>
        </ul>

        <div class="tab-content" id="settingsTabContent">
            <div class="tab-pane fade <?= ($activeTab ?? 'general') === 'general' ? 'show active' : '' ?>" id="general" role="tabpanel">
                <form action="<?= base_url('admin/settings/save') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="settings_tab" value="general">
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
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Logo đơn vị</label>
                            <?php if (get_setting('site_logo')): ?>
                                <div class="mb-2 p-2 border rounded bg-light d-inline-block">
                                    <img src="<?= base_url('uploads/settings/' . get_setting('site_logo')) ?>" alt="Site Logo" style="max-height: 50px;">
                                </div>
                            <?php endif; ?>
                            <input type="file" class="form-control" name="site_logo" accept="image/*">
                        </div>
                    </div>
                    <div class="mt-4 border-top pt-3 text-end">
                        <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save me-1"></i> Lưu Thông Tin Chung</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade <?= ($activeTab ?? 'general') === 'seo' ? 'show active' : '' ?>" id="seo" role="tabpanel">
                <form action="<?= base_url('admin/settings/save') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="settings_tab" value="seo">
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
                        </div>
                    </div>
                    <div class="mt-4 border-top pt-3 text-end">
                        <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save me-1"></i> Lưu SEO</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade <?= ($activeTab ?? 'general') === 'map' ? 'show active' : '' ?>" id="map" role="tabpanel">
                <form action="<?= base_url('admin/settings/save') ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="settings_tab" value="map">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label fw-semibold">Link nhúng bản đồ Google Map (iframe src URL)</label>
                            <textarea class="form-control" name="map_embed" rows="3" required><?= esc(get_setting('map_embed')) ?></textarea>
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
                    <div class="mt-4 border-top pt-3 text-end">
                        <button type="submit" class="btn btn-primary btn-custom px-5 rounded-pill"><i class="bi bi-save me-1"></i> Lưu Bản Đồ & Liên Kết</button>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade <?= ($activeTab ?? 'general') === 'page-content' ? 'show active' : '' ?>" id="page-content" role="tabpanel">
                <ul class="nav nav-pills gap-2 mb-4" id="contentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill <?= ($contentTab ?? 'home') === 'home' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#content-home" type="button" role="tab">Trang Chủ</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill <?= ($contentTab ?? 'home') === 'about' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#content-about" type="button" role="tab">Trang Giới Thiệu</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill <?= ($contentTab ?? 'home') === 'timeline' ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#content-timeline" type="button" role="tab">Lịch Sử Thành Lập</button>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade <?= ($contentTab ?? 'home') === 'home' ? 'show active' : '' ?>" id="content-home" role="tabpanel">
                        <form id="home-content-form" action="<?= base_url('admin/about/save') ?>" method="post">
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
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 1 - Giá trị</label><input type="text" name="home_stats_item1_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item1_value', '9+')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 1 - Tiêu đề</label><input type="text" name="home_stats_item1_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item1_title', 'Năm Hoạt Động')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 2 - Giá trị</label><input type="text" name="home_stats_item2_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item2_value', '100%')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 2 - Tiêu đề</label><input type="text" name="home_stats_item2_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item2_title', 'Khách Hàng Hài Lòng')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 3 - Giá trị</label><input type="text" name="home_stats_item3_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item3_value', '50+')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 3 - Tiêu đề</label><input type="text" name="home_stats_item3_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item3_title', 'Công Trình Đã Thi Công')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 4 - Giá trị</label><input type="text" name="home_stats_item4_value" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item4_value', '24/7')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Số liệu 4 - Tiêu đề</label><input type="text" name="home_stats_item4_title" class="form-control rounded-3" value="<?= esc(get_setting('home_stats_item4_title', 'Hỗ Trợ Phục Vụ')) ?>"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-layers me-2 text-primary"></i>Tiêu đề các section dữ liệu</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6"><label class="form-label fw-semibold">Services - Nhãn section</label><input type="text" name="home_services_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_services_eyebrow', 'Lĩnh Vực Hoạt Động')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">Services - Tiêu đề section</label><input type="text" name="home_services_title" class="form-control rounded-3" value="<?= esc(get_setting('home_services_title', 'Dịch Vụ Của Chúng Tôi')) ?>"></div>
                                        <div class="col-12"><label class="form-label fw-semibold">Services - Text khi rỗng</label><input type="text" name="home_services_empty_text" class="form-control rounded-3" value="<?= esc(get_setting('home_services_empty_text', 'Đang cập nhật danh sách dịch vụ...')) ?>"></div>

                                        <div class="col-md-6"><label class="form-label fw-semibold">Gallery - Nhãn section</label><input type="text" name="home_gallery_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_eyebrow', 'Hình Ảnh Thực Tế')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">Gallery - Tiêu đề section</label><input type="text" name="home_gallery_title" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_title', 'Thư Viện Ảnh Hoạt Động')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">Gallery - Nút xem tất cả</label><input type="text" name="home_gallery_view_all_text" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_view_all_text', 'Xem Tất Cả Hình Ảnh')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">Gallery - Text khi rỗng</label><input type="text" name="home_gallery_empty_text" class="form-control rounded-3" value="<?= esc(get_setting('home_gallery_empty_text', 'Đang cập nhật thư viện ảnh...')) ?>"></div>

                                        <div class="col-md-6"><label class="form-label fw-semibold">News - Nhãn section</label><input type="text" name="home_news_eyebrow" class="form-control rounded-3" value="<?= esc(get_setting('home_news_eyebrow', 'Tin Tức Mới Nhất')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">News - Tiêu đề section</label><input type="text" name="home_news_title" class="form-control rounded-3" value="<?= esc(get_setting('home_news_title', 'Bản Tin Việt Lệ Thanh')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">News - Text khi rỗng</label><input type="text" name="home_news_empty_text" class="form-control rounded-3" value="<?= esc(get_setting('home_news_empty_text', 'Đang cập nhật tin tức mới...')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">News - Nút đọc tiếp</label><input type="text" name="home_news_read_more_text" class="form-control rounded-3" value="<?= esc(get_setting('home_news_read_more_text', 'Đọc Tiếp')) ?>"></div>
                                        <div class="col-12"><label class="form-label fw-semibold">Partners fallback - tiền tố tên</label><input type="text" name="home_partners_empty_prefix" class="form-control rounded-3" value="<?= esc(get_setting('home_partners_empty_prefix', 'Đối tác')) ?>"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-sort-numeric-down me-2 text-primary"></i>Sắp xếp thứ tự section Trang Chủ</h6>
                                </div>
                                <div class="card-body p-4">
                                    <p class="text-muted small mb-3">Nhập số nhỏ hơn để section hiển thị trước. Ví dụ: 10, 20, 30...</p>
                                    <div class="row g-3">
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Giới thiệu nhanh</label>
                                            <input type="number" name="home_section_order_intro" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_intro', '10')) ?>">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Tại sao chọn chúng tôi</label>
                                            <input type="number" name="home_section_order_why" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_why', '20')) ?>">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Dịch vụ</label>
                                            <input type="number" name="home_section_order_services" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_services', '30')) ?>">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Thư viện ảnh</label>
                                            <input type="number" name="home_section_order_gallery" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_gallery', '40')) ?>">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Tin tức</label>
                                            <input type="number" name="home_section_order_news" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_news', '50')) ?>">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Đối tác</label>
                                            <input type="number" name="home_section_order_partners" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_partners', '60')) ?>">
                                        </div>
                                        <div class="col-md-6 col-lg-4">
                                            <label class="form-label fw-semibold">Giấy chứng nhận</label>
                                            <input type="number" name="home_section_order_certificates" class="form-control rounded-3" value="<?= esc(get_setting('home_section_order_certificates', '70')) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end"><button type="submit" class="btn btn-primary btn-custom rounded-pill px-5"><i class="bi bi-save me-2"></i>Lưu nội dung Trang Chủ</button></div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?= ($contentTab ?? 'home') === 'about' ? 'show active' : '' ?>" id="content-about" role="tabpanel">
                        <form id="about-content-form" action="<?= base_url('admin/about/save') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <input type="hidden" name="active_tab" value="about">

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-primary text-white rounded-top-4 px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-layout-text-window me-2"></i>Phần Banner đầu trang</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-4"><label class="form-label fw-semibold">Nhãn hero (nhỏ phía trên)</label><input type="text" name="about_hero_label" class="form-control rounded-3" value="<?= esc(get_setting('about_hero_label', 'Về Chúng Tôi')) ?>"></div>
                                        <div class="col-md-8"><label class="form-label fw-semibold">Tiêu đề hero</label><input type="text" name="about_hero_title" class="form-control rounded-3" value="<?= esc(get_setting('about_hero_title', 'Công ty TNHH MTV Việt Lệ Thanh')) ?>"></div>
                                        <div class="col-12"><label class="form-label fw-semibold">Mô tả ngắn dưới tiêu đề</label><input type="text" name="about_hero_sub" class="form-control rounded-3" value="<?= esc(get_setting('about_hero_sub', 'Uy tín — Chất lượng — Tận tâm phục vụ từ năm 2017 tại Gia Lai')) ?>"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-bar-chart-fill me-2 text-primary"></i>Số liệu nổi bật</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-sm-3"><label class="form-label fw-semibold">Năm thành lập</label><input type="text" name="about_stat_year" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_year', '2017')) ?>"></div>
                                        <div class="col-sm-3"><label class="form-label fw-semibold">Năm kinh nghiệm</label><input type="text" name="about_stat_exp" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_exp', '7+')) ?>"></div>
                                        <div class="col-sm-3"><label class="form-label fw-semibold">Lĩnh vực hoạt động</label><input type="text" name="about_stat_sectors" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_sectors', '3')) ?>"></div>
                                        <div class="col-sm-3"><label class="form-label fw-semibold">Cam kết chất lượng</label><input type="text" name="about_stat_quality" class="form-control rounded-3" value="<?= esc(get_setting('about_stat_quality', '100%')) ?>"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-building me-2 text-primary"></i>Thông tin doanh nghiệp</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-6"><label class="form-label fw-semibold">Tên đầy đủ (Tiếng Việt)</label><input type="text" name="about_company_name_vi" class="form-control rounded-3" value="<?= esc(get_setting('about_company_name_vi', 'CÔNG TY TNHH MỘT THÀNH VIÊN VIỆT LỆ THANH')) ?>"></div>
                                        <div class="col-md-6"><label class="form-label fw-semibold">Tên quốc tế</label><input type="text" name="about_company_name_en" class="form-control rounded-3" value="<?= esc(get_setting('about_company_name_en', 'VIET LE THANH ONE MEMBER COMPANY LIMITED')) ?>"></div>
                                        <div class="col-md-3"><label class="form-label fw-semibold">Mã số thuế</label><input type="text" name="about_tax_code" class="form-control rounded-3" value="<?= esc(get_setting('about_tax_code', '5901061783')) ?>"></div>
                                        <div class="col-md-5"><label class="form-label fw-semibold">Đại diện pháp luật</label><input type="text" name="about_legal_rep" class="form-control rounded-3" value="<?= esc(get_setting('about_legal_rep', 'NGUYỄN HỮU VIỆT')) ?>"></div>
                                        <div class="col-md-4"><label class="form-label fw-semibold">Ngày cấp phép</label><input type="text" name="about_license_date" class="form-control rounded-3" value="<?= esc(get_setting('about_license_date', '30/05/2017')) ?>"></div>
                                        <div class="col-12"><label class="form-label fw-semibold">Địa chỉ trụ sở</label><input type="text" name="about_address" class="form-control rounded-3" value="<?= esc(get_setting('about_address', '77 Quang Trung, khu phố II, Thị trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai')) ?>"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-book me-2 text-primary"></i>Câu chuyện công ty</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-4"><label class="form-label fw-semibold">Tiêu đề nhỏ</label><input type="text" name="about_story_heading" class="form-control rounded-3" value="<?= esc(get_setting('about_story_heading', 'Hành Trình Phát Triển & Khẳng Định Uy Tín')) ?>"></div>
                                        <div class="col-md-8"><label class="form-label fw-semibold">Đoạn giới thiệu (lead)</label><input type="text" name="about_story_intro" class="form-control rounded-3" value="<?= esc(get_setting('about_story_intro', '')) ?>"></div>
                                        <div class="col-12"><label class="form-label fw-semibold">Nội dung đoạn 1</label><textarea name="about_story_body1" class="form-control rounded-3" rows="3"><?= esc(get_setting('about_story_body1', '')) ?></textarea></div>
                                        <div class="col-12"><label class="form-label fw-semibold">Nội dung đoạn 2</label><textarea name="about_story_body2" class="form-control rounded-3" rows="3"><?= esc(get_setting('about_story_body2', '')) ?></textarea></div>
                                    </div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="card-header bg-white border-bottom px-4 py-3">
                                    <h6 class="mb-0 fw-bold"><i class="bi bi-stars me-2 text-primary"></i>Tầm nhìn — Sứ mệnh — Giá trị cốt lõi</h6>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row g-3">
                                        <div class="col-md-4"><label class="form-label fw-semibold">Tầm nhìn</label><textarea name="about_vision" class="form-control rounded-3" rows="4"><?= esc(get_setting('about_vision', '')) ?></textarea></div>
                                        <div class="col-md-4"><label class="form-label fw-semibold">Sứ mệnh</label><textarea name="about_mission" class="form-control rounded-3" rows="4"><?= esc(get_setting('about_mission', '')) ?></textarea></div>
                                        <div class="col-md-4"><label class="form-label fw-semibold">Giá trị cốt lõi</label><textarea name="about_values" class="form-control rounded-3" rows="4"><?= esc(get_setting('about_values', '')) ?></textarea></div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end mt-3"><button type="submit" class="btn btn-primary btn-custom rounded-pill px-5"><i class="bi bi-save me-2"></i>Lưu nội dung Giới Thiệu</button></div>
                        </form>
                    </div>

                    <div class="tab-pane fade <?= ($contentTab ?? 'home') === 'timeline' ? 'show active' : '' ?>" id="content-timeline" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0 fw-bold">Quản lý timeline lịch sử thành lập</h6>
                            <a href="<?= base_url('admin/milestones/create') ?>" class="btn btn-primary btn-custom rounded-pill btn-sm"><i class="bi bi-plus-circle me-1"></i> Thêm Mốc Lịch Sử</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light"><tr><th>Mã</th><th>Năm</th><th>Tiêu đề</th><th>Ảnh</th><th class="text-center">Thứ tự</th><th class="text-end">Hành động</th></tr></thead>
                                <tbody>
                                    <?php if (!empty($milestones)): ?>
                                        <?php foreach ($milestones as $m): ?>
                                            <tr>
                                                <td>#<?= esc($m['id']) ?></td>
                                                <td><span class="badge bg-primary-subtle text-primary fw-bold"><?= esc($m['year']) ?></span></td>
                                                <td><?= esc($m['title']) ?></td>
                                                <td><?php if (!empty($m['image'])): ?><img src="<?= base_url('uploads/milestones/' . $m['image']) ?>" style="width:52px;height:38px;object-fit:cover;border-radius:8px;"><?php else: ?><span class="text-muted">-</span><?php endif; ?></td>
                                                <td class="text-center"><?= esc($m['sort_order']) ?></td>
                                                <td class="text-end"><a href="<?= base_url('admin/milestones/edit/' . $m['id']) ?>" class="btn btn-outline-primary btn-sm rounded-pill px-3 me-1">Sửa</a><a href="<?= base_url('admin/milestones/delete/' . $m['id']) ?>" onclick="return confirm('Bạn có chắc muốn xóa mốc lịch sử này?')" class="btn btn-outline-danger btn-sm rounded-pill px-3">Xóa</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="6" class="text-center py-4 text-muted">Chưa có mốc lịch sử nào.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade <?= ($activeTab ?? 'general') === 'partners' ? 'show active' : '' ?>" id="partners" role="tabpanel">
                <div class="row g-4">
                    <div class="col-lg-5">
                        <div class="card border-0 shadow-sm rounded-4">
                            <div class="card-header bg-white border-bottom px-4 py-3"><h6 class="mb-0 fw-bold">Thêm đối tác mới</h6></div>
                            <div class="card-body p-4">
                                <form action="<?= base_url('admin/settings/partners/store') ?>" method="post" enctype="multipart/form-data">
                                    <?= csrf_field() ?>
                                    <div class="mb-3"><label class="form-label fw-semibold">Tên đối tác</label><input type="text" name="name" class="form-control" required></div>
                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Logo đối tác</label>
                                        <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp" required>
                                        <small class="text-muted">Chỉ nhận JPG/PNG/WEBP, tối đa 2MB. Hệ thống tự resize nhẹ để logo hiển thị đồng đều trên slider.</small>
                                    </div>
                                    <div class="mb-3"><label class="form-label fw-semibold">Link website (tuỳ chọn)</label><input type="text" name="link" class="form-control" placeholder="https://..."></div>
                                    <div class="mb-3"><label class="form-label fw-semibold">Thứ tự hiển thị</label><input type="number" name="sort_order" class="form-control" value="0" min="0"></div>
                                    <button type="submit" class="btn btn-primary btn-custom rounded-pill px-4"><i class="bi bi-save me-1"></i>Lưu đối tác</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light"><tr><th style="width:72px">Logo</th><th>Tên / Link</th><th style="width:90px">Thứ tự</th><th style="width:90px">Trạng thái</th><th class="text-end">Hành động</th></tr></thead>
                                <tbody>
                                    <?php if (!empty($partners)): ?>
                                        <?php foreach ($partners as $partner): ?>
                                            <tr>
                                                <td>
                                                    <?php if (!empty($partner['logo']) && file_exists(FCPATH . 'uploads/partners/' . $partner['logo'])): ?>
                                                        <img src="<?= base_url('uploads/partners/' . $partner['logo']) ?>" alt="<?= esc($partner['name']) ?>" style="width:56px;height:40px;object-fit:contain;border:1px solid #e8eef9;border-radius:8px;padding:4px;background:#fff;">
                                                    <?php else: ?>
                                                        <span class="text-muted">-</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <form action="<?= base_url('admin/settings/partners/update/' . $partner['id']) ?>" method="post" enctype="multipart/form-data" class="row g-2">
                                                        <?= csrf_field() ?>
                                                        <div class="col-12">
                                                            <input type="text" name="name" class="form-control form-control-sm" value="<?= esc($partner['name']) ?>" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="text" name="link" class="form-control form-control-sm" value="<?= esc($partner['link']) ?>" placeholder="https://...">
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="file" name="logo" class="form-control form-control-sm" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                                                            <small class="text-muted">Để trống nếu không đổi logo.</small>
                                                        </div>
                                                        <div class="col-12">
                                                            <input type="number" name="sort_order" class="form-control form-control-sm" value="<?= esc($partner['sort_order']) ?>" min="0" placeholder="Thứ tự hiển thị">
                                                        </div>
                                                        <input type="hidden" name="status" value="<?= (int) $partner['status'] ?>">
                                                        <div class="col-12 text-end">
                                                            <button type="submit" class="btn btn-outline-primary btn-sm rounded-pill px-3">Lưu sửa</button>
                                                        </div>
                                                    </form>
                                                </td>

                                                <td><?= esc($partner['sort_order']) ?></td>

                                                <td>
                                                    <div class="d-flex flex-column gap-2">
                                                        <span class="badge <?= (int) $partner['status'] === 1 ? 'bg-success-subtle text-success' : 'bg-secondary-subtle text-secondary' ?>">
                                                            <?= (int) $partner['status'] === 1 ? 'Đang bật' : 'Đang tắt' ?>
                                                        </span>
                                                        <form action="<?= base_url('admin/settings/partners/toggle/' . $partner['id']) ?>" method="post">
                                                            <?= csrf_field() ?>
                                                            <button type="submit" class="btn btn-sm <?= (int) $partner['status'] === 1 ? 'btn-outline-warning' : 'btn-outline-success' ?> rounded-pill px-2 w-100">
                                                                <?= (int) $partner['status'] === 1 ? 'Tắt tạm' : 'Bật lại' ?>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>

                                                <td class="text-end">
                                                    <a href="<?= base_url('admin/settings/partners/delete/' . $partner['id']) ?>" class="btn btn-outline-danger btn-sm rounded-pill px-3" onclick="return confirm('Bạn có chắc muốn xóa đối tác này?')">Xóa</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr><td colspan="5" class="text-center text-muted py-4">Chưa có đối tác nào.</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const existingEnSettings = {
        <?php
        $enKeys = [
            'home_hero_label', 'home_hero_title', 'home_hero_sub', 'home_cta_text', 'home_cta_link',
            'home_hero_contact_text', 'home_hero_contact_link',
            'home_intro_title', 'home_intro_text', 'home_intro_eyebrow', 'home_intro_heading', 'home_intro_body1', 'home_intro_body2',
            'home_intro_card_title', 'home_intro_card_address', 'home_intro_feature1_title', 'home_intro_feature1_sub',
            'home_intro_feature2_title', 'home_intro_feature2_sub', 'home_intro_button_text', 'home_intro_button_link',
            'home_why_eyebrow', 'home_why_title', 'home_why_card1_title', 'home_why_card1_desc',
            'home_why_card2_title', 'home_why_card2_desc', 'home_why_card3_title', 'home_why_card3_desc',
            'home_stats_item1_title', 'home_stats_item2_title', 'home_stats_item3_title', 'home_stats_item4_title',
            'home_services_eyebrow', 'home_services_title', 'home_services_empty_text',
            'home_gallery_eyebrow', 'home_gallery_title', 'home_gallery_view_all_text', 'home_gallery_empty_text',
            'home_news_eyebrow', 'home_news_title', 'home_news_empty_text', 'home_news_read_more_text',
            'home_partners_empty_prefix',
            'about_hero_label', 'about_hero_title', 'about_hero_sub',
            'about_company_name_vi', 'about_company_name_en', 'about_tax_code', 'about_legal_rep', 'about_license_date', 'about_address',
            'about_story_heading', 'about_story_intro', 'about_story_body1', 'about_story_body2',
            'about_vision', 'about_mission', 'about_values',
        ];
        foreach ($enKeys as $idx => $baseKey):
            $full = $baseKey . '_en';
            ?><?= $idx > 0 ? ',' : '' ?>"<?= esc($full) ?>": <?= json_encode((string) get_setting_raw($full, ''), JSON_UNESCAPED_UNICODE) ?><?php endforeach; ?>
    };

    function buildEnglishFields(formId, keyPrefix) {
        const form = document.getElementById(formId);
        if (!form) return;

        const sourceFields = Array.from(form.querySelectorAll('input[name^="' + keyPrefix + '"], textarea[name^="' + keyPrefix + '"]'))
            .filter((field) => {
                const name = field.getAttribute('name') || '';
                if (!name || name.endsWith('_en')) return false;
                if (name.includes('section_order')) return false;
                if (field.type === 'hidden' || field.type === 'number' || field.type === 'date') return false;
                return true;
            });

        if (!sourceFields.length) return;

        const collapseId = formId + '-en-collapse';
        const card = document.createElement('div');
        card.className = 'card border-0 shadow-sm rounded-4 mb-4';
        card.innerHTML = `
            <div class="card-header bg-white border-bottom px-4 py-3">
                <button type="button" class="btn btn-link text-decoration-none p-0 fw-bold" data-bs-toggle="collapse" data-bs-target="#${collapseId}" aria-expanded="false" aria-controls="${collapseId}">
                    <i class="bi bi-translate me-2 text-primary"></i>Nội dung tiếng Anh (EN)
                    <i class="bi bi-chevron-down ms-2 text-muted"></i>
                </button>
            </div>
            <div id="${collapseId}" class="collapse">
                <div class="card-body p-4">
                    <p class="text-muted small mb-3">Để trống sẽ tự fallback nội dung tiếng Việt.</p>
                    <div class="row g-3" data-en-fields></div>
                </div>
            </div>
        `;

        const grid = card.querySelector('[data-en-fields]');
        sourceFields.forEach((field) => {
            const baseName = field.getAttribute('name');
            const enName = baseName + '_en';
            const labelEl = field.closest('.col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-12')?.querySelector('label');
            const baseLabel = labelEl ? labelEl.textContent.replace(/\*/g, '').trim() : baseName;
            const col = document.createElement('div');
            col.className = 'col-md-6';

            if (field.tagName.toLowerCase() === 'textarea') {
                const rows = field.getAttribute('rows') || '3';
                col.innerHTML = `
                    <label class="form-label fw-semibold">${baseLabel} (EN)</label>
                    <textarea name="${enName}" class="form-control rounded-3" rows="${rows}">${existingEnSettings[enName] || ''}</textarea>
                `;
            } else {
                col.innerHTML = `
                    <label class="form-label fw-semibold">${baseLabel} (EN)</label>
                    <input type="text" name="${enName}" class="form-control rounded-3" value="${(existingEnSettings[enName] || '').replace(/"/g, '&quot;')}">
                `;
            }
            grid.appendChild(col);
        });

        const submitWrap = form.querySelector('.text-end');
        if (submitWrap) {
            form.insertBefore(card, submitWrap);
        } else {
            form.appendChild(card);
        }
    }

    buildEnglishFields('home-content-form', 'home_');
    buildEnglishFields('about-content-form', 'about_');

    const settingsButtons = document.querySelectorAll('#settingsTab .nav-link');
    settingsButtons.forEach((button) => {
        button.addEventListener('shown.bs.tab', function (event) {
            const map = {
                '#general': 'general',
                '#seo': 'seo',
                '#map': 'map',
                '#page-content': 'page-content',
                '#partners': 'partners'
            };
            const tab = map[event.target.getAttribute('data-bs-target')] || 'general';
            const url = new URL(window.location.href);
            url.searchParams.set('tab', tab);
            if (tab !== 'page-content') {
                url.searchParams.delete('contentTab');
            }
            history.replaceState({}, '', url.toString());
        });
    });

    const contentButtons = document.querySelectorAll('#contentTabs .nav-link');
    contentButtons.forEach((button) => {
        button.addEventListener('shown.bs.tab', function (event) {
            const map = {
                '#content-home': 'home',
                '#content-about': 'about',
                '#content-timeline': 'timeline'
            };
            const contentTab = map[event.target.getAttribute('data-bs-target')] || 'home';
            const url = new URL(window.location.href);
            url.searchParams.set('tab', 'page-content');
            url.searchParams.set('contentTab', contentTab);
            history.replaceState({}, '', url.toString());
        });
    });
});
</script>

<?= $this->endSection() ?>
