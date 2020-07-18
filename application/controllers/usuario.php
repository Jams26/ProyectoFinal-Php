<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{   
    $this->load->model('Usuario_model');
    $datos= array();
    $usuarios = $this->Usuario_model->todos();
    $datos['usuario'] = $usuarios;
    $this->load->view('usuario/mostrarMapa', $datos);
  } 
  
  public function Noticias()
	{   
    $this->load->model('Noticias_model');
    $datos= array();
    $usuarios = $this->Noticias_model->todos();
    $datos['usuario'] = $usuarios;
    $this->load->view('usuario/mostrarNoticias', $datos);
  } 

  public function Estadistica()
	{   
    
    $this->load->view('usuario/mostrarEstadistica');
  } 
}
