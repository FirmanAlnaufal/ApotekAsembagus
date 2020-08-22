<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_masuk_m extends CI_model
{
	public function get($id = null)
	{
		$this->db->from('obat_masuk');
		if ($id != null) {
			$this->db->where('id_obt_masuk', $id);
		}
		$this->db->join('user', 'user.id_user = obat_masuk.id_user');
		$query = $this->db->get();
		return $query;
	}
	public function get_detail($id = null)
	{
		$this->input->post('tgl_a');
		$this->input->post('tgl_b');
		$this->db->from('obat_masuk_item');
		if ($id != null) {
			$this->db->where('id_mitem', $id);
		}
		$this->db->join('obat_masuk', 'obat_masuk.id_obt_masuk = obat_masuk_item.id_obt_masuk');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = obat_masuk.id_pemesanan');
		$this->db->join('pemesanan_item', 'pemesanan_item.id_pemesanan = pemesanan.id_pemesanan');
		$this->db->join('obat', 'obat.id_obat = pemesanan_item.id_obat');
		$query = $this->db->get();
		return $query;
	}

	public function tampil_tgl()
	{
		$tgl1 = $this->input->post('tgl_a');
		$tgl2 = $this->input->post('tgl_b');
		$sql= "SELECT * FROM obat_masuk_item 
		join obat_masuk on obat_masuk.id_obt_masuk = obat_masuk_item.id_obt_masuk
		join pemesanan on pemesanan.id_pemesanan = obat_masuk.id_pemesanan 
		join pemesanan_item on pemesanan_item.id_pemesanan = pemesanan.id_pemesanan 
		join obat on obat.id_obat = pemesanan_item.id_obat 
		 WHERE obat_masuk.tgl_masuk BETWEEN '$tgl1' AND '$tgl2'";
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
		$this->db->select('pemesanan.id_pemesanan, obat.nama_obat, obat.satuan, pemesanan_item.jumlah');
		$this->db->from('obat_masuk_item');
		$this->db->join('obat_masuk', 'obat_masuk.id_obt_masuk = obat_masuk_item.id_obt_masuk');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = obat_masuk.id_pemesanan');
		$this->db->join('pemesanan_item', 'pemesanan_item.id_pemesanan = pemesanan.id_pemesanan');
		$this->db->join('obat', 'obat.id_obat = pemesanan_item.id_obat');
		$this->db->where('obat_masuk_item.id_obt_masuk', $id);
		$this->db->group_by('pemesanan_item.id_obat');
		$query = $this->db->get();
		return $query->result();
	}

	public function count_data()
	{
		$query = $this->db->get('obat_masuk');
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
		$this->db->order_by('id_obt_masuk', 'desc');
		$this->db->limit(1);
		return $this->db->get('obat_masuk');
	}
	public function update_obat()
	{
		$this->db->from('obat_masuk');
		$this->db->join('obat', 'obat.id_obat = obat_masuk.id_obat');
		$this->db->join('user', 'user.id_user = obat_masuk.id_user');
		$query = $this->db->get()->result();


		foreach ($query as $row) {
			$this->db->query('UPDATE obat SET stok = stok +' . ' WHERE id_obat = "' . '"');
		}
	}

	public function add_obat_masuk()
	{
		$obat_masuk1 = $this->input->post('p3');
		$obat_masuk2 = $this->input->post('p2');

		$obat_masuk = $obat_masuk1 . $obat_masuk2;

		$data = array(
			'id_obt_masuk' => $obat_masuk,
			'id_pemesanan' => $this->input->post('id_pemesanan'),
			'tgl_masuk' => $this->input->post('tanggal'),
			'id_user' => $this->session->userdata('id_user'),
		);
		$query = $this->db->insert('obat_masuk', $data);

		if ($query) {
			$this->db->join('obat', 'obat.id_obat = pemesanan_item.id_obat');
			$data1 = $this->db->get_where('pemesanan_item', array('id_pemesanan' => $this->input->post('id_pemesanan')));
			$result = $data1->result();

			foreach ($result as $results) {


				$jumlah = $results->jumlah;

				$data2 = array(
					'id_obt_masuk' => $obat_masuk
				);
				$query2 = $this->db->insert('obat_masuk_item', $data2);

				if ($query2) {
					$query3 = $this->db->query('UPDATE obat SET stok = stok +' . $jumlah . ' WHERE id_obat = "' . $results->id_obat . '"');
					if ($query3) {
						$params = array(
							'status' => 'datang',
						);
						$this->db->where('id_pemesanan', $this->input->post('id_pemesanan'));
						$this->db->update('pemesanan', $params);
					}
				}
			}
		}
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}

		redirect('obat_masuk');
	}
}
