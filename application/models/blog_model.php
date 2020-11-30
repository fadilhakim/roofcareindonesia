<?php

  Class Blog_model extends CI_Model {

    // public function insert_seminar($data,$table){
    //   $this->db->insert($table,$data);
    //   //print_r($query);
    //   //exit();
    // }

    public function get_all_data_by_id($id){
        $query = $this->db->get_where('t_blog', array('id' => $id));
  
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

   

    public function get_all_data(){
        return $query = $this->db->get('t_blog');
      }

      public function insert_blog($data, $table){
        $this->db->insert($table,$data); 
      }

      public function delete_data($id){
        $this->delete_image($id);
          return $this->db->delete('t_blog', array('id' => $id)); 
      }

      public function update_data($data, $id){
    
        return $this->db->where('id', $id)
                        ->update('t_blog', $data);
  
      }
  
  
  }
?>
