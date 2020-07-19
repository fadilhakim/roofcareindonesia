<?php
	Class Services_model extends CI_Model{
		
		public function get_division_option(){
			$sql = "SELECT
					    *
					FROM
					    t_division";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_group_option($division_id = 0){
			$whereClause = '';
			if($division_id != 0){
				$whereClause .= ' WHERE division_id = '.$division_id;
			}
			$sql = "SELECT
					    *
					FROM
					    t_group ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_project_charter_status_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_project_charter_status";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_customer_status_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_customer_status";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_project_division_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_project_divison";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_sales_option($group_id = 0){
			$whereClause = '';
			if($group_id != 0){
				$whereClause .= ' WHERE group_id != 1 AND group_id = '.$group_id;
			}else{
				$whereClause .= ' WHERE group_id != 1';
			}
			$sql = "SELECT
					    *
					FROM
					    t_user ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_ops_option(){
			$whereClause = ' WHERE group_id != 1 AND group_id IN (6,7,8,9,10)';
			$sql = "SELECT
					    *
					FROM
					    t_user ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_portfolio_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_portfolio";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_project_scale_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_project_scale";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_risk_level_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_risk_level";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_milestone_status_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_milestone_status";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}

		public function detail_milestone_status_option($id){
			$sql = "SELECT
			            id, value
					FROM
						t_ref_milestone_status
					WHERE
						id=$id";
			$query = $this->db->query($sql);
			$result = $query->row();
			return $result;
		}
		
		public function get_references_project_charter_status(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_project_charter_status";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_doc_presales_hand_over(){
			$sql = "SELECT
			            id, value
					FROM
					    t_doc_presales_hand_over";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_project_update_milestone_status_option(){
			$sql = "SELECT
			            id, value, color
					FROM
					    t_ref_milestone_status_project_update";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_available_approved_project_charter(){
			$sql = "SELECT
					    id, project_id
					FROM
					    t_project_charter
					WHERE 
					    status_id = 3
					AND id NOT IN (SELECT project_charter_id FROM t_project_update)";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_health_check_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_health_check_status";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_project_status_option(){
			$sql = "SELECT
			            id, value
					FROM
					    t_ref_project_status";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}

		public function get_project_status_detail($id) {
			$sql = "SELECT
			            id, value
					FROM
						t_ref_project_status
					WHERE 
						id = $id";
			$query = $this->db->query($sql);
			$result = $query->row();
			return $result;
		}
		
		public function get_doc_project_hand_over(){
			$sql = "SELECT
			            id, value
					FROM
					    t_doc_project_hand_over";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_settings($setting_name){
			$sql = "SELECT
					    *
					FROM
					    t_settings
					WHERE setting_name =?";
			$query = $this->db->query($sql, $setting_name);
			$result = $query->result();
			return $result;
		}
		
		public function get_target_years($year = null){
			$whereClause = '';
			if($year != null) $whereClause .= 'WHERE year = '.$year;
			
			$sql = "SELECT
					    *
					FROM
					    t_target_year ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
	}
?>
