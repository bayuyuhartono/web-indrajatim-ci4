<?php

namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;
class Register extends BaseController 
{
	public function __Construct()
	{
		parent::__construct();
		$this->global = new m_global();
	}

	public function index()
	{

		$valid = $this->form_validation;
		$valid->set_rules('email','Email','required|is_unique[tbl_users.email]',
		array(	'is_unique' => 'Email <strong>'.
				$this->request->getPost('email'). '</strong>. sudah terdaftar. Silahkan menggunakan email baru!'));

		$valid->set_rules('nama','Nama','required',
		array('required' => 'Nama harus diisi'));

		$valid->set_rules('password','Password','required',
		array('required' => 'Password harus diisi'));

		$valid->set_rules('confirm_password','Confirm Password','required|matches[password]',
		array( 'matches' => '<strong>Password tidak sesuai. cek password anda kembali</strong>'));

		$nama = $this->request->getPost('nama');
		$email = $this->request->getPost('email');
		$password = sha1($this->request->getPost('password'));

		if ($valid->run()  == FALSE)
		{
			$data = array(
				'title' => 'INDRA JATIM',
				'subtitle' => 'Register Account'
			);
			return view('register', $data);
		}else{
			$data = array(
				'nama' => $nama,
				'email' => $email,
				'password' => $password,
				'status' => '1'
			);
			$this->global->InsertData('tbl_users', $data);
			$this->session->set_flashdata('success', 'Berhasil melakukan pendaftaran');
			redirect(base_url('login'));  
		}	
	}
}
