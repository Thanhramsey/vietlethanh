<?php

namespace App\Controllers\Admin;

use App\Models\GalleryModel;
use App\Models\GalleryAlbumModel;

class Gallery extends AdminBaseController
{
    protected $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
    }

    public function index(): string
    {
        // Join with gallery_albums
        $images = $this->galleryModel->select('gallery.*, gallery_albums.title as album_title')
                                     ->join('gallery_albums', 'gallery_albums.id = gallery.album_id', 'left')
                                     ->orderBy('gallery.sort_order', 'ASC')
                                     ->findAll();

        $data = [
            'title'  => 'Quản lý Thư viện ảnh',
            'images' => $images
        ];

        return view('admin/gallery/index', $data);
    }

    public function create(): string
    {
        $albumModel = new GalleryAlbumModel();
        $data = [
            'title'  => 'Thêm hình ảnh mới',
            'albums' => $albumModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll()
        ];

        return view('admin/gallery/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'      => 'required|max_length[255]',
            'album_id'   => 'required',
            'sort_order' => 'required|numeric',
            'status'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate image upload
        $img = $this->request->getFile('image');
        if (!$img->isValid() || $img->hasMoved()) {
            return redirect()->back()->withInput()->with('error', 'Hình ảnh tải lên là bắt buộc và phải hợp lệ.');
        }

        // Fetch selected album slug for backward compatibility
        $albumModel = new GalleryAlbumModel();
        $selectedAlbum = $albumModel->find($this->request->getPost('album_id'));

        $galleryData = [
            'title'       => $this->request->getPost('title'),
            'album_id'    => $this->request->getPost('album_id'),
            'album'       => $selectedAlbum ? $selectedAlbum['slug'] : 'general',
            'video'       => $this->request->getPost('video'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'sort_order'  => $this->request->getPost('sort_order'),
            'status'      => $this->request->getPost('status'),
            'created_by'  => session()->get('admin_id')
        ];

        // Save Image
        $imageName = $img->getRandomName();
        $img->move(FCPATH . 'uploads/gallery', $imageName);
        $galleryData['image'] = $imageName;

        $this->galleryModel->insert($galleryData);

        return redirect()->to(base_url('admin/gallery'))->with('success', 'Đã thêm hình ảnh thành công.');
    }

    public function edit(int $id): string
    {
        $image = $this->galleryModel->find($id);

        if (!$image) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Hình ảnh không tồn tại");
        }

        $albumModel = new GalleryAlbumModel();

        $data = [
            'title'  => 'Chỉnh sửa hình ảnh',
            'image'  => $image,
            'albums' => $albumModel->where('status', 1)->orderBy('sort_order', 'ASC')->findAll()
        ];

        return view('admin/gallery/edit', $data);
    }

    public function update(int $id)
    {
        $image = $this->galleryModel->find($id);

        if (!$image) {
            return redirect()->to(base_url('admin/gallery'))->with('error', 'Hình ảnh không tồn tại.');
        }

        $rules = [
            'title'      => 'required|max_length[255]',
            'album_id'   => 'required',
            'sort_order' => 'required|numeric',
            'status'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Fetch selected album slug for backward compatibility
        $albumModel = new GalleryAlbumModel();
        $selectedAlbum = $albumModel->find($this->request->getPost('album_id'));

        $galleryData = [
            'title'       => $this->request->getPost('title'),
            'album_id'    => $this->request->getPost('album_id'),
            'album'       => $selectedAlbum ? $selectedAlbum['slug'] : 'general',
            'video'       => $this->request->getPost('video'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
            'sort_order'  => $this->request->getPost('sort_order'),
            'status'      => $this->request->getPost('status'),
            'updated_by'  => session()->get('admin_id')
        ];

        // Update Image if uploaded
        $img = $this->request->getFile('image');
        if ($img->isValid() && !$img->hasMoved()) {
            if (!empty($image['image']) && file_exists(FCPATH . 'uploads/gallery/' . $image['image'])) {
                @unlink(FCPATH . 'uploads/gallery/' . $image['image']);
            }
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/gallery', $imageName);
            $galleryData['image'] = $imageName;
        }

        $this->galleryModel->update($id, $galleryData);

        return redirect()->to(base_url('admin/gallery'))->with('success', 'Đã cập nhật hình ảnh thành công.');
    }

    public function delete(int $id)
    {
        $image = $this->galleryModel->find($id);

        if (!$image) {
            return redirect()->to(base_url('admin/gallery'))->with('error', 'Hình ảnh không tồn tại.');
        }

        $this->galleryModel->delete($id);

        return redirect()->to(base_url('admin/gallery'))->with('success', 'Đã xóa hình ảnh thành công.');
    }
}
