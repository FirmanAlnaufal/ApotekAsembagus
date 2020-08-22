<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_keluarl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pemesanan_m','distributor_m','user_m','obat_m','obat_masuk_m','obat_keluar_m']);
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->obat_keluar_m->get_detail();
		$this->template->load('template', 'laporan/obat_keluar_data', $data);

	}
	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->obat_keluar_m->tampil_tgl();
		$data['tgl1'] = $this->input->post('tgl_a');
		$data['tgl2'] = $this->input->post('tgl_b');
		$this->dompdf_gen->generate('laporan/pdf_obat_keluar', $data);
		
	}
	public function pdff()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->obat_keluar_m->get_detail();
		$data['tgl1'] = $this->input->post('tgl_a');
		$data['tgl2'] = $this->input->post('tgl_b');
		$this->dompdf_gen->generate('laporan/pdf_obat_keluar', $data);
	}
	public function print()
	{
		$data['row'] = $this->obat_keluar_m->get_detail();
		$this->template->load('template', 'laporan/print_obat_keluar', $data);
		
	}
}
