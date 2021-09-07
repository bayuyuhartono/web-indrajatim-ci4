<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class komentar extends AdminBaseController 
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
			'subtitle' => 'komentar',
			'list_komentar' => $this->admin->getkomentar()
		);
		return view('admin/komentar/index', $data);
	}

	public function actionpublish($id)
	{
		$data = array(
			'status' => 1
		);
		$this->global->UpdateData('tbl_komentar', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil di Publish');
		return redirect()->back();
	}

	public function actionunpublish($id)
	{
		$data = array(
			'status' => 0
		);
		$this->global->UpdateData('tbl_komentar', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil Tidak di Publish');
		return redirect()->back();
	}

	public function actionhapus($id)
	{
		$this->global->DeleteData('tbl_komentar', array('id' => $id));
		session()->setFlashdata('warning', 'Data Berhasil di Hapus');
		return redirect()->back();
	}
}






