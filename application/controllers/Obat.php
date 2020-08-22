<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('obat_m');
		// $this->load->library('form_validation');
	}

	// function get_ajax()
	// {
	// 	$list = $this->obat_m->get_datatables();
	// 	$data = array();
	// 	$no = @$_POST['start'];
	// 	foreach ($list as $obat) {
	// 		$no++;
	// 		$row = array();
	// 		$row[] = $no . ".";
	// 		$row[] = $obat->id_obat;
	// 		$row[] = $obat->nama_obat;
	// 		$row[] = $obat->stok;
	// 		$row[] = $obat->min_stok;
	// 		$row[] = $obat->kapasitas;
	// 		$row[] = $obat->satuan;
	// 		// $row[] = indo_currency($obat->harga_jual);
	// 		// $row[] = indo_currency($obat->harga_beli);
	// 		// $row[] = $obat->tgl_kadaluarsa;
	// 		// add html for action
	// 		$row[] = '<a href="' . site_url('obat/detail/' . $obat->id_obat) . '" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-item"><i class="fa fa-search-plus"></i></a>
	// 		<a href="' . site_url('obat/edit/' . $obat->id_obat) . '" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
    //                <a href="' . site_url('obat/del/' . $obat->id_obat) . '" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
	// 		$data[] = $row;
	// 	}
	// 	$output = array(
	// 		"draw" => @$_POST['draw'],
	// 		"recordsTotal" => $this->obat_m->count_all(),
	// 		"recordsFiltered" => $this->obat_m->count_filtered(),
	// 		"data" => $data,
	// 	);
	// 	// output to json format
	// 	echo json_encode($output);
	// }

	public function index()
	{
		$data['row'] = $this->obat_m->get();

		$this->template->load('template', 'obat/obat_data', $data);
	}
	public function count()
	{
		$data['total_asset'] = $this->obat_m->count_data();
		$this->template->load('template', 'obat/obat_data', $data);
	}
	// public function obat_menipis() {
	// 	$data['row'] = $this->obat_m->get_obat_menipis();
	// 	$data['judul'] = 'Obat Menipis';
	// 	$this->template->load('template', 'obat/obat_menipis', $data);
	// }
	public function add()
	{
		$obat = new stdClass();
		$obat->id_obat = getAutoNumber('obat', 'id_obat', 'B', 5);
		$obat->nama_obat = null;
		$obat->min_stok = null;
		$obat->selisih = null;
		$obat->kapasitas = null;
		$obat->satuan = null;
		$obat->harga_jual = null;
		$obat->harga_beli = null;
		$obat->tgl_kadaluarsa = null;
		$data = array(
			// 'id_obat' => getAutoNumber('obat', 'id_obat', 'B', 5),
			'page' => 'add',
			'row'	=> $obat
		);
		$this->template->load('template', 'obat/obat_form', $data);
	}
	public function edit($id)
	{
		$query = $this->obat_m->get($id);
		if ($query->num_rows() > 0) {
			$obat = $query->row();
			$data = array(
				'page' => 'edit',
				'row'	=> $obat
			);
			$this->template->load('template', 'obat/obat_form', $data);
		} else {
			echo "<script>alert('data tidak ditemukan');";
			echo "window.location='" . site_url('obat') . "';
				</script>";
		}
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($_POST['add'])) {
			$this->obat_m->add($post);
		} else if (isset($_POST['edit'])) {
			$this->obat_m->edit($post);
		}
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
		}
		redirect('obat');
	}
	public function del($id)
	{
		$this->obat_m->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		}
		redirect('obat');
	}
	public function detail($id)
	{
		$data['detail'] = $this->obat_m->get_detail($id);
		$this->template->load('template', 'obat/obat_detail', $data);
	}
}
