<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}
	
	function listarEmpleados(){
	   $consulta = $this->db->get('empleados');	
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function dimeEmpleado($id){
		$this->db->where('idEmpleado',$id);
	    $consulta = $this->db->get('empleados');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function cargosEmpleados(){
		$consulta = $this->db->get('cargo_empeados');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function creaEmpleado($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		$this->db->insert('empleados', array('nombre'=>$datos['nombre'], 'dni'=>$datos['dni'], 'direccion'=>$datos['direccion'], 'telefono'=>$datos['telefono'], 'movil'=>$datos['movil'], 'correo'=>$datos['correo'], 'estado'=>$datos['estado'], 'cargo'=>$datos['cargo'], 'fechaAlta'=>$datos['fechaAlta'], 'numeroSS'=>$datos['numeroSS'], 'reconoMedico'=>$datos['reconoMedico'], 'registradoPor'=>$registradoPor, 'registradoFecha'=>$registradoFecha));
	}
	
	function modificaEmpleado($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		if($datos['fechaBaja']==''){$estado = $datos['estado'];}else{$estado='3';}
		$this->db->where('idEmpleado', $datos['id']);
		$this->db->update('empleados', array('nombre'=>$datos['nombre'], 'dni'=>$datos['dni'], 'direccion'=>$datos['direccion'], 'telefono'=>$datos['telefono'], 'movil'=>$datos['movil'], 'correo'=>$datos['correo'], 'estado'=> $estado, 'cargo'=>$datos['cargo'], 'fechaAlta'=>$datos['fechaAlta'],'fechaBaja'=>$datos['fechaBaja'], 'numeroSS'=>$datos['numeroSS'], 'reconoMedico'=>$datos['reconoMedico'],'registradoPor'=>$registradoPor, 'registradoFecha'=>$registradoFecha));		
	}
	
	function eliminaEmpleado($id){
		$this->db->where('idEmpleado', $id);
		$this->db->update('empleados', array('estado'=>4));
	}
	
	function agregaBajaEmpleado($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		$this->db->insert('bajasEmpleados', array('idEmpleado'=>$datos['idEmpleado'], 'fecha'=>$datos['fecha'], 'estado'=>$datos['estado'], 'motivo'=>$datos['motivo'],'registradoPor'=>$registradoPor, 'regristradoFecha'=>$registradoFecha));
		//registramos la baja y ponemos al empleado en estado 1
		$this->db->where('idEmpleado', $datos['idEmpleado']);
		$this->db->update('empleados', array('estado'=>$datos['estado']));
	}
	
	function dimeBajas($id){
		/*$this->db->where('idEmpleado',$id);
		$this->db->order_by("fecha", "DESC");
	    $consulta = $this->db->get('bajasEmpleados');*/
		$consulta = $this->db->query("SELECT * FROM `bajasEmpleados` WHERE `idEmpleado`= $id ORDER BY `idBajaEmpleado` DESC");
		
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function totalBajas(){
		$this->db->from('empleados')->where('estado', 1); 
		return $this->db->count_all_results();	
	}
	
	function totalEmpleados(){
		$this->db->from('empleados')->where('estado !=', 4); 
		return $this->db->count_all_results();	
	}
	
	function muestraEmpladosBaja(){
		$this->db->where('estado',1);
	    $consulta = $this->db->get('empleados');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function listaHorasEmpleado($id){
		$this->db->where('idEmpleado',$id);
		$this->db->order_by("fecha", "desc");
	    $consulta = $this->db->get('empleadosHoras');		
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function TotalreconocimientoMedico(){
		$fechaIni=date ('Y-m-j', strtotime('-1 year', strtotime(date("Y-m-d"))));
		$fechaFin=date ('Y-m-j', strtotime('+1 month', strtotime($fechaIni)));
		//$consulta = $this->db->query("SELECT * FROM `empleados` WHERE `estado`!= 4 AND `reconoMedico` BETWEEN '".$fechaIni."' AND  '".$fechaFin."'"); 
		$consulta = $this->db->query("SELECT count(*) as cuenta FROM `empleados` WHERE `estado`!= 4 AND `reconoMedico` BETWEEN '".$fechaIni."' AND  '".$fechaFin."'");
		return $consulta; 
			//$this->db->count_all_results();
	}
	
	function muestraReconocimientoMedico(){	
		$fechaIni = date ('Y-m-j', strtotime('-1 year', strtotime(date("Y-m-d"))));
		$fechaFin = date ('Y-m-j', strtotime('+1 month', strtotime($fechaIni)));;
		$consulta = $this->db->query("SELECT * FROM `empleados` WHERE `estado`!= 4 AND `reconoMedico` BETWEEN '".$fechaIni."' AND  '".$fechaFin."'"); 
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	
	function agregaHorasEmpleado($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		$consulta = $this->db->insert('empleadosHoras', array('idEmpleado'=>$datos['idEmpleado'], 'horas'=>str_replace(',','.',$datos['horas']), 'idObra'=>$datos['obra'], 'fecha'=>$datos['fecha'], 'horasExtra'=>str_replace(',','.',$datos['horasExtra']), 'viajes'=>$datos['viajes'], 'cliente'=>$datos['cliente'], 'horasConcepto'=>$datos['horasConcepto'], 'horasAveriado'=>str_replace(',','.',$datos['horasAveriado']), 'horasAveriadoConcepto'=>$datos['horasAveriadoConcepto'], 'viajes'=>$datos['viajesConcepto'], 'litrosGasoil'=>$datos['litrosGasoil'], 'horasMartillo'=>str_replace(',','.',$datos['horasMartillo']), 'horasMartilloConcepto'=>$datos['horasMartilloConcepto'], 'horasRetro'=>str_replace(',','.',$datos['horasRetro']), 'horasRetroConcepto'=>$datos['horasRetroConcepto'], 'camion'=>$datos['camion'], 'maquina'=>$datos['maquina'], 'kmSalida'=>$datos['kmSalida'], 'kmLlegada'=>$datos['kmLlegada'], 'horaAM'=>$datos['horaAM'], 'horaPM'=>$datos['horaPM'], 'horasParada'=>$datos['horasParada'], 'horasParadaConcepto'=>$datos['horasParadaConcepto'], 'aceiteMotor'=>$datos['aceiteMotor'], 'aceiteHID'=>$datos['aceiteHID'], 'otros'=>$datos['otros'], 'vale'=>$datos['vale'], 'horasExtraConcepto'=>$datos['horasExtraConcepto'],'registradoPor'=>$registradoPor, 'registradoFecha'=>$registradoFecha));
		if($consulta){return true;}else{return false;}
	}
	
	function dimeHora($idHora){
		$this->db->where('idEmpleadoHoras',$idHora);	
	    $consulta = $this->db->get('empleadosHoras');		
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function modificaHorasEmpleado($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		$this->db->where('idEmpleadoHoras', $datos['idEmpleadosHoras']);
		$consulta = $this->db->update('empleadosHoras', array('horas'=>str_replace(',','.',$datos['horas']), 'idObra'=>$datos['obra'], 'fecha'=>$datos['fecha'], 'horasExtra'=>str_replace(',','.',$datos['horasExtra']), 'viajes'=>$datos['viajes'], 'cliente'=>$datos['cliente'], 'horasConcepto'=>$datos['horasConcepto'], 'horasAveriado'=>str_replace(',','.',$datos['horasAveriado']), 'horasAveriadoConcepto'=>$datos['horasAveriadoConcepto'], 'viajes'=>$datos['viajes'], 'viajesConcepto'=>$datos['viajesConcepto'], 'litrosGasoil'=>$datos['litrosGasoil'], 'litrosGasoilConcepto'=>$datos['litrosGasoilConcepto'], 'horasMartillo'=>str_replace(',','.',$datos['horasMartillo']), 'horasMartilloConcepto'=>$datos['horasMartilloConcepto'], 'horasRetro'=>str_replace(',','.',$datos['horasRetro']), 'horasRetroConcepto'=>$datos['horasRetroConcepto'], 'camion'=>$datos['camion'], 'maquina'=>$datos['maquina'], 'kmSalida'=>$datos['kmSalida'], 'kmLlegada'=>$datos['kmLlegada'], 'horaAM'=>$datos['horaAM'], 'horaPM'=>$datos['horaPM'], 'horasParada'=>$datos['horasParada'], 'horasParadaConcepto'=>$datos['horasParadaConcepto'], 'aceiteMotor'=>$datos['aceiteMotor'], 'aceiteHID'=>$datos['aceiteHID'], 'otros'=>$datos['otros'], 'vale'=>$datos['vale'], 'horasExtraConcepto'=>$datos['horasExtraConcepto'],'registradoPor'=>$registradoPor, 'registradoFecha'=>$registradoFecha));
		if($consulta){return true;}else{return false;}
	}
	
}