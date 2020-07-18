<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function check_user($usuario, $clave){
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $this->db->where('clave', md5($clave));
        $result = $this->db->get();
        return $result;
    }
}
