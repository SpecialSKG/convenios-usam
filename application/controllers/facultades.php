<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facultades extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('facultades_model');
	}
	public function index()
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Facultades',
				'view' => 'facultades/facultades_view',
				'data_view' => array(),
				'facultad' => $this->facultades_model->getFacultad()
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}
	/* Obtener */
	public function nuevo()
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Agregar facultad',
				'view' => 'facultades/facultades_insert_view',
				'data_view' => array()
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}
	/* Agregar */
	public function insertar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'codigo' => $this->input->post('codigo'),
					'nombre' => $this->input->post('nombre'),
					'telefono' => $this->input->post('telefono'),
					'email' => $this->input->post('email'),
					'personacontacto' => $this->input->post('personacontacto'),
					'personatelefono' => $this->input->post('personatelefono'),
					'personaemail' => $this->input->post('personaemail'),
					'activo' => $this->input->post('activo')
				);
				if ($this->facultades_model->insertFacultad($data)) {
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

	public function detalle($codigo)
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Detalle facultad',
				'view' => 'facultades/facultades_update_view',
				'data_view' => array(),
				'facult' => $this->facultades_model->obtener_act($codigo),
				'detail' => 0
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	/* Actualizar */
	public function accion($codigo)
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Actualizar facultad',
				'view' => 'facultades/facultades_update_view',
				'data_view' => array(),
				'facult' => $this->facultades_model->obtener_act($codigo),
				'detail' => 1
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function editar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'codigo' => $this->input->post('codigo'),
					'nombre' => $this->input->post('nombre'),
					'telefono' => $this->input->post('telefono'),
					'email' => $this->input->post('email'),
					'personacontacto' => $this->input->post('personacontacto'),
					'personatelefono' => $this->input->post('personatelefono'),
					'personaemail' => $this->input->post('personaemail'),
					'activo' => $this->input->post('activo')
				);

				if ($this->facultades_model->actualizarFacultad($data)) {
					echo json_encode(array('success' => 1));
				} else {
					echo json_encode(array('success' => 0));
				}
			} else {
				echo 'No se pudo acceder';
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	/* Eliminar */
	public function borrar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array('codigo' => $this->input->post('codigo'));
				if ($this->facultades_model->eliminar($data)) {
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
}
