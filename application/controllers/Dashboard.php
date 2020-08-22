<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['obat_m','pemesanan_m','obat_masuk_m','obat_keluar_m']);
		// $this->load->library('form_validation');
	}

	public function index()
	{
		$query=$this->pemesanan_m->count_data();
		$query1= $this->obat_m->count_data();
		$query2= $this->obat_masuk_m->count_data();
		$query3= $this->obat_keluar_m->count_data();

	
			$data = array(

				'pemesanan' => $query,
				'obat' => $query1,
				'obatm' => $query2,
				'obatk' => $query3,
			);
		$this->template->load('template', 'dashboard', $data);
		}
	

}
