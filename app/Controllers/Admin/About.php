<?php

namespace App\Controllers\Admin;

use App\Models\MilestoneModel;
use App\Models\SettingModel;

class About extends AdminBaseController
{
    protected $settingModel;
    protected $milestoneModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->milestoneModel = new MilestoneModel();
    }

    public function index(): string
    {
        $activeTab = $this->request->getGet('tab') ?: 'home';
        if (!in_array($activeTab, ['home', 'about', 'timeline'], true)) {
            $activeTab = 'home';
        }

        return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=' . $activeTab));
    }

    public function save()
    {
        $postData = $this->request->getPost();

        // Remove CSRF token
        unset($postData['csrf_test_name'], $postData['csrf_token_name']);

        // Keys for homepage/about page stored in settings table
        $pageKeys = [
            'home_hero_label', 'home_hero_title', 'home_hero_sub',
            'home_cta_text', 'home_cta_link',
            'home_hero_contact_text', 'home_hero_contact_link',
            'home_intro_title', 'home_intro_text',
            'home_intro_eyebrow', 'home_intro_heading', 'home_intro_body1', 'home_intro_body2',
            'home_intro_card_title', 'home_intro_card_address',
            'home_intro_feature1_title', 'home_intro_feature1_sub',
            'home_intro_feature2_title', 'home_intro_feature2_sub',
            'home_intro_button_text', 'home_intro_button_link',
            'home_why_eyebrow', 'home_why_title',
            'home_why_card1_title', 'home_why_card1_desc',
            'home_why_card2_title', 'home_why_card2_desc',
            'home_why_card3_title', 'home_why_card3_desc',
            'home_stats_item1_value', 'home_stats_item1_title',
            'home_stats_item2_value', 'home_stats_item2_title',
            'home_stats_item3_value', 'home_stats_item3_title',
            'home_stats_item4_value', 'home_stats_item4_title',
            'home_services_eyebrow', 'home_services_title', 'home_services_empty_text',
            'home_gallery_eyebrow', 'home_gallery_title', 'home_gallery_view_all_text', 'home_gallery_empty_text',
            'home_news_eyebrow', 'home_news_title', 'home_news_empty_text', 'home_news_read_more_text',
            'home_partners_empty_prefix',
            'home_section_order_intro', 'home_section_order_why', 'home_section_order_services',
            'home_section_order_gallery', 'home_section_order_news', 'home_section_order_partners',
            'home_section_order_certificates',
            'about_hero_label', 'about_hero_title', 'about_hero_sub',
            'about_company_name_vi', 'about_company_name_en',
            'about_tax_code', 'about_legal_rep', 'about_license_date', 'about_address',
            'about_story_heading', 'about_story_intro', 'about_story_body1', 'about_story_body2',
            'about_vision', 'about_mission', 'about_values',
            'about_stat_year', 'about_stat_exp', 'about_stat_sectors', 'about_stat_quality',
        ];

        $saveKeys = $pageKeys;
        foreach ($pageKeys as $key) {
            $saveKeys[] = $key . '_en';
        }
        $saveKeys = array_values(array_unique($saveKeys));

        foreach ($saveKeys as $key) {
            if (!array_key_exists($key, $postData)) continue;
            $value    = $postData[$key];
            $existing = $this->settingModel->where('key', $key)->first();
            if ($existing) {
                $this->settingModel->update($existing['id'], ['value' => $value, 'updated_by' => session()->get('admin_id')]);
            } else {
                $this->settingModel->insert(['key' => $key, 'value' => $value, 'created_by' => session()->get('admin_id')]);
            }
        }

        $tab = $this->request->getPost('active_tab') ?: 'about';
        if (!in_array($tab, ['home', 'about', 'timeline'], true)) {
            $tab = 'about';
        }

        return redirect()->to(base_url('admin/settings?tab=page-content&contentTab=' . $tab))->with('success', 'Đã lưu cấu hình nội dung thành công.');
    }
}
