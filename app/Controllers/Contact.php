<?php

namespace App\Controllers;

use App\Services\ContactService;

class Contact extends BaseController
{
    protected $contactService;

    public function __construct()
    {
        $this->contactService = new ContactService();
    }

    public function index(): string
    {
        $data = [
            'seo_title'       => 'Liên hệ với Việt Lệ Thanh - Gia Lai',
            'seo_description' => 'Gửi tin nhắn liên hệ, phản hồi hoặc yêu cầu đặt phòng khách sạn, thi công xây dựng đến công ty Việt Lệ Thanh tại Đức Cơ, Gia Lai.',
            'seo_keywords'    => 'lien he viet le thanh, dia chi viet le thanh duc co, sdt khach san viet le thanh',
        ];

        return view('contact/index', $data);
    }

    public function submit()
    {
        // CSRF check is automatically handled by CI4 if enabled in Filters.
        
        $rules = [
            'name'    => 'required|min_length[3]|max_length[255]',
            'phone'   => 'required|min_length[9]|max_length[15]',
            'email'   => 'permit_empty|valid_email|max_length[255]',
            'subject' => 'permit_empty|max_length[255]',
            'message' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $formData = $this->request->getPost();
        
        $success = $this->contactService->submitContact($formData);

        if ($success) {
            return redirect()->to(base_url('lien-he'))->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi đã nhận được thông tin và sẽ phản hồi sớm nhất.');
        }

        return redirect()->back()->withInput()->with('error', 'Có lỗi xảy ra trong quá trình gửi liên hệ. Vui lòng thử lại sau.');
    }
}
