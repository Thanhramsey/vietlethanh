<?php

namespace App\Controllers\Admin;

use App\Models\NewsCategoryModel;
use App\Models\NewsModel;

class NewsCategory extends AdminBaseController
{
    protected $categoryModel;
    protected $newsModel;

    public function __construct()
    {
        $this->categoryModel = new NewsCategoryModel();
        $this->newsModel = new NewsModel();
    }

    public function index(): string
    {
        $categories = $this->categoryModel->findAll();

        $data = [
            'title'      => 'Quản lý danh mục tin tức',
            'categories' => $categories
        ];

        return view('admin/news_categories/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Thêm danh mục tin tức mới'
        ];

        return view('admin/news_categories/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[3]|max_length[255]|is_unique[news_categories.title]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = mb_url_title($title, '-', true);

        // Check duplicate slug
        $count = $this->categoryModel->where('slug', $slug)->countAllResults();
        if ($count > 0) {
            $slug .= '-' . time();
        }

        $this->categoryModel->insert([
            'title'      => $title,
            'slug'       => $slug,
            'created_by' => session()->get('admin_id')
        ]);

        return redirect()->to(base_url('admin/news-categories'))->with('success', 'Đã thêm danh mục tin tức thành công.');
    }

    public function edit(int $id): string
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Danh mục không tồn tại");
        }

        $data = [
            'title'    => 'Chỉnh sửa danh mục tin tức',
            'category' => $category
        ];

        return view('admin/news_categories/edit', $data);
    }

    public function update(int $id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to(base_url('admin/news-categories'))->with('error', 'Danh mục không tồn tại.');
        }

        $rules = [
            'title' => "required|min_length[3]|max_length[255]|is_unique[news_categories.title,id,{$id}]"
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = $category['slug'];

        if ($title !== $category['title']) {
            $slug = mb_url_title($title, '-', true);
            $count = $this->categoryModel->where('slug', $slug)->where('id !=', $id)->countAllResults();
            if ($count > 0) {
                $slug .= '-' . time();
            }
        }

        $this->categoryModel->update($id, [
            'title'      => $title,
            'slug'       => $slug,
            'updated_by' => session()->get('admin_id')
        ]);

        return redirect()->to(base_url('admin/news-categories'))->with('success', 'Đã cập nhật danh mục tin tức thành công.');
    }

    public function delete(int $id)
    {
        $category = $this->categoryModel->find($id);

        if (!$category) {
            return redirect()->to(base_url('admin/news-categories'))->with('error', 'Danh mục không tồn tại.');
        }

        // Set category_id of all related news to null before deleting category
        $this->newsModel->where('category_id', $id)->set(['category_id' => null])->update();

        // Delete category
        $this->categoryModel->delete($id);

        return redirect()->to(base_url('admin/news-categories'))->with('success', 'Đã xóa danh mục tin tức thành công.');
    }
}
