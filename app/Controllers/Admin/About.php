<?php

namespace App\Controllers\Admin;

use App\Models\SettingModel;

class About extends AdminBaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index(): string
    {
        return view('admin/about/index', ['title' => 'Cấu hình trang Giới Thiệu']);
    }

    public function save()
    {
        $postData = $this->request->getPost();

        // Remove CSRF token
        unset($postData['csrf_test_name'], $postData['csrf_token_name']);

        // Keys for about page stored in settings table with prefix "about_"
        $aboutKeys = [
            'about_hero_label', 'about_hero_title', 'about_hero_sub',
            'about_company_name_vi', 'about_company_name_en',
            'about_tax_code', 'about_legal_rep', 'about_license_date', 'about_address',
            'about_story_heading', 'about_story_intro', 'about_story_body1', 'about_story_body2',
            'about_vision', 'about_mission', 'about_values',
            'about_stat_year', 'about_stat_exp', 'about_stat_sectors', 'about_stat_quality',
        ];

        foreach ($aboutKeys as $key) {
            if (!array_key_exists($key, $postData)) continue;
            $value    = $postData[$key];
            $existing = $this->settingModel->where('key', $key)->first();
            if ($existing) {
                $this->settingModel->update($existing['id'], ['value' => $value, 'updated_by' => session()->get('admin_id')]);
            } else {
                $this->settingModel->insert(['key' => $key, 'value' => $value, 'created_by' => session()->get('admin_id')]);
            }
        }

        return redirect()->to(base_url('admin/about'))->with('success', 'Đã lưu cấu hình trang Giới Thiệu thành công.');
    }
}
