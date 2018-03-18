<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculos_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}
	
	function listarVehiculos(){
	   $consulta = $this->db->get('vehiculos');	
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function creaVehiculo($datos){
		$this->db->insert('vehiculos', array('marca'=>$datos['marca'], 'modelo'=>$datos['modelo'], 'matricula'=>$datos['matricula']));
	}
	
	function modificaVehiculo($datos){
		$this->db->where('idVehiculo',$datos['id']);
		$this->db->update('vehiculos', array('marca'=>$datos['marca'], 'modelo'=>$datos['modelo'], 'matricula'=>$datos['matricula'], 'estado'=>$datos['estado']));
	}
	
	function dimeVehiculo($id){
		$this->db->where('idVehiculo',$id);
		$consulta = $this->db->get('vehiculos');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function eliminaVehiculo($id){		
		$this->db->delete('vehiculos', array('idVehiculo'=>$id));
	}
	
	function totalBajasVehiculos(){
		$this->db->from('vehiculos')->where('estado', 1); 
		return $this->db->count_all_results();	
	}
	
	function totalVehiculos(){
		$num = $this->db->count_all("vehiculos");
		return $num;
	}
}