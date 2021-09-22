<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
use CodeIgniter\I18n\Time;

class Penulis extends AdminBaseController 
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
			'subtitle' => 'penulis',
			'list_penulis' => $this->admin->getpenulis()
		);
		return view('admin/penulis/index', $data);
	}

	public function tambah_data()
	{
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Tambah Penulis',
			
		);
		return view('admin/penulis/tambah_data', $data);
	}

	public function actiontambah()
	{ 	
		$data = array(
			'id'  			=> $this->request->getPost('id'),
			'nama_depan'  			=> $this->request->getPost('nama_depan'),
			'nama_belakang'  		=> $this->request->getPost('nama_belakang')
			
		);
		$this->global->InsertData('tbl_penulis', $data);
		session()->setFlashdata('success', 'Data Berhasil di Simpan');
		return redirect()->back();
	}

	public function edit_data($id_penulis = '')
	{
		$penulis = $this->admin->getpenulis("where id='$id_penulis' ");
	
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Edit Penulis',
			'id_penulis' => (isset($penulis[0]['id'])) ? $penulis[0]['id'] : "",
			'nama_depan' => (isset($penulis[0]['nama_depan'])) ? $penulis[0]['nama_depan'] : "",
			'nama_belakang' => (isset($penulis[0]['nama_belakang'])) ? $penulis[0]['nama_belakang'] : "",
			
			
			'tanggal_diubah' => date('Y-m-d H:i:s'),
			
		);
		return view('admin/penulis/edit_data', $data);
	}

	public function actionedit()
	{
		
			$id_penulis = $this->request->getPost('id');
			$data = array(
				'id'  			=> $this->request->getPost('id'),
				'nama_depan'  			=> $this->request->getPost('nama_depan'),
				'nama_belakang'  		=> $this->request->getPost('nama_belakang'),
				
				
			);
			
			$this->global->UpdateData('tbl_penulis', $data, array('id' => $id_penulis));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
	}

	public function actiondelete($id_penulis)
	{
	   
	    $this->global->DeleteData('tbl_penulis', array('id' => $id_penulis));
	   
		session()->setFlashdata('warning', 'Data Berhasil di Hapus');
		return redirect()->back();
	} 
}







