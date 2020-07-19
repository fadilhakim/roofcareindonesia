<?php

  Class Insert_model extends CI_Model {

    public function insert_seminar($data,$table){
      $this->db->insert($table,$data);
      //print_r($query);
      //exit();
    }
  
  }
?>
