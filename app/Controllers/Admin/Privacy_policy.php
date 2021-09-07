<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Privacy_policy extends AdminBaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index()
	{
		$privacy_policy = $this->admin->getprivacypolicy("where id='1' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Privacy Policy',
			'id' => (isset($privacy_policy[0]['id'])) ? $privacy_policy[0]['id'] : "",
			'privacy_policy' => (isset($privacy_policy[0]['privacy_policy'])) ? $privacy_policy[0]['privacy_policy'] : "",
		);
		return view('admin/privacy_policy/index', $data);
	}

	public function actionedit()
	{
		$id = $this->request->getPost('id');
		$privacy_policy = $this->request->getPost('privacy_policy');
		$data = array(
			'privacy_policy' => $privacy_policy,
		);
		$this->global->UpdateData('tbl_privacy_policy', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil di Edit');
		return redirect()->back();
	}
}





