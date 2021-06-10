<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		/*$config         = new \Config\Encryption();
		$config->key    = 'aBigsecret_ofAtleast32Characters';
		$config->driver = 'OpenSSL';
		$encrypter = \Config\Services::encrypter($config);
		$password = $encrypter->encrypt('123456789');*/
		$password = password_hash("123456789",PASSWORD_DEFAULT);
		$data = [
			'correo' => 'jorge@jorge.com',
			'pass' => $password,
			'nombre' => 'Jorge',
			'apellido_paterno' => 'Andrade',
			'apellido_materno' => 'Gomez',
			'es_admin' => '1',
			'telefono' => '966718106',
		];

		// Simple Queries
		$this->db->query("INSERT INTO users (correo, pass, nombre, apellido_paterno, apellido_materno, es_admin, telefono) VALUES(:correo:, :pass:, :nombre:, :apellido_paterno:, :apellido_materno:, :es_admin:, :telefono:)", $data);

		// Using Query Builder
		$this->db->table('users')->insert($data);
	}
}
