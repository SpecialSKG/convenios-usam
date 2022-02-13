<?php 
defined('BASEPATH') OR exit('No hay acceso directo permitido');
//clase "generica" que puede hacer cualquier operacion crud basica
class crud_model extends CI_Model{

    public function __construct()
    {
        Parent:: __construct();
    }

    // inserta en el tabla $tabla el item $item
    public function insertar($item, $tabla){
        $flag = false;
        if($this->db->insert($tabla, $item)){
            $flag = true;
        }
        return $flag;
    }

    //retorna el contenido de la tabla $tabla con el nombre del campo id $nombreid
    public function mostrar($nombreId, $tabla){
        $this->db->order_by($nombreId, "desc");
        $query = $this->db->get($tabla);
        return $query->result();
    }

    //retorna el contenido de la tabla $tabla donde se cumple el array $where ej: array("estado" => "activo")
    public function mostrarWhere($tabla, $where){
        $query = $this->db->get_where($tabla,  $where);
        return $query->result();
    }

    //retorna el contenido de la tabla $tabla donde se cumple la string $where ej: "fecha = '2020-12-02'"
    public function mostrarWhereQuery($tabla, $where){
        $sql = $this->db->query("SELECT * FROM ".$tabla." where ".$where.";");
        return $sql->result();
    }

    //realiza una actualizacion de en la tabla $tabla con nombre del campo id $nombreId el item $item con id $id
    public function actualizar($id, $nombreId, $item, $tabla){
        $flag = false;
        try {
            $this->db->where($nombreId, $id);
            if($this->db->update($tabla, $item)){
                $flag = true;
            }elseif ($this->db->update($tabla, $item) === false) {
                echo $this->db->_error_message();      
            }
            return $flag;
        } catch (Exception $e) {
            var_dump($e->getMessage());
            return $flag;
        }
    }

    //retorna los parametros pedidos $parametros de un join simple de solamente 2 tablas $tablauno y $tablaDos
    // donde el campoUnion1 es el campo de la tablauno que se iguala a $campoUnion2 que es el campos de union de la tablaDos
    public function mostrarJoin($parametros,$tablauno, $campoUnion1,$tablaDos, $campoUnion2){
        $this->db->select($parametros);
        $this->db->from($tablauno);
        $this->db->join($tablaDos, $campoUnion1 ."=".$campoUnion2 );
        $query = $this->db->get();
        return $query->result_array();
    }

    //retorna la fila de la tabla $tabla con el id $id (se tiene que espeficar como se llama la columna primary key $nombreId)
    public function mostrarItem($id, $nombreId, $tabla){
        $this->db->where($nombreId, $id);
        $query = $this->db->get($tabla);
        return $query->row();
    } 


    //elimina la fila con el campo primariy key con nombre $nombreId que contenga el valor $id de la tabla $tabla
    
    public function eliminarP($id, $nombreId, $tabla){
        $flag = false;
        $this->db->where($nombreId, $id);
        if($this->db->delete($tabla)){
            $flag = true;
        }
        return $flag;
    }
    
    public function eliminar($data){
		$this->db->where('codigo =', $data['codigo']);
		return($this->db->delete('oficinaadministrativa')) ? true:false;
	}

    //hace un truncate en la tabla $tabla
    public function eliminarTodo($tabla){
        $flag = false;
        if($this->db->empty_table($tabla)){
            $flag = true;
        }
        return $flag;
    }

}