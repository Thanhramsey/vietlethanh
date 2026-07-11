<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocumentCategoriesAndDocumentFields extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('document_categories')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'title' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                ],
                'slug' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                ],
                'description' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'sort_order' => [
                    'type'    => 'INT',
                    'default' => 0,
                ],
                'status' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 1,
                ],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
                'updated_at' => ['type' => 'DATETIME', 'null' => true],
                'deleted_at' => ['type' => 'DATETIME', 'null' => true],
                'created_by' => ['type' => 'INT', 'null' => true],
                'updated_by' => ['type' => 'INT', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('slug');
            $this->forge->addKey('sort_order');
            $this->forge->createTable('document_categories', true);
        }

        $fields = $this->db->getFieldNames('certificates');
        if (!in_array('category_id', $fields, true)) {
            $this->forge->addColumn('certificates', [
                'category_id' => [
                    'type'     => 'INT',
                    'unsigned' => true,
                    'null'     => true,
                    'after'    => 'id',
                ],
            ]);
        }

        $fields = $this->db->getFieldNames('certificates');
        if (!in_array('file_attachment', $fields, true)) {
            $this->forge->addColumn('certificates', [
                'file_attachment' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                    'after'      => 'pdf_attachment',
                ],
            ]);
        }

        $fields = $this->db->getFieldNames('certificates');
        if (!in_array('file_mime', $fields, true)) {
            $this->forge->addColumn('certificates', [
                'file_mime' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                    'after'      => 'file_attachment',
                ],
            ]);
        }

        if ($this->db->tableExists('document_categories')) {
            $exists = $this->db->table('document_categories')->where('slug', 'giay-chung-nhan')->countAllResults();
            if (!$exists) {
                $this->db->table('document_categories')->insert([
                    'title'      => 'Giấy chứng nhận',
                    'slug'       => 'giay-chung-nhan',
                    'description'=> 'Nhóm giấy chứng nhận',
                    'sort_order' => 1,
                    'status'     => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }

    public function down()
    {
        if ($this->db->tableExists('certificates')) {
            $fields = $this->db->getFieldNames('certificates');
            if (in_array('file_mime', $fields, true)) {
                $this->forge->dropColumn('certificates', 'file_mime');
            }
            $fields = $this->db->getFieldNames('certificates');
            if (in_array('file_attachment', $fields, true)) {
                $this->forge->dropColumn('certificates', 'file_attachment');
            }
            $fields = $this->db->getFieldNames('certificates');
            if (in_array('category_id', $fields, true)) {
                $this->forge->dropColumn('certificates', 'category_id');
            }
        }

        $this->forge->dropTable('document_categories', true);
    }
}
