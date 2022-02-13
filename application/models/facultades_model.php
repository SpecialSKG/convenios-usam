<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facultades_model extends CI_Model {
	/*READ*/
	public function getFacultad(){
		$this->db->select('*');
		$this->db->from('facultad');
		$facultad = $this->db->get();
		return $facultad->result();
	}
	/*CREATE*/
	public function insertFacultad($data){
		return ($this->db->insert('facultad', $data)) ? true:false;
	}
	/*READ FOR UPDATE*/
	public function obtener_act($codigo){
		$this->db->where('codigo =',$codigo);
		$facultad = $this->db->get('facultad');
		return $facultad->row();
	}

	public function actualizarFacultad($data){
		$this->db->where('codigo',$data['codigo']);
		return ($this->db->update('facultad',$data)) ? true:false;
	}

	/*DELETE*/
	public function eliminar($data){
		$this->db->where('codigo =', $data['codigo']);
		return($this->db->delete('facultad')) ? true:false;
	}
}
