<?php
namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model 
{	
	public function getkategori($where = '')
	{
		$query = $this->db->query("select * from tbl_kategori $where;");
		return $query->getResultArray();
	}

	public function getberita($where = '')
	{
		$query = $this->db->query("select * from tbl_berita left join tbl_kategori ON tbl_berita.id_kategori=tbl_kategori.id	
		 $where;");
		 return $query->getResultArray();
	}

	public function gettag($where = '')
	{
		$query = $this->db->query("select * from tbl_tag $where;");
		 return $query->getResultArray();
	}

	public function getcontact($where = '')
	{
		$query = $this->db->query("select * from tbl_contact $where;");
		return $query->getResultArray();
	}

	public function getsocmed($where = '')
	{
		$query = $this->db->query("select * from tbl_socmed $where;");
		return $query->getResultArray();
	}

	public function getslide($where = '')
	{
		$query = $this->db->query("select * from tbl_slide $where;");
		return $query->getResultArray();
	}

	public function getbanner($where = '')
	{
		$query = $this->db->query("select * from tbl_banner $where;");
		return $query->getResultArray();
	}

	public function getpesan($where = '')
	{
		$query = $this->db->query("select * from tbl_pesan $where;");
		return $query->getResultArray();
	}

	public function gettentangkami($where = '')
	{
		$query = $this->db->query("select * from tbl_tentang_kami $where;");
		return $query->getResultArray();
	}

	public function getstrukturredaksi($where = '')
	{
		$query = $this->db->query("select * from tbl_struktur_redaksi $where;");
		return $query->getResultArray();
	}

	public function getprivacypolicy($where = '')
	{
		$query = $this->db->query("select * from tbl_privacy_policy $where;");
		return $query->getResultArray();
	}

	public function countkomentar($where = '')
	{
		$query = $this->db->query("select count(berita_id) as jumlah from tbl_komentar $where;");
		return $query->getResultArray();
	}

	public function countberita($where = '')
	{
		$query = $this->db->query("select count(id_berita) as jumlah from tbl_berita $where;");
		return $query->getResultArray();
	}

	public function countpesan($where = '')
	{
		$query = $this->db->query("select count(id) as jumlah from tbl_pesan $where;");
		return $query->getResultArray();
	}

	public function countusers($where = '')
	{
		$query = $this->db->query("select count(id) as jumlah from tbl_users $where;");
		return $query->getResultArray();
	}

	public function counthits($id)
	{
		$query = "UPDATE tbl_berita SET count_hits = count_hits + 1 WHERE id_berita = ".$id ;
      	$this->db->query($query);
	}

	public function getusers($where = '')
	{
		$query = $this->db->query("select * from tbl_users $where;");
		return $query->getResultArray();
	}

	public function getkomentar($where = '')
	{
		$query = $this->db->query("select * from tbl_komentar left join tbl_berita ON tbl_komentar.berita_id=tbl_berita.id_berita $where;");
		return $query->getResultArray();
	}

	public function getberitaslug($where = '')
	{
		$query = $this->db->query("select id_berita, judul from tbl_berita left join tbl_kategori ON tbl_berita.id_kategori=tbl_kategori.id	
		 $where;");
		 return $query->getResultArray();
	}

	public function getadmin($where = '')
	{
		$query = $this->db->query("select * from tbl_admin $where;");
		return $query->getResultArray();
	}

	public function getberitamore($where = '')
	{
		$query = $this->db->query("select id_berita, judul, slug, gambar, tanggal from tbl_berita left join tbl_kategori ON tbl_berita.id_kategori=tbl_kategori.id	
		 $where;");
		 return $query->getResultArray();
	}
}		