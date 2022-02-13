<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Entidades extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('entidades_model');
	}
	public function index()
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Entidades',
				'view' => 'entidades/entidades_view',
				'data_view' => array(),
				'entidad' => $this->entidades_model->getEntidades()
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
				'page_title' => 'Agregar Entidad',
				'view' => 'entidades/entidades_insert_view',
				'data_view' => array(
					'continenteSelect' => $this->entidades_model->getContinente()
				),
				'tentidad' => $this->entidades_model->getTentidad()
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function insertar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'activo' => $this->input->post('activo'),
					'nombre' => $this->input->post('nombre'),
					'idpais' => $this->input->post('pais'),
					'idcontinente' => $this->input->post('cont'),
					'direccion' => $this->input->post('direccion'),
					'Siglas' => $this->input->post('siglas'),
					'idtipoentidad' => $this->input->post('tentidad'),
					'telefono' => $this->input->post('telefono'),
					'email' => $this->input->post('email'),
					'web' => $this->input->post('web'),
					'personacontacto' => $this->input->post('personacontacto'),
					'personacargo' => $this->input->post('personacargo'),
					'personatelefono' => $this->input->post('personatelefono'),
					'personaemail' => $this->input->post('personaemail')
				);
				if ($this->entidades_model->insertarEntidades($data)) {
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

	public function obtener($id)
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Actualizar Entidad',
				'view' => 'entidades/entidades_update_view',
				'data_view' => array(),
				'continenteSelect' => $this->entidades_model->getContinente(),
				'edit' => $this->entidades_model->obtEntidades($id),
				'pais' => $this->entidades_model->getPais(),
				'cont' => $this->entidades_model->getContinente(),
				'tentidad' => $this->entidades_model->getTentidad(),
				'detail' => 1
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function detalle($id)
	{
		if ($this->session->userdata('login') === TRUE) {
			$data = array(
				'page_title' => 'Detalle Entidad',
				'view' => 'entidades/entidades_update_view',
				'data_view' => array(),
				'continenteSelect' => $this->entidades_model->getContinente(),
				'edit' => $this->entidades_model->obtEntidades($id),
				'pais' => $this->entidades_model->getPais(),
				'cont' => $this->entidades_model->getContinente(),
				'tentidad' => $this->entidades_model->getTentidad(),
				'detail' => 0
			);
			$this->load->view('Template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function modificar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$data = array(
					'activo' => $this->input->post('activo'),
					'nombre' => $this->input->post('nombre'),
					'idpais' => $this->input->post('pais'),
					'idcontinente' => $this->input->post('cont'),
					'direccion' => $this->input->post('direccion'),
					'Siglas' => $this->input->post('siglas'),
					'idtipoentidad' => $this->input->post('tentidad'),
					'telefono' => $this->input->post('telefono'),
					'email' => $this->input->post('email'),
					'web' => $this->input->post('web'),
					'personacontacto' => $this->input->post('personacontacto'),
					'personacargo' => $this->input->post('personacargo'),
					'personatelefono' => $this->input->post('personatelefono'),
					'personaemail' => $this->input->post('personaemail'),
					'id' => $this->input->post('id')
				);
				if ($this->entidades_model->actualizarEntidades($data)) {
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
				if ($this->entidades_model->deleteEntidades($data)) {
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

	public function continente()
	{
		$consulta = $this->entidades_model->getContinente();
		echo json_encode($consulta);
	}

	public function pais()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$consulta = $this->entidades_model->obtPais($id);
			echo json_encode(array('success' => 1, 'paises' => json_encode($consulta), 'id' => $id));
		}
	}
}
