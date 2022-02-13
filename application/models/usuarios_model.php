<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	/* public function getActividades(){
		$this->db->select('*');
		$this->db->from('actividad');
		$this->db->order_by('id', 'ASC');
		$actividad = $this->db->get();
		return $actividad->result();
	} */

	public function getUsuarios()
	{
		$this->db->select('u.id_user, u.nombre_user, u.user, u.pass, ur.rol');
		$this->db->from('user as u');
		$this->db->join('user_rol as ur', 'u.rol_ = ur.id_rol ');
		$actividad =  $this->db->get();
		return $actividad->result();
	}

	public function getRol()
	{
		$data = $this->db->get('user_rol');
		return $data->result();
	}

	/*
	public function getBeneficiario()
	{
		$beneficiario = $this->db->get('beneficiario');
		return $beneficiario->result();
	}

	public function obtBeneficiario($idBeneficiario)
	{
		$this->db->select('*');
		$this->db->from('beneficiario');
		$edit = $this->db->get();
		return $edit->result();
	}
*/
	public function insertarUsuarios($data)
	{
		return ($this->db->insert('user', $data)) ? true : false;
	}

	public function obtenerUsuario($id)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user  =', $id);
		$edit = $this->db->get();
		return ($edit->num_rows() === 1) ? $edit->row() : false;
	}

	public function actualizarUsuario($data)
	{
		$this->db->where('id_user', $data['id_user']);
		return ($this->db->update('user', $data)) ? true : false;
	}

	public function deleteUsuario($id)
	{
		$this->db->where('id_user =', $id);
		return ($this->db->delete('user')) ? true : false;
	}
}
