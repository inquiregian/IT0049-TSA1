<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTsa2Fields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'email',
            ],
        ]);

        $this->db->table('users')
            ->where('username', 'gcsarmiento')
            ->update([
                'password' => password_hash('Tsa2Demo123!', PASSWORD_DEFAULT),
            ]);

        $this->forge->modifyColumn('users', [
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        $this->forge->addColumn('tasks', [
            'is_archived' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'unsigned'   => true,
                'default'    => 0,
                'null'       => false,
                'after'      => 'status',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'password');
        $this->forge->dropColumn('tasks', 'is_archived');
    }
}