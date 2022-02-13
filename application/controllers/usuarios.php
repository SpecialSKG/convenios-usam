<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_model');
	}
	public function index()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				$data = array(
					'page_title' => 'Usuarios',
					'view' => 'usuarios/usuarios_view',
					'data_view' => array(),
					'Usuarios' => $this->Usuarios_model->getUsuarios()
				);
				$this->load->view('template/main_view', $data);
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function nuevo()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				$data = array(
					'page_title' => 'Agregar Usuarios',
					'view' => 'usuarios/usuario_insert_view',
					'data_view' => array(),
					'rol' => $this->Usuarios_model->getRol()
				);
				$this->load->view('Template/main_view', $data);
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function insertar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				if ($this->input->is_ajax_request()) {
					$data = array(
						'nombre_user' => $this->input->post('nombre_user'),
						'user' => $this->input->post('user'),
						'pass' => base64_encode($this->input->post('pass')),
						'rol_' => $this->input->post('rol_')
					);
					if ($this->Usuarios_model->insertarUsuarios($data)) {
						echo json_encode(array('success' => 1));
					} else {
						echo json_encode(array('success' => 0));
					}
				} else {
					echo "no se puede acceder";
				}
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function detalle($id)
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				$data = array(
					'page_title' => 'Detalle Usuarios',
					'view' => 'usuarios/usuario_update_view',
					'data_view' => array(),
					'rol' => $this->Usuarios_model->getRol(),
					'edit' => $this->Usuarios_model->obtenerUsuario($id),
					'detail' => 0
				);
				$this->load->view('Template/main_view', $data);
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function obtener($id)
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				$data = array(
					'page_title' => 'Actualizar Usuarios',
					'view' => 'usuarios/usuario_update_view',
					'data_view' => array(),
					'rol' => $this->Usuarios_model->getRol(),
					'edit' => $this->Usuarios_model->obtenerUsuario($id),
					'detail' => 1
				);
				$this->load->view('Template/main_view', $data);
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function modificar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				if ($this->input->is_ajax_request()) {
					$data = array(
						'nombre_user' => $this->input->post('nombre_user'),
						'user' => $this->input->post('user'),
						'pass' => base64_encode($this->input->post('pass')),
						'rol_' => $this->input->post('rol_'),
						'id_user' => $this->input->post('id_user')
					);
					if ($this->Usuarios_model->actualizarUsuario($data)) {
						echo json_encode(array('success' => 1));
					} else {
						echo json_encode(array('success' => 0));
					}
				} else {
					echo "no se puede acceder";
				}
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function borrar()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->session->userdata('rol_') == '1') {
				if ($this->input->is_ajax_request()) {
					$id = $this->input->post('id_user');
					if ($this->Usuarios_model->deleteUsuario($id)) {
						echo json_encode(array('success' => 1));
					} else {
						echo json_encode(array('success' => 0));
					}
				} else {
					echo "no se puede acceder";
				}
			} else if ($this->session->userdata('rol_') == '2' || $this->session->userdata('rol_') == '3') {
				redirect(base_url() . 'dashboard', 'refresh');
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}
}
