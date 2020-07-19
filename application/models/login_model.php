<?php

Class Login_model extends CI_Model {

	public function check_password($data){
		$sql = "SELECT * FROM t_user WHERE UPPER(username) = ? AND password = ?";
		$this->db->limit(1);
		$query = $this->db->query($sql, array(strtoupper($data['username']), $data['password']));

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function get_user_data($username) {
		$sql = "SELECT 	id, username, fullname, email
				FROM t_user
				WHERE username =?";
		$this->db->limit(1);
		$query = $this->db->query($sql, $username);

		if ($query->num_rows() == 1) {
			$result = $query->result();
			return $result[0];
		} else {
			return false;
		}
	}
}
?>
