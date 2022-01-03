<?php

namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;

class SitemapController extends BaseController {

	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index(){
		$post = $this->admin->getberita(" order by tanggal_diubah DESC ");
        $data = [];
		return $this->response->setXML(view('sitemap/sitemap', $data));
	}

	public function kategori($kategori){
		if ($kategori == 'infoterkini') {
			$kategori = 'info terkini';
		} else if ($kategori == 'catatanakhirpekan') {
			$kategori = 'catatan akhir pekan';
		} else if ($kategori == 'kabarjatim') {
			$kategori = 'kabar jatim';
		}
		$post = $this->admin->getberita("where kategori='".ucwords($kategori)."' order by tanggal DESC LIMIT 100 ");
        $data = [
            'post'   => $post,
        ];
		return $this->response->setXML(view('sitemap/page_sitemap', $data));
	}

	public function googlenews(){
		$post = $this->admin->getberita("where tanggal >= ADDDATE(NOW(), -10) AND tanggal < NOW() order by tanggal DESC ");
        $data = [
            'post'   => $post,
        ];
		return $this->response->setXML(view('sitemap/googlenews_sitemap', $data));
	}
}
?>