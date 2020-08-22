<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_model {
	public function get($id = null)
	{
		$this->db->from('customer');
		if($id != null)
		{
			$this->db->where('id_customer', $id);
		}
		$query = $this->db->get();
		return $query;
    }
    public function get_harga() {
		return $this->db->query('SELECT * FROM customer WHERE harga - potongan');
	}
	public function add($post)
	{
		$params = [
			'nama_c' => $post['cus_name'],
			'telephone' => $post['phone'],
			'jarak' => $post['jarak'],
			'potongan' => $post['potongan'],
			'harga' => $post['harga'],
			
		];
		$this->db->insert('customer', $params);
	}
	public function edit($post)
	{
		$params = [
			'nama_c' => $post['cus_name'],
			'telephone' => $post['phone'],
			'jarak' => $post['jarak'],
			'potongan' => $post['potongan'],
			'harga' => $post['harga'],
		];
		$this->db->where('id_customer', $post['id']);
		$this->db->update('customer', $params);
	}
	public function del($id)
	{
		$this->db->where('id_customer', $id);
		$this->db->delete('customer');
	}
}
	