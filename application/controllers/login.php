<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}
	public function index()
	{
		if ($this->session->userdata('login') === TRUE) {
			redirect(base_url() . 'dashboard', 'refresh');
		} else {
			$this->load->view('login_view');
		}
	}
	public function iniciar_sesion()
	{
		$user = $this->input->post('user');
		$pass = base64_encode($this->input->post('pass'));
		$res = $this->login_model->login($user, $pass);

		if (!$res) {
			redirect(base_url());
		} else {
			$data = array(
				'id_usuario' => $res->id_user,
				'user' => $res->user,
				'pass' => $res->pass,
				'login' => TRUE,
				'rol_' => $res->rol_,
				'nombre_user' => $res->nombre_user
			);
			$this->session->set_userdata($data);
			redirect(base_url() . 'dashboard', 'refresh');
		}
	}
	public function cerrar_sesion()
	{
		if ($this->session->userdata('login') === TRUE) {
			$this->session->sess_destroy();
			redirect(base_url());
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}
}
/*
if ($this->session->userdata('login') === TRUE) {
	if ($this->session->userdata('rol_') == '1') {

	} else if ($this->session->userdata('rol_') == '2') {
		redirect(base_url() . 'dashboard', 'refresh');
	}
} else {
	redirect(base_url() . 'Login', 'refresh');
}

if ($this->session->userdata('login') === TRUE) {

} else {
	redirect(base_url() . 'Login', 'refresh');
}
 */