<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entidades_model extends CI_Model {

    public function getEntidades()
	{
		$this->db->select('e.id, e.activo, e.nombre, p.pais, e.direccion, e.Siglas, tp.tipo_entidad, e.telefono, e.email, e.web, e.personacontacto, e.personacargo, e.personatelefono, e.personaemail');
		$this->db->from('entidad as e');
		$this->db->join('pais as p', 'p.id = e.idpais', 'left');
        $this->db->join('tipo_entidad as tp', 'tp.idtipo_entidad = e.idtipoentidad', 'left');
		$this->db->order_by("e.id", "asc");
		$entidad =  $this->db->get();
		return $entidad->result();
	}

    public function getPais(){
		$pais = $this->db->get('pais');
		return $pais->result();
	}

	public function obtPais($id){
		$this->db->select('*');
		$this->db->from('pais');
		$this->db->where('idcontinente =', $id);
		$this->db->order_by('pais', 'ASC');
		$edit = $this->db->get();
		return $edit->result();
	}
/* ----------------------------------*/ 


	public function getContinente(){
		$continente = $this->db->get('continente');
		return $continente->result();
	}

/* ----------------------------------*/ 

    public function getTentidad(){
		$tentidad = $this->db->get('tipo_entidad');
		return $tentidad->result();
	}

	public function insertarEntidades($data){
		return ($this->db->insert('entidad', $data)) ? true:false;
	}

	public function obtEntidades($id){
		$this->db->select('*');
		$this->db->from('entidad');
		$this->db->where('id =', $id);
		$edit = $this->db->get();
		return ($edit->num_rows() ===1) ? $edit->row(): false;
	}

	public function actualizarEntidades($data){
		$this->db->where('id', $data['id']);
		return ($this->db->update('entidad', $data)) ? true:false;
	}

	public function deleteEntidades($data){
		$this->db->where('id =', $data['id']);
		return ($this->db->delete('entidad')) ? true:false;
	}
}