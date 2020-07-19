<?php 

	class Authorization {

		function __construct() {
			$this->CI =& get_instance(); 
			$this->CI->load->model("settings_model");
		}

		// check process
		/* $menu:string , $action:string */
		public function redirect($menu, $action) {

			// $group_id = $this->session->userdata("group_id");
			$group = $this->CI->session->all_userdata();
			$group_id = $group["group_id"];

			$check_menu = $this->CI->settings_model->get_menu_bykey($menu);
			$check_menu_action = $this->CI->settings_model->get_menu_action_bykey($action);

			$menu_id = $check_menu["id"];
			$action_id = $check_menu_action["id"];

			$check_authorized = $this->CI->settings_model->check_group_authorized($group_id, $menu_id, $action_id);

		

			if(!$check_authorized && $group_id != 1) {
				header("location:".base_url("page_status/unauthorized"));
				exit;
			} 
		}

		function display_menu($menu) {
			$group = $this->CI->session->all_userdata();
			$group_id = $group["group_id"];

			$check_menu = $this->CI->settings_model->get_menu_bykey($menu);

			$menu_id = $check_menu["id"];

			//check_group_authorized_menu

			$check_authorized = $this->CI->settings_model->check_group_authorized_menu($group_id, $menu_id);
		
			if($check_authorized || $group_id == 1 ) {
				return true;
			} else {
				return false;
			}

		}

		/* $menu:string , $action:string */
		// display component
		public function display($menu, $action) {

			// $group_id = $this->session->userdata("group_id");
			$group = $this->CI->session->all_userdata();
			$group_id = $group["group_id"];

			$check_menu = $this->CI->settings_model->get_menu_bykey($menu);
			$check_menu_action = $this->CI->settings_model->get_menu_action_bykey($action);

			$menu_id = $check_menu["id"];
			$action_id = $check_menu_action["id"];

			$check_authorized = $this->CI->settings_model->check_group_authorized($group_id, $menu_id, $action_id);
		
			if($check_authorized || $group_id == 1) {
				return true;
			} else {
				return false;
			}

		}

			/* $menu:string , $action:string */
		// display component
		public function redirect_menu($menu) {

			// $group_id = $this->session->userdata("group_id");
			$group = $this->CI->session->all_userdata();
			$group_id = $group["group_id"];

			$check_menu = $this->CI->settings_model->get_menu_bykey($menu);

			$menu_id = $check_menu["id"];
			
			$check_authorized = $this->CI->settings_model->check_group_authorized_menu($group_id, $menu_id);

			if(!$check_authorized && $group_id != 1 ) {
			
				header("location:".base_url("page_status/unauthorized"));
				exit;
			} 

		}

		public function is_admin() {
			$group = $this->CI->session->all_userdata();
			$group_id = $group["group_id"];
			if($group_id == 1 ) {
				return true;
			}
			return false;
		}

		public function view_related() {

		}


	


	}
