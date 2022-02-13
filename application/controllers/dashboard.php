<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->model('crud_model');
		$this->load->model('convenios_model');
	}
	public function index()
	{
		if ($this->session->userdata("login") === TRUE) {
			$data = array(
				'page_title' => 'Dashboard',
				'view' => 'dashboard_view',
				'data_view' => array(
					'dataDashboard' => $this->dashboard_model->getDataDashboard(),
					'dataTopPaises' => $this->dashboard_model->getTopPaises()
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function conveniosPorExpirar()
	{
		if ($this->session->userdata("login") === TRUE) {
			$convenios = $this->crud_model->mostrarWhereQuery('convenio', "fechacaducidad BETWEEN NOW() AND (NOW() + INTERVAL 4 MONTH) AND estado <> 'Eliminado'");
			$data = array(
				'page_title' => 'Convenios',
				'view' => 'convenios/convenios_por_expirar_view',
				'data_view' => array(
					'data_table' => $convenios
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}
}
