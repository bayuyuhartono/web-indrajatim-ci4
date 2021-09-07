<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;

class AdminDashboard extends AdminBaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
	}

	public function index()
	{
		$data = array(
			'title' => 'INDRA JATIM',
			'berita' => $this->admin->countberita(),
			'komentar' => $this->admin->countkomentar(),
			'pesan' => $this->admin->countpesan(),
			'users' => $this->admin->countusers(),
			'list_user' => $this->admin->getusers()
		);
		return view('admin/template/dashboard', $data);
	}
}



