<?php

namespace App\Controllers;

use App\Models\GalleryModel;
use App\Models\GalleryAlbumModel;

class Gallery extends BaseController
{
    public function index(): string
    {
        $galleryModel = new GalleryModel();
        $albumModel = new GalleryAlbumModel();
        
        $images = $galleryModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll();
        $albums = $albumModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll();

        $data = [
            'images'          => $images,
            'albums'          => $albums,
            'seo_title'       => 'Thư viện hình ảnh hoạt động - Việt Lệ Thanh',
            'seo_description' => 'Xem các hình ảnh thực tế phòng nghỉ khách sạn, công trình giao thông và hoạt động sản xuất kinh doanh của công ty Việt Lệ Thanh.',
            'seo_keywords'    => 'hinh anh khach san duc co, hinh anh lam duong gia lai',
        ];

        return view('gallery/index', $data);
    }
}
