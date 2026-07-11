<?php

namespace App\Controllers\Admin;

use App\Models\SettingModel;

class Setting extends AdminBaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Cấu hình hệ thống',
        ];

        return view('admin/settings/index', $data);
    }

    public function save()
    {
        $postData = $this->request->getPost();
        
        // Remove CSRF token if present
        if (isset($postData['csrf_test_name'])) {
            unset($postData['csrf_test_name']);
        }

        // Handle file upload for site logo
        $logoFile = $this->request->getFile('site_logo');
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $existingLogo = $this->settingModel->where('key', 'site_logo')->first();
            if ($existingLogo && !empty($existingLogo['value']) && file_exists(FCPATH . 'uploads/settings/' . $existingLogo['value'])) {
                @unlink(FCPATH . 'uploads/settings/' . $existingLogo['value']);
            }

            $logoName = $logoFile->getRandomName();
            // Ensure settings directory exists
            if (!is_dir(FCPATH . 'uploads/settings')) {
                mkdir(FCPATH . 'uploads/settings', 0777, true);
            }
            $logoFile->move(FCPATH . 'uploads/settings', $logoName);

            if ($existingLogo) {
                $this->settingModel->update($existingLogo['id'], [
                    'value'      => $logoName,
                    'updated_by' => session()->get('admin_id')
                ]);
            } else {
                $this->settingModel->insert([
                    'key'        => 'site_logo',
                    'value'      => $logoName,
                    'created_by' => session()->get('admin_id')
                ]);
            }
        }

        foreach ($postData as $key => $value) {
            $existing = $this->settingModel->where('key', $key)->first();
            
            if ($existing) {
                $this->settingModel->update($existing['id'], [
                    'value'      => $value,
                    'updated_by' => session()->get('admin_id')
                ]);
            } else {
                $this->settingModel->insert([
                    'key'        => $key,
                    'value'      => $value,
                    'created_by' => session()->get('admin_id')
                ]);
            }
        }

        return redirect()->to(base_url('admin/settings'))->with('success', 'Đã lưu cấu hình hệ thống thành công.');
    }
}
