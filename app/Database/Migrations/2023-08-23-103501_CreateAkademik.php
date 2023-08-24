<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akademik' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
            ],
            'email_akademik' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

    $this->forge->addKey('id_akademik', true);
    $this->forge->createTable('akademik');
    }

    public function down()
    {
        $this->forge->dropTable('akademik');
    }
}
