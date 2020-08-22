<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('pegawai_m');
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->pegawai_m->get();
		$this->template->load('template', 'pegawai/pegawai_data', $data);
	}
	public function add()
	{
		$pegawai = new stdClass();		
		$pegawai->id_pegawai = null;
		$pegawai->name = null;
		$pegawai->gender = null;
		$pegawai->phone = null;
		$pegawai->address = null;
		$data = array(
			'page' => 'add',
			'row'	=> $pegawai
		);
		$this->template->load('template', 'pegawai/pegawai_form', $data);
	}
	public function edit($id)
	{
		$query = $this->pegawai_m->get($id);
		if($query->num_rows() > 0){
			$pegawai = $query->row();
			$data = array(
			'page' => 'edit',
			'row'	=> $pegawai
		);
			$this->template->load('template', 'pegawai/pegawai_form', $data);
		}else{
			echo "<script>alert('data tidak ditemukan');";
		 echo "window.location='".site_url('pegawai')."';
				</script>";
		}
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->pegawai_m->add($post);
		}else if(isset($_POST['edit'])){
			$this->pegawai_m->edit($post);
		}
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}
		redirect('pegawai');
	}
	public function del($id)
	{
		$this->pegawai_m->del($id);
		if($this->db->affected_rows() > 0){
			$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		}
		redirect('pegawai');
	}
}
