<?php

namespace App\Controllers\Admin;

use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class User extends AdminBaseController
{
    protected $userModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        // Enforce role permission: Only superadmin can access user management
        if (session()->get('admin_role') !== 'superadmin') {
            // Send back to dashboard with error message
            header('Location: ' . base_url('admin/dashboard'));
            // Save flashdata before redirect
            $this->session->setFlashdata('error', 'Bạn không có quyền truy cập chức năng Quản trị thành viên.');
            exit;
        }

        $this->userModel = new UserModel();
    }

    public function index(): string
    {
        $users = $this->userModel->findAll();

        $data = [
            'title' => 'Quản lý thành viên',
            'users' => $users
        ];

        return view('admin/users/index', $data);
    }

    public function create(): string
    {
        $data = [
            'title' => 'Thêm thành viên mới'
        ];

        return view('admin/users/create', $data);
    }

    public function store()
    {
        $rules = [
            'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
            'email'    => 'required|valid_email|max_length[255]|is_unique[users.email]',
            'fullname' => 'required|min_length[3]|max_length[255]',
            'password' => 'required|min_length[5]',
            'role'     => 'required',
            'status'   => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userData = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'fullname'   => $this->request->getPost('fullname'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'       => $this->request->getPost('role'),
            'status'     => $this->request->getPost('status'),
            'created_by' => session()->get('admin_id')
        ];

        $this->userModel->insert($userData);

        return redirect()->to(base_url('admin/users'))->with('success', 'Đã thêm thành viên mới thành công.');
    }

    public function edit(int $id): string
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Thành viên không tồn tại");
        }

        $data = [
            'title' => 'Chỉnh sửa thông tin thành viên',
            'user'  => $user
        ];

        return view('admin/users/edit', $data);
    }

    public function update(int $id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'Thành viên không tồn tại.');
        }

        $rules = [
            'username' => "required|min_length[3]|max_length[100]|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|max_length[255]|is_unique[users.email,id,{$id}]",
            'fullname' => 'required|min_length[3]|max_length[255]',
            'role'     => 'required',
            'status'   => 'required'
        ];

        // Validate password only if provided
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $rules['password'] = 'required|min_length[5]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userData = [
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'fullname'   => $this->request->getPost('fullname'),
            'role'       => $this->request->getPost('role'),
            'status'     => $this->request->getPost('status'),
            'updated_by' => session()->get('admin_id')
        ];

        if (!empty($password)) {
            $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $userData);

        return redirect()->to(base_url('admin/users'))->with('success', 'Đã cập nhật thông tin thành viên thành công.');
    }

    public function delete(int $id)
    {
        // Security best practice: Prevent self-deletion
        if ($id === (int)session()->get('admin_id')) {
            return redirect()->to(base_url('admin/users'))->with('error', 'Bạn không thể tự xóa tài khoản của chính mình.');
        }

        $user = $this->userModel->find($id);

        if (!$user) {
            return redirect()->to(base_url('admin/users'))->with('error', 'Thành viên không tồn tại.');
        }

        $this->userModel->delete($id);

        return redirect()->to(base_url('admin/users'))->with('success', 'Đã xóa thành viên thành công.');
    }
}
