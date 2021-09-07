<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Users extends AdminBaseController 
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
			'subtitle' => 'Users',
			'list_users' => $this->admin->getusers()
		);
		return view('admin/users/index', $data);
	}

	public function actionaktif($id)
	{
		$data = array(
			'status' => 1
		);
		$this->global->UpdateData('tbl_users', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil Aktif');
		return redirect()->back();
	}

	public function actiontidakaktif($id)
	{
		$data = array(
			'status' => 0
		);
		$this->global->UpdateData('tbl_users', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil di Nonaktifkan');
		return redirect()->back();
	}
}





