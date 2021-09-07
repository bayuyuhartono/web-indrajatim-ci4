<?php
namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;
class Socmed extends AdminBaseController 
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
			'subtitle' => 'socmed',
			'list_contact' => $this->admin->getsocmed()
		);
		return view('admin/socmed/index', $data);
	}

	public function edit_data($id='')
	{
		$socmed = $this->admin->getsocmed("where id='$id' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Edit socmed',
			'id' => (isset($socmed[0]['id'])) ? $socmed[0]['id'] : "",
			'link' => (isset($socmed[0]['link'])) ? $socmed[0]['link'] : "",
		);
		return view('admin/socmed/edit_data', $data);
	}

	public function actionedit()
	{
		$old_name	= $_FILES["gambar"]["name"];
		$ext 		= pathinfo($old_name, PATHINFO_EXTENSION);
		$new_name	= time().'.'.$ext;
		// $config = array(
		// 	'upload_path' 		=> './assets/admin/upload/socmed/',
		// 	'allowed_types' 	=> 'jpg|png|jpeg',
		// 	'file_name'			=> $new_name,
		// 	'image_library'		=> 'gd2',
		// 	'source_image'		=> './assets/admin/upload/socmed/'.$new_name,
		// 	'create_thumb'		=> true,
		// 	'maintain_ratio'	=> true,
		// 	'thumb_marker'     	=> '',	
		// );
		// $this->load->library('upload', $config);

		if (!$this->request->getPost('gambar')) 
		{
			$id_socmed = $this->request->getPost('id');
			$data = array(
				'link'  			=> $this->request->getPost('link'),
			);
			$id = $this->db->where('id', $id_socmed);
			$query = $this->db->get('tbl_socmed');
			$row = $query->row();
			$this->global->UpdateData('tbl_socmed', $data, array('id' => $id_socmed));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
		}else{
			$dataBerkas = $this->request->getFile('gambar');
			$dataBerkas->move('assets/admin/upload/socmed/', $new_name);

			// $upload_data   = array('uploads' => $this->upload->data());				  
			// $this->load->library('image_lib', $config);
			// $this->image_lib->resize();
			$id_socmed = $this->request->getPost('id');
			$data = array(
				'link'  			=> $this->request->getPost('link'),
				'gambar'   			=> $new_name,
			);
			$id = $this->db->where('id', $id_socmed);
			$query = $this->db->get('tbl_socmed');
			$row = $query->row();
			unlink("./assets/admin/upload/socmed/$row->gambar");
			$this->global->UpdateData('tbl_socmed', $data, array('id' => $id_socmed));
			session()->setFlashdata('success', 'Data Berhasil di Edit');
			return redirect()->back();
		} 

	}
}


