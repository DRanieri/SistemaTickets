<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct(){
        parent::__construct();

        if (!$this->session->userdata('is_logued_in')) {
            $this->session->set_flashdata('error', '¡ERROR! Disculpe no puede acceder. Inicie sesión.');
            redirect(base_url(), 'refresh');
        }
    }

    function index(){

        $id_usuario = $this->session->userdata('is_logued_in');

		$data = array(
            'ticketAsignado'=> $this->ticket_ml->totalTicketsByUser('Asignado'),
            'ticketRechazado'=> $this->ticket_ml->totalTicketsByUser('Rechazado'),
            'ticketCerrado'=> $this->ticket_ml->totalTicketsByUser('Cerrado'),
            'listadoTicketsLimit'=> $this->ticket_ml->listadoTicketsLimitByUser(10)
        );

        $this->load->view('usuario/template/header_view');
        $this->load->view('usuario/template/content_view',$data);
        $this->load->view('usuario/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

    function logout(){
		
        $this->session->unset_userdata('is_logued_in');
        session_destroy();
        redirect(base_url(), 'refresh');
    }
}
