<?php

namespace App\Services;

use App\Models\UserModel;

class AuthService
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Authenticate user login.
     *
     * @param string $username
     * @param string $password
     * @return array|bool User data array if success, false otherwise
     */
    public function login(string $username, string $password)
    {
        $user = $this->userModel->where('username', $username)
                               ->orWhere('email', $username)
                               ->first();

        if (!$user) {
            return false;
        }

        // Check if active
        if ($user['status'] != 1) {
            return false;
        }

        // Verify password
        if (!password_verify($password, $user['password'])) {
            return false;
        }

        // Set session
        $sessionData = [
            'admin_id'       => $user['id'],
            'admin_username' => $user['username'],
            'admin_fullname' => $user['fullname'],
            'admin_role'     => $user['role'],
            'is_admin_logged'=> true,
        ];
        
        $session = \Config\Services::session();
        $session->set($sessionData);

        return $user;
    }

    /**
     * Check if user is logged in.
     *
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        $session = \Config\Services::session();
        return $session->has('is_admin_logged') && $session->get('is_admin_logged') === true;
    }

    /**
     * Logout current user.
     *
     * @return void
     */
    public function logout(): void
    {
        $session = \Config\Services::session();
        $session->destroy();
    }
}
