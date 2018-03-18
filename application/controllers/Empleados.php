<?php defined('BASEPATH') OR exit('No direct script access allowed');

class empleados extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('empleados_model');
		$this->load->model('obras_model');        
		$this->load->model('vehiculos_model');
		$this->load->model('maquinaria_model');
		$this->load->model('config_model');
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
		$datos['empleados'] = $this->empleados_model->listarempleados();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/empleadosView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function modificaEmpleado(){
		$datos['id'] = $this->uri->segment(3);
		$datos['redirec'] = '/'.$this->uri->segment(4);
		$datos['empleado'] = $this->empleados_model->dimeEmpleado($datos['id']);
		$datos['cargos'] = $this->empleados_model->cargosEmpleados();
		$datos['usuarios'] = $this->config_model->listarUsuarios();
		
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/formularioempleadosView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function nuevoEmpleado(){
		$this->load->helper('form');
		$datos['cargos'] = $this->empleados_model->cargosEmpleados();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/formularioEmpleadosNuevoView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function recibirDatos(){
		$nuevo = array(
			'nombre' => $this->input->post('nombre'),
			'dni' => $this->input->post('dni'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'movil' => $this->input->post('movil'),
			'correo' => $this->input->post('correo'),
			'estado' => $this->input->post('estado'),
			'cargo' => $this->input->post('cargo'),
			'fechaAlta' =>$this->input->post('fechaAlta'),
			'numeroSS' => $this->input->post('numeroSS'),
			'reconoMedico' => $this->input->post('reconoMedico')
		);
		$this->empleados_model->creaEmpleado($nuevo);
		redirect('/empleados/','refresh');		
	}
	
	function actualizarEmpleado(){
		$modifica = array(
			'id' => $this->uri->segment(3),
			'nombre' => $this->input->post('nombre'),
			'dni' => $this->input->post('dni'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'movil' => $this->input->post('movil'),
			'correo' => $this->input->post('correo'),
			'estado' => $this->input->post('estado'),
			'cargo' => $this->input->post('cargo'),
			'fechaAlta' =>$this->input->post('fechaAlta'),
			'fechaBaja' =>$this->input->post('fechaBaja'),
			'numeroSS' => $this->input->post('numeroSS'),
			'reconoMedico' => $this->input->post('reconoMedico')
		);
		$this->empleados_model->modificaEmpleado($modifica);
		if($this->uri->segment(4)=='Medico'){
			redirect('/empleados/reconocimientoMedico/','refresh');
		}else{
			redirect('/empleados/','refresh');
		}
	}
	
	function eliminaEmpleado(){
		$id = $this->uri->segment(3);		
		$this->empleados_model->eliminaEmpleado($id);		
		redirect('/empleados','refresh');
		
	}
	
	function baja(){
		$datos['id'] = $this->uri->segment(3);
		$datos['empleado'] = $this->empleados_model->dimeEmpleado($datos['id']);
		$datos['bajas'] = $this->empleados_model->dimeBajas($datos['id']);
		$datos['usuarios'] = $this->config_model->listarUsuarios();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/empleadosBajaView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function actualizarBaja(){
		$datos['id']=$this->uri->segment(3);
		$modifica = array(
			'idEmpleado' => $datos['id'],
			'fecha' => $this->input->post('fecha'),
			'estado' => $this->input->post('estado'),
			'motivo' => $this->input->post('motivo')
		);
		$this->empleados_model->agregaBajaEmpleado($modifica);
		redirect('/empleados/baja/'.$datos['id'],'refresh');
	}
	
	function bajaLaboral(){
		$datos['debaja'] = $this->empleados_model->muestraEmpladosBaja();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/empleadosBajaLaboralView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function reconocimientoMedico(){
		$datos['rMedicos'] = $this->empleados_model->muestraReconocimientoMedico();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/reconocimientoMedicoView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function nuevahora(){
		$datos['id']=$this->uri->segment(3);
		$datos['horas'] = $this->empleados_model->listaHorasEmpleado($datos['id']);
		$datos['empleado'] = $this->empleados_model->dimeEmpleado($datos['id']);
		$datos['obras'] = $this->obras_model->listarObrasActivas();
		$datos['clientes'] = $this->obras_model->listaNombresClientes();
		$datos['vehiculos'] = $this->vehiculos_model->listarVehiculos();
		$datos['maquinas'] = $this->maquinaria_model->listarMaquinas();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/empleadosNuevoHorasView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function Horas(){
		$datos['id']=$this->uri->segment(3);
		$datos['horas'] = $this->empleados_model->listaHorasEmpleado($datos['id']);
		$datos['empleado'] = $this->empleados_model->dimeEmpleado($datos['id']);
		$datos['obras'] = $this->obras_model->listarObrasActivas();
		$datos['clientes'] = $this->obras_model->listaNombresClientes();
		$datos['vehiculos'] = $this->vehiculos_model->listarVehiculos();
		$datos['maquinas'] = $this->maquinaria_model->listarMaquinas();
		$datos['todasobras'] = $this->obras_model->listarObras();
		$datos['usuarios'] = $this->config_model->listarUsuarios();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/empleadosHorasView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function registrahoras(){
		$datos['id']=$this->uri->segment(3);
		$modifica = array(
			'idEmpleado' => $datos['id'],
			'horas' => $this->input->post('horas'),
			'obra' => $this->input->post('obra'),
			'fecha' => $this->input->post('fecha'),
			'horasExtra' => $this->input->post('horasExtra'),
			'viajes' => $this->input->post('viajes'),
			'cliente' => $this->input->post('cliente'),
			'horasConcepto' => $this->input->post('horasConcepto'),
			'horasAveriado' => $this->input->post('horasAveriado'),
			'horasAveriadoConcepto' => $this->input->post('horasAveriadoConcepto'),
			'viajesConcepto' => $this->input->post('viajesConcepto'),
			'litrosGasoil' => $this->input->post('litrosGasoil'),
			'litrosGasoilConcepto' => $this->input->post('litrosGasoilConcepto'),
			'horasMartillo' => $this->input->post('horasMartillo'),
			'horasMartilloConcepto' => $this->input->post('horasMartilloConcepto'),
			'horasRetro' => $this->input->post('horasRetro'),
			'horasRetroConcepto' => $this->input->post('horasRetroConcepto'),
			'camion' => $this->input->post('camion'),
			'maquina' => $this->input->post('maquina'),
			'kmSalida' => $this->input->post('kmSalida'),
			'kmLlegada' => $this->input->post('kmLlegada'),
			'horaAM' => $this->input->post('horaAM'),
			'horaPM' => $this->input->post('horaPM'),
			'horasParada' => $this->input->post('horasParada'),
			'horasParadaConcepto' => $this->input->post('horasParadaConcepto'),
			'aceiteMotor' => $this->input->post('aceiteMotor'),
			'aceiteHID' => $this->input->post('aceiteHID'),
			'otros' => $this->input->post('otros'),
			'vale' => $this->input->post('vale'),
			'horasExtraConcepto' => $this->input->post('horasExtraConcepto')
		);
		$this->empleados_model->agregaHorasEmpleado($modifica);
		redirect('/empleados/horas/'.$datos['id'],'refresh');
	
	}
	
	
	function modificaHoras(){
		$datos['id']=$this->uri->segment(3);
		$datos['idHoras']=$this->uri->segment(4);
		$datos['horas'] = $this->empleados_model->dimeHora($datos['idHoras']);
		$datos['empleado'] = $this->empleados_model->dimeEmpleado($datos['id']);
		$datos['obras'] = $this->obras_model->listarObrasActivas();
		$datos['clientes'] = $this->obras_model->listaNombresClientes();
		$datos['vehiculos'] = $this->vehiculos_model->listarVehiculos();
		$datos['maquinas'] = $this->maquinaria_model->listarMaquinas();
		$datos['usuarios'] = $this->config_model->listarUsuarios();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('empleados/formularioModificaHoraView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaHoras(){
		$datos['id']=$this->uri->segment(3);
		$modifica = array(
			'idEmpleadosHoras' => $datos['id'],
			'horas' => $this->input->post('horas'),
			'obra' => $this->input->post('obra'),
			'fecha' => $this->input->post('fecha'),
			'horasExtra' => $this->input->post('horasExtra'),
			'viajes' => $this->input->post('viajes'),
			'cliente' => $this->input->post('cliente'),
			'horasConcepto' => $this->input->post('horasConcepto'),
			'horasAveriado' => $this->input->post('horasAveriado'),
			'horasAveriadoConcepto' => $this->input->post('horasAveriadoConcepto'),
			'viajesConcepto' => $this->input->post('viajesConcepto'),
			'litrosGasoil' => $this->input->post('litrosGasoil'),
			'litrosGasoilConcepto' => $this->input->post('litrosGasoilConcepto'),
			'horasMartillo' => $this->input->post('horasMartillo'),
			'horasMartilloConcepto' => $this->input->post('horasMartilloConcepto'),
			'horasRetro' => $this->input->post('horasRetro'),
			'horasRetroConcepto' => $this->input->post('horasRetroConcepto'),
			'camion' => $this->input->post('camion'),
			'maquina' => $this->input->post('maquina'),
			'kmSalida' => $this->input->post('kmSalida'),
			'kmLlegada' => $this->input->post('kmLlegada'),
			'horaAM' => $this->input->post('horaAM'),
			'horaPM' => $this->input->post('horaPM'),
			'horasParada' => $this->input->post('horasParada'),
			'horasParadaConcepto' => $this->input->post('horasParadaConcepto'),
			'aceiteMotor' => $this->input->post('aceiteMotor'),
			'aceiteHID' => $this->input->post('aceiteHID'),
			'otros' => $this->input->post('otros'),
			'vale' => $this->input->post('vale'),
			'horasExtraConcepto' => $this->input->post('horasExtraConcepto')
		);
		$this->empleados_model->modificaHorasEmpleado($modifica);
		redirect('/empleados/horas/'.$this->input->post('idEmpleado'),'refresh');
	}
	
	
	
	
}


