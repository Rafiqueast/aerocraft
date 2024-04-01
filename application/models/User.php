<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
	
		
	public function userList($tab)
	{
		$this->db->select("*");
		$this->db->from($tab);
		$qry=$this->db->get();
		return $qry->result_array();
	}
	public function insertdata($tab,$data)
	{
		$fire=$this->db->insert($tab,$data);
		return true;

	}
	public function edit($tab,$where)
	{
		$this->db->select('*');
		$this->db->from($tab);
		$this->db->where($where);
		$qry=$this->db->get();
		return $qry->row_array();
	}
	public function updateUser($tab,$data,$condi)
	{
		$this->db->where($condi);
    	$this->db->update($tab,$data);
    	return true;
	}
	public function del($tab,$where)
	{
		$this->db->where($where);
		$this->db->delete($tab);
		return true;
	}


}
    