<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Contact extends AdminBaseController 
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
			'subtitle' => 'Contact',
			'list_contact' => $this->admin->getcontact()
		);
		return view('admin/contact/index', $data);
	}

	public function edit_data($id='')
	{
		$contact = $this->admin->getcontact("where id='$id' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Edit Contact',
			'id' => (isset($contact[0]['id'])) ? $contact[0]['id'] : "",
			'no_telp' => (isset($contact[0]['no_telp'])) ? $contact[0]['no_telp'] : "",
			'email' => (isset($contact[0]['email'])) ? $contact[0]['email'] : "",
			'alamat' => (isset($contact[0]['alamat'])) ? $contact[0]['alamat'] : "",
		);
		return view('admin/contact/edit_data', $data);
	}

	public function actionedit()
	{
		$id = $this->request->getPost('id');
		$no_telp = $this->request->getPost('no_telp');
		$email = $this->request->getPost('email');
		$alamat = $this->request->getPost('alamat');
		$data = array(
			'no_telp' => $no_telp,
			'email' => $email,
			'alamat' => $alamat,
		);
		$this->global->UpdateData('tbl_contact', $data, array('id' => $id));
		session()->setFlashdata('success', 'Data Berhasil di Edit');
		return redirect()->back();
	}
}





