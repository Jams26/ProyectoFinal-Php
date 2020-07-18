<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ayudante extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            redirect('login');
        }
    }

	public function index()
	{
        if($this->session->userdata('level') =='2'){
            $this->load->model('Ayudantes_model');
            $casos = $this->Ayudantes_model->todos();
            $datos=array();
            $datos['casos'] = $casos;
            $this->load->view('ayudantes/listaCasos', $datos);
        }else{
            echo"Acceso denegado !";
        }
    }

    function editar($casoId){
        if($this->session->userdata('level') =='2'){
            $this->load->model('Casos_model');
            $caso = $this->Casos_model->getCasos($casoId);
            $datos = array();
            $datos['casos'] = $caso;

            $this->form_validation->set_rules('nombre', 'nombre', 'required');
            $this->form_validation->set_rules('apellido', 'apellido', 'required');
            $this->form_validation->set_rules('pais', 'pais', 'required');
            $this->form_validation->set_rules('ciudad', 'ciudad', 'required');
            $this->form_validation->set_rules('lat', 'lat', 'required');
            $this->form_validation->set_rules('lon', 'lon', 'required');
            $this->form_validation->set_rules('fecha_nacimiento', 'fecha nacimiento', 'required');
            $this->form_validation->set_rules('fecha_contagio', 'fecha contagio', 'required');
            $this->form_validation->set_rules('comentario', 'comentario', 'required');
            
            if($this->form_validation->run() == false){
            
                $this->load->view('ayudantes/editarCasos', $datos);
                
            }else{
                
                $array = array();
                $array['cedula'] = $this->input->post('cedula');
                $array['nombre'] = $this->input->post('nombre');
                $array['apellido'] = $this->input->post('apellido');
                $array['pais'] = $this->input->post('pais');
                $array['ciudad'] = $this->input->post('ciudad');
                $array['lat'] = $this->input->post('lat');
                $array['lon'] = $this->input->post('lon');
                $array['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
                $array['fecha_contagio'] = $this->input->post('fecha_contagio');
                $array['comentario'] = $this->input->post('comentario');
                $this->Casos_model->actualizarCasos($casoId, $array);

                $this->session->set_flashdata('correcto', 'Datos actualizado correctamente !');
                $this->session->set_flashdata('titulo', 'Actualizacion de datos');
                
                redirect(base_url().'index.php/ayudante/index');
                
            }
        }else{
            echo "Acceso denegado !";
        }
    }

    public function listaNoticias()
	{
        if($this->session->userdata('level') =='2'){
            $this->load->model('Noticias_model');
            $noti = $this->Noticias_model->todos();
            $datos=array();
            $datos['noti'] = $noti;
            $this->load->view('ayudantes/listaNoticias', $datos);
        }else{
            echo"Acceso denegado !";
        }
    }

    function editarNoticias($notId){
        if($this->session->userdata('level') =='2'){
            $this->load->model('Noticias_model');
            $noti = $this->Noticias_model->getNoti($notId);
            $datos = array();
            $datos['noti'] = $noti;
            $this->form_validation->set_rules('titulo', 'titulo', 'required');
            $this->form_validation->set_rules('fecha', 'fecha', 'required');
            $this->form_validation->set_rules('resumen', 'resumen', 'required');
            $this->form_validation->set_rules('contenido', 'contenido', 'required');
            
            if($this->form_validation->run() == false){
                
                $this->load->view('ayudantes/editarnoticias', $datos);
                
            }else{
                $array = array();
                $array['titulo'] = $this->input->post('titulo');
                $array['fecha'] = $this->input->post('fecha');
                $array['resumen'] = $this->input->post('resumen');
                $array['contenido'] = $this->input->post('contenido');
                $nombreImg = $_FILES['foto']['name'];
                $archivo = $_FILES['foto']['tmp_name'];
                $ruta="subir";
                $ruta=$ruta."/".$nombreImg;
                $array['foto'] = $ruta;
                move_uploaded_file($archivo, $ruta);
                $this->Noticias_model->actualizarNoti($notId, $array);
                
                $this->session->set_flashdata('correcto', 'Datos actualizado correctamente !');
                $this->session->set_flashdata('titulo', 'Actualizacion de datos');
                redirect(base_url().'index.php/ayudante/listaNoticias');

            }
        }else{
            echo "acceso denegado";
        }
    }
}
