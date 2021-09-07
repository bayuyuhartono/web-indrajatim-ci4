<?php
namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;

class Adminlogin extends AdminBaseController 
{	
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index()
	{
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Login Indra Jatim'
		);
		return view('admin/login', $data);
	}

	public function execute()
	{
		$session = session();
		$username			= $this->request->getVar('username');
		$password		= sha1($this->request->getVar('password')); 
		
		$execute = $this->admin->getadmin(' WHERE username = "'.$username.'"  ');

		if (count($execute) > 0) {
			$admin 			= $execute[0];
			$id 			= $admin['id'];
			$name 			= $admin['name'];
			$username		= $admin['username'];
			$status 		= $admin['status'];
			$session->set('username', $username);
			$session->set('status', $status);
			$session->set('name', $name);
			$session->set('id', $id);
			foreach ($execute as $value)
			{
				if ($value['status'] == "1")
				{
					return redirect()->to(base_url('admin/dashboard')); 
			}else{
					session()->setFlashdata('error', 'Username atau Password Salah');
					return redirect()->to(base_url('admin/login')); 
				}	
			}
		} else {
			session()->setFlashdata('error', 'Login Gagal, Harap Periksa Akun Anda');
			return redirect()->to(base_url('admin/login')); 
		}

		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Login Indra Jatim'
		);
		return view('login', $data);
	}

	public function logout()
	{
		$session = session();
		// $this->login_admin->logout();
		$session->remove('username');
		// $session->remove('id_login');
		$session->remove('id');
		session()->setFlashdata('success', 'Logout Berhasil');
		return redirect()->to(base_url('admin/login'));
	}
}



