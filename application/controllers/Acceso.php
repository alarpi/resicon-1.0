<?php defined('BASEPATH') OR exit('No direct script access allowed');

class acceso extends CI_Controller {
	
	public function index(){
		if(isset($_POST['password'])){
			$this->load->model('acceso_model');
			if($this->acceso_model->login($_POST['username'],md5($_POST['password']))){
				$this->session->set_userdata('username',$_POST['username']);
				redirect('dashboard');
			}else{
				redirect('acceso?error');
			}
		}
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('accesoView');		
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('acceso');
	}
	
}
