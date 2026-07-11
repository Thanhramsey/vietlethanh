<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Service extends BaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index(): string
    {
        $services = $this->serviceModel->where('status', 1)->findAll();

        $data = [
            'services'        => $services,
            'seo_title'       => 'Dịch vụ nổi bật của Việt Lệ Thanh',
            'seo_description' => 'Khám phá các lĩnh vực kinh doanh của Việt Lệ Thanh: Khách sạn phòng nghỉ, xây dựng cầu đường và trang trại chăn nuôi chất lượng cao.',
            'seo_keywords'    => 'khach san duc co, xay dung cau duong gia lai, dich vu viet le thanh',
        ];

        return view('service/index', $data);
    }

    public function show(string $slug): string
    {
        $service = $this->serviceModel->where('slug', $slug)
                                      ->where('status', 1)
                                      ->first();

        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Dịch vụ không tồn tại");
        }

        $data = [
            'service'         => $service,
            'seo_title'       => $service['seo_title'] ?? $service['title'],
            'seo_description' => $service['seo_description'] ?? $service['summary'],
            'seo_keywords'    => $service['seo_keywords'] ?? $service['title'],
        ];

        return view('service/show', $data);
    }
}
