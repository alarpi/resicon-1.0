<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso_model extends CI_Model{
		
	public function __construct(){
		parent::__construct();
	}
	
	public function login ($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$q = $this->db->get('usuarios');
		if($q->num_rows()>0){	
			$this->session->set_userdata('tipo',$q->result()[0]->tipo);
			$this->session->set_userdata('id',$q->result()[0]->id);
			return true;
		}else{
			return false;
		}
	}
	
	
	
	
}