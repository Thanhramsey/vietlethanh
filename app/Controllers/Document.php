<?php

namespace App\Controllers;

use App\Models\CertificateModel;
use App\Models\DocumentCategoryModel;

class Document extends BaseController
{
    protected $documentModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->documentModel = new CertificateModel();
        $this->categoryModel = new DocumentCategoryModel();
    }

    public function index(?string $slug = null): string
    {
        $categories = $this->categoryModel
            ->where('status', 1)
            ->orderBy('sort_order', 'ASC')
            ->findAll();

        $builder = $this->documentModel
            ->select('certificates.*, document_categories.title AS category_title, document_categories.slug AS category_slug')
            ->join('document_categories', 'document_categories.id = certificates.category_id', 'left')
            ->where('certificates.status', 1)
            ->orderBy('certificates.sort_order', 'ASC')
            ->orderBy('certificates.id', 'DESC');

        $currentCategory = null;
        if (!empty($slug)) {
            $currentCategory = $this->categoryModel->where('slug', $slug)->where('status', 1)->first();
            if ($currentCategory) {
                $builder->where('certificates.category_id', (int) $currentCategory['id']);
            }
        }

        $documents = $builder->findAll();

        return view('documents/index', [
            'seo_title'       => 'Giấy tờ - Chứng từ',
            'seo_description' => 'Danh sách giấy tờ và chứng từ của doanh nghiệp, có lọc theo loại.',
            'categories'      => $categories,
            'documents'       => $documents,
            'activeSlug'      => $currentCategory['slug'] ?? null,
        ]);
    }
}
