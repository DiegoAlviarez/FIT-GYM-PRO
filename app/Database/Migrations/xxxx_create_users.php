<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $fields = [
            'id' => ['type' => 'INT', 'constraint' => 9, 'auto_increment' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => false],
            // ...
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->addKey('email');
        $this->forge->createTable('users', true);
        $this->db->simpleQuery('ALTER TABLE users ADD CONSTRAINT uq_users_email UNIQUE (email);');
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}