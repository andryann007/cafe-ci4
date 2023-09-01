<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContactData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'contact_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'contact_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'contact_email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'contact_message' => [
                'type'              => 'TEXT'
            ],

            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('contact_id');
        $this->forge->createTable('data_contact');
    }

    public function down()
    {
        $this->forge->dropTable('data_contact');
    }
}
