<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config_ml extends CI_Model{
	
	function __construct(){

		parent::__construct();
	}

	function login($usuario,$password){

        $sql =  $this->db->select('*', FALSE)
				->where('usuario', $usuario)
				->where('password', $password)
                ->get('usuarios');
        if($sql->num_rows() == 1){
            return $sql->row();
        }
	}

	function listadoCategorias(){

        $sql =  $this->db->select('id, nombre', FALSE)
            ->order_by('nombre', 'ASC')
            ->get('categorias');
        return $sql->result_array();
	}

    function listadoSector(){
        
        $sql =  $this->db->select('id, nombre, descripcion', FALSE)
            ->order_by('nombre', 'ASC')
            ->get('sector_usuarios');
        return $sql->result_array(); 
	}

	function getSector(){
        
        $sql =  $this->db->select('id, nombre, descripcion', FALSE)
            ->where('id', $this->session->userdata('fk_sector'))
            ->order_by('nombre', 'ASC')
            ->get('sector_usuarios');
        if ($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return null;
        } 
	}
}
?>