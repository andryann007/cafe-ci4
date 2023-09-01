<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'username' => [
                'type'              => 'VARCHAR',
                'constraint'        => '12',
            ],

            'nama_lengkap' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'password' => [
                'type'              => 'VARCHAR',
                'constraint'        => '12',
            ],

            'last_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'is_active' => [
                'type'              => 'ENUM',
                'constraint'        => ['active', 'not_active'],
                'default'           => 'active',
            ],

            'reset_token' => [
                'type'              => 'VARCHAR',
                'constraint'        => '12',
            ],

            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addPrimaryKey('user_id');
        $this->forge->createTable('data_user');
    }

    public function down()
    {
        $this->forge->dropTable('data_user');
    }
}
