<?php

namespace App\Controllers;

use App\Models\BannerModel;
use App\Models\ServiceModel;
use App\Models\GalleryModel;
use App\Models\NewsModel;
use App\Models\PartnerModel;

class Home extends BaseController
{
    public function index(): string
    {
        $bannerModel = new BannerModel();
        $serviceModel = new ServiceModel();
        $galleryModel = new GalleryModel();
        $newsModel = new NewsModel();
        $partnerModel = new PartnerModel();

        $data = [
            'banners'  => $bannerModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll(),
            'services' => $serviceModel->where('status', 1)->findAll(),
            'gallery'  => $galleryModel->where('status', 1)->orderBy('sort_order', 'ASC')->limit(6)->findAll(),
            'news'     => $newsModel->where('status', 'published')->orderBy('published_at', 'DESC')->limit(3)->findAll(),
            'partners' => $partnerModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll(),
        ];

        return view('home/index', $data);
    }
}
