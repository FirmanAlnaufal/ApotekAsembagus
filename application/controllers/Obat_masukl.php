<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_masukl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pemesanan_m','distributor_m','user_m','Obat_m','obat_masuk_m']);
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->obat_masuk_m->get_detail();
		$this->template->load('template', 'laporan/obat_masuk_data', $data);

	}
	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->obat_masuk_m->tampil_tgl();
		$data['tgl1'] = $this->input->post('tgl_a');
		$data['tgl2'] = $this->input->post('tgl_b');
		$this->dompdf_gen->generate('laporan/pdf_obat_masuk', $data);
		
	}
	public function pdff()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->obat_masuk_m->get_detail();
		$data['tgl1'] = $this->input->post('tgl_a');
		$data['tgl2'] = $this->input->post('tgl_b');
		$this->dompdf_gen->generate('laporan/pdf_obat_masuk', $data);
	}
	public function print()
	{
		$data['row'] = $this->obat_masuk_m->get_detail();
		$this->template->load('template', 'laporan/print_obat_masuk', $data);
		
	}
}
