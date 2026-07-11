<?php

namespace App\Controllers\Admin;

use App\Models\BannerModel;

class Banner extends AdminBaseController
{
    protected $bannerModel;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
    }

    public function index(): string
    {
        $banners = $this->bannerModel->orderBy('sort_order', 'ASC')->findAll();

        $data = [
            'title'   => 'Quản lý Banners / Slide',
            'banners' => $banners
        ];

        return view('admin/banners/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Thêm Banner mới'
        ];

        return view('admin/banners/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'      => 'permit_empty|max_length[255]',
            'subtitle'   => 'permit_empty|max_length[255]',
            'sort_order' => 'required|numeric',
            'status'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate image upload (desktop is required)
        $desktopImg = $this->request->getFile('desktop_image');
        if (!$desktopImg->isValid() || $desktopImg->hasMoved()) {
            return redirect()->back()->withInput()->with('error', 'Ảnh slide cho Desktop là bắt buộc và phải hợp lệ.');
        }

        $bannerData = [
            'title'      => $this->request->getPost('title'),
            'subtitle'   => $this->request->getPost('subtitle'),
            'button_text'=> $this->request->getPost('button_text'),
            'button_link'=> $this->request->getPost('button_link'),
            'sort_order' => $this->request->getPost('sort_order'),
            'status'     => $this->request->getPost('status'),
            'created_by' => session()->get('admin_id')
        ];

        // Save Desktop Image
        $desktopName = $desktopImg->getRandomName();
        $desktopImg->move(FCPATH . 'uploads/banners', $desktopName);
        $bannerData['desktop_image'] = $desktopName;

        // Save Mobile Image (optional)
        $mobileImg = $this->request->getFile('mobile_image');
        if ($mobileImg->isValid() && !$mobileImg->hasMoved()) {
            $mobileName = $mobileImg->getRandomName();
            $mobileImg->move(FCPATH . 'uploads/banners', $mobileName);
            $bannerData['mobile_image'] = $mobileName;
        }

        $this->bannerModel->insert($bannerData);

        return redirect()->to(base_url('admin/banners'))->with('success', 'Đã thêm Banner thành công.');
    }

    public function edit(int $id): string
    {
        $banner = $this->bannerModel->find($id);

        if (!$banner) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Banner không tồn tại");
        }

        $data = [
            'title'  => 'Chỉnh sửa Banner',
            'banner' => $banner
        ];

        return view('admin/banners/edit', $data);
    }

    public function update(int $id)
    {
        $banner = $this->bannerModel->find($id);

        if (!$banner) {
            return redirect()->to(base_url('admin/banners'))->with('error', 'Banner không tồn tại.');
        }

        $rules = [
            'title'      => 'permit_empty|max_length[255]',
            'subtitle'   => 'permit_empty|max_length[255]',
            'sort_order' => 'required|numeric',
            'status'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $bannerData = [
            'title'      => $this->request->getPost('title'),
            'subtitle'   => $this->request->getPost('subtitle'),
            'button_text'=> $this->request->getPost('button_text'),
            'button_link'=> $this->request->getPost('button_link'),
            'sort_order' => $this->request->getPost('sort_order'),
            'status'     => $this->request->getPost('status'),
            'updated_by' => session()->get('admin_id')
        ];

        // Update Desktop Image if uploaded
        $desktopImg = $this->request->getFile('desktop_image');
        if ($desktopImg->isValid() && !$desktopImg->hasMoved()) {
            if (!empty($banner['desktop_image']) && file_exists(FCPATH . 'uploads/banners/' . $banner['desktop_image'])) {
                @unlink(FCPATH . 'uploads/banners/' . $banner['desktop_image']);
            }
            $desktopName = $desktopImg->getRandomName();
            $desktopImg->move(FCPATH . 'uploads/banners', $desktopName);
            $bannerData['desktop_image'] = $desktopName;
        }

        // Update Mobile Image if uploaded
        $mobileImg = $this->request->getFile('mobile_image');
        if ($mobileImg->isValid() && !$mobileImg->hasMoved()) {
            if (!empty($banner['mobile_image']) && file_exists(FCPATH . 'uploads/banners/' . $banner['mobile_image'])) {
                @unlink(FCPATH . 'uploads/banners/' . $banner['mobile_image']);
            }
            $mobileName = $mobileImg->getRandomName();
            $mobileImg->move(FCPATH . 'uploads/banners', $mobileName);
            $bannerData['mobile_image'] = $mobileName;
        }

        $this->bannerModel->update($id, $bannerData);

        return redirect()->to(base_url('admin/banners'))->with('success', 'Đã cập nhật Banner thành công.');
    }

    public function delete(int $id)
    {
        $banner = $this->bannerModel->find($id);

        if (!$banner) {
            return redirect()->to(base_url('admin/banners'))->with('error', 'Banner không tồn tại.');
        }

        $this->bannerModel->delete($id);

        return redirect()->to(base_url('admin/banners'))->with('success', 'Đã xóa Banner thành công.');
    }
}
