<?php

	Class Sistems_model extends CI_Model{

		public function insert_services($data, $table){
			$this->db->insert($table,$data);
		  }

		public function get_all_data(){
			return $query = $this->db->get('t_systems');
		}

		public function get_all_systems_category(){
			return $query = $this->db->get('t_systems_category');
		}
		public function get_all_systems_sub_category(){
			return $query = $this->db->get('t_systems_sub_category');
		}

		public function delete_data($id){
			$this->delete_image($id);
			return $this->db->delete('t_systems', array('id' => $id));
		}

		public function get_all_data_by_id($id){
			$query = $this->db->get_where('t_systems', array('id' => $id));

				if(!empty($query->row_array())){
					return $query->row_array();
				}else {
				  return false;
				}

		  }

		  public function update_data($data, $id){
				return $this->db->where('id', $id)->update('t_systems', $data);
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
