<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Covid extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in') != TRUE){
            redirect('login');
        }
    }

	public function index()
	{
        if($this->session->userdata('level') =='1'){
            $this->load->model('Casos_model');
            $casos = $this->Casos_model->todos();
            $datos = array();
            $datos['casos'] = $casos;
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
                $this->load->view('admin/agregarCasos', $datos);
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
                $this->Casos_model->agregar($array);
                $apiToken = "839934766:AAFnRZFtkMsdRnRBs7TZ2r3HyZo7Woc2dFY";
                $data = [
                    'chat_id' => '@SarsCovid19JR',
                    'text' => "Se ha registrado un nuevo caso de infectado por COVID-19, la persona portadora de la cedula {$array['cedula']}, ubicado en la ciudad de {$array['ciudad']}. 

{$array['nombre']} {$array['apellido']} se encuentra ingresado en el hospital central de dicha ciudad. 

Sus familiares informan que no habia presentado ningún síntoma del virus hasta el dia {$array['fecha_contagio']}." ];                  

                file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
                $this->session->set_flashdata('correcto', 'Datos insertados correctamente !');
                $this->session->set_flashdata('titulo', 'Adicion de datos');
                redirect(base_url().'index.php/covid/index');
    
            }
        }else{
            echo"Acceso denegado !";
        }

    }
    
    function editar($casoId){
        if($this->session->userdata('level') =='1'){
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
            
                $this->load->view('admin/editarCasos', $datos);
                
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
                
                redirect(base_url().'index.php/covid/index');
                
            }
        }else{
            echo "Acceso denegado !";
        }
    }
    function eliminar($casoId){
        $this->load->model('Casos_model');
        $casos = $this->Casos_model->getCasos($casoId);
        if(empty($casos)){
            redirect(base_url().'index.php/covid/index');                
        }
        $this->Casos_model->eliminarCasos($casoId);
        $this->session->set_flashdata('correcto', 'Datos eliminados correctamente !');
        $this->session->set_flashdata('titulo', 'Supresion de datos');
        redirect(base_url().'index.php/covid/index');
        
    }

    function addWorkers(){

        if($this->session->userdata('level') =='1'){
            $this->load->model('Worker_model');
            $worker = $this->Worker_model->todos();
            $datos = array();
            $datos['worker'] = $worker;
            $this->form_validation->set_rules('usuario', 'usuario', 'required');
            $this->form_validation->set_rules('clave', 'clave', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');

            if($this->form_validation->run() == false){
                $this->load->view('admin/agregarTrabajadores', $datos);
            }else{
                $array = array();
                $array['usuario'] = $this->input->post('usuario');
                $array['clave'] = md5($this->input->post('clave'));
                $array['email'] = $this->input->post('email');
                $array['level'] = $this->input->post('level');
                $this->Worker_model->agregar($array);
                $this->session->set_flashdata('correcto', 'Datos insertados correctamente !');
                $this->session->set_flashdata('titulo', 'Adicion de datos');
                
                redirect(base_url().'index.php/covid/addworkers');
    
            }
        }else{
            echo"Acceso denegado !";
        }
    }

    function editarWorkers($workerId){
        if($this->session->userdata('level') =='1'){
            $this->load->model('Worker_model');
            $worker = $this->Worker_model->getWork($workerId);
            $datos = array();
            $datos['worker'] = $worker;
            $this->form_validation->set_rules('usuario', 'usuario', 'required');
            $this->form_validation->set_rules('clave', 'clave', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('level', 'level', 'required');

            if($this->form_validation->run() == false){
                
                $this->load->view('admin/editarworkers', $datos);
                
            }else{
                
                $array = array();
                $array['usuario'] = $this->input->post('usuario');
                $array['clave'] = md5($this->input->post('clave'));
                $array['email'] = $this->input->post('email');
                $array['level'] = $this->input->post('level');
                $this->Worker_model->actualizarWork($workerId, $array);
                $this->session->set_flashdata('correcto', 'Datos actualizado correctamente !');
                $this->session->set_flashdata('titulo', 'Actualizacion de datos');
                redirect(base_url().'index.php/covid/addworkers');

            }
        }else{
            echo "acceso denegado";
        }
    }

    function eliminarWorkers($workerId){
        $this->load->model('Worker_model');
        $worker = $this->Worker_model->getWork($workerId);
        if(empty($worker)){
            redirect(base_url().'index.php/covid/addWorkers');                
        }
        $this->Worker_model->eliminarWork($workerId);
        $this->session->set_flashdata('correcto', 'Datos eliminados correctamente !');
        $this->session->set_flashdata('titulo', 'Supresion de datos');
        redirect(base_url().'index.php/covid/addWorkers');
        
    }

    function addNoticias(){
        if($this->session->userdata('level') =='1'){
            $this->load->model('Noticias_model');
            $noti = $this->Noticias_model->todos();
            $datos = array();
            $datos['noti'] = $noti;
            $this->form_validation->set_rules('titulo', 'titulo', 'required');
            $this->form_validation->set_rules('fecha', 'fecha', 'required');
            $this->form_validation->set_rules('resumen', 'resumen', 'required');
            $this->form_validation->set_rules('contenido', 'contenido', 'required');

            if($this->form_validation->run() == false){
                $this->load->view('admin/agregarNoticias', $datos);
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
                
                $this->Noticias_model->agregar($array);
                $apiToken = "839934766:AAFnRZFtkMsdRnRBs7TZ2r3HyZo7Woc2dFY";
                $data = [
                    'chat_id' => '@SarsCovid19JR',
                    'text' => "Se ha agregado nuevo contenido a la sección de noticias sobre nuevos casos positivos del COVID-19. 

Fuentes aseguran que sigue aumentando masivamente el porcentaje de personas contagiadas, nás detalles de éste y otros informes los puedes encontrar en nuestra seccion de noticias.

Se recomienda a los ciudadanos acatar las medidas de seguridad para que este virus no se siga propagando,
sé parte del cambio, ¡QUÉDATE EN CASA!" ];                  

                file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
                
                $this->session->set_flashdata('correcto', 'Datos insertados correctamente !');
                $this->session->set_flashdata('titulo', 'Adicion de datos');
                redirect(base_url().'index.php/covid/addnoticias');
    
            }
        }else{
            echo"Acceso denegado !";
        }
    }

    function editarNoticias($notId){
        if($this->session->userdata('level') =='1'){
            $this->load->model('Noticias_model');
            $noti = $this->Noticias_model->getNoti($notId);
            $datos = array();
            $datos['noti'] = $noti;
            $this->form_validation->set_rules('titulo', 'titulo', 'required');
            $this->form_validation->set_rules('fecha', 'fecha', 'required');
            $this->form_validation->set_rules('resumen', 'resumen', 'required');
            $this->form_validation->set_rules('contenido', 'contenido', 'required');
            
            if($this->form_validation->run() == false){
                
                $this->load->view('admin/editarnoticias', $datos);
                
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
                redirect(base_url().'index.php/covid/addnoticias');

            }
        }else{
            echo "acceso denegado";
        }
    }

    function eliminarNoticias($notId){

        $this->load->model('Noticias_model');
        $worker = $this->Noticias_model->getNoti($notId);
        if(empty($worker)){
            redirect(base_url().'index.php/covid/addnoticias');                
        }
        $this->Noticias_model->eliminarNoti($notId);
        $this->session->set_flashdata('correcto', 'Datos eliminados correctamente !');
        $this->session->set_flashdata('titulo', 'Supresion de datos');
        redirect(base_url().'index.php/covid/addnoticias');
        
    }

    

}
