<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'product_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'category_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],

            'product_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'product_price' => [
                'type'              => 'DOUBLE',
                'unsigned'          => true,
            ],

            'product_image' => [
                'type'              => 'VARCHAR',
                'constraint'        => '60',
            ],

            'product_desc' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],

            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('product_id');
        $this->forge->addForeignKey('category_id', 'data_category', 'category_id');
        $this->forge->createTable('data_product');
    }

    public function down()
    {
        $this->forge->dropTable('data_product');
    }
}
