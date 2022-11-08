<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

	public function index(){

		$this->load->view('login_view');
	}

	public function forgot_password(){

		$this->load->view('forgot_password_view');
	}

	public function procesar(){

		$this->form_validation->set_rules('usuario', 'Usuario', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() === FALSE){
			$this->load->view('login_view');

		}else{

			$usuario 	= $this->input->post('usuario');
			$password 	= $this->input->post('password');

			$check_login = $this->config_ml->login($usuario,$password);

			if($check_login){

				if($check_login->status != 'Activo'){
					$this->session->set_flashdata('info','Usuario inactivo por favor comuníquese con el area de soporte');
					redirect(base_url(),'refresh');
				}

				$data = array(
                    'is_logued_in'		=> TRUE,
                    'id'            	=> $check_login->id,
                    'fk_sector'      	=> $check_login->fk_sector,
                    'tipo_usuario'      => $check_login->tipo_usuario,
                    'nombre'        	=> $check_login->nombre,
                    'usuario'       	=> $check_login->usuario,
                    'password'      	=> $check_login->password,
                    'email'      		=> $check_login->email,
                    'img'      			=> $check_login->img
                );

				if($check_login->tipo_usuario == 'Usuario'){
					$this->session->set_userdata($data);
					$this->session->set_flashdata('success','Bienvenidos ha iniciado sesión con exito');
					redirect('usuario/dashboard','refresh',$data);

				}else{
					$this->session->set_userdata($data);
					$this->session->set_flashdata('success','Bienvenidos ha iniciado sesión con exito');
					redirect('admin/dashboard','refresh',$data);
				}
			}else{

				$this->session->set_flashdata('info','Los datos introducidos son incorrectos. Intente nuevamente');
				redirect(base_url(),'refresh');
			}
		}
	}
}
