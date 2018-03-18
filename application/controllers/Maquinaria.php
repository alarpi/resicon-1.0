<?php defined('BASEPATH') OR exit('No direct script access allowed');

class maquinaria extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('maquinaria_model');
        $this->load->library('session');
	}
	
	function autenticacion(){
		if(!$this->session->userdata('username')){
			redirect('acceso');
		}
	}

	function index(){
		//comprobamos si el Empleados está logeado
		$this->autenticacion();
		$datos['maquinas'] = $this->maquinaria_model->listarMaquinas();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('maquinas/maquinariaView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function nuevaMaquina(){
		$this->load->helper('form');
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('maquinas/formularioMaquinaNuevoView');
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaMaquinaNueva(){
		$nuevo = array(
			'marca' => $this->input->post('marca'),
			'modelo' => $this->input->post('modelo'),
			'tipo' => $this->input->post('tipo'),
			'matricula' => $this->input->post('matricula')			
		);
		$this->maquinaria_model->creaMaquina($nuevo);
		redirect('/maquinaria/','refresh');
	}
	
	function modificaMaquina(){	
		$datos['id'] = $this->uri->segment(3);
		$datos['maquina'] = $this->maquinaria_model->dimeMaquina($datos['id']);
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('maquinas/formularioMaquinaModificaView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaModificaMaquina(){
		$nuevo = array(
			'id' => $this->uri->segment(3),
			'marca' => $this->input->post('marca'),
			'modelo' => $this->input->post('modelo'),
			'tipo' => $this->input->post('tipo'),
			'matricula' => $this->input->post('matricula'),
			'estado' => $this->input->post('estado')
		);
		$this->maquinaria_model->modificaMaquina($nuevo);
		redirect('/maquinaria/','refresh');
	}
	
	function eliminaMaquina(){
		$id = $this->uri->segment(3);		
		$this->maquinaria_model->eliminaMaquina($id);		
		redirect('/maquinaria','refresh');
		
	}
}

