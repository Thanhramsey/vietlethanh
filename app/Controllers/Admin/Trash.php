<?php

namespace App\Controllers\Admin;

use App\Models\BannerModel;
use App\Models\CertificateModel;
use App\Models\ContactMessageModel;
use App\Models\DocumentCategoryModel;
use App\Models\GalleryAlbumModel;
use App\Models\GalleryModel;
use App\Models\MilestoneModel;
use App\Models\NewsCategoryModel;
use App\Models\NewsModel;
use App\Models\PartnerModel;
use App\Models\ServiceModel;
use App\Models\UserModel;

class Trash extends AdminBaseController
{
    private array $map = [
        'banners' => ['model' => BannerModel::class, 'label' => 'Banner', 'nameField' => 'title', 'adminUrl' => 'admin/banners'],
        'services' => ['model' => ServiceModel::class, 'label' => 'Dịch vụ', 'nameField' => 'title', 'adminUrl' => 'admin/services'],
        'news' => ['model' => NewsModel::class, 'label' => 'Tin tức', 'nameField' => 'title', 'adminUrl' => 'admin/news'],
        'news-categories' => ['model' => NewsCategoryModel::class, 'label' => 'Danh mục tin tức', 'nameField' => 'title', 'adminUrl' => 'admin/news-categories'],
        'gallery' => ['model' => GalleryModel::class, 'label' => 'Hình ảnh thư viện', 'nameField' => 'title', 'adminUrl' => 'admin/gallery'],
        'gallery-albums' => ['model' => GalleryAlbumModel::class, 'label' => 'Album ảnh', 'nameField' => 'title', 'adminUrl' => 'admin/gallery-albums'],
        'documents' => ['model' => CertificateModel::class, 'label' => 'Giấy tờ', 'nameField' => 'title', 'adminUrl' => 'admin/documents'],
        'document-categories' => ['model' => DocumentCategoryModel::class, 'label' => 'Loại giấy tờ', 'nameField' => 'title', 'adminUrl' => 'admin/document-categories'],
        'contacts' => ['model' => ContactMessageModel::class, 'label' => 'Tin nhắn liên hệ', 'nameField' => 'subject', 'adminUrl' => 'admin/contacts'],
        'partners' => ['model' => PartnerModel::class, 'label' => 'Đối tác', 'nameField' => 'name', 'adminUrl' => 'admin/settings?tab=partners'],
        'users' => ['model' => UserModel::class, 'label' => 'Thành viên', 'nameField' => 'username', 'adminUrl' => 'admin/users'],
        'milestones' => ['model' => MilestoneModel::class, 'label' => 'Mốc lịch sử', 'nameField' => 'title', 'adminUrl' => 'admin/settings?tab=page-content&contentTab=timeline'],
    ];

    public function index(): string
    {
        $trashItems = [];

        foreach ($this->map as $type => $cfg) {
            $modelClass = $cfg['model'];
            $model = new $modelClass();

            $rows = $model->withDeleted()
                ->where('deleted_at IS NOT NULL', null, false)
                ->orderBy('deleted_at', 'DESC')
                ->findAll();

            foreach ($rows as $row) {
                $nameField = $cfg['nameField'];
                $displayName = trim((string) ($row[$nameField] ?? ''));
                if ($displayName === '') {
                    $displayName = '#' . (string) ($row['id'] ?? '');
                }

                $trashItems[] = [
                    'type' => $type,
                    'label' => $cfg['label'],
                    'id' => (int) ($row['id'] ?? 0),
                    'name' => $displayName,
                    'deleted_at' => (string) ($row['deleted_at'] ?? ''),
                    'admin_url' => base_url($cfg['adminUrl']),
                ];
            }
        }

        usort($trashItems, static function (array $a, array $b): int {
            return strcmp($b['deleted_at'], $a['deleted_at']);
        });

        return view('admin/trash/index', [
            'title' => 'Thùng rác',
            'items' => $trashItems,
        ]);
    }

    public function restore(string $type, int $id)
    {
        if (!isset($this->map[$type])) {
            return redirect()->to(base_url('admin/trash'))->with('error', 'Loại dữ liệu cần khôi phục không hợp lệ.');
        }

        $modelClass = $this->map[$type]['model'];
        $model = new $modelClass();

        $row = $model->withDeleted()->find($id);
        if (!$row || empty($row['deleted_at'])) {
            return redirect()->to(base_url('admin/trash'))->with('error', 'Không tìm thấy bản ghi đã xóa để khôi phục.');
        }

        $model->builder()->where('id', $id)->set('deleted_at', null)->update();

        return redirect()->to(base_url('admin/trash'))->with('success', 'Đã khôi phục dữ liệu thành công.');
    }
}
