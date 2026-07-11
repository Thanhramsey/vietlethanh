<?php

namespace App\Models;

use CodeIgniter\Model;

class MilestoneModel extends Model
{
    protected $table            = 'company_milestones';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $useTimestamps    = true;
    protected $deletedField     = 'deleted_at';

    protected $allowedFields = [
        'year', 'title', 'description', 'image', 'sort_order', 'created_by', 'updated_by',
    ];

    protected $validationRules = [
        'year'  => 'required|integer|greater_than[1990]|less_than[2100]',
        'title' => 'required|min_length[3]|max_length[255]',
    ];

    protected $validationMessages = [
        'year'  => ['required' => 'Năm là bắt buộc.', 'integer' => 'Năm phải là số nguyên.'],
        'title' => ['required' => 'Tiêu đề là bắt buộc.'],
    ];
}
