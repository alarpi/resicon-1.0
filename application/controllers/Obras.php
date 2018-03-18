<?php defined('BASEPATH') OR exit('No direct script access allowed');

class obras extends CI_Controller {

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
		$this->load->model('obras_model');
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
		$datos['obras'] = $this->obras_model->listarObras();
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('obras/obrasView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function nuevaObra(){
		$this->load->helper('form');
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('obras/formularioObraNuevoView');
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaObraNueva(){
		$nuevo = array(
			'nombre' => $this->input->post('nombre'),
			'direccion' => $this->input->post('direccion'),
			'comentarios' => $this->input->post('comentarios'),
			'tipoObra' => $this->input->post('tipoObra'),
			'cuentaCotizacion' =>$this->input->post('cuentaCotizacion'),
			'nombreObra' =>$this->input->post('nombreObra')
		);
		$this->obras_model->creaObra($nuevo);
		redirect('/obras/','refresh');
	}
	
	function modificaObra(){	
		$datos['id'] = $this->uri->segment(3);
		$datos['obra'] = $this->obras_model->dimeObra($datos['id']);
		$this->load->view('Plantillas/Cabecera');
		$this->load->view('Plantillas/menu');
		$this->load->view('obras/formularioObraModificaView',$datos);
		$this->load->view('Plantillas/Footer');
	}
	
	function guardaModificaObra(){
		$id = $this->uri->segment(3);
		$nuevo = array(
			'id' => $id,
			'nombre' => $this->input->post('nombre'),
			'direccion' => $this->input->post('direccion'),
			'comentarios' => $this->input->post('comentarios'),
			'tipoObra' => $this->input->post('tipoObra'),
			'cuentaCotizacion' =>$this->input->post('cuentaCotizacion'),
			'estado' => $this->input->post('estado'),
			'nombreObra' => $this->input->post('nombreObra')
		);
		$this->obras_model->modificaObra($nuevo);
		redirect('/obras/modificaObra/'.$id,'refresh');
	}
	
	function eliminaObra(){
		$id = $this->uri->segment(3);		
		$this->obras_model->eliminaObra($id);		
		redirect('/obras','refresh');
		
	}
}

