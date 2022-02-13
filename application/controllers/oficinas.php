<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Oficinas extends CI_Controller
{
	public function tabla()
	{
		return "oficinaadministrativa";
	}
	public function nombreId()
	{
		return "codigo";
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->model('oficinas_model');
	}
	public function index()
	{

		$mensaje = 0;
		if ($this->session->mark_as_flash('mensaje') !== null && $this->session->flashdata('mensaje') != 100) {
			$mensaje = $this->session->flashdata('mensaje');
		}

		if ($this->session->userdata("login") === TRUE) {
			$this->load->model('crud_model');

			$data = array(
				'page_title' => 'Oficinas',
				'view' => 'oficinas/oficinas_view',
				'data_view' => array(
					'data_table' => $this->crud_model->mostrar($this->nombreId(), $this->tabla()),
					'mensaje' => $mensaje
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function nuevo()
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Oficinas',
				'view' => 'oficinas/oficinas_insert_view',
				'data_view' => array(
					'accion' => 'insertar'
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function insertar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$item = array(
					'codigo' 			=> $this->input->post('codigo', TRUE),
					'nombre' 			=> $this->input->post('nombre', TRUE),
					'telefono' 			=> $this->input->post('telefono', TRUE),
					'email' 			=> $this->input->post('email', TRUE),
					'activo' 			=> $this->input->post('activo', TRUE),
					'personacontacto' 	=> $this->input->post('personacontacto', TRUE),
					'personaemail' 		=> $this->input->post('personaemail', TRUE),
					'personatelefono' 	=> $this->input->post('personatelefono', TRUE)
				);

				$this->load->model('crud_model');

				if ($this->crud_model->insertar($item, $this->tabla())) {
					echo json_encode(array('success' => 1));
				} else {
					echo json_encode(array('success' => 0));
				}
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function Modificar()
	{
		if ($this->session->userdata("login") === TRUE) {
			$this->load->model('crud_model');
			$data = array(
				'page_title' => 'Oficinas',
				'view' => 'oficinas/oficinas_update_view',
				'data_view' => array(
					'accion' => 'actualizar',
					'item' => $this->crud_model->mostrarItem($this->uri->segment(3), $this->nombreId(), $this->tabla())
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function actualizar()
	{
		$this->load->model('crud_model');
		if ($this->input->is_ajax_request()) {
			$item = array(
				'codigo' 			=> $this->input->post('codigo'),
				'nombre' 			=> $this->input->post('nombre'),
				'telefono' 			=> $this->input->post('telefono'),
				'email' 			=> $this->input->post('email'),
				'activo' 			=> $this->input->post('activo'),
				'personacontacto' 	=> $this->input->post('personacontacto'),
				'personaemail' 		=> $this->input->post('personaemail'),
				'personatelefono' 	=> $this->input->post('personatelefono')
			);

			$id = $this->input->post('codigoold');

			if ($this->crud_model->actualizar($id, $this->nombreId(), $item, $this->tabla())) {
				echo json_encode(array('success' => 1));
			} else {
				echo json_encode(array('success' => 0));
			}
		} else {
			echo "no se puede acceder";
		}
	}

	public function eliminar()
	{
		$this->load->model('crud_model');
		if ($this->input->is_ajax_request()) {
			$data = array('codigo' => $this->input->post('codigo'));
			if ($this->crud_model->eliminar($data)) {
				echo json_encode(array('success' => 1));
			} else {
				echo json_encode(array('success' => 0));
			}
		} else {
			echo "no se puede acceder";
		}
	}

	public function ver()
	{
		$this->load->model('crud_model');
		$data = array(
			'page_title' => 'Oficinas',
			'view' => 'oficinas/oficinas_details_view',
			'data_view' => array(
				'item' => $this->crud_model->mostrarItem($this->uri->segment(3), $this->nombreId(), $this->tabla())
			)
		);
		$this->load->view('template/main_view', $data);
	}
}
