<?php
/*
*/

defined('BASEPATH') or exit('No direct script access allowed');
//require(APPPATH . 'vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Reportes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('reportes_model');
		$this->load->model('Convenios_model');
		$this->load->model('crud_model');
	}

	public function index()
	{
		if ($this->session->userdata("login") === TRUE) {
			$data = array(
				'page_title' => 'Reportes',
				'view' => 'reportes_view',
				'data_view' => array(
					'entidades' => $this->crud_model->mostrar('id', 'entidad'),
					'facultades' => $this->crud_model->mostrar('codigo', 'facultad'),
					'oficinas' => $this->crud_model->mostrar('codigo', 'oficinaadministrativa'),
					'actividad' => $this->crud_model->mostrar('id', 'actividad'),
					'convenio' => $this->crud_model->mostrar('id', 'convenio'),
					'continentes' => $this->crud_model->mostrar('id', 'continente')
				)
			);
			$this->load->view('template/main_view', $data);
		} else {
			redirect(base_url() . 'Login', 'refresh');
		}
	}

	public function repoconvenios()
	{
		$area = 		$this->input->post("area", true);
		$estado = 		$this->input->post("estado", true);
		$entidad = 		$this->input->post("entidad", true);
		$facultad = 	$this->input->post("facultad", true);
		$opcioninicio = $this->input->post("opcioninicio", true);
		$inicio = 		$this->input->post("inicio", true);
		$opcionfin = 	$this->input->post("opcionfin", true);
		$fin = 			$this->input->post("fin", true);
		$oficina = 		$this->input->post("oficina", true);
		$pais = 		$this->input->post("pais", true);
		$continente = 	$this->input->post("continente", true);

		$proceso = $this->input->post("proceso", true);

		if (
			$area != null || $estado != null || $entidad != null || $facultad != null ||
			$opcioninicio != null || $inicio != null || $opcionfin != null ||
			$fin != null || $oficina != null || $proceso != null || $pais != null || $continente != null
		) {
			$querywhere = "";
			if ($area != null) {
				$querywhere = $querywhere . " c.areatematica = '" . $area . "' and ";
			}

			if ($estado != null) {
				$querywhere = $querywhere . " c.estado = '" . $estado . "' and ";
			}

			if ($entidad != null) {
				$querywhere = $querywhere . " e.entidad = '" . $entidad . "' and ";
			}

			if ($facultad != null) {
				$querywhere = $querywhere . " f.facultad = '" . $facultad . "' and ";
			}

			if ($opcioninicio != null && $inicio != null) {
				$querywhere = $querywhere . " c.fechainicio " . $opcioninicio . " '" . $inicio . "' and ";
			}

			if ($opcionfin != null && $fin != null) {
				$querywhere = $querywhere . " c.fechacaducidad " . $opcionfin . " '" . $fin . "' and ";
			}

			if ($oficina != null) {
				$querywhere = $querywhere . " o.oficina = '" . $oficina . "' and ";
			}

			if ($proceso != null) {
				$querywhere = $querywhere . " c.activo = '" . $proceso . "' and ";
			}

			if ($pais != null) {
				$querywhere = $querywhere . " en.idpais = '" . $pais . "' and ";
			}

			if ($continente != null) {
				$querywhere = $querywhere . " en.idcontinente = '" . $continente . "' and ";
			}

			$querywhere = substr_replace($querywhere, "", -4);
			$querywhere = str_replace("&lt;", "<", $querywhere);

			$datos = $this->Convenios_model->filtroConvenios($querywhere);
		} else {
			$querywhere = "";
			$datos = $this->crud_model->mostrarWhereQuery('convenio', "estado <> 'Eliminado' ORDER BY id desc");
		}


		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator("Sistema César Augusto Calderón")->setTitle("Reporte de Convenios");

		$spreadsheet->setActiveSheetIndex(0);
		$hojaActiva = $spreadsheet->getActiveSheet();
		// id, Codigo, nombre, objetivo, clasificacion, areatematica, activo, estado, fechainicio, fechacaducidad, tipo, archivo, observaciones
		$hojaActiva->setCellValue('A1', "Id");
		$hojaActiva->setCellValue('B1', "Codigo");
		$hojaActiva->setCellValue('C1', "Nombre");
		$hojaActiva->setCellValue('D1', "Objetivo");
		$hojaActiva->setCellValue('E1', "Clasificacion");
		$hojaActiva->setCellValue('F1', "Area Tematica");
		$hojaActiva->setCellValue('G1', "Proceso");
		$hojaActiva->setCellValue('H1', "Estado");
		$hojaActiva->setCellValue('I1', "Fecha de Inicio");
		$hojaActiva->setCellValue('J1', "Fecha de Caducidad");
		$hojaActiva->setCellValue('K1', "Tipo");
		$hojaActiva->setCellValue('L1', "Observaciones");
		$contador = 2;

		foreach ($datos as $d) {
			$finicio =  strtotime($d->fechainicio);
			$ffinal =  strtotime($d->fechacaducidad);
			$hojaActiva->setCellValue('A' . $contador, $d->id);
			$hojaActiva->setCellValue('B' . $contador, $d->Codigo);
			$hojaActiva->setCellValue('C' . $contador, $d->nombre);
			$hojaActiva->setCellValue('D' . $contador, $d->objetivo);
			$hojaActiva->setCellValue('E' . $contador, $d->clasificacion);
			$hojaActiva->setCellValue('F' . $contador, $d->areatematica);
			$hojaActiva->setCellValue('G' . $contador, $d->activo);
			$hojaActiva->setCellValue('H' . $contador, $d->estado);
			$hojaActiva->setCellValue('I' . $contador, date("d/m/Y", $finicio));
			$hojaActiva->setCellValue('J' . $contador, date("d/m/Y", $ffinal));
			$hojaActiva->setCellValue('K' . $contador, $d->tipo);
			$hojaActiva->setCellValue('L' . $contador, $d->observaciones);
			$contador = $contador + 1;
		}

		foreach ($hojaActiva->getColumnIterator() as $column) {
			$hojaActiva->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reporte de Convenios.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
	}

	/*
	-------------------------------------------------------------------
	-------------------------------------------------------------------
	-------------------------------------------------------------------
	-------------------------------------------------------------------
	*/

	public function repoactividades()
	{
		$inicio2 = $this->input->post("inicio2", true);
		$fin2 = 	$this->input->post("fin2", true);
		$convenio = $this->input->post("convenio", true);
		$entidad = 		$this->input->post("entida", true);
		$facultad = 	$this->input->post("facultad", true);
		$oficina = 		$this->input->post("oficina", true);
		$area = 		$this->input->post("area", true);
		$querywhere = "";
		$datos = "";
		if (
			$inicio2 != null  || $fin2 != null ||
			$convenio != null || $entidad != null ||
			$facultad != null || $oficina != null || $area != null
		) {
			$querywhere = " WHERE ";

			if ($area != null) {
				$querywhere = $querywhere . " c.areatematica = '" . $area . "' AND ";
			}

			if ($convenio != null) {
				$querywhere = $querywhere . " c.codigo = '" . $convenio . "' AND ";
			}

			if ($entidad != null) {
				$querywhere = $querywhere . " e.id = " . $entidad . " AND ";
			}

			if ($facultad != null) {
				$querywhere = $querywhere . " f.codigo = '" . $facultad . "' AND ";
			}

			if ($oficina != null) {
				$querywhere = $querywhere . " o.codigo = '" . $oficina . "' AND ";
			}

			if ($inicio2 != null) {
				$querywhere = $querywhere . " a.fechaact >= '" . $inicio2 . "' AND ";
			}

			if ($fin2 != null) {
				$querywhere = $querywhere . " a.fechaact <= '" . $fin2 . "' AND ";
			}



			$querywhere = substr_replace($querywhere, "", -4);
			$querywhere = str_replace("&lt;", "<", $querywhere);

			$datos = $this->reportes_model->actFiltros($querywhere);
		} else {
			$querywhere = "";
			$datos = $this->reportes_model->actFiltros($querywhere);
			//$datos = $this->crud_model->mostrarWhereQuery('actividad', "convenio > 0 ORDER BY id desc");

			/*$datos = $this->reportes_model->filtroAllActividades(
				"SELECT a.id,a.actividad,a.descripcion,a.fechaact,c.Codigo,c.nombre,a.beneficiarios FROM actividad a LEFT JOIN convenio c ON c.id = a.convenio"
			);*/
		}



		$spreadsheet = new Spreadsheet();
		$spreadsheet->getProperties()->setCreator("Sistema César Augusto Calderón")->setTitle("Reporte de Actividades");

		$spreadsheet->setActiveSheetIndex(0);
		$hojaActiva = $spreadsheet->getActiveSheet();
		// id, Codigo, nombre, objetivo, clasificacion, areatematica, activo, estado, fechainicio, fechacaducidad, tipo, archivo, observaciones
		$hojaActiva->setCellValue('A1', "Id");
		$hojaActiva->setCellValue('B1', "Actividad");
		$hojaActiva->setCellValue('C1', "Descripcion");
		$hojaActiva->setCellValue('D1', "Fecha Actividad");
		$hojaActiva->setCellValue('E1', "Convenio");
		$hojaActiva->setCellValue('F1', "Beneficiarios");
		$contador = 2;

		foreach ($datos as $d) {
			$fechaact =  strtotime($d->fechaact);
			$hojaActiva->setCellValue('A' . $contador, $d->id);
			$hojaActiva->setCellValue('B' . $contador, $d->actividad);
			$hojaActiva->setCellValue('C' . $contador, $d->descripcion);
			$hojaActiva->setCellValue('D' . $contador, date("d/m/Y", $fechaact));
			$hojaActiva->setCellValue('E' . $contador, $d->convenio);
			$hojaActiva->setCellValue('F' . $contador, $d->beneficiarios);
			$contador = $contador + 1;
		}

		foreach ($hojaActiva->getColumnIterator() as $column) {
			$hojaActiva->getColumnDimension($column->getColumnIndex())->setAutoSize(true);
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reporte de Actividades.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		/*
		$writer = new Xlsx($spreadsheet);
		$writer->save('Resporte de Convenios.xlsx');
		*/
	}
}
