<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableEmployes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 4,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 30
            ],
            'alamat' => [
                'type' => 'TEXT',
                'default' => null 
            ],
            'gender' => [
                'type' => 'ENUM',
                'constraint' => ['L','P']
            ],
            'gaji' => [
                'type' => 'INT',
                'constraint' => 10
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addKey('id',true);
        $this->forge->createTable('employes');
    }

    public function down()
    {
        $this->forge->dropTable('employes');
    }
}
