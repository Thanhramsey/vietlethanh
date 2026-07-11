<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMilestonesTable extends Migration
{
    public function up()
    {
        // company_milestones: timeline history items
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'year'        => ['type' => 'SMALLINT', 'unsigned' => true, 'null' => false, 'comment' => 'Năm của mốc lịch sử'],
            'title'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'description' => ['type' => 'TEXT', 'null' => true],
            'image'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'comment' => 'Tên file ảnh minh hoạ'],
            'sort_order'  => ['type' => 'TINYINT', 'unsigned' => true, 'default' => 0],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
            'created_by'  => ['type' => 'INT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('sort_order');
        $this->forge->createTable('company_milestones');

        // about_settings: extra key-value configs for the About page
        // Reuse existing 'settings' table via the Setting model — no new table needed.
    }

    public function down()
    {
        $this->forge->dropTable('company_milestones', true);
    }
}
