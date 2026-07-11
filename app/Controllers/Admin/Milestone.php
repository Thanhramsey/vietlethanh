<?php

namespace App\Controllers\Admin;

use App\Models\MilestoneModel;

class Milestone extends AdminBaseController
{
    protected $milestoneModel;

    public function __construct()
    {
        $this->milestoneModel = new MilestoneModel();
    }

    public function index(): string
    {
        $milestones = $this->milestoneModel->orderBy('year', 'ASC')->findAll();
        return view('admin/milestones/index', [
            'title'      => 'Quản lý Lịch sử Công ty',
            'milestones' => $milestones,
        ]);
    }

    public function create(): string
    {
        return view('admin/milestones/create', ['title' => 'Thêm mốc lịch sử mới']);
    }

    public function store()
    {
        $rules = [
            'year'  => 'required|integer',
            'title' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'year'        => (int) $this->request->getPost('year'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) ($this->request->getPost('sort_order') ?? 0),
            'created_by'  => session()->get('admin_id'),
        ];

        // Handle image upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $dir = FCPATH . 'uploads/milestones/';
            if (!is_dir($dir)) mkdir($dir, 0777, true);
            $fileName = $file->getRandomName();
            $file->move($dir, $fileName);
            $data['image'] = $fileName;
        }

        $this->milestoneModel->insert($data);

        return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=timeline'))->with('success', 'Đã thêm mốc lịch sử thành công.');
    }

    public function edit(int $id): string
    {
        $milestone = $this->milestoneModel->find($id);
        if (!$milestone) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mốc lịch sử không tồn tại");
        }
        return view('admin/milestones/edit', [
            'title'     => 'Chỉnh sửa mốc lịch sử',
            'milestone' => $milestone,
        ]);
    }

    public function update(int $id)
    {
        $milestone = $this->milestoneModel->find($id);
        if (!$milestone) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Mốc lịch sử không tồn tại");
        }

        $rules = [
            'year'  => 'required|integer',
            'title' => 'required|min_length[3]|max_length[255]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'year'        => (int) $this->request->getPost('year'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) ($this->request->getPost('sort_order') ?? 0),
        ];

        // Handle image upload
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old image
            if (!empty($milestone['image']) && file_exists(FCPATH . 'uploads/milestones/' . $milestone['image'])) {
                @unlink(FCPATH . 'uploads/milestones/' . $milestone['image']);
            }
            $dir = FCPATH . 'uploads/milestones/';
            if (!is_dir($dir)) mkdir($dir, 0777, true);
            $fileName = $file->getRandomName();
            $file->move($dir, $fileName);
            $data['image'] = $fileName;
        }

        $this->milestoneModel->update($id, $data);

        return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=timeline'))->with('success', 'Đã cập nhật mốc lịch sử thành công.');
    }

    public function delete(int $id)
    {
        $milestone = $this->milestoneModel->find($id);
        if (!$milestone) {
            return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=timeline'))->with('error', 'Mốc lịch sử không tồn tại.');
        }

        $this->milestoneModel->delete($id);

        return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=timeline'))->with('success', 'Đã xóa mốc lịch sử.');
    }

    public function restore(int $id)
    {
        $milestone = $this->milestoneModel->withDeleted()->find($id);
        if (!$milestone || empty($milestone['deleted_at'])) {
            return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=timeline'))->with('error', 'Không tìm thấy mốc lịch sử đã xóa để khôi phục.');
        }

        $this->milestoneModel->builder()->where('id', $id)->set('deleted_at', null)->update();

        return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=timeline'))->with('success', 'Đã khôi phục mốc lịch sử.');
    }
}
