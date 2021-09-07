<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Struktur_redaksi extends AdminBaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index()
	{
		$struktur = $this->admin->getstrukturredaksi("where id='1' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Struktur Redaksi',
			'id' => (isset($struktur[0]['id'])) ? $struktur[0]['id'] : "",
			'struktur_redaksi' => (isset($struktur[0]['struktur_redaksi'])) ? $struktur[0]['struktur_redaksi'] : "",
		);
		return view('admin/struktur_redaksi/index', $data);
	}

	public function actionedit()
	{
		$id = $this->request->getPost('id');
		$struktur_redaksi = $this->request->getPost('struktur_redaksi');
		$data = array(
			'struktur_redaksi' => $struktur_redaksi,
		);
		$this->global->UpdateData('tbl_struktur_redaksi', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil di Edit');
		return redirect()->back();
	}
}





