<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Models\NewsCategoryModel;

class News extends BaseController
{
    protected $newsModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->categoryModel = new NewsCategoryModel();
    }

    public function index(): string
    {
        $perPage = 6;
        $newsList = $this->newsModel->where('status', 'published')
                                    ->orderBy('published_at', 'DESC')
                                    ->paginate($perPage);

        $data = [
            'newsList'        => $newsList,
            'pager'           => $this->newsModel->pager,
            'categories'      => $this->categoryModel->findAll(),
            'seo_title'       => 'Tin tức & Sự kiện mới nhất - Việt Lệ Thanh',
            'seo_description' => 'Cập nhật tin tức hoạt động, dự án xây dựng và khuyến mãi phòng nghỉ mới nhất từ công ty Việt Lệ Thanh Gia Lai.',
            'seo_keywords'    => 'tin tuc viet le thanh, hoat dong viet le thanh',
        ];

        return view('news/index', $data);
    }

    public function show(string $slug): string
    {
        $news = $this->newsModel->where('slug', $slug)
                                ->where('status', 'published')
                                ->first();

        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Tin tức không tồn tại");
        }

        // Fetch category
        $category = $this->categoryModel->find($news['category_id']);
        
        // Fetch related news (same category, excluding current one)
        $relatedNews = $this->newsModel->where('category_id', $news['category_id'])
                                       ->where('id !=', $news['id'])
                                       ->where('status', 'published')
                                       ->limit(3)
                                       ->findAll();

        $data = [
            'news'            => $news,
            'newsContentHtml' => $this->convertDocumentLinksToGoogleViewer((string) ($news['content'] ?? '')),
            'category'        => $category,
            'relatedNews'     => $relatedNews,
            'seo_title'       => $news['seo_title'] ?? $news['title'],
            'seo_description' => $news['seo_description'] ?? $news['summary'],
            'seo_keywords'    => $news['seo_keywords'] ?? $news['title'],
        ];

        return view('news/show', $data);
    }

    public function category(string $categorySlug): string
    {
        $category = $this->categoryModel->where('slug', $categorySlug)->first();
        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Danh mục không tồn tại");
        }

        $perPage = 6;
        $newsList = $this->newsModel->where('status', 'published')
                                    ->where('category_id', $category['id'])
                                    ->orderBy('published_at', 'DESC')
                                    ->paginate($perPage);

        $data = [
            'newsList'        => $newsList,
            'pager'           => $this->newsModel->pager,
            'category'        => $category,
            'categories'      => $this->categoryModel->findAll(),
            'seo_title'       => $category['title'] . ' - Tin tức mới nhất - Việt Lệ Thanh',
            'seo_description' => 'Xem các tin tức mới nhất thuộc chuyên mục ' . $category['title'] . ' của công ty Việt Lệ Thanh Gia Lai.',
            'seo_keywords'    => 'tin tuc, ' . $category['title'],
        ];

        return view('news/index', $data);
    }

    private function convertDocumentLinksToGoogleViewer(string $html): string
    {
        if ($html === '') {
            return $html;
        }

        return (string) preg_replace_callback(
            '/<a\\b([^>]*?)href=(["\'])([^"\']+)\\2([^>]*)>/i',
            function (array $matches): string {
                $before = $matches[1] ?? '';
                $quote = $matches[2] ?? '"';
                $href = $matches[3] ?? '';
                $after = $matches[4] ?? '';

                if ($href === '') {
                    return $matches[0];
                }

                if (str_contains($href, 'docs.google.com/gview')) {
                    return $matches[0];
                }

                $path = parse_url($href, PHP_URL_PATH) ?? '';
                $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                $viewerExts = ['pdf', 'doc', 'docx'];
                if (!in_array($ext, $viewerExts, true)) {
                    return $matches[0];
                }

                $isAbsolute = preg_match('#^https?://#i', $href) === 1;
                $publicUrl = $isAbsolute ? $href : base_url(ltrim($href, '/'));
                $viewerUrl = 'https://docs.google.com/gview?embedded=1&url=' . rawurlencode($publicUrl);

                $hasTarget = preg_match('/\\btarget\\s*=\\s*(["\']).*?\\1/i', $before . ' ' . $after) === 1;
                $targetAttr = $hasTarget ? '' : ' target="_blank" rel="noopener"';

                return '<a' . $before . 'href=' . $quote . $viewerUrl . $quote . $after . $targetAttr . '>';
            },
            $html
        );
    }
}
