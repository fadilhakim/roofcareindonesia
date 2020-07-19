<?php
	Class Settings_model extends CI_Model{



		public function get_user(){
			$sql = "SELECT
					    t1.id, t1.username, t1.fullname, t1.email,
						t2.value AS group_value
					FROM
					    t_user t1
					JOIN
					    t_group t2
					ON
						t1.group_id = t2.id";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result;
		}

		public function get_detail_user($user_id){
			$sql = "SELECT
					    *
					FROM
					    t_user
					WHERE
						id = ?";

			$this->db->limit(1);
			$query = $this->db->query($sql, $user_id);
			$result = $query->result();

			return $result[0];
		}

		public function create_user($data){
			$this->db->trans_begin();
			$sql = "INSERT INTO
					    t_user (fullname, email, division_id, group_id, signature_name, username, password)
					VALUES (?, ?, ?, ?, ?, ?, ?)";
			$query = $this->db->query($sql, array($data['fullname'],
												$data['email'],
												$data['division_id'],
												$data['group_id'],
												$data['filename'],
												$data['username'],
												MD5($data['password'])));

			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return 0;
			}
			else{
				$this->db->trans_commit();
				return 1;
			}
		}


		public function update_user($data){
			error_log(print_r($data,true));
			$this->db->trans_begin();
			if($data['filename'] == null){
				error_log('1');
				$sql = "UPDATE
						t_user
					SET
						fullname = ?,
						email = ?,
						division_id =?,
						group_id =?,
						username = ?,
						password = ?
					WHERE id = ?";
				$query = $this->db->query($sql, array($data['fullname'],
												    $data['email'],
												    $data['division_id'],
												    $data['group_id'],
												    $data['username'],
													MD5($data['password']),
													$data['user_id']));
			}else{
				error_log('2');
				$sql = "UPDATE
							t_user
						SET
							fullname = ?,
							email = ?,
							division_id =?,
							group_id =?,
							signature_name =?,
							username = ?,
							password = ?
						WHERE id = ?";
				$query = $this->db->query($sql, array($data['fullname'],
														$data['email'],
														$data['division_id'],
														$data['group_id'],
														$data['filename'],
														$data['username'],
														MD5($data['password']),
														$data['user_id']));
			}

			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return 0;
			}
			else{
				$this->db->trans_commit();
				return 1;
			}
		}

		public function delete_user($data){
			$this->db->trans_begin();
			$sql = "DELETE FROM
						t_user
					WHERE id = ?";
			$query = $this->db->query($sql, $data['user_id']);

			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return 0;
			}
			else{
				$this->db->trans_commit();
				return 1;
			}
		}

		public function get_last_user_id(){
			$sqlLastId = "SELECT Auto_increment as last_id FROM information_schema.tables WHERE table_name='t_user'  AND table_schema='db_pmois_2019'";
			$queryLastId = $this->db->query($sqlLastId);
			$resultLastId = $queryLastId->result();
			$lastId = $resultLastId[0]->last_id;

			return $lastId;
		}

		/*
		    Callback Validation Function
		*/

		public function check_username($username){
			$sql = "SELECT * FROM t_user WHERE username = ?";
			$query = $this->db->query($sql,$username);

			if ($query->num_rows() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function get_user_byusername($username) {
			$sql = "SELECT * FROM t_user WHERE username = ?";
			$query = $this->db->query($sql,$username);

			return $result = $query->row_array();
		}

		public function update_password($data){
			$this->db->trans_begin();
			$sql = "UPDATE
						t_user
					SET
						password = ?
					WHERE id = ?";
			$query = $this->db->query($sql,
				array(
					MD5($data['password']),
					$data['id'])
				);
			if ($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return 0;
			}
			else{
				$this->db->trans_commit();
				return 1;
			}
		}

		function get_all_menu() {
			$menu = $this->db->query("select * from t_menu");
			return $menu->result_array();
		}

		function get_all_menu_actions() {
			$menu_actions = $this->db->query("select * from t_menu_actions");
			return $menu_actions->result_array();
		}

		function detail_group_menu_action($group_id) {
			return $this->db->get_where("t_group_menu_actions",array("group_id" => $group_id))->result_array();
		}

		function detail_group_menu_authorized($group_id) {

			$this->db->select("*");
			$this->db->from("t_group_menu");
			$this->db->join('t_menu', 't_menu.id = t_group_menu.menu_id');
			$this->db->where(
				array(
					"t_group_menu.group_id" => $group_id,
					"t_group_menu.authorized" => 1,
				)
			);

			return $this->db->get()->result_array();
		}

		function detail_group_menu_action_authorized_bymenu($group_id, $menu_id) {

			$this->db->select("*");
			$this->db->from("t_group_menu_actions");

			$this->db->join('t_menu_actions', 't_menu_actions.id = t_group_menu_actions.menu_action_id');
			$this->db->where(
				array(
					"t_group_menu_actions.group_id" => $group_id,
					"t_group_menu_actions.menu_id" => $menu_id,
					"t_group_menu_actions.authorized" => 1,
				)
			);

			return $this->db->get()->result_array();


			// return $this->db->get_where("t_group_menu_actions",
			// 	array(
			// 		"group_id" => $group_id,
			// 		"authorized" => 1
			// 	)
			// )->result_array();
		}

		function detail_group_menu_action_authorized($group_id) {

			$this->db->select("*");
			$this->db->from("t_group_menu_actions");

			$this->db->join('t_menu_actions', 't_menu_actions.id = t_group_menu_actions.menu_action_id');
			$this->db->where(
				array(
					"t_group_menu_actions.group_id" => $group_id,
					"t_group_menu_actions.authorized" => 1,
				)
			);

			return $this->db->get()->result_array();


			// return $this->db->get_where("t_group_menu_actions",
			// 	array(
			// 		"group_id" => $group_id,
			// 		"authorized" => 1
			// 	)
			// )->result_array();
		}

		function insert_group_menu($dt) {

			$result = array();

			foreach($dt as $row) {
				$result[] = array(
					"group_id" => $row["group_id"],
					"menu_id" => $row["menu_id"],
					"authorized" => $row["authorized"],
					"created_at" => date("Y-m-d H:i:s")
				);
			}

			$this->db->insert_batch('t_group_menu', $result);
		}

		function insert_group_menu_action($dt) {
			$result = array();

			foreach($dt as $row) {
				$result[] = array(
					"group_id" => $row["group_id"],
					"menu_id" => $row["menu_id"],
					"menu_action_id" => $row["menu_action_id"],
					"authorized" => $row["authorized"],
					"created_at" => date("Y-m-d H:i:s")
				);
			}

			$this->db->insert_batch('t_group_menu_actions', $result);
		}

		function clear_authorized_menu($group_id) {

			$this->db->set('authorized',0);
			$this->db->where('group_id',$group_id);
			$this->db->update('t_group_menu');
		}

		function clear_authorized_menu_actions($group_id) {

			$this->db->set('authorized',0);
			$this->db->where('group_id',$group_id);
			$this->db->update('t_group_menu_actions');
		}

		function authorized_menu($group_id, $menu_id) {


			$this->db->set('authorized',1);
			$this->db->where("group_id",$group_id);
			$this->db->where('menu_id',$menu_id);
			$this->db->update('t_group_menu');
		}

		function authorized_menu_action($group_id,$menu_id, $menu_action_id) {

			$this->db->set('authorized',1);
			$this->db->where("group_id",$group_id);
			$this->db->where("menu_id",$menu_id);
			$this->db->where('menu_action_id',$menu_action_id);
			$this->db->update('t_group_menu_actions');
		}

		// check menu id dan menu action id di group menu action table
		function check_menuid_maid_gma($group_id,$menu_id,$menu_action_id){
			$this->db->where("group_id",$group_id);
			$this->db->where("menu_id",$menu_id);
			$this->db->where('menu_action_id',$menu_action_id);

			return $this->db->get('t_group_menu_actions')->row_array();
		}

		function check_menuid_group_menu($group_id,$menu_id) {
			$this->db->where("group_id",$group_id);
			$this->db->where("menu_id",$menu_id);

			return $this->db->get('t_group_menu')->row_array();
		}

		function check_groupid_group_menu_action($group_id) {
			return $this->db->get_where("t_group_menu_actions",array("group_id" => $group_id))->row_array();
		}

		function check_groupid_group_menu($group_id) {
			return $this->db->get_where("t_group_menu",array("group_id" => $group_id))->row_array();
		}

		function check_group_authorized_menu($group_id, $menu_id) {
			$result = $this->db->get_where("t_group_menu",array(
				"group_id" => $group_id,
				"menu_id" => $menu_id,
				"authorized" => 1
			))->row_array();

			//echo $this->db->last_query();

			return $result;
		}

		function check_group_authorized($group_id, $menu_id, $action_id) {

			$result = $this->db->get_where("t_group_menu_actions",array(
				"group_id" => $group_id,
				"menu_id" => $menu_id,
				"menu_action_id" => $action_id,
				"authorized" => 1
			))->row_array();

			return $result;
		}

		function get_menu_bykey($key) {
			return $this->db->get_where("t_menu",array(
				"menu_key" => $key
			))->row_array();
		}

		function get_menu_action_bykey($key) {
			return $this->db->get_where("t_menu_actions",array(
				"action_key" => $key
			))->row_array();
		}
	}
?>
