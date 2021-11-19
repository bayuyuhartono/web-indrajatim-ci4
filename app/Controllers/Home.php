<?php

namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;

class Home extends BaseController
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
			'kategori' => $this->admin->getkategori(),
			'gambar' => (isset($slide[0]['gambar'])) ? $slide[0]['gambar'] : "",
			'list_infoterkini' => $this->admin->getberita("where kategori='Info Terkini' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
			'list_kabarjatim' => $this->admin->getberita("where kategori='Kabar Jatim' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
			'list_politik' => $this->admin->getberita("where kategori='Politik' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
			'list_budaya' => $this->admin->getberita("where kategori='Budaya' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
			'list_sejarah' => $this->admin->getberita("where kategori='Sejarah' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
			'list_hiburan' => $this->admin->getberita("where kategori='Hiburan' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
			'list_catatanakhirpekan' => $this->admin->getberita("where kategori='Catatan Akhir Pekan' AND tanggal <= NOW() order by tanggal DESC limit 8 "),
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
			'list_slide' => $this->admin->getberita("where tanggal <= NOW() AND slide='1' order by tanggal DESC limit 3 "),
			'kategori_name' => 'berita',
			'image_banneratas' => $this->admin->getbanner("where posisi='Atas' and status='1' "),
			'image_bannerkanan' => $this->admin->getbanner("where posisi='Kanan' and status='1' "),
			'image_bannerbawah' => $this->admin->getbanner("where posisi='Bawah' and status='1' "),
			'berita_hits' => $this->admin->getberita("where tanggal >= ADDDATE(NOW(), -14) AND tanggal < NOW() order by count_hits DESC LIMIT 4  "),
		);
		
		return view('template/dashboard', $data);
	} 
}
