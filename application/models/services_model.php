<?php

	Class Services_model extends CI_Model{
		
		public function insert_services($data, $table){
			$this->db->insert($table,$data); 
		  }

		public function get_all_data(){
			return $query = $this->db->get('services');
		  }

		public function delete_data($id){
			return $this->db->delete('services', array('id' => $id)); 
		}

		public function get_all_data_by_id($id){
			$query = $this->db->get_where('services', array('id' => $id));
	  
			if(!empty($query->row_array())){
				return $query->row_array();
			}else {
			  return false;
			}
	  
		  }

		  public function update_data($data, $id){
    
			return $this->db->where('id', $id)
							->update('services', $data);
	  
		  }
		
	}
?>
