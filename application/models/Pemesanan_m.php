<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan_m extends CI_model
{
	public function get($id = null)
	{
		$this->db->from('pemesanan');
		if ($id != null) {
			$this->db->where('id_pemesanan', $id);
		}
		$this->db->join('distributor', 'distributor.id_distributor = pemesanan.id_distributor');
		$this->db->join('user', 'user.id_user = pemesanan.id_user');
		$query = $this->db->get();
		return $query;
	}

	public function get_detail($id = null)
	{

		$this->input->post('tgl_a');
		$this->input->post('tgl_b');
		$this->db->from('pemesanan_item');
		$this->db->join('obat', 'obat.id_obat = pemesanan_item.id_obat');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = pemesanan_item.id_pemesanan');
		$this->db->order_by('pemesanan.id_pemesanan', 'asc');
		if ($id != null) {
			$this->db->where('id_pitem', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function tampil_tgl()
	{
		$tgl1 = $this->input->post('tgl_a');
		$tgl2 = $this->input->post('tgl_b');
		$sql= "SELECT * FROM pemesanan_item 
		join obat on obat.id_obat = pemesanan_item.id_obat 
		join pemesanan on pemesanan.id_pemesanan = pemesanan_item.id_pemesanan
		 WHERE pemesanan.tanggal BETWEEN '$tgl1' AND '$tgl2'";
		$query = $this->db->query($sql);
		return $query;
	}

	public function get_pemesanan_menipis()
	{
		return $this->db->query('SELECT * FROM pemesanan WHERE stok <= min_stok + 10');
	}
	public function edit($post)
	{
		$params = [
			'id_pemesanan' => $post['id'],
			'id_distributor' => $post['distributor'],
			'tanggal' => $post['tanggal'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('id_pemesanan', $post['id']);
		$this->db->update('pemesanan', $params);
	}
	public function detail_data($id)
	{
		$this->db->join('obat', 'obat.id_obat = pemesanan_item.id_obat');
		$query = $this->db->get_where('pemesanan_item', array('id_pemesanan' => $id));
		return $query->result();
	}

	public function count_data()
	{
		$query = $this->db->get('pemesanan');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}else
		{
			return 0;
		}
		
	}

	public function del($id)
	{
		$this->db->where('id_pemesanan', $id);
		$this->db->delete('pemesanan');
	}
	public function pemesanan_last()
	{
		$this->db->order_by('id_pemesanan', 'desc');
		$this->db->limit(1);
		return $this->db->get('pemesanan');
	}
	public function get_belum()
	{
		$this->db->join('distributor', 'distributor.id_distributor = pemesanan.id_distributor');
		return $this->db->get_where('pemesanan', array('status'=>'belum'));

	}
	
	public function add_pemesanan()
	{
		$pemesanan1 = $this->input->post('p3');
		$pemesanan2 = $this->input->post('p2');

		$pemesanan = $pemesanan1 . $pemesanan2;

		$data = array(
			'id_pemesanan' => $pemesanan,
			'tanggal' => $this->input->post('tanggal'),
			'invoice' => $this->input->post('invoice'),
			'id_distributor' => $this->input->post('id_distributor'),
			'id_user' => $this->session->userdata('id_user'),
			'status' => 'belum'
		);
		$query = $this->db->insert('pemesanan', $data);
		

		if ($query) {
			$data = $this->db->query("SELECT * FROM obat WHERE stok <= min_stok + 10 ");
			$result = $data->result();

			foreach ($result as $results) {
				$jumlah = $this->input->post('jumlah_' . $results->id_obat);
				if ($this->input->post('checked_' . $results->id_obat) && $this->input->post('jumlah_' . $results->id_obat) > 0) {
					$data2 = array(
						'id_pemesanan' => $pemesanan,
						'id_obat' => $results->id_obat,
						'jumlah' => $this->input->post('jumlah_' . $results->id_obat),
					);
					$query2 = $this->db->insert('pemesanan_item', $data2);

					// if ($query2) {
					// 	$this->db->query('UPDATE obat SET stok = stok +' . $jumlah . ' WHERE id_obat = "' . $results->id_obat . '"');
					// }
				}
			}
		}
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}

		redirect('pemesanan');
	}
}
