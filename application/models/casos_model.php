<?php 

class Casos_model extends CI_Model{

    function agregar($formArray){
        $this->db->insert('casos', $formArray);

    }

    function todos(){
        return $this->db->get('casos')->result_array();
    }

    function getCasos($casoId){
        $this->db->where('id', $casoId);
        return $this->db->get('casos')->row_array();
    }

    function getResult(){
        return $this->db->get('casos')->result();
    }

    function actualizarCasos($casoId, $formArray){
        $this->db->where('id', $casoId);
        $this->db->update('casos', $formArray);
    }

    function eliminarCasos($casoId){
        $this->db->where('id', $casoId);
        $this->db->delete('casos');

    }
}
?>