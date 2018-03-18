<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Obras_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}
	
	function listarObras(){
	   $consulta = $this->db->get('obras');	
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	function listarObrasActivas(){
		$consulta = $this->db->where('estado',0);
	    $consulta = $this->db->get('obras');	
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function creaObra($datos){
		$this->db->insert('obras', array('nombre'=>$datos['nombre'], 'direccion'=>$datos['direccion'], 'comentarios'=>$datos['comentarios'], 'tipoObra'=>$datos['tipoObra'], 'cuentaCotizacion'=>$datos['cuentaCotizacion'], 'nombreObra'=>$datos['nombreObra']));
	}
	
	function modificaObra($datos){
		$this->db->where('idObra',$datos['id']);
		$this->db->update('obras', array('nombre'=>$datos['nombre'], 'direccion'=>$datos['direccion'], 'comentarios'=>$datos['comentarios'], 'tipoObra'=>$datos['tipoObra'], 'cuentaCotizacion'=>$datos['cuentaCotizacion'], 'estado'=>$datos['estado'], 'nombreObra'=>$datos['nombreObra']));
	}
	
	function dimeObra($id){
		$this->db->where('idObra',$id);
		$consulta = $this->db->get('obras');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function eliminaObra($id){		
		//$this->db->delete('obras', array('idObra'=>$id));
	}
	
		function totalObras(){
		$this->db->from('obras')->where('estado', 0); 
		return $this->db->count_all_results();	
	}
	
	function listaNombresClientes(){
		$this->db->distinct();
		$this->db->select('nombre');
		$this->db->where('estado', 0);
		$consulta = $this->db->get('obras');
		if($consulta->num_rows() > 0) return $consulta;
		
	}	
	
	
}