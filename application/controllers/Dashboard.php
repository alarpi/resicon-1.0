<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('empleados_model');
		$this->load->model('vehiculos_model');
		$this->load->model('maquinaria_model');
		$this->load->model('obras_model');
	}

	public function index(){
		if(!$this->session->userdata('username')){
			redirect('acceso');
		}
		$datos['bajas'] = $this->empleados_model->totalBajas();
		$datos['empleados'] = $this->empleados_model->totalEmpleados();
		$datos['vehiculos'] = $this->vehiculos_model->totalVehiculos();
		$datos['bajasvehiculos'] = $this->vehiculos_model->totalBajasVehiculos();
		$datos['maquinas'] = $this->maquinaria_model->totalMaquinas();
		$datos['bajasmaquinas'] = $this->maquinaria_model->totalBajasMaquinas();
		$datos['obras'] = $this->obras_model->totalObras();
		$datos['reconocimientoMedico'] = $this->empleados_model->TotalreconocimientoMedico();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('dashboard',$datos);
		$this->load->view('Plantillas/Footer');
	}
}
