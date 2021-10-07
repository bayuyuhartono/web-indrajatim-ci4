<?php

namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;

class Banner extends AdminBaseController 
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
			'subtitle' => 'Banner',
			'list_banner' => $this->admin->getbanner()
		);
		return view('admin/banner/index', $data);
	}

	public function edit_data($id_banner = '')
	{
		$banner = $this->admin->getbanner("where id='$id_banner' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Edit Banner',
			'id' => (isset($banner[0]['id'])) ? $banner[0]['id'] : "",
			'judul' => (isset($banner[0]['judul'])) ? $banner[0]['judul'] : "",
		);
		return view('admin/banner/edit_data', $data);
	}

	public function actionedit()
	{
		$old_name	= $_FILES["gambar"]["name"];
		$ext 		= pathinfo($old_name, PATHINFO_EXTENSION);
		$new_name	= time().'.'.$ext;
		// $config = array(
		// 	'upload_path' 		=> './assets/admin/upload/banner/',
		// 	'allowed_types' 	=> 'jpg|png|jpeg',
		// 	'file_name'			=> $new_name,
		// 	'image_library'		=> 'gd2',
		// 	'source_image'		=> './assets/admin/upload/banner/'.$new_name,
		// 	'create_thumb'		=> true,
		// 	'maintain_ratio'	=> true,
		// 	'thumb_marker'     	=> '',	
		// );
		// $this->load->library('upload', $config);

		if (!$_FILES["gambar"]["name"])
		{
			$id_banner = $this->request->getPost('id');
			$data = array(
				'judul'  			=> $this->request->getPost('judul'),
				'status'  			=> $this->request->getPost('status'),
			);
			// $id = $this->db->where('id', $id_banner);
			// $query = $this->db->get('tbl_banner');
			// $row = $query->row();
			$this->global->UpdateData('tbl_banner', $data, array('id' => $id_banner));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
		}else{
			$dataBerkas = $this->request->getFile('gambar');
			$dataBerkas->move('assets/admin/upload/banner/', $new_name);

			// $upload_data   = array('uploads' => $this->upload->data());				  
			// $this->load->library('image_lib', $config);
			// $this->image_lib->resize();
			$id_banner = $this->request->getPost('id');
			$data = array(
				'judul'  			=> $this->request->getPost('judul'),
				'status'  			=> $this->request->getPost('status'),
				'gambar'   			=> $new_name,
			);
			// $id = $this->db->where('id', $id_banner);
			// $query = $this->db->get('tbl_banner');
			// $row = $query->row();
			// unlink("./assets/admin/upload/banner/$row->gambar");
			$this->global->UpdateData('tbl_banner', $data, array('id' => $id_banner));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
		} 
	}
}







