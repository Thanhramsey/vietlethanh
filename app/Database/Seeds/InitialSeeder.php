<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        // 1. Seed Users
        $adminPassword = password_hash('admin123', PASSWORD_DEFAULT);
        $userData = [
            'username'   => 'admin',
            'email'      => 'admin@vietlethanh.com',
            'password'   => $adminPassword,
            'fullname'   => 'Quản trị viên',
            'role'       => 'superadmin',
            'status'     => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $this->db->table('users')->insert($userData);

        // 2. Seed Settings
        $settings = [
            ['key' => 'company_name', 'value' => 'CÔNG TY TNHH MỘT THÀNH VIÊN VIỆT LỆ THANH'],
            ['key' => 'company_name_en', 'value' => 'VIET LE THANH ONE MEMBER COMPANY LIMITED'],
            ['key' => 'address', 'value' => '77 Quang Trung, khu phố II, Thị trấn Chư Ty, Huyện Đức Cơ, Tỉnh Gia Lai, Việt Nam'],
            ['key' => 'phone', 'value' => '0914.168.379'], // A realistic representative phone number or mockup
            ['key' => 'email', 'value' => 'info@vietlethanh.com'],
            ['key' => 'map_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15545.98188562417!2d107.5851443!3d13.9782522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316cf9b71f98d7af%3A0x8cf218f3a3d5e27a!2s77%20Quang%20Trung%2C%20Ch%C6%B0%20Ty%2C%20%C4%90%E1%BB%A9c%20C%C6%A1%2C%20Gia%20Lai!5e0!3m2!1svi!2s!4v1720668000000!5m2!1svi!2s'],
            ['key' => 'seo_title', 'value' => 'Việt Lệ Thanh - Dịch vụ lưu trú ngắn ngày & Xây dựng công trình tại Gia Lai'],
            ['key' => 'seo_description', 'value' => 'Công ty TNHH MTV Việt Lệ Thanh cung cấp các dịch vụ khách sạn nghỉ dưỡng uy tín, xây dựng công trình giao thông đường bộ và chăn nuôi nông nghiệp chất lượng tại Đức Cơ, Gia Lai.'],
            ['key' => 'seo_keywords', 'value' => 'viet le thanh, viet le thanh gia lai, khach san duc co, nha nghi chu ty, xay dung giao thong duc co'],
            ['key' => 'facebook', 'value' => 'https://facebook.com/vietlethanh.gialai'],
            ['key' => 'zalo', 'value' => '0914168379'],
            ['key' => 'working_hours', 'value' => 'Mở cửa 24/7 (Đối với lưu trú)'],
            ['key' => 'theme_border_radius_btn', 'value' => '8px'],
            ['key' => 'theme_border_radius_block', 'value' => '12px'],
        ];

        foreach ($settings as $setting) {
            $setting['created_at'] = $now;
            $setting['updated_at'] = $now;
            $this->db->table('settings')->insert($setting);
        }

        // 3. Seed Services
        $services = [
            [
                'title'           => 'Dịch vụ lưu trú ngắn ngày (Khách sạn / Nhà nghỉ)',
                'slug'            => 'dich-vu-luu-tru-ngan-ngay',
                'summary'         => 'Cung cấp phòng nghỉ tiện nghi, không gian thoáng mát, yên tĩnh và sạch sẽ tại thị trấn Chư Ty, Đức Cơ. Đảm bảo an toàn, dịch vụ chu đáo phục vụ 24/7.',
                'content'         => '<p>Chào mừng quý khách đến với dịch vụ lưu trú ngắn ngày của <strong>Việt Lệ Thanh</strong>. Chúng tôi tự hào mang lại không gian lưu trú thoải mái và tiện nghi nhất cho hành khách khi ghé thăm hoặc đi công tác tại huyện Đức Cơ, tỉnh Gia Lai.</p><p>Hệ thống phòng nghỉ đa dạng bao gồm phòng đơn, phòng đôi được trang bị đầy đủ các trang thiết bị hiện đại như điều hòa, tivi màn hình phẳng, wifi tốc độ cao, bình nóng lạnh và dịch vụ giặt là tiện ích. Đội ngũ nhân viên thân thiện, nhiệt tình sẽ luôn làm hài lòng quý khách.</p>',
                'image'           => 'accommodation.webp',
                'icon'            => 'bi-building-fill-check',
                'seo_title'       => 'Dịch vụ Lưu trú Khách sạn Nhà nghỉ tại Đức Cơ, Gia Lai - Việt Lệ Thanh',
                'seo_description' => 'Tìm phòng nghỉ, khách sạn chất lượng tốt, giá rẻ tại thị trấn Chư Ty, huyện Đức Cơ, Gia Lai? Việt Lệ Thanh cung cấp hệ thống phòng lưu trú tiện nghi, sạch sẽ và an toàn.',
                'seo_keywords'    => 'nha nghi duc co, khach san duc co, luu tru duc co, viet le thanh hotel',
                'status'          => 1,
            ],
            [
                'title'           => 'Xây dựng công trình giao thông & dân dụng',
                'slug'            => 'xay-dung-cong-trinh-giao-thong-dan-dung',
                'summary'         => 'Thi công xây dựng công trình đường bộ, hạ tầng kỹ thuật đô thị và nhà ở. Sử dụng công nghệ hiện đại, đội ngũ kỹ sư lành nghề đảm bảo tiến độ và chất lượng.',
                'content'         => '<p>Công ty TNHH Một Thành Viên Việt Lệ Thanh nhận thi công xây dựng các công trình giao thông đường bộ, cầu cống, nâng cấp và sửa chữa hệ thống hạ tầng đô thị. Bên cạnh đó, chúng tôi cũng đảm nhận thiết kế thi công các công trình dân dụng như nhà ở và công trình công cộng.</p><p>Với năng lực thiết bị máy móc hiện đại và đội ngũ cán bộ kỹ thuật giàu kinh nghiệm, chúng tôi luôn cam kết chất lượng công trình đạt chuẩn kỹ thuật cao, tiến độ thi công nhanh chóng và chi phí tối ưu nhất cho đối tác.</p>',
                'image'           => 'construction.webp',
                'icon'            => 'bi-cone-striped',
                'seo_title'       => 'Thi công xây dựng đường bộ dân dụng tại Gia Lai - Việt Lệ Thanh',
                'seo_description' => 'Nhà thầu thi công xây dựng công trình giao thông đường bộ và dân dụng uy tín tại Đức Cơ, tỉnh Gia Lai. Đảm bảo chất lượng công trình bền vững theo thời gian.',
                'seo_keywords'    => 'xay dung duong bo gia lai, nha thau xay dung duc co, thi cong duong bo',
                'status'          => 1,
            ],
            [
                'title'           => 'Chăn nuôi gia súc & phát triển nông nghiệp',
                'slug'            => 'chan-nuoi-gia-suc-phat-trien-nong-nghiep',
                'summary'         => 'Phát triển mô hình trang trại chăn nuôi bò, lợn, gia cầm đạt chuẩn VietGAP. Cung cấp nguồn sản phẩm sạch, an toàn vệ sinh thực phẩm cho thị trường.',
                'content'         => '<p>Tại vùng đất Tây Nguyên đầy nắng gió, Việt Lệ Thanh đầu tư xây dựng mô hình trang trại nông nghiệp tổng hợp, trong đó tập trung vào chăn nuôi gia súc (trâu, bò, lợn) và gia cầm. Trang trại được quy hoạch xa khu dân cư, áp dụng nghiêm ngặt các quy trình phòng dịch và chăn nuôi khép kín.</p><p>Chúng tôi hướng tới việc cung cấp nguồn thực phẩm thịt thương phẩm sạch, không chất cấm, đảm bảo chất lượng cao nhất phục vụ người tiêu dùng địa phương và các khu vực lân cận.</p>',
                'image'           => 'husbandry.webp',
                'icon'            => 'bi-egg-fried',
                'seo_title'       => 'Trang trại chăn nuôi gia súc sạch tại Đức Cơ Gia Lai - Việt Lệ Thanh',
                'seo_description' => 'Mô hình trang trại chăn nuôi gia súc bò heo và gia cầm sạch của công ty Việt Lệ Thanh tại Gia Lai. Ứng dụng quy trình kỹ thuật hiện đại, đảm bảo vệ sinh dịch tễ.',
                'seo_keywords'    => 'trang trai chan nuoi gia lai, nuoi bo thit duc co, nong nghiep sach gia lai',
                'status'          => 1,
            ],
        ];

        foreach ($services as $service) {
            $service['created_at'] = $now;
            $service['updated_at'] = $now;
            $this->db->table('services')->insert($service);
        }

        // 4. Seed Banners
        $banners = [
            [
                'title'         => 'KHÁCH SẠN & DỊCH VỤ VIỆT LỆ THANH',
                'subtitle'      => 'Không gian lưu trú lý tưởng, tiện nghi và ấm cúng tại Đức Cơ, Gia Lai',
                'desktop_image' => 'banner_hotel.webp',
                'mobile_image'  => 'banner_hotel_mb.webp',
                'button_text'   => 'Đặt phòng ngay',
                'button_link'   => '#contact',
                'sort_order'    => 1,
                'status'        => 1,
            ],
            [
                'title'         => 'ĐỐI TÁC THI CÔNG TIN CẬY',
                'subtitle'      => 'Đồng hành cùng các công trình hạ tầng giao thông và dân dụng bền vững',
                'desktop_image' => 'banner_construction.webp',
                'mobile_image'  => 'banner_construction_mb.webp',
                'button_text'   => 'Xem dự án',
                'button_link'   => '#services',
                'sort_order'    => 2,
                'status'        => 1,
            ],
        ];

        foreach ($banners as $banner) {
            $banner['created_at'] = $now;
            $banner['updated_at'] = $now;
            $this->db->table('banners')->insert($banner);
        }

        // 5. Seed News Categories & News
        $category = [
            'title'      => 'Tin Tức Hoạt Động',
            'slug'       => 'tin-tuc-hoat-dong',
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $this->db->table('news_categories')->insert($category);
        $categoryId = $this->db->insertID();

        $news = [
            [
                'category_id'     => $categoryId,
                'title'           => 'Việt Lệ Thanh nâng cấp cơ sở vật chất hệ thống phòng nghỉ năm 2026',
                'slug'            => 'viet-le-thanh-nang-cap-co-so-vat-chat-phong-nghi-2026',
                'summary'         => 'Nhằm nâng cao chất lượng dịch vụ lưu trú ngắn ngày, Công ty Việt Lệ Thanh đã tiến hành cải tạo nâng cấp toàn bộ hệ thống nội thất phòng nghỉ.',
                'content'         => '<p>Thực hiện cam kết mang lại trải nghiệm tốt nhất cho quý khách hàng, trong quý II năm 2026, Công ty TNHH MTV Việt Lệ Thanh đã hoàn thành đợt nâng cấp toàn diện cơ sở vật chất phòng nghỉ tại số 77 Quang Trung, thị trấn Chư Ty, huyện Đức Cơ.</p><p>Toàn bộ phòng nghỉ đều được thay mới chăn ga gối đệm cao cấp, lắp đặt thêm hệ thống đèn chiếu sáng dịu nhẹ và tivi thông minh kết nối internet tốc độ cao. Ngoài ra phòng tắm cũng được sửa sang sạch đẹp với vách kính hiện đại. Hãy ghé thăm chúng tôi để trải nghiệm không gian nghỉ ngơi ấm cúng như chính ngôi nhà của bạn!</p>',
                'image'           => 'news_upgrade.webp',
                'is_featured'     => 1,
                'status'          => 'published',
                'published_at'    => $now,
                'tags'            => 'khách sạn, phòng nghỉ, đức cơ, gia lai',
                'seo_title'       => 'Nâng cấp hệ thống phòng nghỉ Việt Lệ Thanh Đức Cơ Gia Lai',
                'seo_description' => 'Công ty Việt Lệ Thanh nâng cấp toàn bộ phòng nghỉ khách sạn năm 2026 tại thị trấn Chư Ty, mang lại trải nghiệm lưu trú ấm cúng, sang trọng, đầy đủ tiện nghi.',
                'seo_keywords'    => 'nha nghi duc co nang cap, gia phong viet le thanh, luu tru chat luong cao gia lai',
            ],
            [
                'category_id'     => $categoryId,
                'title'           => 'Hoàn thành bàn giao dự án nâng cấp tuyến đường giao thông liên xã',
                'slug'            => 'hoan-thanh-ban-giao-du-an-nang-cap-tuyen-duong-giao-thong-lien-xa',
                'summary'         => 'Đội ngũ kỹ sư và công nhân xây dựng của Việt Lệ Thanh đã bàn giao xuất sắc dự án làm đường đúng tiến độ cam kết.',
                'content'         => '<p>Công ty TNHH MTV Việt Lệ Thanh phối hợp cùng các đơn vị quản lý vừa qua đã nghiệm thu bàn giao dự án thảm nhựa và nâng cấp hạ tầng đường giao thông nội khu liên thôn xã tại địa bàn huyện Đức Cơ. Công trình hoàn thành trước thời hạn 15 ngày, đáp ứng các tiêu chuẩn khắt khe về kỹ thuật giao thông đường bộ.</p><p>Sự kiện này khẳng định năng lực thi công và chữ tín của Việt Lệ Thanh trên thị trường xây dựng tỉnh Gia Lai.</p>',
                'image'           => 'news_road.webp',
                'is_featured'     => 0,
                'status'          => 'published',
                'published_at'    => $now,
                'tags'            => 'xây dựng, làm đường, giao thông, đức cơ',
                'seo_title'       => 'Hoàn thành dự án xây dựng giao thông đường bộ Đức Cơ Gia Lai',
                'seo_description' => 'Việt Lệ Thanh hoàn thành thảm nhựa và nâng cấp hạ tầng giao thông đường bộ liên xã tại Đức Cơ, Gia Lai trước thời hạn, bảo đảm tiêu chuẩn an toàn kỹ thuật.',
                'seo_keywords'    => 'nha thau thi cong duong duc co, xay dung cau duong gia lai',
            ],
        ];

        foreach ($news as $item) {
            $item['created_at'] = $now;
            $item['updated_at'] = $now;
            $this->db->table('news')->insert($item);
        }

        // 6. Seed Partners
        $partners = [
            ['name' => 'Công ty Cao su Đức Cơ', 'logo' => 'partner_rubber.webp', 'link' => '#'],
            ['name' => 'Ủy ban Nhân dân Huyện Đức Cơ', 'logo' => 'partner_ubnd.webp', 'link' => '#'],
        ];

        foreach ($partners as $partner) {
            $partner['created_at'] = $now;
            $partner['updated_at'] = $now;
            $this->db->table('partners')->insert($partner);
        }
    }
}
