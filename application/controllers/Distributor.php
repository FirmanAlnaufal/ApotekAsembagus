<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('distributor_m');
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->distributor_m->get();
		$this->template->load('template', 'distributor/distributor_data', $data);
	}
	public function add()
	{
		$dist = new stdClass();
		$dist->id_distributor = null;
		$dist->nama_distributor = null;
		$dist->phone = null;
		$dist->address = null;
		$dist->description = null;
		$data = array(
			'page' => 'add',
			'row'	=> $dist
		);
		$this->template->load('template', 'distributor/distributor_form', $data);
	}
	public function edit($id)
	{
		$query = $this->distributor_m->get($id);
		if($query->num_rows() > 0){
			$dist = $query->row();
			$data = array(
			'page' => 'edit',
			'row'	=> $dist
		);
			$this->template->load('template', 'distributor/distributor_form', $data);
		}else{
			echo "<script>alert('data tidak ditemukan');";
		 echo "window.location='".site_url('distributor')."';
				</script>";
		}
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->distributor_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->distributor_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}
		redirect('distributor');
		
	}
	public function del($id)
	{
		$this->distributor_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		}
		redirect('distributor');
	}
	
	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->distributor_m->get();
		$this->dompdf_gen->generate('distributor/print_distributor', $data);
	}
	public function print()
	{
		$data['row'] = $this->distributor_m->get();
		$this->template->load('template', 'distributor/print_distributor', $data);
		
	}
}
