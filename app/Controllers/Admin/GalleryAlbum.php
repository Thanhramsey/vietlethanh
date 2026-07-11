<?php

namespace App\Controllers\Admin;

use App\Models\GalleryAlbumModel;
use App\Models\GalleryModel;

class GalleryAlbum extends AdminBaseController
{
    protected $albumModel;
    protected $galleryModel;

    public function __construct()
    {
        $this->albumModel = new GalleryAlbumModel();
        $this->galleryModel = new GalleryModel();
    }

    public function index(): string
    {
        $albums = $this->albumModel->orderBy('sort_order', 'ASC')->findAll();

        $data = [
            'title'  => 'Quản lý Album ảnh',
            'albums' => $albums
        ];

        return view('admin/gallery_albums/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Thêm Album ảnh mới'
        ];

        return view('admin/gallery_albums/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'      => 'required|min_length[3]|max_length[255]|is_unique[gallery_albums.title]',
            'sort_order' => 'required|numeric',
            'status'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = mb_url_title($title, '-', true);

        // Check duplicate slug
        $count = $this->albumModel->where('slug', $slug)->countAllResults();
        if ($count > 0) {
            $slug .= '-' . time();
        }

        $this->albumModel->insert([
            'title'      => $title,
            'slug'       => $slug,
            'sort_order' => $this->request->getPost('sort_order'),
            'status'     => $this->request->getPost('status'),
            'created_by' => session()->get('admin_id')
        ]);

        return redirect()->to(base_url('admin/gallery-albums'))->with('success', 'Đã thêm Album ảnh thành công.');
    }

    public function edit(int $id): string
    {
        $album = $this->albumModel->find($id);

        if (!$album) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Album không tồn tại");
        }

        $data = [
            'title' => 'Chỉnh sửa Album ảnh',
            'album' => $album
        ];

        return view('admin/gallery_albums/edit', $data);
    }

    public function update(int $id)
    {
        $album = $this->albumModel->find($id);

        if (!$album) {
            return redirect()->to(base_url('admin/gallery-albums'))->with('error', 'Album không tồn tại.');
        }

        $rules = [
            'title'      => "required|min_length[3]|max_length[255]|is_unique[gallery_albums.title,id,{$id}]",
            'sort_order' => 'required|numeric',
            'status'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = $album['slug'];

        if ($title !== $album['title']) {
            $slug = mb_url_title($title, '-', true);
            $count = $this->albumModel->where('slug', $slug)->where('id !=', $id)->countAllResults();
            if ($count > 0) {
                $slug .= '-' . time();
            }
        }

        $this->albumModel->update($id, [
            'title'      => $title,
            'slug'       => $slug,
            'sort_order' => $this->request->getPost('sort_order'),
            'status'     => $this->request->getPost('status'),
            'updated_by' => session()->get('admin_id')
        ]);

        return redirect()->to(base_url('admin/gallery-albums'))->with('success', 'Đã cập nhật Album ảnh thành công.');
    }

    public function delete(int $id)
    {
        $album = $this->albumModel->find($id);

        if (!$album) {
            return redirect()->to(base_url('admin/gallery-albums'))->with('error', 'Album không tồn tại.');
        }

        // Set album_id to null for all related gallery pictures before deleting the album
        $this->galleryModel->where('album_id', $id)->set(['album_id' => null])->update();

        // Delete album
        $this->albumModel->delete($id);

        return redirect()->to(base_url('admin/gallery-albums'))->with('success', 'Đã xóa Album ảnh thành công.');
    }
}
