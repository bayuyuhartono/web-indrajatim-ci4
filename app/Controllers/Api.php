<?php
namespace App\Controllers;

use App\Models\m_admin;
use App\Models\m_global;
class Api extends BaseController 
{
	public function __Construct()
    {
         
        $this->admin = new m_admin();
        $this->global = new m_global();
	}

	public function getMoreData($kategori, $offset, $view)
	{
		$where = '';
        $offset = intval($offset);
        $dataCount = $this->admin->getberita("");
		if ($kategori != '0') {
            $id_kategori = $this->admin->getkategori("where kategori = '$kategori'");
			$where .= 'AND id_kategori = '.$id_kategori[0]['id'];
		}
		$getDataBerita = $this->admin->getberitamore("where tanggal <= NOW() $where order by tanggal DESC limit 12 OFFSET $offset ");

        if (count($getDataBerita) > 0) {
            $result = [];
            $result['kategori_name'] = strtolower($kategori);
            $result['datalist'] = $getDataBerita;
            if (count($dataCount) <= $offset) {
                $result['next'] = 0;
            } else {
                $result['next'] = $offset + count($getDataBerita);
            }
            if ($view == 'grid') {
                $result['html'] = view('grid_view', $result);
            } else if ($view = 'list') {
                $result['html'] = view('list_view', $result);
            }

            $res = $result['html'];
        } else {
            $res = 'empty';
        }
        
        return $res;
	}

    public function getMoreDataPencarian($offset, $view, $searchvalue)
	{
		$where = '';
        $offset = intval($offset);
        $dataCount = $this->admin->getberita("");
        $where .= "AND judul LIKE '%".$searchvalue."%' ";
		$getDataBerita = $this->admin->getberitamore("where 1 = 1 $where order by tanggal DESC limit 12 OFFSET $offset ");

        if (count($getDataBerita) > 0) {
            $result = [];
            $result['kategori_name'] = 'berita';
            $result['datalist'] = $getDataBerita;
            if (count($dataCount) <= $offset) {
                $result['next'] = 0;
            } else {
                $result['next'] = $offset + count($getDataBerita);
            }
            if ($view == 'grid') {
                $result['html'] = view('grid_view', $result);
            } else if ($view = 'list') {
                $result['html'] = view('list_view', $result);
            }

            $res = $result['html'];
        } else {
            $res = 'empty';
        }
        
        return $res;
	}
}	



