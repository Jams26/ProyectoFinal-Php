<?php 

class Worker_model extends CI_Model{

    function agregar($formArray){
        $this->db->insert('usuarios', $formArray);

    }

    function todos(){
        return $this->db->get('usuarios')->result_array();
    }

    function getWork($workerId){
        $this->db->where('id', $workerId);
        return $this->db->get('usuarios')->row_array();
    }

    function actualizarWork($workerId, $formArray){
        $this->db->where('id', $workerId);
        $this->db->update('usuarios', $formArray);
    }

    function eliminarWork($workerId){
        $this->db->where('id', $workerId);
        $this->db->delete('usuarios');
    }
}
?>