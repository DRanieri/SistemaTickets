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

		$data = array(
            'usuario'=> $this->usuario_ml->totalUsuario(),
            'ticketAsignado'=> $this->ticket_ml->totalTickets('Asignado'),
            'ticketRechazado'=> $this->ticket_ml->totalTickets('Rechazado'),
            'ticketCerrado'=> $this->ticket_ml->totalTickets('Cerrado'),
            'listadoTicketsLimit'=> $this->ticket_ml->listadoTicketsLimit(10)
        );

        $this->load->view('admin/template/header_view');
        $this->load->view('admin/template/content_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

    function perfil(){

        $row = $this->usuario_ml->get($this->session->userdata('id'));

        $data['row'] = $row;

		$this->load->view('admin/template/header_view');
        $this->load->view('admin/template/perfil_view',$data);
        $this->load->view('admin/template/footer_view');
        $this->load->view('lib/js_dashboard_template');
    }

    function update(){
        if($this->session->userdata('is_logued_in') == true){
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $email = $this->input->post('email');

			$usu = $this->usuario_ml->get($id);

            $this->form_validation->set_rules("nombre", "Nombre", "required");
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

            if ($this->form_validation->run()){

                $nombre_archivo = "";
                if (isset($_FILES['imagen']['name'])) {
                    $nombre_archivo = $_FILES['imagen']['name'];
                    $archivo        = $_FILES['imagen']['tmp_name'];

                    $res = explode(".", $nombre_archivo);
                    $dirtemp = "uploads/perfil/" . $nombre_archivo . "";

                    $resultado = @move_uploaded_file($archivo, $dirtemp);
                }

                $newPassword = "";
                if($this->input->post('password') == ""){
                    $newPassword.= $usu->password;
                }else{
                    $newPassword.= $this->input->post('password');
                }

                $data = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'password' => $newPassword,
                    'email' => $email,
                    'img' => $nombre_archivo
                );

                $update = $this->usuario_ml->update($data);

                if($update == TRUE){
                    $this->session->set_flashdata('success','¡EXCELENTE! Los datos se han registrado con exito');
                    redirect('admin/dashboard/logout', 'refresh');
                }else{
                    $this->session->set_flashdata('info','¡INFO! Los datos no se han podido guardar');
                    redirect('admin/dashboard/perfil', 'refresh');
                }
            }else{

                $this->perfil();
            }

        }else{

			$this->session->set_flashdata('info','¡ERROR! Usted no se encuentra logeado');
			redirect('login', 'refresh');
        }
    }

    function logout(){
		
        $this->session->unset_userdata('is_logued_in');
        session_destroy();
        redirect(base_url(), 'refresh');
    }
}
