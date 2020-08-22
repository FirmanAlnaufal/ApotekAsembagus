<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obatl extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['pemesanan_m','distributor_m','user_m','obat_m','obat_masuk_m']);
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->obat_m->get();
		$this->template->load('template', 'laporan/obat_data', $data);

	}
	public function pdf()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->obat_m->tampil_tgl();
		$this->dompdf_gen->generate('laporan/pdf_obat', $data);
		
	}
	public function pdff()
	{
		$this->load->library('dompdf_gen');
		$data['row'] = $this->obat_m->get();
		$this->dompdf_gen->generate('laporan/pdf_obat', $data,'laporan-obat', 'A4', 'landscape');
	}
	public function print()
	{
		$data['row'] = $this->obat_m->get();
		$this->template->load('template', 'laporan/print_obat', $data);
		
	}
}
