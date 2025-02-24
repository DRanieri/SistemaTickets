<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('is_logued_in')) {
            $this->session->set_flashdata('error', '¡ERROR! Disculpe no puede acceder. Inicie sesión.');
            redirect(base_url(), 'refresh');
        }
    }

    function index(){
    
        $data =  array(
            'usuarios' => $this->usuario_ml->listadoByNotAdmin(),
            'categorias' => $this->config_ml->listadoCategorias()
        );

        $this->load->view('admin/template/header_view',$data);
        $this->load->view('admin/reportes/index_view', $data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

    function search(){
        $fk_usuario = $this->input->post('fk_usuario');
        $fk_categoria = $this->input->post('fk_categoria');
        $status = $this->input->post('status');

        list($startDate, $endDate) = explode(' ~ ', $this->input->post('fecha'));

        $desde = $startDate;
        $hasta = $endDate;

        $data =  array(
            'usuarios' => $this->usuario_ml->listadoByNotAdmin(),
            'categorias' => $this->config_ml->listadoCategorias(),
            'fk_categoria' => $fk_categoria,
            'fk_usuario' => $fk_usuario,
            'status' => $status,
            'listado' => $this->ticket_ml->seachData($desde, $hasta, $fk_usuario, $fk_categoria, $status)
        );

        $this->load->view('admin/template/header_view',$data);
        $this->load->view('admin/reportes/search_view', $data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }
}
