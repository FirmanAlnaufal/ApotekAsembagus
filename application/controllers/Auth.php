<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}
	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($post['login']))
		{
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'id_user' => $row->id_user,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				redirect('auth/login');
				// echo "<script>
				// 	alert('selamat, login berhasil');
				// 	window.location='".site_url('dashboard')."';
				// </script>";
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password atau Username salah!</div>');
				redirect('auth/login');

			}
		}
	}
	public function logout()
	{
		$params = array('id_user', 'level');
		$this->session->unset_userdata($params);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4>  <i class="icon fa fa-check-circle"></i> Sukses!</h4>Anda Telah Berhasil Logout!</div>');
		$this->load->view('logout');
	}
}
