<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategoryData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'category_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'category_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('category_id', true);
        $this->forge->createTable('data_category');
    }

    public function down()
    {
        $this->forge->dropTable('data_category');
    }
}
