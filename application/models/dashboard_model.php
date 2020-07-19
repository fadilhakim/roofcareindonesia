<?php
	Class Dashboard_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		private function process_cycle($data) {
			
			$whereClause = "";
			/*
				Opty => Project Charter masih Draft
				Project => Project Charter submit s/d Project HO/PCR
				Closed => Invoice s/d Closed
				OPTY = semua project charter status yang draft ( 1 ) 
				PROJECT = semua project charter yang SUBMIT s/d project HO dan presales HO 
				CLOSE : ambil dari table milestone_status_project_update  
				yang id = 11 BAO/UAT CERT sampai dengan yang id = 13 CLOSED  
			*/

			$from_exec = false;
			if(isset($data["from_exec"])) {
				$from_exec = $data["from_exec"];
			}

			if(!empty($data["project_charter_cycle"])) {
				if($data["project_charter_cycle"] == "opty") {
					$whereClause .= " AND t1.project_charter_status_id = 1";
				} else if ($data["project_charter_cycle"] == "project") { // yang submit 
					//$whereClause .= "AND project_charter_milestone_status_id = 4 AND workflow_phase_id BETWEEN 1 AND 3 ";
					
					if($from_exec) {
						$whereClause .= " AND t1.project_update_milestone_status_id BETWEEN 1 AND 10 ";
					}else {
						$whereClause .= " AND t2.project_update_milestone_status_id BETWEEN 3 AND 10 ";
					}
					
				} else if($data["project_charter_cycle"] == "closed"){

					if($from_exec) {
						$whereClause .= " AND t1.project_update_milestone_status_id BETWEEN 11 AND 13";
					} else {
						$whereClause .= " AND t2.project_update_milestone_status_id BETWEEN 11 AND 13";
					}
					
				}
			 }
			 
			 return $whereClause;
		}
		
		public function get_sales_closed($data){
			$whereClause = 'WHERE project_charter_status_id = 3 AND t1.deleted_at is null ';
			//$whereClause .= $this->process_cycle($data);
			
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT distinct
						SUM(tcv) as sales_closed
					FROM
						t_project_charter t1 ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0];
		}
		
		public function get_project_exec($data){
			$whereClause  = "WHERE 1=1 ";
			//$whereClause = ' WHERE t2.project_update_milestone_status_id BETWEEN 2 AND 11';
			//$whereClause.= ' AND t1.project_charter_status_id = 3 AND t1.deleted_at is null';
			
			$data["from_exec"] = true;
			
			$whereClause .= $this->process_cycle($data);
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			// health status 
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t1.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			// $sql = "SELECT
			// 			SUM(t1.tcv) as project_exec
			// 		FROM
			// 			t_project_charter t1 
			// 		LEFT JOIN
			// 			t_project_executive_summary t2 ON t1.id = t2.project_charter_id ".$whereClause;
			$sql = 
				"SELECT DISTINCT
					count(t1.id) as Project_execution , 
					SUM(t1.tcv) as project_exec
				FROM(
					
					SELECT distinct 
						a.id,b.project_charter_id,
						b.project_update_milestone_status_id,
						a.tcv,
						a.is_mrc,a.is_otc,
						a.project_date,
						a.project_scale_id,
						b.project_executive_summary_status_id,
						a.portfolio_id, 
						a.risk_level_id,
						a.project_division_id,
						a.project_charter_status_id
					FROM 
						t_project_charter a
					LEFT JOIN 
						t_project_executive_summary b ON (a.id=b.project_charter_id) 
						WHERE deleted_at is NULL AND a.project_charter_status_id=3
						AND (b.project_update_milestone_status_id is null OR b.project_update_milestone_status_id BETWEEN 2 AND 10)
				)t1
		
					 ".$whereClause;
					 
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0];
		}
		
		public function get_project_closed($data){
			$whereClause = 'WHERE t2.project_update_milestone_status_id BETWEEN 11 AND 13 AND t1.deleted_at is null';
			
			//$data["from_exec"] = true;
			$whereClause .= $this->process_cycle($data);

			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			// health status 
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t2.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT distinct
						SUM(t1.tcv) as project_closed
					FROM
						t_project_charter t1 
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0];
		}
		// count project
		public function count_sales_closed($data){
			$whereClause = 'WHERE 1=1 AND  project_charter_status_id = 3 AND t1.deleted_at is NULL ';
			//$whereClause .= $this->process_cycle($data);
			
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT DISTINCT
						count(id) as count_sales_closed
					FROM
						t_project_charter t1 ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0];
		}
		public function count_project_exec($data){

			$whereClause  = "WHERE 1=1 ";
			//$whereClause = ' WHERE t2.project_update_milestone_status_id BETWEEN 2 AND 11';
			//$whereClause.= ' AND t1.project_charter_status_id = 3 AND t1.deleted_at is null';
			
			$data["from_exec"] = true;
			
			$whereClause .= $this->process_cycle($data);
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			// health status 
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t1.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			// $sql = "SELECT
			// 			SUM(t1.tcv) as project_exec
			// 		FROM
			// 			t_project_charter t1 
			// 		LEFT JOIN
			// 			t_project_executive_summary t2 ON t1.id = t2.project_charter_id ".$whereClause;
			$sql = 
				"SELECT DISTINCT
					count(t1.id) as count_project_exec
				FROM(
					
					SELECT distinct 
						a.id,b.project_charter_id,
						b.project_update_milestone_status_id,
						a.tcv,
						a.is_mrc,a.is_otc,
						a.project_date,
						a.project_scale_id,
						b.project_executive_summary_status_id,
						a.portfolio_id, 
						a.risk_level_id,
						a.project_division_id,
						a.project_charter_status_id
					FROM 
						t_project_charter a
					LEFT JOIN 
						t_project_executive_summary b ON (a.id=b.project_charter_id) 
						WHERE deleted_at is NULL AND a.project_charter_status_id=3
						AND (b.project_update_milestone_status_id is null OR b.project_update_milestone_status_id BETWEEN 2 AND 10)
				)t1
		
					 ".$whereClause;
					 
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0];
		}
		public function count_project_closed($data){
			$whereClause = 'WHERE t2.project_update_milestone_status_id BETWEEN 11 AND 13 AND t1.deleted_at is null';
			
			$whereClause .= $this->process_cycle($data);
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			// health status 
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t2.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT DISTINCT
						count(t1.id) as count_project_closed
					FROM
						t_project_charter t1 
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0];
		}
		// end project count
		
		
		public function get_latest_project_status($data){
			$whereClause = 'WHERE 1=1 AND t1.deleted_at is null ';
			$whereClause .= $this->process_cycle($data);
			
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			//health status
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t2.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT
						t1.id, t1.project_name, t1.rfs_date, t1.workflow_phase_id,
						t1.pm_id, t3.fullname as pm_name,
						t2.progress_project, t2.time_id, t2.scope_id, t2.budget_id, t2.issue_description,
						t1.project_charter_milestone_status_id, t4.value AS project_charter_milestone,
						t2.project_update_milestone_status_id, t5.value AS project_executive_summary_milestone,
						t2.report_date
					FROM
						t_project_charter t1
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id
					LEFT JOIN
						t_user t3 ON t1.pm_id = t3.id 
					LEFT JOIN
						t_ref_milestone_status t4 ON t1.project_charter_milestone_status_id = t4.id 
					LEFT JOIN
						t_ref_milestone_status_project_update t5 ON t2.project_update_milestone_status_id = t5.id ".$whereClause."
					ORDER BY t1.tcv DESC LIMIT 3";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_total_project($data, $milestone_status_id){
			//$whereClause = 'WHERE t2.project_update_milestone_status_id = '.$milestone_status_id." AND t1.deleted_at is null";
			
			// add by handy
			if($milestone_status_id == 1){
				$whereClause = 'WHERE t1.project_charter_status_id=3 AND t1.deleted_at is null AND t2.project_update_milestone_status_id is null';
			}else{
				$whereClause = 'WHERE t2.project_update_milestone_status_id = '.$milestone_status_id." AND t1.deleted_at is null";
			}
			//--------------------------------------------------------------------------------------------------------------------
			
			$whereClause .= $this->process_cycle($data);
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			// health status 
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t2.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT DISTINCT
						COUNT(t1.id) AS total_project
					FROM
						t_project_charter t1
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id
					JOIN
						t_user t3 ON t1.pm_id = t3.id ".$whereClause."";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0]->total_project;
		}
		public function get_project_revenue($data, $milestone_status_id) {
			//$whereClause = 'WHERE 1=1 AND t1.deleted_at is null AND (t2.project_update_milestone_status_id = '.$milestone_status_id.") AND t1.project_charter_status_id = 3  ";
			// $whereClause = " WHERE 1=1";
			// $whereClause.= ' AND (t2.project_update_milestone_status_id = '.$milestone_status_id.") AND t1.project_charter_status_id = 3 AND t1.deleted_at is null';
			
			// add by handy
			if($milestone_status_id == 1){
				$whereClause = 'WHERE 1=1 and t1.project_charter_status_id=3 AND t1.deleted_at is null AND t2.project_update_milestone_status_id is null';
			}else{
				$whereClause = 'WHERE 1=1 AND t1.deleted_at is null AND (t2.project_update_milestone_status_id = '.$milestone_status_id.") AND t1.project_charter_status_id = 3  ";
			}
			//--------------------------------------------------------------------------------------------------------------------------
			
			$whereClause .= $this->process_cycle($data);
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			// health status 
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t2.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT DISTINCT
						SUM(t1.tcv) AS revenue
					FROM
						t_project_charter t1
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id ".$whereClause."";
					// JOIN
					// 	t_user t3 ON t1.pm_id = t3.id ".$whereClause."";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0]->revenue;
		}
		
		public function get_project_by_health($data){
			$whereClause = 'WHERE (t2.time_id IS NOT NULL AND t2.scope_id IS NOT NULL AND t2.budget_id IS NOT NULL) AND t1.project_charter_status_id = 3 AND t2.project_update_milestone_status_id BETWEEN 3 AND 10 AND t1.deleted_at is null ';
			
			$whereClause .= $this->process_cycle($data);
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			// health status
			if($data['project_health_status'] != 0) {
				$whereClause .= ' AND t2.project_executive_summary_status_id = '.$data['project_health_status'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			$sql = "SELECT DISTINCT
						t1.id,
						t2.time_id, t2.scope_id, t2.budget_id, t1.tcv
					FROM 
						t_project_charter t1
					JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
		
		public function get_program_dashboard($data){
			$whereClause = " WHERE 1=1";
			$whereClause.= ' AND t1.project_charter_status_id = 3 AND t1.deleted_at is null';
			$whereClause .= $this->process_cycle($data);
			
			if($data['project_charter_project_opty_id'] != ''){
				$whereClause .= ' AND t1.project_opty_id LIKE "%'.$data['project_charter_project_opty_id'].'%"';
			}
			if(!empty($data["project_charter_year"])) {
				$whereClause .= " AND EXTRACT(YEAR FROM t1.project_date) = ".$data["project_charter_year"];
			}
			
			if($data['project_charter_project_name'] != ''){
				$whereClause .= ' AND t1.project_name LIKE "%'.$data['project_charter_project_name'].'%"';
			}
			
			if($data['project_charter_project_scale_id'] != 0){
				$whereClause .= ' AND t1.project_scale_id = '.$data['project_charter_project_scale_id'];
			}
			
			if($data['project_charter_project_top_id'] != 0){
				if($data['project_charter_project_top_id'] == 1){
					$whereClause .= ' AND t1.is_otc = 1';
				}else if($data['project_charter_project_top_id'] == 2){
					$whereClause .= ' AND t1.is_mrc = 1';
				}
			}
			
			if($data['project_charter_portfolio_id'] != 0){
				$whereClause .= ' AND t1.portfolio_id = '.$data['project_charter_portfolio_id'];
			}
			
			if($data['project_charter_risk_level_id'] != 0){
				$whereClause .= ' AND t1.risk_level_id = '.$data['project_charter_risk_level_id'];
			}
			
			if($data['project_charter_year_id'] != 0){
				$whereClause .= ' AND YEAR(t1.project_date) = '.$data['project_charter_year_id'];
			}
			
			if($data['project_charter_rfs_month_id'] != 0){
				$whereClause .= ' AND MONTH(t1.rfs_date) = '.$data['project_charter_rfs_month_id'];
			}
			
			if($data['project_executive_milestone_status_id'] != 0){
				if($data['project_executive_milestone_status_id'] == 1) {
					$whereClause .= ' AND t1.project_charter_status_id = 3 AND t2.project_update_milestone_status_id is NULL';
				}
				else {
					$whereClause .= ' AND t2.project_update_milestone_status_id = '.$data['project_executive_milestone_status_id'];
				}
				
			}
			
			if($data['project_charter_sales_id'] != 0){
				$whereClause .= ' AND t1.sales_id = '.$data['project_charter_sales_id'];
			}
			
			if($data['project_charter_sa_id'] != 0){
				$whereClause .= ' AND t1.sa_id = '.$data['project_charter_sa_id'];
			}
			
			if($data['project_charter_pm_id'] != 0){
				$whereClause .= ' AND t1.pm_id = '.$data['project_charter_pm_id'];
			}
			
			if($data['project_charter_division_id'] != 0){
				$whereClause .= ' AND t1.project_division_id = '.$data['project_charter_division_id'];
			}
			$sql = "SELECT DISTINCT
						t1.id, t1.project_opty_id, t1.project_name, t1.project_date, t1.is_otc, t1.is_mrc, t1.tcv,
						t1.portfolio_id, t3.value as portfolio_value,
						t1.project_scale_id, t4.value as project_scale_value,
						t1.risk_level_id, t5.value as risk_level_value,
						t2.project_update_milestone_status_id, t6.value as milestone_status_value,
						t2.time_id, t2.scope_id, t2.budget_id,
						t1.rfs_date, t2.progress_project, t2.target_project,
						t1.sales_id, t7.fullname as sales_name,
						t1.sa_id, t8.fullname as sa_name,
						t1.pm_id, t9.fullname as pm_name,
						t1.project_division_id, t10.value AS project_division_name,
						t11.presales_hand_over_status_id
					FROM
						t_project_charter t1
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id
					LEFT JOIN
						t_presales_hand_over t11 ON t1.id = t11.project_charter_id
					LEFT JOIN
						t_ref_portfolio t3 ON t1.portfolio_id = t3.id
					LEFT JOIN
						t_ref_project_scale t4 ON t1.project_scale_id = t4.id
					LEFT JOIN
						t_ref_risk_level t5 ON t1.risk_level_id = t5.id
					LEFT JOIN 
						t_ref_milestone_status_project_update t6 ON t2.project_update_milestone_status_id = t6.id
					LEFT JOIN
						t_user t7 ON t1.sales_id = t7.id
					LEFT JOIN
						t_user t8 ON t1.sa_id = t8.id
					LEFT JOIN
						t_user t9 ON t1.pm_id = t9.id 
					LEFT JOIN
						t_ref_project_divison t10 ON t1.project_division_id = t10.id ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			// echo $this->db->last_query();
			// exit();
			return $result;
		}
		public function get_program_dashboard_by_healtcheck() {
			//$whereClause = "WHERE 1=1 AND t1.deleted_at is null";
			$whereClause = 'WHERE (t2.time_id IS NOT NULL AND t2.scope_id IS NOT NULL AND t2.budget_id IS NOT NULL) AND t1.project_charter_status_id = 3 AND t2.project_update_milestone_status_id BETWEEN 3 AND 10 AND t1.deleted_at is null ';
			//$whereClause.= ' AND t1.project_charter_status_id = 3 AND t1.deleted_at is null';
			$sql = "SELECT DISTINCT
						t1.id, t1.project_opty_id, t1.project_name, t1.project_date, t1.is_otc, t1.is_mrc, t1.tcv,
						t1.portfolio_id, t3.value as portfolio_value,
						t1.project_scale_id, t4.value as project_scale_value,
						t1.risk_level_id, t5.value as risk_level_value,
						t2.project_update_milestone_status_id, t6.value as milestone_status_value,
						t2.time_id, t2.scope_id, t2.budget_id,
						t1.rfs_date, t2.progress_project, t2.target_project,
						t1.sales_id, t7.fullname as sales_name,
						t1.sa_id, t8.fullname as sa_name,
						t1.pm_id, t9.fullname as pm_name,
						t1.project_division_id, t10.value AS project_division_name
					FROM
						t_project_charter t1
					LEFT JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id
					LEFT JOIN
						t_ref_portfolio t3 ON t1.portfolio_id = t3.id
					LEFT JOIN
						t_ref_project_scale t4 ON t1.project_scale_id = t4.id
					LEFT JOIN
						t_ref_risk_level t5 ON t1.risk_level_id = t5.id
					LEFT JOIN 
						t_ref_milestone_status_project_update t6 ON t2.project_update_milestone_status_id = t6.id
					LEFT JOIN
						t_user t7 ON t1.sales_id = t7.id
					LEFT JOIN
						t_user t8 ON t1.sa_id = t8.id
					LEFT JOIN
						t_user t9 ON t1.pm_id = t9.id 
					LEFT JOIN
						t_ref_project_divison t10 ON t1.project_division_id = t10.id ".$whereClause;
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}
// ========================================================================================================= 
		public function update_project_target($target){			
			$this->db->trans_begin();
			$sql = "UPDATE
						t_settings
					SET
						value = ?
					WHERE setting_name = 'project_target'";
			$query = $this->db->query($sql, $target);
			
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return 0;
			}
			else{
				$this->db->trans_commit();
				return 1;
			}
		}
		public function update_project_target_year($year, $target){			
			$this->db->trans_begin();
			$sql = "UPDATE
						t_target_year
					SET
						target = ?
					WHERE
						year = ?";
			$query = $this->db->query($sql, array($target, $year));
			
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return 0;
			}
			else{
				$this->db->trans_commit();
				return 1;
			}
		}
		
		public function get_project_performance_highlight($project_charter_id){
			$sql = "SELECT DISTINCT
						t1.project_date, t1.rfs_date,t1.project_name,
						t2.etc, t2.progress_update, t2.report_date, t2.progress_project, t2.target_project,
						t2.issue_description, t2.issue_impact, t2.action_plan, t2.issue_due, t2.pic,
						t2.project_update_milestone_status_id, t3.value AS project_milestone_status_value
					FROM 
						t_project_charter t1
					JOIN
						t_project_executive_summary t2 ON t1.id = t2.project_charter_id
					LEFT JOIN
						t_ref_milestone_status_project_update t3 ON t2.project_update_milestone_status_id = t3.id
					WHERE
						t1.id = ?";
			$this->db->limit(1);
			$query = $this->db->query($sql, $project_charter_id);
			$result = $query->result();
			return $result[0];
		}
		public function get_last_milestone_update($project_charter_id, $project_milestone_status_id) {
			
			$this->db->select("*");
			$this->db->where(array(
				"milestone_status_id"=> $project_milestone_status_id,
				"project_charter_id"=>$project_charter_id
			));
			//$this->db->where();
			$this->db->order_by("created_date","desc");
			$this->db->limit(1);
			return $this->db->get("t_log_project_status_update")->row_array();
			
		}
	}
?>
