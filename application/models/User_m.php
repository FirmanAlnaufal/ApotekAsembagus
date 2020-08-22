<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_model {
	public function login($post)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username', $post['username']);
		$this->db->where('password', sha1($post['password']));
		$query = $this->db->get();
		return $query;
	}
	public function get($id = null)
	{
		$this->db->from('user');
		if($id != null)
		{
			$this->db->where('id_user', $id);
		}
		$this->db->join('pegawai', 'pegawai.id_pegawai = user.id_pegawai');
		// $this->db->order_by('id_user', 'asc');
		$query = $this->db->get();
		return $query;
	}
	public function add($post)
	{
		$params ['id_pegawai'] = $post['fullname'];
		$params ['username'] = $post['username'];
		$params ['password'] = sha1($post['password']);
		$params ['level'] = $post['level'];
		$params ['image'] = $post['image'];
		$this->db->insert('user', $params);
	}
	public function edit($post)
	{
		$params ['username'] = $post['username'];
		if(!empty($post['password'])){
			$params ['password'] = sha1($post['password']);
		}
		$params ['level'] = $post['level'];
		if($post['image'] != null) {
		$params ['image'] = $post['image'];
		}
		$this->db->where('id_user', $post['id_user']);
		$this->db->update('user', $params);
	}
	public function del($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

}