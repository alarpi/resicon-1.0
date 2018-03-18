<?php defined('BASEPATH') OR exit('No direct script access allowed');

class config extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('config_model');
        $this->load->library('session');
	}
	
	function autenticacion(){
		if(!$this->session->userdata('username')){
			redirect('acceso');
		}
	}

	function usuarios(){
		//comprobamos si el usuario está logeado
		$this->autenticacion();
		//solicitamos el listado de usuario
		$datos['usuarios'] = $this->config_model->listarUsuarios();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('usuarios/usuariosView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function modificaUsuario(){
		$datos['id'] = $this->uri->segment(3);
		$datos['usuario'] = $this->config_model->dimeUsuario($datos['id']);
		$datos['tiposUser'] = $this->config_model->tipos_User();
		$datos['nombreUsuarios'] = $this->config_model->listarUsuarios();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('usuarios/formularioUsuariosView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function nuevoUsuario(){
		$this->load->helper('form');
		$datos['tiposUser'] = $this->config_model->tipos_User();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('usuarios/formularioUsuariosNuevoView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function recibirDatos(){
		$nuevo = array(
			'tipo' => $this->input->post('tipo'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nombre' => $this->input->post('nombre')
			
		);
		$this->config_model->creaUser($nuevo);
		
		$datos['usuarios'] = $this->config_model->listarUsuarios();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('usuarios/usuariosView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function actualizarUsuario(){
		$modifica = array(
			'id' => $this->uri->segment(3),
			'tipo' => $this->input->post('tipo'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'nombre' => $this->input->post('nombre')
		);
		$this->config_model->modificaUsuario($modifica);		
		$datos['usuarios'] = $this->config_model->listarUsuarios();		
		redirect('/config/usuarios','refresh');
		
	}
	
	function eliminaUsuario(){
		$id = $this->uri->segment(3);
		
		$this->config_model->eliminaUsuario($id);		
		redirect('/config/usuarios','refresh');
		
	}
}

