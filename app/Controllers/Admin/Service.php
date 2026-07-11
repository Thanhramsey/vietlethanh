<?php

namespace App\Controllers\Admin;

use App\Models\ServiceModel;

class Service extends AdminBaseController
{
    protected $serviceModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
    }

    public function index(): string
    {
        $services = $this->serviceModel->findAll();

        $data = [
            'title'    => 'Quản lý ngành nghề dịch vụ',
            'services' => $services
        ];

        return view('admin/services/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Thêm dịch vụ mới'
        ];

        return view('admin/services/create', $data);
    }

    public function store()
    {
        $rules = [
            'title'   => 'required|min_length[5]|max_length[255]',
            'summary' => 'required',
            'content' => 'required',
            'icon'    => 'required',
            'status'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = mb_url_title($title, '-', true);

        // Duplicate check
        $count = $this->serviceModel->where('slug', $slug)->countAllResults();
        if ($count > 0) {
            $slug .= '-' . time();
        }

        $serviceData = [
            'title'           => $title,
            'slug'            => $slug,
            'summary'         => $this->request->getPost('summary'),
            'content'         => $this->request->getPost('content'),
            'icon'            => $this->request->getPost('icon'),
            'status'          => $this->request->getPost('status'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description') ?: $this->request->getPost('summary'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'created_by'      => session()->get('admin_id')
        ];

        // Handle image upload
        $img = $this->request->getFile('image');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/services', $newName);
            $serviceData['image'] = 'uploads/services/' . $newName;
        }

        $this->serviceModel->insert($serviceData);

        return redirect()->to(base_url('admin/services'))->with('success', 'Đã thêm dịch vụ thành công.');
    }

    public function edit(int $id): string
    {
        $service = $this->serviceModel->find($id);

        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Dịch vụ không tồn tại");
        }

        $data = [
            'title'   => 'Chỉnh sửa dịch vụ',
            'service' => $service
        ];

        return view('admin/services/edit', $data);
    }

    public function update(int $id)
    {
        $service = $this->serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Dịch vụ không tồn tại.');
        }

        $rules = [
            'title'   => 'required|min_length[5]|max_length[255]',
            'summary' => 'required',
            'content' => 'required',
            'icon'    => 'required',
            'status'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $title = $this->request->getPost('title');
        $slug = $service['slug'];

        if ($title !== $service['title']) {
            $slug = mb_url_title($title, '-', true);
            $count = $this->serviceModel->where('slug', $slug)->where('id !=', $id)->countAllResults();
            if ($count > 0) {
                $slug .= '-' . time();
            }
        }

        $serviceData = [
            'title'           => $title,
            'slug'            => $slug,
            'summary'         => $this->request->getPost('summary'),
            'content'         => $this->request->getPost('content'),
            'icon'            => $this->request->getPost('icon'),
            'status'          => $this->request->getPost('status'),
            'seo_title'       => $this->request->getPost('seo_title') ?: $title,
            'seo_description' => $this->request->getPost('seo_description') ?: $this->request->getPost('summary'),
            'seo_keywords'    => $this->request->getPost('seo_keywords'),
            'updated_by'      => session()->get('admin_id')
        ];

        // Handle image upload
        $img = $this->request->getFile('image');
        if ($img->isValid() && !$img->hasMoved()) {
            if (!empty($service['image']) && file_exists(FCPATH . $service['image'])) {
                @unlink(FCPATH . $service['image']);
            }
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/services', $newName);
            $serviceData['image'] = 'uploads/services/' . $newName;
        }

        $this->serviceModel->update($id, $serviceData);

        return redirect()->to(base_url('admin/services'))->with('success', 'Đã cập nhật dịch vụ thành công.');
    }

    public function delete(int $id)
    {
        $service = $this->serviceModel->find($id);

        if (!$service) {
            return redirect()->to(base_url('admin/services'))->with('error', 'Dịch vụ không tồn tại.');
        }

        $this->serviceModel->delete($id);

        return redirect()->to(base_url('admin/services'))->with('success', 'Đã xóa dịch vụ thành công.');
    }
}
