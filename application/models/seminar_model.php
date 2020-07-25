<?php

  Class Seminar_model extends CI_Model {

    public function get_all_data(){
      return $query = $this->db->get('t_seminar');
    }


    public function delete_data($id){
        return $this->db->delete('t_seminar', array('id' => $id));
    }

    public function update_data($data, $id){

      return $this->db->where('id', $id)
                      ->update('t_seminar', $data);

    }

    public function get_all_data_by_id($id){
      return $this->db->get_where('t_seminar', array('id', $id));
    }

  }
?>
