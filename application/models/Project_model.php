<?php
	class Project_model extends CI_Model {

        public function __construct(){
                $this->load->database();
        }

		// get all teams
        public function my_projects($id){
        	$this->db->select('*, project.id as projID');
			$this->db->join('project', 'users.id = project.owner');
			$this->db->join('projectmembers', 'projectmembers.projectID = project.id');
			$this->db->where('projectmembers.userID', $id);
			$query = $this->db->get('users');

			return $query->result_array();
		}

		// get all teams
        public function get_project_info($id){
        	$this->db->select('*, project.id as projID');
			$this->db->join('users', 'users.id = project.owner');
			$this->db->where('project.id', $id);
			$query = $this->db->get('project');

			return $query->row_array();
		}

		// get all teams
        public function get_project_projectteam($id){
        	$this->db->select('*, projectteams.teamID as teamID');
			$this->db->join('team', 'projectteams.teamID = team.id');
			$this->db->where('projectID', $id);
			$query = $this->db->get('projectteams');

			return $query->result_array();
		}


		public function get_project_teammembers($id){
        	$this->db->select('*');
			$this->db->join('teammembers', 'team.id = teammembers.teamID');
			$this->db->where('teammembers.userID', $id);
			$query = $this->db->get('team');

			return $query->result_array();
		}

		public function get_project_members($id){
        	$this->db->select('*, users.id as usID, projectmembers.id as memID');
			$this->db->join('users', 'projectmembers.userID = users.id');
			$this->db->where('projectID', $id);
			$query = $this->db->get('projectmembers');

			return $query->result_array();
		}

		public function get_max(){
			$this->db->select_max('id');
			$query = $this->db->get('project');

			return $query->row_array();
		}

		public function create_project($id){
			$status = 'on going';
			$role = 'project manager';

			$data = array(
				'id' => $id,
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'location' => $this->input->post('location'),
				'datestart' => $this->input->post('start'),
				'dateend' => $this->input->post('end'),
				'status' => $status,
				'owner' => $this->session->userdata('user_id')
			);

			if (!empty($this->input->post('team'))){
			    $numberteam = count($this->input->post('team'));
			    for($i=0; $i<$numberteam; $i++) {
			    	if(trim($this->input->post('team')[$i] != '')) {
				        $teams = $this->input->post('team')[$i];
				    	$data1 = array(
							'projectID' => $id,
							'teamID' => $teams
						);
						$this->db->insert('projectteams', $data1);

				        $query1 = $this->db->query("SELECT * FROM teammembers where `teamID` = '$teams'");

				        foreach ($query1->result_array() as $row){
				        	$teamusers = $row['userID'];
					        $data2 = array(
								'projectID' => $id,
								'userID' => $teamusers
							);
							$this->db->insert('projectmembers', $data2);
						}
			      	}
			    }

				$data2 = array(
				    'role' => $role,
				);

				$this->db->where('userID', $this->session->userdata('user_id'));
				$this->db->where('projectID', $id);
				$this->db->update('projectmembers', $data2);
			} else {
				$data2 = array(
					'projectID' => $id,
					'userID' => $this->session->userdata('user_id'),
					'role' => $role,
				);
				$this->db->insert('projectmembers', $data2);
			 }

			return $this->db->insert('project', $data);

		}


		public function invitenewteam($projectID){
			$numberteam = count($this->input->post('projectteam'));
		    for($i=0; $i<$numberteam; $i++) {
		    	if(trim($this->input->post('projectteam')[$i] != '')) {
			        $teams = $this->input->post('projectteam')[$i];
			    	$data1 = array(
						'projectID' => $projectID,
						'teamID' => $teams
					);
					$this->db->insert('projectteams', $data1);

			        $query1 = $this->db->query("SELECT * FROM teammembers where `teamID` = '$teams'");

			        foreach ($query1->result_array() as $row){
			        	$teamusers = $row['userID'];
				        $data2 = array(
							'projectID' => $projectID,
							'userID' => $teamusers
						);
						$this->db->insert('projectmembers', $data2);
					}
		      	}
		    }
		}
}