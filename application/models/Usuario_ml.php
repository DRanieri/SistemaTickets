<?php
class Usuario_ml extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }

    function add($data = array()) {
        $this->db->insert('usuarios', $data);
        return $this->db->insert_id();
    }

    function totalUsuario(){

        $sql =  $this->db->select('count(id) total', FALSE)
            ->where_not_in('tipo_usuario', 'Admin')
            ->get('usuarios');

        if ($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return null;
        }
    }

    function listadoByNotAdmin() {
        $sql =  $this->db->select('usu.id, usu.fk_sector, sec.nombre AS nombre_sector, usu.nombre, usu.usuario, usu.password, usu.email, usu.status', FALSE)
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id','left')
            ->where_not_in('usu.tipo_usuario', 'Admin')
            ->order_by('usu.nombre', 'ASC')
            ->get('usuarios usu');

		if($sql->num_rows()>0) {
            return $sql->result_array();
        }
	}

    function get($id) {
        $sql =  $this->db->select('usu.id, usu.fk_sector, sec.nombre AS nombre_sector, usu.nombre, usu.usuario, usu.password, usu.email, usu.status', FALSE)
                ->join('sector_usuarios sec', 'usu.fk_sector = sec.id','left')
                ->where('usu.id', $id)
                ->get('usuarios usu');

        if ($sql->num_rows() > 0) {
            return $sql->row();
        }else{
            return null;
        }  
    }

    function update($data = array()) {
        $this->db->where('id',$data['id']);
        return $this->db->update('usuarios', $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete('usuarios');
    }
}