<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expired extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('obat_m');
		// $this->load->library('form_validation');
	}
	public function index() {
		$data['row'] = $this->obat_m->get_obat_expired();
		$data['judul'] = 'Tangga Expired';
		$this->template->load('template', 'obat/expired', $data);
	}
}