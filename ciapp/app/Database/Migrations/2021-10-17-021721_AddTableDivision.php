<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTableDivision extends Migration
{
    public function up()
    {
        //membuat field di table division
        $this->forge->addField([
            'div_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'division' => [
                'type' => 'VARCHAR',
                'constraint' => 60
            ],
            'is_aktif' => [
                'type' => 'ENUM',
                'constraint' => ['yes','no'],
                'default' => 'yes' 
            ],
            'created_at' => [
                'type' => 'TIMESTAMP'
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP'
            ],
        ]);

        $this->forge->addKey('div_id',true);
        $this->forge->createTable('divisions');
    }

    public function down()
    {
        //drop table
        $this->forge->dropTable('divisions');
    }
}
