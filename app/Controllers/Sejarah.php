<?php
namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;
class Sejarah extends BaseController 
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
			'list_sejarah' => $this->admin->getberita("where kategori='Sejarah' AND tanggal <= NOW() order by tanggal DESC limit 12 "),
			'list_slide' => $this->admin->getberita("where kategori='Sejarah' AND tanggal <= NOW() AND slide='1' order by tanggal DESC limit 3 "),
			'image_banneratas' => $this->admin->getbanner("where posisi='Atas' and status='1' "),
			'image_bannerkanan' => $this->admin->getbanner("where posisi='Kanan' and status='1' "),
			'image_bannerbawah' => $this->admin->getbanner("where posisi='Bawah' and status='1' "),
			'kategori_name' => 'sejarah',
		);
		return view('viewdata', $data);
	}

	public function detail($slug)
	{
		$contact = $this->admin->getcontact("where id='1' ");
		$socmed = $this->admin->getsocmed("where id='1' ");
		$socmed_dua = $this->admin->getsocmed("where id='2' ");
		$socmed_tiga = $this->admin->getsocmed("where id='3' ");
		$socmed_empat = $this->admin->getsocmed("where id='4' ");
		$socmed_lima = $this->admin->getsocmed("where id='5' ");
		$detail = $this->admin->getberita("where slug='$slug' "); if (count($detail) < 1) {
			return view('errors/html/error_404');
		}
		$id = $detail[0]['id_berita'];
		$countkomentar = $this->admin->countkomentar("where berita_id='$id' ");
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
			'id_berita' => (isset($detail[0]['id_berita'])) ? $detail[0]['id_berita'] : "",
			'judul_berita' => (isset($detail[0]['judul'])) ? $detail[0]['judul'] : "",
			'judul_gambar' => (isset($detail[0]['judul_gambar'])) ? $detail[0]['judul_gambar'] : "",
			'caption' => (isset($detail[0]['caption'])) ? $detail[0]['caption'] : "",
			'tag' => (isset($detail[0]['tag'])) ? $detail[0]['tag'] : "",
			'content' => (isset($detail[0]['content'])) ? $detail[0]['content'] : "",
			'gambar_berita' => (isset($detail[0]['gambar'])) ? $detail[0]['gambar'] : "",
			'tanggal' => (isset($detail[0]['tanggal'])) ? $detail[0]['tanggal'] : "",
			'kategori' => (isset($detail[0]['kategori'])) ? $detail[0]['kategori'] : "",
			'countkomentar' => (isset($countkomentar[0]['jumlah'])) ? $countkomentar[0]['jumlah'] : "",
			'list_komentar' => $this->admin->getkomentar("where berita_id='$id' and status='1' "),
			'nama' => session('nama'),
			'emails' => session('email'),
			'list_slide' => $this->admin->getberita("where kategori='Sejarah' AND tanggal <= NOW() AND slide='1' order by tanggal DESC limit 3 "),
			'kategori_name' => 'sejarah',
			'image_banneratas' => $this->admin->getbanner("where posisi='Atas' and status='1' "),
			'image_bannerkanan' => $this->admin->getbanner("where posisi='Kanan' and status='1' "),
			'image_bannerbawah' => $this->admin->getbanner("where posisi='Bawah' and status='1' "),
			'berita_hits' => $this->admin->getberita("where tanggal >= ADDDATE(NOW(), -14) AND tanggal < NOW() order by count_hits DESC LIMIT 4  "), 
		);
		$this->admin->counthits($id);
		return view('detail_sejarah', $data);
	}

	public function komentar()
	{
		$id_berita = $this->request->getPost('id_berita');
		$nama = $this->request->getPost('nama');
		$email = $this->request->getPost('email');
		$komentar = $this->request->getPost('komentar');
		$data = array(
			'berita_id' => $id_berita,
			'nama' => $nama,
			'email' => $email,
			'komentar' => $komentar,
		);
		$this->global->InsertData('tbl_komentar',$data);
	}
}	



