<?php

namespace App\Services;

use App\Models\ContactMessageModel;

class ContactService
{
    protected $messageModel;

    public function __construct()
    {
        $this->messageModel = new ContactMessageModel();
    }

    /**
     * Save contact message and send email notification.
     *
     * @param array $data Contact data [name, phone, email, subject, message]
     * @return bool
     */
    public function submitContact(array $data): bool
    {
        // 1. Save to database
        $saveData = [
            'name'    => $data['name'],
            'phone'   => $data['phone'],
            'email'   => $data['email'] ?? null,
            'subject' => $data['subject'] ?? 'Liên hệ mới từ Website',
            'message' => $data['message'],
            'is_read' => 0
        ];

        $inserted = $this->messageModel->insert($saveData);
        if (!$inserted) {
            return false;
        }

        // 2. Try to send email (Mocked/optional configuration based on dev.md)
        $this->sendEmailNotification($saveData);

        return true;
    }

    /**
     * Send email notification to Admin.
     *
     * @param array $data
     * @return void
     */
    protected function sendEmailNotification(array $data): void
    {
        $email = \Config\Services::email();
        
        $adminEmail = get_setting('email', 'admin@vietlethanh.com');
        $companyName = get_setting('company_name', 'Việt Lệ Thanh');

        $email->setTo($adminEmail);
        $email->setFrom('no-reply@vietlethanh.com', $companyName);
        $email->setSubject('[Website Liên Hệ] ' . $data['subject']);

        $messageBody = "<h3>Bạn có liên hệ mới từ Website</h3>";
        $messageBody .= "<p><strong>Họ tên:</strong> " . esc($data['name']) . "</p>";
        $messageBody .= "<p><strong>Số điện thoại:</strong> " . esc($data['phone']) . "</p>";
        $messageBody .= "<p><strong>Email:</strong> " . esc($data['email']) . "</p>";
        $messageBody .= "<p><strong>Chủ đề:</strong> " . esc($data['subject']) . "</p>";
        $messageBody .= "<p><strong>Nội dung:</strong><br>" . nl2br(esc($data['message'])) . "</p>";

        $email->setMessage($messageBody);
        
        // Suppress errors during local development so it doesn't break flow if email settings aren't set
        try {
            $email->send(false);
        } catch (\Exception $e) {
            log_message('error', 'Contact Email failed to send: ' . $e->getMessage());
        }
    }
}
