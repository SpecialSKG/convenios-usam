<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Convenios extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('convenios_model');
		$this->load->model('entidades_model');
		$this->load->model('facultades_model');
		$this->load->model('crud_model');

		$this->load->library('form_validation');
	}

	public function idTabla()
	{
		return "id";
	}

	public function nombreTabla()
	{
		return "convenio";
	}

	public function index()
	{
		if ($this->session->userdata("login") === TRUE) {
			$convenios = "";
			$codigo = $this->input->get("codigo", true);

			$entidad = $this->input->get("entidad", true);
			$facultad = $this->input->get("facultad", true);
			$oficina = $this->input->get("oficina", true);

			$fechainicio = $this->input->get("fechainicio", true);
			$fechacaducidad = $this->input->get("fechacaducidad", true);

			$estado = $this->input->get("estado", true);
			$areatematica = $this->input->get("areatematica", true);

			$area = $this->input->get("area", true);

			if (
				$oficina != null || $entidad != null || $facultad != null ||
				$fechainicio != null || $fechacaducidad != null ||
				$estado != null  || $areatematica != null || $codigo != null ||
				$area != null
			) {
				$consulta = array();
				$sqlwhere = "";

				if ($entidad != null) {
					$consulta['entidad'] =  $entidad;
					$sqlwhere = $sqlwhere . "e.entidad = " . $entidad . " and ";
				}
				if ($facultad != null) {
					$consulta['facultad'] =  $facultad;
					$sqlwhere = $sqlwhere . "f.facultad = '" . $facultad . "' and ";
				}
				if ($oficina != null) {
					$consulta['oficina'] =  $oficina;
					$sqlwhere = $sqlwhere . "o.oficina = '" . $oficina . "' and ";
				}

				if ($fechainicio != null) {
					$consulta['fechainicio'] =  $fechainicio;
					$sqlwhere = $sqlwhere . "c.fechainicio >= '" . $fechainicio . "' and ";
				}
				if ($fechacaducidad != null) {
					$consulta['fechacaducidad'] =  $fechacaducidad;
					$sqlwhere = $sqlwhere . "c.fechacaducidad <= '" . $fechacaducidad . "' and ";
				}

				if ($estado != null) {
					$consulta['estado'] =  $estado;
					$sqlwhere = $sqlwhere . "c.estado = '" . $estado . "' and ";
				} else {
					$consulta['estado'] =  'Activo';
					$sqlwhere = $sqlwhere . "c.estado = 'Activo' and ";
				}

				if ($areatematica != null) {
					$consulta['areatematica'] =  $areatematica;
					$sqlwhere = $sqlwhere . "c.areatematica = '" . $areatematica . "' and ";
				}

				if ($codigo != null) {
					$consulta['Codigo'] =  $codigo;
					$sqlwhere = $sqlwhere . "c.Codigo = '" . $codigo . "' and ";
				}

				$sqlwhere = substr_replace($sqlwhere, "", -4);

				$convenios = $this->convenios_model->filtroConvenios($sqlwhere);
			} else {
				//$convenios = $this->crud_model->mostrarWhere('convenio', array('estado <>' => "Eliminado"));
				$convenios = $this->crud_model->mostrarWhereQuery('convenio', "estado <> 'Eliminado' ORDER BY id desc");
			}

			$data = array(
				'page_title' => 'Convenios',
				'view' => 'convenios/convenios_view',
				'data_view' => array(
					//'data_table' => $this->crud_model->mostrar('id', 'convenio')
					//'data_table' => $this->crud_model->mostrarWhere('convenio',array('estado <>' => "Eliminado"))
					'data_table' => $convenios,
					'entidades' => $this->crud_model->mostrar('id', 'entidad'),
					'facultades' => $this->crud_model->mostrar('codigo', 'facultad'),
					'oficinas' => $this->crud_model->mostrar('codigo', 'oficinaadministrativa')
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function nuevo()
	{
		if ($this->session->userdata("login") === TRUE) {
			if ($this->session->userdata("rol_") != 1) {
				redirect("/convenios");
			}
			$data = array(
				'page_title' => 'Covenios',
				'view' => 'convenios/convenios_insert_view',
				'data_view' => array(
					'entidades' => $this->crud_model->mostrar("id", "entidad"),
					'facultades' => $this->crud_model->mostrar("codigo", "facultad"),
					'oficinas' => $this->crud_model->mostrar("codigo", "oficinaadministrativa")
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	/*---------------------ENTIDAD---------------------*/

	public function insertarEntidad()
	{
		if ($this->session->userdata('login') === TRUE) {
			if ($this->input->is_ajax_request()) {
				$entidadAInsertar = $this->input->post('id', TRUE);
				$item = array(
					'entidad' => $entidadAInsertar
				);

				$loopentidad = $this->crud_model->mostrar('id', 'e_c_temp');
				$verificacion = true;

				foreach ($loopentidad as $en) {
					if ($en->entidad == $entidadAInsertar) {
						$verificacion = false;
					}
				}

				if ($verificacion) {
					if ($this->crud_model->insertar($item, "e_c_temp")) {
						echo json_encode(array('success' => 1, 'id' => $this->input->post('id', TRUE)));
					} else {
						echo json_encode(array('success' => 0));
					}
				} else {
					echo json_encode(array('success' => 1, 'id' => "ya insertado"));
				}
			}
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function mostrarEntidades()
	{
		$datos = $this->crud_model->mostrarJoin(
			'temp.id as id, temp.entidad as entidad, entidad.nombre as nombre, entidad.Siglas as Siglas',
			'e_c_temp temp',
			'temp.entidad',
			'entidad',
			'entidad.id'
		);
		echo json_encode($datos);
	}

	public function mostrarEntidadesConvenio()
	{
		$id = $this->input->get('id', TRUE);
		$datos = $this->convenios_model->mostrarEntidadWhere($id);
		echo json_encode($datos);
	}

	public function eliminarEntidad()
	{
		$id = $this->input->post('id', TRUE);
		if ($this->crud_model->eliminarP($id, "id", "e_c_temp")) {
			echo json_encode(
				array(
					'success' => 1,
					'mensaje' => 'eliminado con exito'
				)
			);
		}
	}

	public function eliminarEntidadConvenio()
	{
		$id = $this->input->post('id', true);
		if ($this->crud_model->eliminarP($id, "id", "e_c")) {
			echo json_encode(
				array(
					'success' => 1,
					'mensaje' => 'eliminado con exito'
				)
			);
		}
	}

	public function eliminarTodaEntidad()
	{
		if ($this->crud_model->eliminarTodo("e_c_temp")) {
			echo json_encode(array(
				'success' => 1,
				'mensaje' => 'Todas las entidades han sido eliminadas'
			));
		}
	}

	/*---------------------FACULTAD---------------------*/

	public function insertarFacultad()
	{
		if ($this->input->is_ajax_request()) {
			$loopfacultad = $this->crud_model->mostrar('id', 'f_c_temp');
			$verificacion = true;
			$facultadAInsertar = $this->input->post('codigo', TRUE);
			$item = array(
				'facultad' => $facultadAInsertar
			);

			foreach ($loopfacultad as $facu) {
				if ($facu->facultad == $facultadAInsertar) {
					$verificacion = false;
				}
			}

			if ($verificacion) {
				if ($this->crud_model->insertar($item, "f_c_temp")) {
					echo json_encode(array('success' => 1, 'codigo' => $this->input->post('codigo', TRUE)));
				} else {
					echo json_encode(array('success' => 0));
				}
			} else {
				echo json_encode(array('success' => 1, 'codigo' => 'ya insertado'));
			}
		}
	}

	public function mostrarFacultad()
	{
		$datos = $this->crud_model->mostrarJoin(
			'temp.id as id, temp.facultad as codigo, facultad.nombre as nombre',
			'f_c_temp temp',
			'temp.facultad',
			'facultad',
			'facultad.codigo'
		);
		echo json_encode($datos);
	}

	public function mostrarFacultadesConvenio()
	{
		$id = $this->input->get('id', TRUE);
		$datos = $this->convenios_model->mostrarFacultadWhere($id);
		echo json_encode($datos);
	}

	public function eliminarFacultad()
	{
		$id = $this->input->post('id', TRUE);
		if ($this->crud_model->eliminarP($id, "id", "f_c_temp")) {
			echo json_encode(
				array(
					'success' => 1,
					'mensaje' => 'eliminado con exito'
				)
			);
		}
	}

	public function eliminarFacultadConvenio()
	{
		$id = $this->input->post('id', TRUE);

		if ($this->crud_model->eliminarP($id, "id", "f_c")) {
			echo json_encode(
				array(
					'success' => 1,
					'mensaje' => 'eliminado con exito'
				)
			);
		}
	}

	public function eliminarTodaFacultad()
	{
		if ($this->crud_model->eliminarTodo("f_c_temp")) {
			echo json_encode(array(
				'success' => 1,
				'mensaje' => 'Todas las entidades han sido eliminadas'
			));
		}
	}




	/*---------------------OFICINA---------------------*/
	public function insertarOficina()
	{
		if ($this->input->is_ajax_request()) {
			$loopOficina = $this->crud_model->mostrar('id', 'o_c_temp');
			$verificacion = true;
			$oficinaAInsertar = $this->input->post('codigo', TRUE);
			$item = array(
				'oficina' => $oficinaAInsertar
			);
			foreach ($loopOficina as $ofi) {
				if ($ofi->oficina == $oficinaAInsertar) {
					$verificacion = false;
				}
			}
			if ($verificacion) {
				if ($this->crud_model->insertar($item, "o_c_temp")) {
					echo json_encode(array('success' => 1));
				} else {
					echo json_encode(array('success' => 0));
				}
			} else {
				echo json_encode(array('success' => 1));
			}
		}
	}

	public function mostrarOficina()
	{
		$datos = $this->crud_model->mostrarJoin(
			'temp.id as id, temp.oficina as codigo, ofi.nombre as nombre',
			'o_c_temp temp',
			'temp.oficina',
			'oficinaadministrativa ofi',
			'ofi.codigo'
		);
		echo json_encode($datos);
	}

	public function mostrarOficinaConvenio()
	{
		$id = $this->input->get('id', TRUE);
		$datos = $this->convenios_model->mostrarOficinaWhere($id);
		echo json_encode($datos);
	}

	public function eliminarOficina()
	{
		$id = $this->input->post('id', TRUE);
		if ($this->crud_model->eliminarP($id, "id", "o_c_temp")) {
			echo json_encode(
				array(
					'success' => 1,
					'mensaje' => 'eliminado con exito'
				)
			);
		}
	}

	public function eliminarOficinaCovenios()
	{
		$id = $this->input->post('id', TRUE);

		if ($this->crud_model->eliminarP($id, "id", "o_c")) {
			echo json_encode(
				array(
					'success' => 1,
					'mensaje' => 'eliminado con exito'
				)
			);
		}
	}

	public function eliminarTodaOficina()
	{
		if ($this->crud_model->eliminarTodo("o_c_temp")) {
			echo json_encode(array(
				'success' => 1,
				'mensaje' => 'Todas las entidades han sido eliminadas'
			));
		}
	}

	/*---------------------CONVENIO---------------------*/

	public function insertarconvenio()
	{
		$archivo = 'archivo';

		$nombre = $this->input->post('nombre', TRUE);
		$obj = $this->input->post('obj', TRUE);
		$selectclasificacion = $this->input->post('selectclasificacion', TRUE);
		$selecttematica = $this->input->post('selecttematica', TRUE);
		$selecttipoconvenio = $this->input->post('selecttipoconvenio', TRUE);
		$selectproceso = $this->input->post('selectproceso', TRUE);
		$selectestado = $this->input->post('selectestado', TRUE);
		$fechainicio = $this->input->post('fechainicio', TRUE);
		$fechafinalizar = $this->input->post('fechafinalizar', TRUE);
		$observaciones = $this->input->post('observaciones', TRUE);

		$config['upload_path'] = "assets/PDFs/";
		$config['allowed_types'] = "*";

		$this->load->library('upload', $config);


		if ($this->upload->do_upload($archivo)) {
			$data = array('upload_data' => $this->upload->data());
			$narchivo = $data['upload_data']['file_name'];
			$this->convenios_model->executeInsertarConvenio(
				$nombre,
				$obj,
				$selectclasificacion,
				$selecttematica,
				$selectproceso,
				$selectestado,
				$fechainicio,
				$fechafinalizar,
				$selecttipoconvenio,
				$narchivo,
				$observaciones
			);
		} else {
			$this->convenios_model->executeInsertarConvenio(
				$nombre,
				$obj,
				$selectclasificacion,
				$selecttematica,
				$selectproceso,
				$selectestado,
				$fechainicio,
				$fechafinalizar,
				$selecttipoconvenio,
				"no_archivo",
				$observaciones
			);
		}

		redirect('convenios/');
	}

	public function ver()
	{
		$this->load->model('crud_model');
		$data = array(
			'page_title' => 'Convenio',
			'view' => 'convenios/convenios_details_view',
			'data_view' => array(
				'item' => $this->crud_model->mostrarItem($this->uri->segment(3), $this->idtabla(), $this->nombreTabla()),
				'oficinas' => $this->convenios_model->mostrarOficinaWhere($this->uri->segment(3)),
				'facultades' => $this->convenios_model->mostrarFacultadWhere($this->uri->segment(3)),
				'entidades' => $this->convenios_model->mostrarEntidadWhere($this->uri->segment(3))
			)
		);
		$this->load->view('template/main_view', $data);
	}

	public function Modificar()
	{
		$this->load->model('crud_model');
		$data = array(
			'page_title' => "Convenio",
			'view' => 'convenios/convenios_update_view',
			'data_view' => array(
				'convenio' => $this->crud_model->mostrarItem($this->uri->segment(3), $this->idTabla(), $this->nombreTabla()),
				'entidades' => $this->crud_model->mostrar("id", "entidad"),
				'facultades' => $this->crud_model->mostrar("codigo", "facultad"),
				'oficinas' => $this->crud_model->mostrar("codigo", "oficinaadministrativa")
			)
		);
		$this->load->view('template/main_view', $data);
	}


	public function actualizar()
	{
		if ($_FILES["archivo"]["error"] > 0) {
			$item = array(
				'id' 			=> $this->input->post('idconvenio', true),
				'Codigo' 		=> $this->input->post('codigo', true),
				'nombre' 		=> $this->input->post('nombre', true),
				'objetivo' 		=> $this->input->post('obj', true),
				'clasificacion' => $this->input->post('selectclasificacion', true),
				'areatematica' 	=> $this->input->post('selecttematica', true),
				'activo' 		=> $this->input->post('selectproceso', true),
				'estado' 		=> $this->input->post('selectestado', true),
				'fechainicio' 	=> $this->input->post('fechainicio', true),
				'fechacaducidad' => $this->input->post('fechafinalizar', true),
				'tipo' 			=> $this->input->post('selecttipoconvenio', true),
				'archivo' 		=> $this->input->post('archivold', TRUE),
				'observaciones' => $this->input->post('observaciones', true)
			);
		} else {
			$nuevoArchivo = 'archivo';
			$config['upload_path'] = "assets/PDFs/";
			$config['allowed_types'] = "*";

			$this->load->library('upload', $config);

			$narchivo = $this->input->post('archivold', TRUE);

			if ($this->upload->do_upload($nuevoArchivo)) {
				$data = array('upload_data' => $this->upload->data());
				$narchivo = $data['upload_data']['file_name'];
				if ($this->input->post('archivold', true) != "" && $this->input->post('archivold', true) != null) {
					if (file_exists('assets/PDFs/' . $this->input->post('archivold', true))) {
						$this->load->helper("file");
						unlink(FCPATH . 'assets/PDFs/' . $this->input->post('archivold', true));
					}
				}
			}

			$item = array(
				'id' 			=> $this->input->post('idconvenio', true),
				'Codigo' 		=> $this->input->post('codigo', true),
				'nombre' 		=> $this->input->post('nombre', true),
				'objetivo' 		=> $this->input->post('obj', true),
				'clasificacion' => $this->input->post('selectclasificacion', true),
				'areatematica' 	=> $this->input->post('selecttematica', true),
				'activo' 		=> $this->input->post('selectproceso', true),
				'estado' 		=> $this->input->post('selectestado', true),
				'fechainicio' 	=> $this->input->post('fechainicio', true),
				'fechacaducidad' => $this->input->post('fechafinalizar', true),
				'tipo' 			=> $this->input->post('selecttipoconvenio', true),
				'archivo' 		=> $narchivo,
				'observaciones' => $this->input->post('observaciones', true)
			);
		}

		$this->crud_model->actualizar($this->input->post('idconvenio', true), "id", $item, "convenio");

		redirect('convenios/');
	}

	public function cambiarAEliminado()
	{
		$this->load->model('convenios_model');

		$id = $this->input->get('id', true);

		if ($this->convenios_model->estadoEliminado($id)) {
			echo json_encode(array('response' => "1"));
		} else {
			echo json_encode(array('response' => "0"));
		}
	}

	/*--------------OFICINAS,OFICINAS,ENTIDADES----------*/

	public function InsertarFacultadConvenio()
	{
		$verificacion = true;
		$facultad = $this->input->post('facultad');
		$convenio = $this->input->post('convenio');
		$loopfaculta = $this->crud_model->mostrarWhere('f_c', array('convenio' => $convenio));
		$item = array(
			'facultad' => $facultad,
			'convenio' => $convenio
		);

		foreach ($loopfaculta as $facu) {
			if ($facu->facultad == $facultad) {
				$verificacion = false;
			}
		}

		if ($verificacion) {
			if ($this->crud_model->insertar($item, "f_c")) {
				echo json_encode(array('success' => 1));
			} else {
				echo json_encode(array('success' => 0));
			}
		} else {
			echo json_encode(array('success' => 1));
		}
	}

	public function InsertarEntidadConvenio()
	{
		$verificacion = true;
		$entidad = $this->input->post('entidad');
		$convenio = $this->input->post('convenio');
		$loopentidad = $this->crud_model->mostrarWhere('e_c', array('convenio' => $convenio));

		$item = array(
			'entidad' => $entidad,
			'convenio' => $convenio
		);

		foreach ($loopentidad as $enti) {
			if ($enti->entidad == $entidad) {
				$verificacion = false;
			}
		}

		if ($verificacion) {
			if ($this->crud_model->insertar($item, "e_c")) {
				echo json_encode(array('success' => 1));
			} else {
				echo json_encode(array('success' => 0));
			}
		} else {
			echo json_encode(array('success' => 1));
		}
	}

	public function InsertarOficinaConvenio()
	{

		$verificacion = true;
		$oficina = $this->input->post('oficina');
		$convenio = $this->input->post('convenio');
		$loopoficina = $this->crud_model->mostrarWhere('o_c', array('convenio' => $convenio));

		$item = array(
			'oficina' => $oficina,
			'convenio' => $convenio
		);

		foreach ($loopoficina as $ofi) {
			if ($ofi->oficina == $oficina) {
				$verificacion = false;
			}
		}

		if ($verificacion) {
			if ($this->crud_model->insertar($item, "o_c")) {
				echo json_encode(array('success' => 1));
			} else {
				echo json_encode(array('success' => 0));
			}
		} else {
			echo json_encode(array('success' => 1));
		}
	}
}
