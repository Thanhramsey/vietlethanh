<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDeletedAtToCompanyMilestones extends Migration
{
    public function up()
    {
        if (!$this->db->fieldExists('deleted_at', 'company_milestones')) {
            $this->forge->addColumn('company_milestones', [
                'deleted_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                    'after' => 'updated_at',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('deleted_at', 'company_milestones')) {
            $this->forge->dropColumn('company_milestones', 'deleted_at');
        }
    }
}
