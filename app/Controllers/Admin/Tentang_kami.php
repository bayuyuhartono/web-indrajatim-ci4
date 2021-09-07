<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Tentang_kami extends AdminBaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index()
	{
		$tentangkami = $this->admin->gettentangkami("where id='1' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Tentang Kami',
			'id' => (isset($tentangkami[0]['id'])) ? $tentangkami[0]['id'] : "",
			'tentang_kami' => (isset($tentangkami[0]['tentang_kami'])) ? $tentangkami[0]['tentang_kami'] : "",
		);
		return view('admin/tentang_kami/index', $data);
	}

	public function actionedit()
	{
		$id = $this->request->getPost('id');
		$tentang_kami = $this->request->getPost('tentang_kami');
		$data = array(
			'tentang_kami' => $tentang_kami,
		);
		$this->global->UpdateData('tbl_tentang_kami', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil di Edit');
		return redirect()->back();
	}
}





