<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getDataDashboard(){
        $query = $this->db->get('V_DASHBOARD');
        $data = $query->row();
        return $data;
    }

    public function getTopPaises(){
        $query = $this->db->get('V_TOPPAISESCONMASCONVENIOS');
        $data = $query->result();
        return $data;
    }
}