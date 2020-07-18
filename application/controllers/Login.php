<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}

	public function index()
	{
		$this->load->view('login_vista');
	}
	function revision(){
		$usuario = $this->input->post('usuario', TRUE) ;
		$clave = $this->input->post('password', TRUE);
		$resultado = $this->Login_model->check_user($usuario, $clave);
		if($resultado->num_rows() > 0){
			$datos = $resultado->row_array();
			$usuario = $datos['usuario'];
			$email = $datos['email'];
			$level = $datos['level'];
			$sesdata = array(
				'usuario' => $usuario,
				'email' => $email,
				'level' => $level,
				'logged_in' => TRUE
			);
			$this->session->set_userdata($sesdata);
			if($level === '1'){
				redirect('covid');
			}else if ($level === '2'){
				redirect('ayudante');
			}

		}else{
			echo "<script>alert('acceso denegado'); history.go(-1);</script>";
		}
		$this->load->view('login_vista');
	}

	function cerrarSesion(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
