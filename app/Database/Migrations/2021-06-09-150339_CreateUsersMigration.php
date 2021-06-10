<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersMigration extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'correo'          => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
					'unsigned'       => false,
					'auto_increment' => false,
			],
			'pass'       => [
					'type'       => 'VARCHAR',
					'constraint' => '100',
					'null' => false,
			],
			'nombre'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null' => false,
			],
			'apellido_paterno'       => [
					'type'       => 'VARCHAR',
					'constraint' => '20',
					'null' => false,
			],
			'apellido_materno'       => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
				'null' => false,
			],
			'es_admin'       => [
				'type'       => 'INT',
				'constraint' => '1',
				'null' => false,
			],
			'telefono' => [
					'type' => 'INT',
					'constraint' => '9',
					'null' => false,
			],
	]);
	$this->forge->addKey('correo', true);
	$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
