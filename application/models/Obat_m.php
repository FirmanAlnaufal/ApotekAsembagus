<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_m extends CI_model {

	//start datatables
    // var $column_order = array('id_obat', 'nama_obat', 'stok', 'min_stok', 'kapasitas', 'satuan', 'harga_jual', 'harga_beli', 'tgl_kadaluarsa'); //set column field database for datatable orderable
    // var $column_search = array('nama_obat', 'tgl_kadaluarsa', 'min_stok'); //set column field database for datatable searchable
    // var $order = array('id_obat' => 'asc'); // default order
 
    // private function _get_datatables_query() {
    //     $this->db->from('obat');
    //     $i = 0;
    //     foreach ($this->column_search as $item) { // loop column
    //         if(@$_POST['search']['value']) { // if datatable send POST for search
    //             if($i===0) { // first loop
    //                 $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
    //                 $this->db->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->db->or_like($item, $_POST['search']['value']);
    //             }
    //             if(count($this->column_search) - 1 == $i) //last loop
    //                 $this->db->group_end(); //close bracket
    //         }
    //         $i++;
    //     }
         
    //     if(isset($_POST['order'])) { // here order processing
    //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     }  else if(isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }
    // function get_datatables() {
    //     $this->_get_datatables_query();
    //     if(@$_POST['length'] != -1)
    //     $this->db->limit(@$_POST['length'], @$_POST['start']);
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    // function count_filtered() {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }
    // function count_all() {
    //     $this->db->from('obat');
    //     return $this->db->count_all_results();
    // }
    //end datatables
	public function get($id = null)
	{
		$this->db->from('obat');
		if($id != null)
		{
			$this->db->where('id_obat', $id);
		}
		$query = $this->db->get();
		return $query;
	}

	public function get_obat_menipis() {
		return $this->db->query('SELECT * FROM obat WHERE stok <= min_stok + selisih');
	}
	public function get_obat_expired() {
		return $this->db->query("SELECT * FROM obat WHERE tgl_kadaluarsa <= CURDATE()");
	}
	public function count_data()
	{
		$query = $this->db->get('obat');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}else
		{
			return 0;
		}
		
	}
	public function get_tersedia() {
		return $this->db->query("SELECT * FROM obat WHERE stok >= min_stok");
	}
	public function add($post)
	{
		$params = [
			'id_obat' => $post['id'],
			'nama_obat' => $post['nama_obat'],
			'min_stok' => $post['min_stok'],
			'selisih' => $post['selisih'],
			'kapasitas' => $post['kapasitas'],
			'satuan' => $post['satuan'],
			'harga_jual' => $post['harga_jual'],
			'harga_beli' => $post['harga_beli'],
			'tgl_kadaluarsa' => $post['tgl_kadaluarsa'],
			
		];
		$this->db->insert('obat', $params);
	}
	public function edit($post)
	{
		$params = [
			'id_obat' => $post['id'],
			'nama_obat' => $post['nama_obat'],
			'min_stok' => $post['min_stok'],
			'selisih' => $post['selisih'],
			'kapasitas' => $post['kapasitas'],
			'satuan' => $post['satuan'],
			'harga_jual' => $post['harga_jual'],
			'harga_beli' => $post['harga_beli'],
			'tgl_kadaluarsa' => $post['tgl_kadaluarsa'],
			'updated' => date('Y-m-d H:i:s')
		];
		$this->db->where('id_obat', $post['id']);
		$this->db->update('obat', $params);
	}
	public function del($id)
	{
		$this->db->where('id_obat', $id);
		$this->db->delete('obat');
	}
	public function get_detail($id = null)
	{
		$query = $this->db->get_where('obat', array('id_obat' => $id))->row();
		return $query;
	}
	public function add_obat_masuk()
	{
		
	}
}
	