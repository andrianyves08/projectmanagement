<?php
class User_model extends CI_Model {

        public function __construct(){
                $this->load->database();
        }

        // Log user in
		public function login($email, $password){
			// Validate
			$this->db->where('email', $email);
			$query = $this->db->get('users');

			$result = $query->row_array();

			if(!empty($result) && password_verify($password, $result['password'])){
				return $query->row_array();
			} else {
				return false;
			}
		}

		// Log user in
		public function about($id){
			$this->db->join('aboutme', 'users.id = aboutme.userID');
			$this->db->where('users.id', $id);
			$query = $this->db->get('users');

			return $query->row_array();
		}

		public function count_projects($id){
			$this->db->join('projectmembers', 'users.id = projectmembers.userID');
			$this->db->where('users.id', $id);
			$query = $this->db->get('users');

			return $query->num_rows();
		}

		public function count_teams($id){
			$this->db->join('teammembers', 'users.id = teammembers.userID');
			$this->db->where('users.id', $id);
			$query = $this->db->get('users');

			return $query->num_rows();
		}
		
		// Log user in
		public function user_projects($id){
			$this->db->join('projectmembers', 'project.id = projectmembers.projectID');
			$this->db->where('projectmembers.userID', $id);
			$query = $this->db->get('project');

			return $query->result_array();
		}

		public function all_users($id){
			$admin = 1;
			$this->db->where('usedtologin !=', $admin);
			$this->db->where('id !=', $id);
			$query = $this->db->get('users');

			return $query->result_array();
		}
}