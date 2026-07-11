<?php

namespace App\Controllers;

use App\Models\MilestoneModel;

class About extends BaseController
{
    public function index(): string
    {
        $milestoneModel = new MilestoneModel();
        $milestones = $milestoneModel
            ->orderBy('sort_order', 'ASC')
            ->orderBy('year', 'ASC')
            ->findAll();

        $data = [
            'seo_title'       => 'Giới thiệu về Công ty TNHH MTV Việt Lệ Thanh',
            'seo_description' => 'Tìm hiểu về lịch sử hình thành, năng lực thi công xây dựng, dịch vụ phòng nghỉ và trang trại chăn nuôi của Việt Lệ Thanh tại Đức Cơ Gia Lai.',
            'seo_keywords'    => 'gioi thieu viet le thanh, viet le thanh gia lai',
            'milestones'      => $milestones,
        ];

        return view('about/index', $data);
    }
}
