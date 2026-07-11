<?php

namespace App\Controllers\Admin;

use CodeIgniter\HTTP\Files\UploadedFile;
use App\Models\MilestoneModel;
use App\Models\PartnerModel;
use App\Models\SettingModel;

class Setting extends AdminBaseController
{
    protected $settingModel;
    protected $milestoneModel;
    protected $partnerModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->milestoneModel = new MilestoneModel();
        $this->partnerModel = new PartnerModel();
    }

    public function index(): string
    {
        $activeTab = $this->request->getGet('tab') ?: 'general';
        if (!in_array($activeTab, ['general', 'seo', 'map', 'page-content', 'partners'], true)) {
            $activeTab = 'general';
        }

        $contentTab = $this->request->getGet('contentTab') ?: 'home';
        if (!in_array($contentTab, ['home', 'about', 'timeline'], true)) {
            $contentTab = 'home';
        }

        $data = [
            'title'      => 'Cấu hình hệ thống',
            'activeTab'  => $activeTab,
            'contentTab' => $contentTab,
            'milestones' => $this->milestoneModel->orderBy('sort_order', 'ASC')->orderBy('year', 'ASC')->findAll(),
            'partners'   => $this->partnerModel->orderBy('sort_order', 'ASC')->findAll(),
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

        $tab = $this->request->getPost('settings_tab') ?: 'general';
        if (!in_array($tab, ['general', 'seo', 'map', 'page-content', 'partners'], true)) {
            $tab = 'general';
        }

        return redirect()->to(base_url('admin/settings?tab=' . $tab))->with('success', 'Đã lưu cấu hình hệ thống thành công.');
    }

    public function storePartner()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[255]',
            'logo' => 'uploaded[logo]|is_image[logo]|max_size[logo,2048]|mime_in[logo,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', implode(' ', $this->validator->getErrors()));
        }

        $logoFile = $this->request->getFile('logo');
        $logoName = null;
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $logoName = $this->savePartnerLogo($logoFile);
            if ($logoName === null) {
                return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Không thể xử lý logo. Vui lòng thử ảnh khác (JPG/PNG/WEBP, tối đa 2MB).');
            }
        }

        $this->partnerModel->insert([
            'name'       => $this->request->getPost('name'),
            'logo'       => $logoName,
            'link'       => $this->request->getPost('link') ?: '#',
            'sort_order' => (int) ($this->request->getPost('sort_order') ?? 0),
            'status'     => 1,
            'created_by' => session()->get('admin_id'),
        ]);

        return redirect()->to(base_url('admin/settings?tab=partners'))->with('success', 'Đã thêm đối tác thành công.');
    }

    public function updatePartner(int $id)
    {
        $partner = $this->partnerModel->find($id);
        if (!$partner) {
            return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Đối tác không tồn tại.');
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[255]',
            'sort_order' => 'permit_empty|integer',
            'status' => 'permit_empty|in_list[0,1]',
        ];
        if (!$this->validate($rules)) {
            return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', implode(' ', $this->validator->getErrors()));
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'link'       => $this->request->getPost('link') ?: '#',
            'sort_order' => (int) ($this->request->getPost('sort_order') ?? 0),
            'status'     => (int) ($this->request->getPost('status') ?? 0),
            'updated_by' => session()->get('admin_id'),
        ];

        $logoFile = $this->request->getFile('logo');
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
            $logoMime = (string) $logoFile->getClientMimeType();
            if ($logoMime === '') {
                $logoMime = (string) $logoFile->getMimeType();
            }

            if (!in_array($logoMime, $allowedMimes, true)) {
                return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Logo chỉ hỗ trợ JPG/PNG/WEBP.');
            }

            if ($logoFile->getSizeByUnit('kb') > 2048) {
                return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Logo vượt quá 2MB.');
            }

            $newLogo = $this->savePartnerLogo($logoFile);
            if ($newLogo === null) {
                return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Không thể xử lý logo mới.');
            }

            if (!empty($partner['logo']) && file_exists(FCPATH . 'uploads/partners/' . $partner['logo'])) {
                @unlink(FCPATH . 'uploads/partners/' . $partner['logo']);
            }

            $data['logo'] = $newLogo;
        }

        $this->partnerModel->update($id, $data);
        return redirect()->to(base_url('admin/settings?tab=partners'))->with('success', 'Đã cập nhật đối tác thành công.');
    }

    public function togglePartner(int $id)
    {
        $partner = $this->partnerModel->find($id);
        if (!$partner) {
            return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Đối tác không tồn tại.');
        }

        $this->partnerModel->update($id, [
            'status'     => (int) ($partner['status'] ? 0 : 1),
            'updated_by' => session()->get('admin_id'),
        ]);

        return redirect()->to(base_url('admin/settings?tab=partners'))->with('success', 'Đã cập nhật trạng thái đối tác.');
    }

    public function deletePartner(int $id)
    {
        $partner = $this->partnerModel->find($id);
        if (!$partner) {
            return redirect()->to(base_url('admin/settings?tab=partners'))->with('error', 'Đối tác không tồn tại.');
        }

        if (!empty($partner['logo']) && file_exists(FCPATH . 'uploads/partners/' . $partner['logo'])) {
            @unlink(FCPATH . 'uploads/partners/' . $partner['logo']);
        }

        $this->partnerModel->delete($id);
        return redirect()->to(base_url('admin/settings?tab=partners'))->with('success', 'Đã xóa đối tác thành công.');
    }

    private function savePartnerLogo(UploadedFile $file): ?string
    {
        $dir = FCPATH . 'uploads/partners/';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $logoName = $file->getRandomName();
        $targetPath = $dir . $logoName;
        $file->move($dir, $logoName);

        try {
            // Resize nhẹ để logo đồng đều và file gọn hơn.
            $image = \Config\Services::image();
            $image->withFile($targetPath)
                ->resize(260, 120, true, 'height')
                ->save($targetPath, 82);
        } catch (\Throwable $e) {
            // Fallback: giữ file gốc nếu driver ảnh không khả dụng.
        }

        return $logoName;
    }
}
