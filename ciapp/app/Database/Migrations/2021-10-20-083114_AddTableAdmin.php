<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableAdmin extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'DATETIME'
            ],
        ]);

        $this->forge->addKey('id_admin',true);
        $this->forge->createTable('admins');
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
