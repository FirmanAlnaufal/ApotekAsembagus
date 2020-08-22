<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['user_m', 'pegawai_m']);
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();
		$this->template->load('template', 'user/user_data', $data);
	}
	public function add()
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules(
			'passconf',
			'Konfirm Password',
			'required|matches[password]',
			array('matches' => '%s tidak sesuai dengan pssword')
		);
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s ini sudah di pakai silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query_pegawai = $this->pegawai_m->get();
			$data = array(
				//'id_pemesanan' => getAutoNumber('pemesanan', 'id_pemesanan', 'B', 5),
				'pegawai' => $query_pegawai,

			);
			$this->template->load('template', 'user/user_form_add', $data);
		} else {
			$post = $this->input->post(null, TRUE);
			$config['upload_path'] = './assets/dist/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);

			if (@$_FILES['image']['name'] != null) {
				if ($this->upload->do_upload('image')) {
					$post['image'] = $this->upload->data('file_name');
					$this->user_m->add($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
					}
					redirect('user');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', $error);
					redirect('user/user_form_add');
				}
			} else {
				$post['image'] = null;
				$this->user_m->add($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
				}
				redirect('user');
			}
		}
	}
	public function edit($id = null)
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		if ($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
			$this->form_validation->set_rules(
				'passconf',
				'Konfirm Password',
				'matches[password]',
				array('matches' => '%s tidak sesuai dengan pssword')
			);
		}
		if ($this->input->post('passconf')) {
			$this->form_validation->set_rules(
				'passconf',
				'Konfirm Password',
				'matches[password]',
				array('matches' => '%s tidak sesuai dengan pssword')
			);
		}

		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '%s minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '%s ini sudah di pakai silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			$query_pegawai = $this->pegawai_m->get();

			if ($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$doto = array(

					'pegawai' => $query_pegawai,
				);
				$this->template->load('template', 'user/user_form_edit', $data, $doto);
			} else {
				echo "<script>alert('data tidak ditemukan');";
				echo "window.location='" . site_url('user') . "';
				</script>";
			}
		} else {
			$post = $this->input->post(null, TRUE);
			$config['upload_path'] = './assets/dist/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 2048;
			$config['file_name'] = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);

			if (@$_FILES['image']['name'] != null) {
				if ($this->upload->do_upload('image')) {
					$post['image'] = $this->upload->data('file_name');
					$this->user_m->edit($post);
					if ($this->db->affected_rows() > 0) {
						$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
					}
					redirect('user');
				} else {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('message', $error);
					redirect('user/user_form_edit');
				}
			} else {
				$post['image'] = null;
				$this->user_m->edit($post);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('message', 'Data Berhasil Disimpan');
				}
				redirect('user');
			}
		}
	}

	function username_check()
	{
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
		if ($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '%s ini sudah dipakai silahkanganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function del()
	{
		$id = $this->input->post('id_user');
		$this->user_m->del($id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('message', 'Data Berhasil Dihapus');
		}
		redirect('user');
	}

	public function profile()
	{
		$this->template->load('template', 'profile');
	}
}
