<?php

namespace App\Controllers\Admin;

use App\Models\ContactMessageModel;

class Contact extends AdminBaseController
{
    protected $contactModel;

    public function __construct()
    {
        $this->contactModel = new ContactMessageModel();
    }

    public function index(): string
    {
        $perPage = 10;
        $contacts = $this->contactModel->orderBy('created_at', 'DESC')->paginate($perPage);

        $data = [
            'title'    => 'Quản lý tin nhắn liên hệ',
            'contacts' => $contacts,
            'pager'    => $this->contactModel->pager
        ];

        return view('admin/contacts/index', $data);
    }

    public function view(int $id): string
    {
        $contact = $this->contactModel->find($id);

        if (!$contact) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Tin nhắn không tồn tại");
        }

        // Mark as read
        if ($contact['is_read'] == 0) {
            $this->contactModel->update($id, ['is_read' => 1]);
        }

        $data = [
            'title'   => 'Chi tiết tin nhắn liên hệ',
            'contact' => $contact
        ];

        return view('admin/contacts/view', $data);
    }

    public function delete(int $id)
    {
        $contact = $this->contactModel->find($id);

        if (!$contact) {
            return redirect()->to(base_url('admin/contacts'))->with('error', 'Tin nhắn không tồn tại.');
        }

        $this->contactModel->delete($id);

        return redirect()->to(base_url('admin/contacts'))->with('success', 'Đã xóa tin nhắn liên hệ thành công.');
    }
}
