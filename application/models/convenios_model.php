<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Convenios_model extends CI_Model
{

    //llama a un procedimiento almacenado en la base de datos que se encarga de hacer la insercion del nuevo convenio y la creacion de codigo del mismo
    public function executeInsertarConvenio(
        $nombre,
        $obj,
        $clasificacion,
        $area,
        $activo,
        $estado,
        $fechainicio,
        $fechacaduca,
        $tipo,
        $archivo,
        $observaciones
    ) {
        $sql = "call insertarConvenio('" . $nombre . "', '" . $obj . "','" . $clasificacion . "', '" . $area . "', '" . $activo . "','" . $estado . "', '" . $fechainicio . "', '" . $fechacaduca . "', '" . $tipo . "', '" . $archivo . "', '" . $observaciones . "');";
        $query = $this->db->query($sql);
        return $query->result();
    }

    //retorna las entidades donde su convenio es igual a $id
    public function mostrarEntidadWhere($id)
    {
        $sql = $this->db->query("SELECT u.id as idunion, e.nombre as nombre , e.Siglas as codigo FROM e_c u inner join entidad e on u.entidad = e.id where u.convenio = " . $id . ";");
        return $sql->result();
    }

    //retorna las facultades donde su convenio es igual a $id
    public function mostrarFacultadWhere($id)
    {
        $sql = $this->db->query("SELECT u.id as idunion, f.codigo as codigo, f.nombre as nombre FROM f_c u inner join facultad f on u.facultad = f.codigo where u.convenio = " . $id . ";");
        return $sql->result();
    }

    //retorna las oficinas donde su convenio es igual a $id
    public function mostrarOficinaWhere($id)
    {
        $sql = $this->db->query("SELECT u.id as idunion, o.codigo as codigo, o.nombre as nombre FROM o_c u inner join oficinaadministrativa o on u.oficina = o.codigo where u.convenio = " . $id . ";");
        return $sql->result();
    }

    //cambia el estadode del convenio con id $id a Eliminado
    public function estadoEliminado($id)
    {
        $this->db->query("UPDATE `convenios`.`convenio` SET `estado` = 'Eliminado' WHERE (`id` = " . $id . ");");
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //filtra todos los convenios a la condicion de $where
    public function filtroConvenios($where)
    {
        $query = $this->db->query("SELECT c.* FROM convenio c  LEFT JOIN e_c e ON c.id = e.convenio LEFT JOIN f_c f ON  c.id = f.convenio LEFT JOIN o_c o ON c.id = o.convenio LEFT JOIN entidad en ON e.entidad = en.id WHERE ".$where." GROUP BY e.convenio, f.convenio, o.convenio ORDER BY id desc;");
        return $query->result();
    }
}
