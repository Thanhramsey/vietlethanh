<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\AuthService;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class AdminBaseController extends BaseController
{
    protected $authService;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        $this->authService = new AuthService();

        // Check if admin is logged in
        if (!$this->authService->isLoggedIn()) {
            // Redirect to login using exception or header redirect
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }
}
