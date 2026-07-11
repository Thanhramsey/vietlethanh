<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id', 'title', 'slug', 'summary', 'content', 'image', 
        'is_featured', 'status', 'published_at', 'tags', 
        'seo_title', 'seo_description', 'seo_keywords', 
        'created_by', 'updated_by'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function getNewsWithCategory($id = null)
    {
        $builder = $this->select('news.*, news_categories.title as category_title')
                        ->join('news_categories', 'news_categories.id = news.category_id', 'left');
                        
        if ($id === null) {
            return $builder->findAll();
        }
        
        return $builder->find($id);
    }
}
