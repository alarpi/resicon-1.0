<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maquinaria_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}
	
	function listarMaquinas(){
	   $consulta = $this->db->get('maquinas');	
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function creaMaquina($datos){
		$this->db->insert('maquinas', array('marca'=>$datos['marca'], 'modelo'=>$datos['modelo'], 'tipo'=>$datos['tipo'], 'matricula'=>$datos['matricula']));
	}
	
	function modificaMaquina($datos){
		$this->db->where('idMaquina',$datos['id']);
		$this->db->update('maquinas', array('marca'=>$datos['marca'], 'modelo'=>$datos['modelo'], 'tipo'=>$datos['tipo'], 'matricula'=>$datos['matricula'], 'estado'=>$datos['estado']));
	}
	
	function dimeMaquina($id){
		$this->db->where('idMaquina',$id);
		$consulta = $this->db->get('maquinas');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function eliminaMaquina($id){		
		$this->db->delete('maquinas', array('idMaquina'=>$id));
	}	
	
	function totalBajasMaquinas(){
		$this->db->from('maquinas')->where('estado', 1); 
		return $this->db->count_all_results();	
	}
	
	function totalMaquinas(){
		$num = $this->db->count_all("maquinas");
		return $num;
	}
}