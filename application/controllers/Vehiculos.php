<?php defined('BASEPATH') OR exit('No direct script access allowed');

class vehiculos extends CI_Controller {

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
		$this->load->model('vehiculos_model');
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
		//solicitamos el listado de Empleados
		$datos['vehiculos'] = $this->vehiculos_model->listarVehiculos();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('vehiculos/vehiculosView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function nuevoVehiculo(){
		$this->load->helper('form');
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('vehiculos/formularioVehiculoNuevoView');
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaVehiculoNuevo(){
		$nuevo = array(
			'marca' => $this->input->post('marca'),
			'modelo' => $this->input->post('modelo'),
			'matricula' => $this->input->post('matricula')			
		);
		$this->vehiculos_model->creaVehiculo($nuevo);
		redirect('/vehiculos/','refresh');
	}
	
	function modificaVehiculo(){	
		$datos['id'] = $this->uri->segment(3);
		$datos['vehiculo'] = $this->vehiculos_model->dimeVehiculo($datos['id']);
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('vehiculos/formularioVehiculoModificaView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaModificaVehiculo(){
		$nuevo = array(
			'id' => $this->uri->segment(3),
			'marca' => $this->input->post('marca'),
			'modelo' => $this->input->post('modelo'),
			'matricula' => $this->input->post('matricula'),
			'estado' => $this->input->post('estado')
		);
		$this->vehiculos_model->modificaVehiculo($nuevo);
		redirect('/vehiculos/','refresh');
	}
	
	function eliminaVehiculo(){
		$id = $this->uri->segment(3);		
		$this->vehiculos_model->eliminaVehiculo($id);		
		redirect('/vehiculos','refresh');
		
	}
}

