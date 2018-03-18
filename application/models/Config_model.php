<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Config_model extends CI_Model{
		
	function __construct(){
		parent::__construct();
	}
	
	function listarUsuarios(){
	    $consulta = $this->db->get('usuarios');	
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function dimeUsuario($id){
		$this->db->where('id',$id);
	    $consulta = $this->db->get('usuarios');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function tipos_User(){
		$consulta = $this->db->get('tipos_user');
		if($consulta->num_rows() > 0) return $consulta;
		else return false;
	}
	
	function creaUser($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		$hoy = date('Y-m-d');
		$passwd = md5($datos['password']);
		$this->db->insert('usuarios', array('tipo'=>$datos['tipo'],'username'=>$datos['username'],'password'=>$passwd,'alta'=>$hoy, 'nombre'=>$datos['nombre'],'registradoPor'=>$registradoPor, 'registradoFecha'=>$registradoFecha));
	}
	
	function modificaUsuario($datos){
		$registradoPor = $this->session->userdata('id');
		$registradoFecha = date("Y-m-d H:i:s");
		$passwd = md5($datos['password']);
		$this->db->where('id', $datos['id']);
		$this->db->update('usuarios', array('tipo'=>$datos['tipo'], 'username'=>$datos['username'], 'password'=>$passwd, 'nombre'=>$datos['nombre'],'registradoPor'=>$registradoPor, 'registradoFecha'=>$registradoFecha));
		
	}
	
	function eliminaUsuario($id){		
		$this->db->delete('usuarios', array('id'=>$id));		
	}

}