<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes_model extends CI_Model
{

    public function actFiltros($where)
    {
        $query = "SELECT a.id AS id, a.actividad AS actividad,
        a.descripcion AS descripcion, a.fechaact AS fechaact,
        c.codigo AS convenio, a.beneficiarios AS beneficiarios
        FROM actividad a 
        LEFT JOIN convenio c ON c.id = a.convenio 
        LEFT JOIN e_c ec ON ec.convenio = c.id 
        LEFT JOIN entidad e ON e.id = ec.entidad 
        LEFT JOIN f_c fc ON fc.convenio = c.id 
        LEFT JOIN facultad f ON f.codigo = fc.facultad 
        LEFT JOIN o_c oc ON oc.convenio = c.id 
        LEFT JOIN oficinaadministrativa o ON o.codigo = oc.oficina " . $where;
        $actividades = $this->db->query($query);
        return $actividades->result();
    }

    public function filtroActividades($where)
    {
        $query = $this->db->query("SELECT a.id,a.actividad,a.descripcion,a.fechaact,c.Codigo,c.nombre FROM actividad a  LEFT JOIN convenio c ON a.convenio = c.id WHERE = " . $where);
        return $query->result();
    }

    public function filtroAllActividades($where)
    {
        $query = $this->db->query($where);
        return $query->result();
    }
}
