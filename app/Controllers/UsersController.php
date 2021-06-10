<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;

class UsersController extends BaseController
{
	public function index()
	{
		$usuario = new Users();
		$data['usuarios'] = $usuario->findAll();
		
		return view('usuarios',$data);
	}

	public function create()
	{
		return view('create-usuario');
	}

	public function store()
	{
		$usuario = new Users();
		$validacion = $this->validate([
			'correo' => 'is_unique[users.correo]|max_length[100]',
			'pass' => 'min_length[8]|max_length[255]',
			'pass2' => 'matches[pass]',
			'nombre' => 'max_length[20]',
			'apellido_paterno' => 'max_length[20]',
			'apellido_materno' => 'max_length[20]',
			'telefono' => 'exact_length[9]'
		],
	);
		if($validacion){

			$password = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
			$data=[
				'correo' => $this->request->getVar('correo'),
				'pass' => $password,
				'nombre' => $this->request->getVar('nombre'),
				'apellido_paterno' => $this->request->getVar('apellido_paterno'),
				'apellido_materno' => $this->request->getVar('apellido_materno'),
				'es_admin' => 0,
				'telefono' => $this->request->getVar('telefono'),
			];
			$usuario->insert($data);
			return redirect()->to('/usuarios');
		}
		else{
			$session= session();
			$session->setFlashdata('msg','Vuelva a revisar las contraseñas. Recuerde que el teléfono son 9 dígitos y no se puede utilizar un correo más de una vez.');
			return redirect()->back()->withInput();
		}
	}

	public function edit($correo=null)
	{

		$usuario = new Users();
		$data['usuario'] = $usuario->where('correo',$correo)->first();

		return view('edit-usuario',$data);
	}

	public function editNoAdmin()
	{
		$correo = session('correo');
		$usuario = new Users();
		$data['usuario'] = $usuario->Where('correo',$correo)->first();
		
		return view('editar',$data);
	}

	public function update()
	{
		$usuario = new Users();
		$validacion = $this->validate([
			'nombre' => 'max_length[20]',
			'apellido_paterno' => 'max_length[20]',
			'apellido_materno' => 'max_length[20]',
			'telefono' => 'exact_length[9]'
		]);
		if($validacion){
		$data=[
			'nombre' => $this->request->getVar('nombre'),
			'apellido_paterno' => $this->request->getVar('apellido_paterno'),
			'apellido_materno' => $this->request->getVar('apellido_materno'),
			'telefono' => $this->request->getVar('telefono'),
		];
		$correo = $this->request->getVar('correo');
		$usuario->update($correo, $data);
			if(session('es_admin') == '1'){
				return $this->response->redirect(site_url('/usuarios'));
			}
			else{
				return $this->response->redirect(site_url('/welcome'));
			}
		}
		else{
			$session= session();
			$session->setFlashdata('msg','Recuerde que el teléfono son 9 dígitos.');
			return redirect()->back()->withInput();
		}
	}

	public function delete($correo=null)
	{
		$usuario = new Users();
		$data = $usuario->Where('correo',$correo)->delete();
		return $this->response->redirect(site_url('/usuarios'));
		
	}

	public function password()
	{
		$correo = session('correo');
		$usuario = new Users();
		$data['usuario'] = $usuario->Where('correo',$correo)->first();
		
		return view('cambiar-password',$data);
	}

	public function updatePassword()
	{
		$usuario = new Users();
		$validacion = $this->validate([
			'pass' => 'min_length[8]|max_length[255]',
			'pass2' => 'matches[pass]',
		],
	);
		if($validacion){
			$password = password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT);
			$data=[		
				'pass' => $password,
			];
			$correo = session('correo');
			$usuario->update($correo, $data);
			if(session('es_admin') == '1'){
				return redirect()->to('/usuarios');
			}
			if(session('es_admin') == '0'){
				return redirect()->to('/welcome');
			}
		}
		else{
			$session= session();
			$session->setFlashdata('msg','Vuelva a revisar las contraseñas.');
			return redirect()->back()->withInput();
		}
	}

}
