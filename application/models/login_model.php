<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	public function login($user, $pass)
	{
		$this->db->where("user", $user);
		$this->db->where("pass", $pass);

		$resultados = $this->db->get("user");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		} else {
			return false;
		}
	}
}
