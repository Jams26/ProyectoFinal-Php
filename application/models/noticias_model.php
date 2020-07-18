<?php 

class Noticias_model extends CI_Model{

    function agregar($formArray){
        $this->db->insert('noticias', $formArray);

    }

    function todos(){
        return $this->db->get('noticias')->result_array();
    }

    function getNoti($notId){
        $this->db->where('id', $notId);
        return $this->db->get('noticias')->row_array();
    }

    function actualizarNoti($notId, $formArray){
        $this->db->where('id', $notId);
        $this->db->update('noticias', $formArray);
    }

    function eliminarNoti($notId){
        $this->db->where('id', $notId);
        $this->db->delete('noticias');

    }
}
?>