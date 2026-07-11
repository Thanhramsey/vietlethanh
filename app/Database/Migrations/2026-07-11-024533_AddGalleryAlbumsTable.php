<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGalleryAlbumsTable extends Migration
{
    private function getCommonFields()
    {
        return [
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'deleted_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'created_by' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
            'updated_by' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
            ],
        ];
    }

    public function up()
    {
        // 1. Create gallery_albums table
        $this->forge->addField(array_merge([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
            ],
            'sort_order' => [
                'type'       => 'INT',
                'default'    => 0,
            ],
            'status' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
            ],
        ], $this->getCommonFields()));
        $this->forge->addKey('id', true);
        $this->forge->createTable('gallery_albums', true);

        // 2. Add album_id to gallery table
        $fields = [
            'album_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id'
            ]
        ];
        $this->forge->addColumn('gallery', $fields);
    }

    public function down()
    {
        // 1. Drop column from gallery table
        $this->forge->dropColumn('gallery', 'album_id');

        // 2. Drop gallery_albums table
        $this->forge->dropTable('gallery_albums', true);
    }
}
