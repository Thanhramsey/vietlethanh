<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\AuthService;

class Auth extends BaseController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        // If already logged in, redirect to dashboard
        if ($this->authService->isLoggedIn()) {
            return redirect()->to(base_url('admin/dashboard'));
        }

        return view('admin/auth/login');
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[5]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->authService->login($username, $password);

        if ($user) {
            return redirect()->to(base_url('admin/dashboard'))->with('success', 'Đăng nhập hệ thống quản trị thành công.');
        }

        return redirect()->back()->withInput()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác.');
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->to(base_url('admin/login'))->with('success', 'Đăng xuất hệ thống thành công.');
    }
}
