<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
	protected $table = 'users';
	protected $primaryKey = 'correo';
	protected $allowedFields = ['correo','nombre','pass','apellido_paterno','apellido_materno','es_admin','telefono'];
}
