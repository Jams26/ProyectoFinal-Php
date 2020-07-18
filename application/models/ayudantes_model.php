<?php 

class Ayudantes_model extends CI_Model{

    function todos(){
        return $this->db->get('casos')->result_array();
    }

    function getCasos($casoId){
        $this->db->where('id', $casoId);
        return $this->db->get('casos')->row_array();
    }

    function actualizarWork($casoId, $formArray){
        $this->db->where('id', $casoId);
        $this->db->update('casos', $formArray);
    }

}
?>