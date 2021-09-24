<?php

namespace App\Models;

use CodeIgniter\Model;

class m_global extends Model 
{
	public function InsertData($table_name,$data)
	{
		$exec = $this->db->table($table_name)->insert($data);
		return $exec;
	}

	public function UpdateData($table_name,$data,$where)
	{
		$exec = $this->db->table($table_name)->update($data,$where);
		return $exec;
	}

	public function DeleteData($table_name,$where)
	{
		$exec = $this->db->table($table_name)->delete($where);
		return $exec;
	}
}



