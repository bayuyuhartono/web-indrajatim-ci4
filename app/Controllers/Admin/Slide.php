<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Slide extends AdminBaseController 
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
			'subtitle' => 'Slide',
			'list_slide' => $this->admin->getslide()
		);
		return view('admin/slide/index', $data);
	}

	public function tambah_data()
	{
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Tambah Slide',
		);
		return view('admin/slide/tambah_data', $data);
	}

	public function actiontambah()
	{ 
		$old_name	= $_FILES["gambar"]["name"];
		$ext 		= pathinfo($old_name, PATHINFO_EXTENSION);
		$new_name	= time().'.'.$ext;
		// $config = array(
		// 	'upload_path' 		=> './assets/admin/upload/slide/',
		// 	'allowed_types' 	=> 'jpg|png|jpeg',
		// 	'file_name'			=> $new_name,
		// 	'image_library'		=> 'gd2',
		// 	'source_image'		=> './assets/admin/upload/slide/'.$new_name,
		// 	'create_thumb'		=> true,
		// 	'maintain_ratio'	=> true,
		// 	'thumb_marker'     	=> '',	
		// );
		// $this->load->library('upload', $config);
		// if (! $this->upload->do_upload('gambar')) {

		// }else{
		// 	$upload_data         = array('uploads' => $this->upload->data());
		// 	$this->load->library('image_lib', $config);
		// 	$this->image_lib->resize();
			$dataBerkas = $this->request->getFile('gambar');
			$dataBerkas->move('assets/admin/upload/slide/', $new_name);
			$data = array(
				'judul'  			=> $this->request->getPost('judul'),
				'sub_judul'  		=> $this->request->getPost('sub_judul'),
				'kategori'  		=> $this->request->getPost('kategori'),
				'gambar'   			=> $new_name,
			);
			$this->global->InsertData('tbl_slide', $data);
			session()->setFlashdata('success', 'Data Berhasil di Simpan');
			return redirect()->back();
		// }
	}

	public function edit_data($id_slide = '')
	{
		$slide = $this->admin->getslide("where id='$id_slide' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Edit Slide',
			'id' => (isset($slide[0]['id'])) ? $slide[0]['id'] : "",
			'judul' => (isset($slide[0]['judul'])) ? $slide[0]['judul'] : "",
			'sub_judul' => (isset($slide[0]['sub_judul'])) ? $slide[0]['sub_judul'] : "",
		);
		return view('admin/slide/edit_data', $data);
	}

	public function actionedit()
	{
		$old_name	= $_FILES["gambar"]["name"];
		$ext 		= pathinfo($old_name, PATHINFO_EXTENSION);
		$new_name	= time().'.'.$ext;
		// $config = array(
		// 	'upload_path' 		=> './assets/admin/upload/slide/',
		// 	'allowed_types' 	=> 'jpg|png|jpeg',
		// 	'file_name'			=> $new_name,
		// 	'image_library'		=> 'gd2',
		// 	'source_image'		=> './assets/admin/upload/slide/'.$new_name,
		// 	'create_thumb'		=> true,
		// 	'maintain_ratio'	=> true,
		// 	'thumb_marker'     	=> '',	
		// );
		// $this->load->library('upload', $config);
		
		if (!$this->request->getPost('gambar')) 
		{
			$id_slide = $this->request->getPost('id');
			$data = array(
				'judul'  			=> $this->request->getPost('judul'),
				'sub_judul'  		=> $this->request->getPost('sub_judul'),
				'kategori'  		=> $this->request->getPost('kategori'),
			);
			$id = $this->db->where('id', $id_slide);
			$query = $this->db->get('tbl_slide');
			$row = $query->row();
			$this->global->UpdateData('tbl_slide', $data, array('id' => $id_slide));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
		}else{
			$dataBerkas = $this->request->getFile('gambar');
			$dataBerkas->move('assets/admin/upload/slide/', $new_name);

			// $upload_data   = array('uploads' => $this->upload->data());				  
			// $this->load->library('image_lib', $config);
			// $this->image_lib->resize();
			$id_slide = $this->request->getPost('id');
			$data = array(
				'judul'  			=> $this->request->getPost('judul'),
				'sub_judul'  		=> $this->request->getPost('sub_judul'),
				'kategori'  		=> $this->request->getPost('kategori'),
				'gambar'   			=> $new_name,
			);
			$id = $this->db->where('id', $id_slide);
			$query = $this->db->get('tbl_slide');
			$row = $query->row();
			unlink("./assets/admin/upload/slide/$row->gambar");
			$this->global->UpdateData('tbl_slide', $data, array('id' => $id_slide));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
		} 
	}

	public function actiondelete($id_slide)
	{
	    $id = $this->db->where('id', $id_slide);
	    $query = $this->db->get('tbl_slide');
	    $row = $query->row();
	    unlink("./assets/admin/upload/slide/$row->gambar");
	    $this->global->DeleteData('tbl_slide', array('id' => $id_slide));
		session()->setFlashdata('warning', 'Data Berhasil di Hapus');
		return redirect()->back();
	}
}







