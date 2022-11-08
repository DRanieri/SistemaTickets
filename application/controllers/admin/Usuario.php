<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if (!$this->session->userdata('is_logued_in')){
            
            $this->session->set_flashdata('error','¡ERROR! Disculpe no puede acceder. Inicie sesión');
            redirect(base_url(),'refresh');
        }
    }

    function index(){

        $id_usuario = $this->session->userdata('id');
        $rol_usuario = $this->session->userdata('fk_tipo_usuario');

        $data['listado'] = $this->usuario_ml->listadoByNotAdmin();

		$this->load->view('admin/template/header_view');
		$this->load->view('admin/usuarios/index_view',$data);
		$this->load->view('admin/template/footer_view');
		$this->load->view('lib/js_dashboard_template');
        $this->load->view('lib/js_usuario');
    }

    function create(){

        $data['sector'] = $this->config_ml->listadoSector();

		$this->load->view('admin/template/header_view');
		$this->load->view('admin/usuarios/create_view',$data);
		$this->load->view('admin/template/footer_view');
		$this->load->view('lib/js_dashboard_template');
    }

    function store(){

        $fk_sector = $this->input->post('fk_sector');
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        $this->form_validation->set_rules("fk_sector", "Sector usuario", "required");
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules("usuario", "Usuario", "required|trim|is_unique[usuarios.usuario]");
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('confirm_password', 'Confirmar Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run()){

            $data = array(
                'fk_sector' => $fk_sector,
                'nombre' => $nombre,
                'usuario' => $usuario,
                'password' => $password,
                'email' => $email
            );

            $add = $this->usuario_ml->add($data);

            if($add == TRUE){
                $this->session->set_flashdata('success','¡EXCELENTE! Se registro con exito');
                redirect('admin/usuario', 'refresh');
            }else{
                $this->session->set_flashdata('info','¡INFO! Los datos no se han podido guardar');
                redirect('admin/usuario/create', 'refresh');
            }

        }else{
            $this->create();
        }
    }

    function show($id){

        if(!is_numeric($id)){
            $this->session->set_flashdata('info','¡ERROR! No puede acceder');
			redirect('admin/usuario', 'refresh');
        }

        $data['row']  = $this->usuario_ml->get($id);

        $this->load->view('admin/template/header_view',$data);
		$this->load->view('admin/usuarios/show_view',$data);
		$this->load->view('admin/template/footer_view');
		$this->load->view('lib/js_dashboard_template');
        $this->load->view('lib/js_usuario');
        
    }

    function edit($id){

        if(!is_numeric($id)){
            $this->session->set_flashdata('info','¡ERROR! No puede acceder');
			redirect('admin/usuario', 'refresh');
        }

        $data['row']  = $this->usuario_ml->get($id);
        $data['sector'] = $this->config_ml->listadoSector();

        $this->load->view('admin/template/header_view',$data);
		$this->load->view('admin/usuarios/edit_view',$data);
		$this->load->view('admin/template/footer_view');
		$this->load->view('lib/js_dashboard_template');
    }

    function update(){

        $id = $this->input->post('id');
        $fk_sector = $this->input->post('fk_sector');
        $nombre = $this->input->post('nombre');
        $email = $this->input->post('email');
        $status = $this->input->post('status');

        $usu = $this->usuario_ml->get($id);

        $this->form_validation->set_rules("fk_sector", "Sector usuario", "required");
        $this->form_validation->set_rules("nombre", "Nombre", "required");
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules("status", "Status", "required");

        if ($this->form_validation->run()){

            $newPassword = "";
            if($this->input->post('password') == ""){
                $newPassword.= $usu->password;
            }else{
                $newPassword.= $this->input->post('password');
            }

            $data = array(
                'id' => $id,
                'fk_sector' => $fk_sector,
                'nombre' => $nombre,
                'password' => $newPassword,
                'email' => $email,
                'status' => $status
            );

            $update = $this->usuario_ml->update($data);

            if($update == TRUE){
                $this->session->set_flashdata('success','¡EXCELENTE! Los datos se han registrado con exito');
                redirect('admin/usuario', 'refresh');
            }else{
                $this->session->set_flashdata('info','¡INFO! Los datos no se han podido guardar');
                redirect('admin/usuario', 'refresh');
            }
        }else{

            $this->edit($id);
        }
    }

    function delete(){

        $id = $this->input->post('id');

        $this->usuario_ml->delete($id);

		$this->session->set_flashdata('success','¡EXCELENTE! Se elimino con exito');
        redirect('admin/usuario', 'refresh');
	}
}