<?php

	Class Services_model extends CI_Model{
		
		public function insert_services($data, $table){
			$this->db->insert($table,$data); 
		  }

		public function get_all_data(){
			return $query = $this->db->get('t_services');
		  }

		public function delete_data($id){
			$this->delete_image($id);
			return $this->db->delete('t_services', array('id' => $id)); 
		}

		public function get_all_data_by_id($id){
			$query = $this->db->get_where('t_services', array('id' => $id));
	  
			if(!empty($query->row_array())){
				return $query->row_array();
			}else {
			  return false;
			}
	  
		  }

		  public function update_data($data, $id){
    
			return $this->db->where('id', $id)
							->update('t_services', $data);
	  
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
