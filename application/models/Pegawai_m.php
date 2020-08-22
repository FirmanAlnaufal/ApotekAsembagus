<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_m extends CI_model {
	public function get($id = null)
	{
		$this->db->from('pegawai');
		if($id != null)
		{
			$this->db->where('id_pegawai', $id);
		}
		$query = $this->db->get();
		return $query;
	}
	public function add($post)
	{
		$params = [
			'name' => $post['pegawai_name'],
			'gender' => $post['gender'],
			'phone' => $post['phone'],
			'address' => $post['address'],
		
		];
		$this->db->insert('pegawai', $params);
	}
	public function edit($post)
	{
		$params = [
			'name' => $post['pegawai_name'],
			'gender' => $post['gender'],
			'phone' => $post['phone'],
			'address' => $post['address'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('id_pegawai', $post['id']);
		$this->db->update('pegawai', $params);
	}
	public function del($id)
	{
		$this->db->where('id_pegawai', $id);
		$this->db->delete('pegawai');
	}
}
	