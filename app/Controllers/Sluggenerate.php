<?php
namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;
class Sluggenerate extends BaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function index()
	{
		$databerita = $this->admin->getberitaslug("order by id_berita DESC ");
		foreach ($databerita as $key => $value) {
			$dataslug = $this->slugify($value['judul'],'-');
			$databerita[$key]['slug'] = $dataslug;
			$data = array(
				'slug' => $dataslug,
			);
	
			$this->global->UpdateData('tbl_berita', $data, array('id_berita' => $value['id_berita']));
		}
		echo json_encode($databerita);
		return;
	}

	public function slugify($text, $divider)
	{
		// replace non letter or digits by divider
		$text = preg_replace('~[^\pL\d]+~u', $divider, $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, $divider);

		// remove duplicate divider
		$text = preg_replace('~-+~', $divider, $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}
}	



