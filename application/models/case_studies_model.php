<?php

  Class Case_studies_model extends CI_Model {

    public function get_all_data(){
      return $query = $this->db->get('t_case_studies');
    }


    public function delete_data($id){
      $this->delete_image($id);
        return $this->db->delete('t_case_studies', array('id' => $id)); 
    }

    public function update_data($data, $id){
    
      return $this->db->where('id', $id)
                      ->update('t_case_studies', $data);

    }

    public function get_all_data_by_id($id){
      $query = $this->db->get_where('t_case_studies', array('id' => $id));

      if(!empty($query->row_array())){
          return $query->row_array();
      }else {
        return false;
      }

    }

    private function delete_image($id){

        $item = $this->get_all_data_by_id($id);
        print_r($item);
        $filename = explode(".", $item['image'])[0];
        echo($filename);
        return array_map('unlink', glob(FCPATH."public/images/uploads/$filename.*"));
    }
  
  }
?>
