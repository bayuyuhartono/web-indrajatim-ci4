<?php
namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;

class Privacypolicy extends BaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index()
	{
		$contact = $this->admin->getcontact("where id='1' ");
		$socmed = $this->admin->getsocmed("where id='1' ");
		$socmed_dua = $this->admin->getsocmed("where id='2' ");
		$socmed_tiga = $this->admin->getsocmed("where id='3' ");
		$socmed_empat = $this->admin->getsocmed("where id='4' ");
		$socmed_lima = $this->admin->getsocmed("where id='5' ");
		$data = array(
			'title' => 'INDRA JATIM',
			'subtitle' => 'INDRA JATIM',
			'no_telp' => (isset($contact[0]['no_telp'])) ? $contact[0]['no_telp'] : "",
			'email' => (isset($contact[0]['email'])) ? $contact[0]['email'] : "",
			'alamat' => (isset($contact[0]['alamat'])) ? $contact[0]['alamat'] : "",
			'socmed_satu' => (isset($socmed[0]['link'])) ? $socmed[0]['link'] : "",
			'socmed_dua' => (isset($socmed_dua[0]['link'])) ? $socmed_dua[0]['link'] : "",
			'socmed_tiga' => (isset($socmed_tiga[0]['link'])) ? $socmed_tiga[0]['link'] : "",
			'socmed_empat' => (isset($socmed_empat[0]['link'])) ? $socmed_empat[0]['link'] : "",
			'socmed_lima' => (isset($socmed_lima[0]['link'])) ? $socmed_lima[0]['link'] : "",
			'img_socmedsatu' => (isset($socmed[0]['gambar'])) ? $socmed[0]['gambar'] : "",
			'img_socmeddua' => (isset($socmed_dua[0]['gambar'])) ? $socmed_dua[0]['gambar'] : "",
			'img_socmedtiga' => (isset($socmed_tiga[0]['gambar'])) ? $socmed_tiga[0]['gambar'] : "",
			'img_socmedempat' => (isset($socmed_empat[0]['gambar'])) ? $socmed_empat[0]['gambar'] : "",
			'img_socmedlima' => (isset($socmed_lima[0]['gambar'])) ? $socmed_lima[0]['gambar'] : "",
			'list_privacypolicy' => $this->admin->getprivacypolicy(),
			'list_slide' => $this->admin->getslide("where kategori='12' ")
		);
		return view('privacy_policy', $data);
	}
}	



