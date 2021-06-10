<?php

namespace App\Controllers;

use App\Models\Users;
use App\Controllers\BaseController;

class LoginController extends BaseController
{
	public function index()
	{
		//
	}

	public function auth()
	{
		$usuario = new Users();
		$data = $usuario->Where('correo',$this->request->getVar('correo'))->first();
		echo $data['pass'];
		if(isset($data) && password_verify($this->request->getVar('pass'), $data['pass'])){
			$session = session();
			$session->set($data);
			if($data['es_admin'] == 0){
			return redirect()->to('/welcome');
			}
			if($data['es_admin'] == '1'){
				return redirect()->to('/usuarios');
			}
		}
		else{
			return redirect()->to(base_url('/'));
		}
	}

	public function close()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/'));
	}
}
