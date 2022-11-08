<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends CI_Controller{

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata('is_logued_in')) {
            $this->session->set_flashdata('error', '¡ERROR! Disculpe no puede acceder. Inicie sesión');
            redirect(base_url(), 'refresh');
        }
    }

    function asignado(){

        $data['listado'] = $this->ticket_ml->listadoTickets('Asignado');

        $this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/asignado_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
        $this->load->view('lib/js_ticket');
    }

    function rechazado(){

        $data['listado'] = $this->ticket_ml->listadoTickets('Rechazado');

        $this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/rechazado_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
        $this->load->view('lib/js_ticket');
    }

    function cerrado(){

        $data['listado'] = $this->ticket_ml->listadoTickets('Cerrado');

        $this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/cerrado_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
        $this->load->view('lib/js_ticket');
    }

    function create(){

        $data =  array(
            'categorias' => $this->config_ml->listadoCategorias(),
            'sector' => $this->config_ml->getSector()
        );

		$this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/create_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
	}

	function store(){

        $fk_categoria = $this->input->post('fk_categoria');
        $asunto = $this->input->post('asunto');
        $descripcion = $this->input->post('descripcion');

		$this->form_validation->set_rules('fk_categoria', 'Categoría', 'required');
		$this->form_validation->set_rules('asunto', 'Asunto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $nombre_archivo = "";
            if (isset($_FILES['imagen']['name'])) {
                $nombre_archivo = $_FILES['imagen']['name'];
                $archivo        = $_FILES['imagen']['tmp_name'];

                $res = explode(".", $nombre_archivo);
                $dirtemp = "uploads/tickets/" . $nombre_archivo . "";

                $resultado = @move_uploaded_file($archivo, $dirtemp);
            }

			$data = array(
                'fk_usuario' => $this->session->userdata('id'),
                'fk_categoria' => $fk_categoria,
                'asunto' => $asunto,
                'descripcion' => $descripcion,
                'img' => $nombre_archivo,
                'fecha_creacion' => date("Y-m-d")
            );

            $add = $this->ticket_ml->add($data);

            if($add == TRUE){
                $this->session->set_flashdata('success','¡EXCELENTE! Se registro con exito');
                redirect('admin/ticket/asignado', 'refresh');
            }else{
                $this->session->set_flashdata('info','¡INFO! Los datos no se han podido guardar');
                redirect('admin/ticket/create', 'refresh');
            }
        }
	}

    function show($id){

        if(!is_numeric($id)){
            $this->session->set_flashdata('info','¡ERROR! No puede acceder');
			redirect('admin/ticket/asignado', 'refresh');
		}

        $row = $this->ticket_ml->get($id);
        $categorias = $this->config_ml->listadoCategorias();
        $sector = $this->config_ml->getSector();

        $data['row'] = $row;
        $data['categorias'] = $categorias;
        $data['sector'] = $sector;

		$this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/show_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

	function edit($id){

        if(!is_numeric($id)){
            $this->session->set_flashdata('info','¡ERROR! No puede acceder');
			redirect('admin/ticket/asignado', 'refresh');
		}

        $row = $this->ticket_ml->get($id);
        $categorias = $this->config_ml->listadoCategorias();
        $sector = $this->config_ml->getSector();

        $data['row'] = $row;
        $data['categorias'] = $categorias;
        $data['sector'] = $sector;

		$this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/edit_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

	function update(){

        $id = $this->input->post('id');
        $fk_categoria = $this->input->post('fk_categoria');
        $asunto = $this->input->post('asunto');
        $descripcion = $this->input->post('descripcion');

        $this->form_validation->set_rules('fk_categoria', 'Categoría', 'required');
		$this->form_validation->set_rules('asunto', 'Asunto', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'id' => $id,
                'fk_categoria' => $fk_categoria,
                'asunto' => $asunto,
                'descripcion' => $descripcion
            );

            $update = $this->ticket_ml->update($data);

            if($update == TRUE){
                $this->session->set_flashdata('success','¡EXCELENTE! Los datos se han registrado con exito');
                redirect('admin/ticket/asignado', 'refresh');
            }else{
                $this->session->set_flashdata('info','¡INFO! Los datos no se han podido guardar');
                redirect('admin/ticket/asignado', 'refresh');
            }
        }
	}

    function closet($id){

        if(!is_numeric($id)){
            $this->session->set_flashdata('info','¡ERROR! No puede acceder');
			redirect('admin/ticket/asignado', 'refresh');
		}

        $row = $this->ticket_ml->get($id);

        $data['row'] = $row;

		$this->load->view('admin/template/header_view');
        $this->load->view('admin/tickets/closet_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

    function closet_ticket(){

        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $observaciones = $this->input->post('observaciones');

        $this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('observaciones', 'Observaciones', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->closet($id);
        } else {
            $data = array(
                'id' => $id,
                'status' => $status,
                'observaciones' => $observaciones,
                'fecha_finalizacion' => date("Y-m-d")
            );

            $update = $this->ticket_ml->update($data);

            if($update == TRUE){
                $this->session->set_flashdata('success','¡EXCELENTE! Los datos se han registrado con exito');
                redirect('admin/ticket/asignado', 'refresh');
            }else{
                $this->session->set_flashdata('info','¡INFO! Los datos no se han podido guardar');
                redirect('admin/ticket/asignado', 'refresh');
            }
        }
	}

	function delete(){
		
		$id = $this->input->post('id');

        $delete = $this->ticket_ml->delete($id);

        $this->session->set_flashdata('success','¡EXCELENTE! Se elimino con exito');
        redirect('admin/ticket/asignado', 'refresh');
	}
}
