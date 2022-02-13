<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actividades extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('actividades_model');
	}
	public function index()
	{
		if ($this->session->userdata("login") === TRUE) {
			$data = array(
				'page_title' => 'Actividades',
				'view' => 'actividades/actividades_view',
				'data_view' => array()
			);
			$data['actividad'] = $this->actividades_model->getActividades();

			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function nuevo()
	{
		if ($this->session->userdata("login") === TRUE) {
			$data = array(
				'page_title' => 'Agregar Actividad',
				'view' => 'actividades/actividades_insert_view',
				'data_view' => array(),
				'convenio' => $this->actividades_model->getConvenios()
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function insertar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'actividad' => $this->input->post('actividad'),
					'descripcion' => $this->input->post('descripcion'),
					'fechaact' => $this->input->post('fechaact'),
					'convenio' => $this->input->post('convenio'),
					'beneficiarios' => $this->input->post('beneficiarios')
				);
				if ($this->actividades_model->insertarActividades($data)) {
					echo json_encode(array('success' => 1));
				} else {
					echo json_encode(array('success' => 0));
				}
			} else {
				echo "no se puede acceder";
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function detalle($id)
	{
		if ($this->session->userdata("login") === TRUE) {
			$data = array(
				'page_title' => 'Detalle Actividad',
				'view' => 'actividades/actividades_update_view',
				'data_view' => array(),
				'convenio' => $this->actividades_model->getConvenios(),
				'edit' => $this->actividades_model->obtenerActv($id),
				'detail' => 0
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function obtener($id)
	{
		if ($this->session->userdata("login") === TRUE) {
			$data = array(
				'page_title' => 'Actualizar Actividad',
				'view' => 'actividades/actividades_update_view',
				'data_view' => array(),
				'convenio' => $this->actividades_model->getConvenios(),
				'edit' => $this->actividades_model->obtenerActv($id),
				'detail' => 1
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login');
		}
	}

	public function modificar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'actividad' => $this->input->post('actividad'),
					'descripcion' => $this->input->post('descripcion'),
					'fechaact' => $this->input->post('fechaact'),
					'convenio' => $this->input->post('convenio'),
					'beneficiarios' => $this->input->post('beneficiarios'),
					'id' => $this->input->post('id')
				);
				if ($this->actividades_model->actualizarActividades($data)) {
					echo json_encode(array('success' => 1));
				} else {
					echo json_encode(array('success' => 0));
				}
			} else {
				echo "no se puede acceder";
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function borrar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array('id' => $this->input->post('id'));
				if ($this->actividades_model->deleteActividades($data)) {
					echo json_encode(array('success' => 1));
				} else {
					echo json_encode(array('success' => 0));
				}
			} else {
				echo "no se puede acceder";
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function beneficiario()
	{
		$consulta = $this->actividades_model->getBeneficiario();
		echo json_encode($consulta);
	}
}
