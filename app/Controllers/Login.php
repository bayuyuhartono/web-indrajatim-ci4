<?php
namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;

class Login extends BaseController 
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
		return view('login', $data);
	}

	public function execute()
	{
		$email			= $this->request->getVar('email');
		$password		= sha1($this->request->getVar('password')); 
		
		$execute = $this->admin->getusers(' WHERE email = "'.$email.'" AND password = "'.$password.'" ');

		if (count($execute) > 0) {
			// $row 			= $this->db->query('SELECT * FROM tbl_users WHERE email = "'.$email.'" AND password = "'.$password.'" ');
			$users 			= $row->row();
			$id 			= $users->id;
			$nama 			= $users->nama;
			$email			= $users->email;
			$status 		= $users->status;
			$this->session('email', $email);
			$this->session('status', $status);
			$this->session('nama', $nama);
			$this->session('id', $id);
			foreach ($execute->result() as $row)
			{
				if ($row->status == "1")
				{
					return redirect()->to(base_url('home')); 
			}else{
					// $this->session->flashdata('failed', 'Username dan Password Tidak Aktif');
					return redirect()->to(base_url('login')); 
				}	
			}
		} else {
			// $this->session->flashdata('failed', 'Login Gagal, Harap Periksa Kembali Akun Anda');
			return redirect()->to(base_url('login')); 
		}

		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Login Indra Jatim'
		);
		return view('login', $data);
	}

	public function logout()
	{
		$this->login_users->logout();
	}
}



