<?php

  Class Case_studies_model extends CI_Model {

    public function get_all_data(){
      return $query = $this->db->get('case_studies');
    }


    public function delete_data($id){
        return $this->db->delete('case_studies', array('id' => $id)); 
    }

    public function update_data($data, $id){
    
      return $this->db->where('id', $id)
                      ->update('case_studies', $data);

    }

    public function get_all_data_by_id($id){
      return $this->db->get_where('case_studies', array('id', $id));
    }
  
  }
?>
