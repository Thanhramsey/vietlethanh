<?php

namespace App\Controllers\Admin;

use App\Models\DocumentCategoryModel;

class DocumentCategory extends AdminBaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new DocumentCategoryModel();
    }

    public function index(): string
    {
        return view('admin/document_categories/index', [
            'title'      => 'Loại giấy tờ',
            'categories' => $this->categoryModel->orderBy('sort_order', 'ASC')->findAll(),
        ]);
    }

    public function create(): string
    {
        return view('admin/document_categories/create', ['title' => 'Thêm loại giấy tờ']);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|min_length[2]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = (string) $this->request->getPost('title');
        $slug = (string) ($this->request->getPost('slug') ?: url_title($title, '-', true));

        $this->categoryModel->insert([
            'title'       => $title,
            'slug'        => $slug,
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) ($this->request->getPost('sort_order') ?? 0),
            'status'      => (int) ($this->request->getPost('status') ?? 1),
            'created_by'  => session()->get('admin_id'),
        ]);

        return redirect()->to(base_url('admin/document-categories'))->with('success', 'Đã thêm loại giấy tờ.');
    }

    public function edit(int $id): string
    {
        $category = $this->categoryModel->find($id);
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Loại giấy tờ không tồn tại');
        }

        return view('admin/document_categories/edit', [
            'title'    => 'Sửa loại giấy tờ',
            'category' => $category,
        ]);
    }

    public function update(int $id)
    {
        $category = $this->categoryModel->find($id);
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Loại giấy tờ không tồn tại');
        }

        $rules = [
            'title' => 'required|min_length[2]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = (string) $this->request->getPost('title');
        $slug = (string) ($this->request->getPost('slug') ?: url_title($title, '-', true));

        $this->categoryModel->update($id, [
            'title'       => $title,
            'slug'        => $slug,
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) ($this->request->getPost('sort_order') ?? 0),
            'status'      => (int) ($this->request->getPost('status') ?? 1),
            'updated_by'  => session()->get('admin_id'),
        ]);

        return redirect()->to(base_url('admin/document-categories'))->with('success', 'Đã cập nhật loại giấy tờ.');
    }

    public function delete(int $id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to(base_url('admin/document-categories'))->with('success', 'Đã xóa loại giấy tờ.');
    }
}
