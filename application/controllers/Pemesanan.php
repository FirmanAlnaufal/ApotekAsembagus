<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pemesanan_m','distributor_m','user_m','Obat_m']);
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->pemesanan_m->get();
		$this->template->load('template', 'transaksi/pemesanan_data', $data);

	}
	public function get_laporan()
	{
		$data['row'] = $this->pemesanan_m->get_detail();
		$this->template->load('template', 'laporan/pemesanan_data', $data);

	}

	// public function pemesanan_menipis() {
	// 	$data['row'] = $this->pemesanan_m->get_pemesanan_menipis();
	// 	$data['judul'] = 'pemesanan Menipis';
	// 	$this->template->load('template', 'pemesanan/pemesanan_menipis', $data);
	// }
	public function add()
	{
		$data['obat'] = $this->Obat_m->get_obat_menipis()->result();
		$data['pemesanan_last'] = $this->pemesanan_m->pemesanan_last();
		$data['distributor'] = $this->distributor_m->get();
		$this->template->load('template', 'transaksi/pemesanan_form', $data);
	}
	public function edit($id)
	{
		$query = $this->pemesanan_m->get($id);
		
		if($query->num_rows() > 0){
			$pemesanan = $query->row();
			$query_distributor = $this->pemesanan_m->get();
			$data = array(
			'page' => 'edit',
			'row'	=> $pemesanan,
			'distributor' => $query_distributor
		);
			$this->template->load('template', 'transaksi/pemesanan_form_edit', $data);
		}else{
			echo "<script>alert('data tidak ditemukan');";
		 echo "window.location='".site_url('pemesanan')."';
				</script>";
		}
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->pemesanan_m->add_pemesanan($post);
		}else if(isset($_POST['edit'])){
			$this->pemesanan_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}
		redirect('pemesanan');
		
	}
	public function tambah() {
		$this->pemesanan_m->add_pemesanan();
		if($this->db->affected_rows() > 0)
		{
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}
		redirect('pemesanan');
	}
	public function del($id)
	{
		$this->pemesanan_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		}
		redirect('pemesanan');
	}
	public function detail($id)
	{	
		$data['detail'] = $this->pemesanan_m->detail_data($id);
		$this->template->load('template', 'transaksi/pemesanan_detail', $data);
	}
}
