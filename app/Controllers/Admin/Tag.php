<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
use CodeIgniter\I18n\Time;

class Tag extends AdminBaseController 
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
			'subtitle' => 'Berita',
			'list_tag' => $this->admin->gettag()
		);
		return view('admin/tag/index', $data);
	}

	public function tambah_data()
	{
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Tambah Tag'
		);
		return view('admin/tag/tambah_data', $data);
	}

	public function actiontambah()
	{ 
		$data = array(
			'nama_tag'  			=> $this->request->getPost('tag'),
		);
		$this->global->InsertData('tbl_tag', $data);
		session()->setFlashdata('success', 'Data Berhasil di Simpan');
		return redirect()->back();
	}

	public function edit_data($id_tag = '')
	{
		$tag = $this->admin->gettag("where id_tag='$id_tag' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Edit Berita',
			'id_tag' => (isset($tag[0]['id_tag'])) ? $tag[0]['id_tag'] : "",
			'nama_tag' => (isset($tag[0]['nama_tag'])) ? $tag[0]['nama_tag'] : "",
		);
		return view('admin/tag/edit_data', $data);
	}

	public function actionedit()
	{
		$id_tag = $this->request->getPost('id_tag');
		$data = array(
			'nama_tag'  			=> $this->request->getPost('nama_tag'),
		);
		$this->global->UpdateData('tbl_tag', $data, array('id_tag' => $id_tag));
		session()->setFlashdata('success', 'Data Berhasil di Edit');
		return redirect()->back();
	}

	public function actiondelete($id_tag)
	{
	    $this->global->DeleteData('tbl_tag', array('id_tag' => $id_tag));
		session()->setFlashdata('warning', 'Data Berhasil di Hapus');
		return redirect()->back();
	} 
}







