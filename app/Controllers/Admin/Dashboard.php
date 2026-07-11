<?php

namespace App\Controllers\Admin;

use App\Models\ContactMessageModel;
use App\Models\NewsModel;
use App\Models\ServiceModel;

class Dashboard extends AdminBaseController
{
    public function index(): string
    {
        $contactModel = new ContactMessageModel();
        $newsModel = new NewsModel();
        $serviceModel = new ServiceModel();

        $data = [
            'title'              => 'Tổng quan hệ thống',
            'total_contacts'     => $contactModel->countAll(),
            'unread_contacts'    => $contactModel->where('is_read', 0)->countAllResults(),
            'total_news'         => $newsModel->countAll(),
            'total_services'     => $serviceModel->countAll(),
            'recent_contacts'    => $contactModel->orderBy('created_at', 'DESC')->limit(5)->findAll()
        ];

        return view('admin/dashboard/index', $data);
    }
}
