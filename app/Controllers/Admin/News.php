<?php

namespace App\Controllers\Admin;

use App\Models\NewsModel;
use App\Models\NewsCategoryModel;

class News extends AdminBaseController
{
    protected $newsModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->categoryModel = new NewsCategoryModel();
    }

    public function index(): string
    {
        $newsList = $this->newsModel->getNewsWithCategory();

        $data = [
            'title'    => 'Quản lý tin tức',
            'newsList' => $newsList
        ];

        return view('admin/news/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title'      => 'Thêm bài viết mới',
            'categories' => $this->categoryModel->findAll()
        ];

        return view('admin/news/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'       => 'required|min_length[5]|max_length[255]',
            'category_id' => 'required',
            'summary'     => 'required',
            'content'     => 'required',
            'status'      => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Generate slug
        $title = $this->request->getPost('title');
        $slug = mb_url_title($title, '-', true);

        // Simple duplicate check for slug
        $count = $this->newsModel->where('slug', $slug)->countAllResults();
        if ($count > 0) {
            $slug .= '-' . time();
        }

        $newsData = [
            'category_id'     => $this->request->getPost('category_id'),
            'title'           => $title,
            'slug'            => $slug,
            'summary'         => $this->request->getPost('summary'),
            'content'         => $this->request->getPost('content'),
            'status'          => $this->request->getPost('status'),
            'is_featured'     => $this->request->getPost('is_featured') ? 1 : 0,
            'published_at'    => $this->request->getPost('status') === 'published' ? date('Y-m-d H:i:s') : null,
            'tags'            => $this->request->getPost('tags'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description') ?: $this->request->getPost('summary'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'created_by'      => session()->get('admin_id')
        ];

        // Handle Image Upload
        $img = $this->request->getFile('image');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/news', $newName);
            $newsData['image'] = 'uploads/news/' . $newName;
        }

        $this->newsModel->insert($newsData);

        return redirect()->to(base_url('admin/news'))->with('success', 'Đã thêm bài viết mới thành công.');
    }

    public function edit(int $id): string
    {
        $news = $this->newsModel->find($id);

        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Bài viết không tồn tại");
        }

        $data = [
            'title'      => 'Chỉnh sửa bài viết',
            'news'       => $news,
            'categories' => $this->categoryModel->findAll()
        ];

        return view('admin/news/edit', $data);
    }

    public function update(int $id)
    {
        $news = $this->newsModel->find($id);

        if (!$news) {
            return redirect()->to(base_url('admin/news'))->with('error', 'Bài viết không tồn tại.');
        }

        $rules = [
            'title'       => 'required|min_length[5]|max_length[255]',
            'category_id' => 'required',
            'summary'     => 'required',
            'content'     => 'required',
            'status'      => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = $news['slug'];

        if ($title !== $news['title']) {
            $slug = mb_url_title($title, '-', true);
            $count = $this->newsModel->where('slug', $slug)->where('id !=', $id)->countAllResults();
            if ($count > 0) {
                $slug .= '-' . time();
            }
        }

        $newsData = [
            'category_id'     => $this->request->getPost('category_id'),
            'title'           => $title,
            'slug'            => $slug,
            'summary'         => $this->request->getPost('summary'),
            'content'         => $this->request->getPost('content'),
            'status'          => $this->request->getPost('status'),
            'is_featured'     => $this->request->getPost('is_featured') ? 1 : 0,
            'tags'            => $this->request->getPost('tags'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description') ?: $this->request->getPost('summary'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'updated_by'      => session()->get('admin_id')
        ];

        if ($this->request->getPost('status') === 'published' && $news['status'] !== 'published') {
            $newsData['published_at'] = date('Y-m-d H:i:s');
        }

        // Handle Image Upload
        $img = $this->request->getFile('image');
        if ($img->isValid() && !$img->hasMoved()) {
            // Delete old image if it exists
            if (!empty($news['image']) && file_exists(FCPATH . $news['image'])) {
                @unlink(FCPATH . $news['image']);
            }
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/news', $newName);
            $newsData['image'] = 'uploads/news/' . $newName;
        }

        $this->newsModel->update($id, $newsData);

        return redirect()->to(base_url('admin/news'))->with('success', 'Đã cập nhật bài viết thành công.');
    }

    public function delete(int $id)
    {
        $news = $this->newsModel->find($id);

        if (!$news) {
            return redirect()->to(base_url('admin/news'))->with('error', 'Bài viết không tồn tại.');
        }

        $this->newsModel->delete($id);

        return redirect()->to(base_url('admin/news'))->with('success', 'Đã xóa bài viết thành công.');
    }
}
