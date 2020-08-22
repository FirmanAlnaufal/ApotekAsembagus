<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor_m extends CI_model {
	public function get($id = null)
	{
		$this->db->from('distributor');
		if($id != null)
		{
			$this->db->where('id_distributor', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post)
	{
		$params = [
			'nama_distributor' => $post['dist_name'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'description' => empty($post['desc']) ? null : $post['desc'],
		];
		$this->db->insert('distributor', $params);
	}
	public function edit($post)
	{
		$params = [
			'nama_distributor' => $post['dist_name'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'description' => empty($post['desc']) ? null : $post['desc'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('id_distributor', $post['id']);
		$this->db->update('distributor', $params);
	}
	public function del($id)
	{
		$this->db->where('id_distributor', $id);
		$this->db->delete('distributor');
	}
}
	