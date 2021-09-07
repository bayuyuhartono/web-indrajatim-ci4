<?php
namespace App\Controllers\Admin;

use App\Models\m_admin;
use App\Models\m_global;

class Kategori extends AdminBaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
	}

	public function index()
	{
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'Kategori',
			'list_kategori' => $this->admin->getkategori()
		);
		return view('admin/kategori/index', $data);
	}
}


