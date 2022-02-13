<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Actividades_model extends CI_Model
{

	public function getActividades()
	{
		$this->db->select('a.id, a.actividad, a.descripcion, a.fechaact, c.Codigo, c.nombre, a.beneficiarios');
		$this->db->from('actividad as a');
		$this->db->join('convenio as c', 'a.convenio = c.id');
		$actividad =  $this->db->get();
		return $actividad->result();
	}

	public function getConvenios()
	{
		$data = $this->db->get('convenio');
		return $data->result();
	}

	public function insertarActividades($data)
	{
		return ($this->db->insert('actividad', $data)) ? true : false;
	}

	public function obtenerActv($id)
	{
		$this->db->select('*');
		$this->db->from('actividad');
		$this->db->where('id =', $id);
		$edit = $this->db->get();
		return ($edit->num_rows() === 1) ? $edit->row() : false;
	}

	public function actualizarActividades($data)
	{
		$this->db->where('id', $data['id']);
		return ($this->db->update('actividad', $data)) ? true : false;
	}

	public function deleteActividades($data)
	{
		$this->db->where('id =', $data['id']);
		return ($this->db->delete('actividad')) ? true : false;
	}
}
