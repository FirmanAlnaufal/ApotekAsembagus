<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_keluar_m extends CI_model
{
	public function get($id = null)
	{
		$this->db->from('obat_keluar');
		if ($id != null) {
			$this->db->where('id_obt_keluar', $id);
		}
		$this->db->join('user', 'user.id_user = obat_keluar.id_user');
		$query = $this->db->get();
		return $query;
	}

	public function get_detail($id = null)
	{
		$this->input->post('tgl_a');
		$this->input->post('tgl_b');
		$this->db->from('obat_keluar_item');
		if ($id != null) {
			$this->db->where('id_kitem', $id);
		}
		$this->db->join('obat_keluar', 'obat_keluar.id_obt_keluar = obat_keluar_item.id_obt_keluar');
		$this->db->join('obat', 'obat.id_obat = obat_keluar_item.id_obat');
		$query = $this->db->get();
		return $query;
	}

	public function tampil_tgl()
	{
		$tgl1 = $this->input->post('tgl_a');
		$tgl2 = $this->input->post('tgl_b');
		$sql= "SELECT * FROM obat_keluar_item 
		join obat_keluar on obat_keluar.id_obt_keluar = obat_keluar_item.id_obt_keluar 
		join obat on obat.id_obat = obat_keluar_item.id_obat
		 WHERE obat_keluar.tgl_keluar BETWEEN '$tgl1' AND '$tgl2'";
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
		$this->db->join('obat_keluar', 'obat_keluar.id_obt_keluar = obat_keluar_item.id_obt_keluar');
		$this->db->join('obat', 'obat.id_obat = obat_keluar_item.id_obat');
		$query = $this->db->get_where('obat_keluar_item', array('obat_keluar_item.id_obt_keluar' => $id));
		return $query->result();
	}

	public function count_data()
	{
		$query = $this->db->get('obat_keluar');
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
		$this->db->where('id_obt_masuk', $id);
		$this->db->delete('obat_masuk');
	}
	public function pemesanan_last()
	{
		$this->db->order_by('id_obt_keluar', 'desc');
		$this->db->limit(1);
		return $this->db->get('obat_keluar');
	}
	public function add_pemesanan()
	{
		$pemesanan1 = $this->input->post('p3');
		$pemesanan2 = $this->input->post('p2');

		$pemesanan = $pemesanan1 . $pemesanan2;

		$data = array(
			'id_obt_keluar' => $pemesanan,
			'tgl_keluar' => $this->input->post('tanggal'),
			'id_user' => $this->session->userdata('id_user'),
		);
		$query = $this->db->insert('obat_keluar', $data);

		if ($query) {
			$data = $this->db->query("SELECT * FROM obat WHERE stok > min_stok ");
			$result = $data->result();

			foreach ($result as $results) {
				$jumlah = $this->input->post('jumlah_' . $results->id_obat);
				if ($this->input->post('checked_' . $results->id_obat) && $this->input->post('jumlah_' . $results->id_obat) > 0) {
					$data2 = array(
						'id_obt_keluar' => $pemesanan,
						'id_obat' => $results->id_obat,
						'jumlah' => $this->input->post('jumlah_' . $results->id_obat),
					);
					$query2 = $this->db->insert('obat_keluar_item', $data2);

					if ($query2) {
						$this->db->query('UPDATE obat SET stok = stok -' . $jumlah . ' WHERE id_obat = "' . $results->id_obat . '"');
					}
				}
			}
		}
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}

		redirect('obat_keluar');
	}
	
}
