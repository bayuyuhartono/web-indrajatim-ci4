<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Pesan extends AdminBaseController 
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
			'subtitle' => 'Pesan',
			'list_pesan' => $this->admin->getpesan()
		);
		return view('admin/pesan/index', $data);
	}

	public function actionhapus($id)
	{
		$this->global->DeleteData('tbl_pesan', array('id' => $id));
		session()->setFlashdata('warning', 'Data Berhasil di Hapus');
		return redirect()->back();
	}
}





