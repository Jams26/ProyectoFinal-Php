<?php 

class Usuario_model extends CI_Model{

    function todos(){
        return $this->db->get('casos')->result_array();
    }

    function getNoti($notId){
        $this->db->where('id', $notId);
        return $this->db->get('casos')->row_array();
    }
}
?>