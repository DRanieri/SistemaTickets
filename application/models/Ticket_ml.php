<?php

class Ticket_ml extends CI_Model{

    public function __construct(){

        parent::__construct();
    }

    function add($data = array()){

        $this->db->insert('tickets', $data);
        return $this->db->insert_id();
    }

    function totalTickets($status){
        $sql =  $this->db->select('count(id) total', FALSE)
            ->where('status', $status)
            ->get('tickets');

        if ($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return null;
        }
    }

    function totalTicketsByUser($status){
        $sql =  $this->db->select('count(id) total', FALSE)
            ->where('status', $status)
            ->where('fk_usuario', $this->session->userdata('id'))
            ->get('tickets');

        if ($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return null;
        }
    }

    function listadoTickets($status){

        $sql =  $this->db->select('tik.id, tik.fk_usuario, usu.nombre AS nombre_usuario, usu.email AS email_usuario, tik.fk_categoria, cat.nombre AS nombre_categoria, sec.nombre AS nombre_sector, tik.asunto, tik.descripcion, tik.img, tik.observaciones, tik.status, DATE_FORMAT(tik.fecha_creacion, "%d-%m-%Y") fecha_creacion, DATE_FORMAT(tik.fecha_finalizacion, "%d-%m-%Y") fecha_finalizacion', FALSE)
            ->join('usuarios usu', 'tik.fk_usuario = usu.id', 'inner')
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id', 'inner')
            ->join('categorias cat', 'tik.fk_categoria = cat.id', 'inner')
            ->where('tik.status', $status)
            ->order_by('tik.id', 'DESC')
            ->get('tickets tik');

        return $sql->result_array();
	}

    function listadoTicketsByUser($status){

        $sql =  $this->db->select('tik.id, tik.fk_usuario, usu.nombre AS nombre_usuario, usu.email AS email_usuario, tik.fk_categoria, cat.nombre AS nombre_categoria, sec.nombre AS nombre_sector, tik.asunto, tik.descripcion, tik.img, tik.observaciones, tik.status, DATE_FORMAT(tik.fecha_creacion, "%d-%m-%Y") fecha_creacion, DATE_FORMAT(tik.fecha_finalizacion, "%d-%m-%Y") fecha_finalizacion', FALSE)
            ->join('usuarios usu', 'tik.fk_usuario = usu.id', 'inner')
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id', 'inner')
            ->join('categorias cat', 'tik.fk_categoria = cat.id', 'inner')
            ->where('tik.status', $status)
            ->where('tik.fk_usuario', $this->session->userdata('id'))
            ->order_by('tik.id', 'DESC')
            ->get('tickets tik');

        return $sql->result_array();
	}

    function listadoTicketsLimit($limit){

        $sql =  $this->db->select('tik.id, tik.fk_usuario, usu.nombre AS nombre_usuario, usu.email AS email_usuario, tik.fk_categoria, cat.nombre AS nombre_categoria, sec.nombre AS nombre_sector, tik.asunto, tik.descripcion, tik.img, tik.observaciones, tik.status, DATE_FORMAT(tik.fecha_creacion, "%d-%m-%Y") fecha_creacion, DATE_FORMAT(tik.fecha_finalizacion, "%d-%m-%Y") fecha_finalizacion', FALSE)
            ->join('usuarios usu', 'tik.fk_usuario = usu.id', 'inner')
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id', 'inner')
            ->join('categorias cat', 'tik.fk_categoria = cat.id', 'inner')
            ->limit($limit)
            ->order_by('tik.id', 'DESC')
            ->get('tickets tik');

        return $sql->result_array();
	}

    function listadoTicketsLimitByUser($limit){

        $sql =  $this->db->select('tik.id, tik.fk_usuario, usu.nombre AS nombre_usuario, usu.email AS email_usuario, tik.fk_categoria, cat.nombre AS nombre_categoria, sec.nombre AS nombre_sector, tik.asunto, tik.descripcion, tik.img, tik.observaciones, tik.status, DATE_FORMAT(tik.fecha_creacion, "%d-%m-%Y") fecha_creacion, DATE_FORMAT(tik.fecha_finalizacion, "%d-%m-%Y") fecha_finalizacion', FALSE)
            ->join('usuarios usu', 'tik.fk_usuario = usu.id', 'inner')
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id', 'inner')
            ->join('categorias cat', 'tik.fk_categoria = cat.id', 'inner')
            ->where('tik.fk_usuario', $this->session->userdata('id'))
            ->limit($limit)
            ->order_by('tik.id', 'DESC')
            ->get('tickets tik');

        return $sql->result_array();
	}

    function seachData($desde, $hasta, $fk_usuario, $fk_categoria, $status){
        $where = "tik.fecha_creacion >=  '" . $desde . "' AND tik.fecha_creacion <= '" . $hasta . "' ";

        if ($fk_usuario != '') {
            $where .= "AND tik.fk_usuario = " . $fk_usuario . "";
        }

        if ($fk_categoria != '') {
            $where .= " AND tik.fk_categoria = " . $fk_categoria . "";
        }

        if ($status != '') {
            $where .= " AND tik.status = '" . $status . "'";
        }

        $sql =  $this->db->select('tik.id, tik.fk_usuario, usu.nombre AS nombre_usuario, usu.email AS email_usuario, tik.fk_categoria, cat.nombre AS nombre_categoria, sec.nombre AS nombre_sector, tik.asunto, tik.descripcion, tik.img, tik.observaciones, tik.status, DATE_FORMAT(tik.fecha_creacion, "%d-%m-%Y") fecha_creacion, DATE_FORMAT(tik.fecha_finalizacion, "%d-%m-%Y") fecha_finalizacion', FALSE)
            ->join('usuarios usu', 'tik.fk_usuario = usu.id', 'inner')
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id', 'inner')
            ->join('categorias cat', 'tik.fk_categoria = cat.id', 'inner')
            ->where($where)
            ->order_by('tik.id', 'DESC')
            ->get('tickets tik');

        return $sql->result_array();
    }

    function get($id){

        $sql =  $this->db->select('tik.id, tik.fk_usuario, usu.nombre AS nombre_usuario, usu.email AS email_usuario, tik.fk_categoria, cat.nombre AS nombre_categoria, sec.nombre AS nombre_sector, tik.asunto, tik.descripcion, tik.img, tik.observaciones, tik.status, DATE_FORMAT(tik.fecha_creacion, "%d-%m-%Y") fecha_creacion, DATE_FORMAT(tik.fecha_finalizacion, "%d-%m-%Y") fecha_finalizacion', FALSE)  
            ->join('usuarios usu', 'tik.fk_usuario = usu.id', 'inner')
            ->join('sector_usuarios sec', 'usu.fk_sector = sec.id', 'inner')
            ->join('categorias cat', 'tik.fk_categoria = cat.id', 'inner')
            ->where('tik.id', $id)
            ->get('tickets tik');

        if ($sql->num_rows() > 0){
            return $sql->row();
        }else{
            return null;
        }  
    }
    
    function update($data = array()){

        $this->db->where('id',$data['id']);
        return $this->db->update('tickets', $data);
    }

    function delete($id) {

        $this->db->where('id', $id);
        $query = $this->db->delete('tickets');
        if($query === true) {
            return true; 
        }else{
            return false;
        }
    }
}
