
<?php
class Team_model extends CI_Model {

        public function __construct(){
                $this->load->database();
        }

		// get all teams
        public function get_all_teams($name = FALSE){
        	if($name === FALSE){
				$query = $this->db->get('team');
				return $query->result_array();
			}

			$query = $this->db->get_where('team', array('name' => $name));
			return $query->row_array();
		}

		// get all teams
        public function get_my_teams($id){
        	$this->db->select('*, teammembers.userID as usID');
			$this->db->join('teammembers', 'teammembers.teamID = team.id');
			$this->db->where('teammembers.userID', $id);
			$query = $this->db->get('team');

			return $query->result_array();
		}

		// get all teams
        public function team_projects($name){
        	$this->db->select('*, project.name as projName, project.id as projID');
			$this->db->join('projectteams', 'projectteams.projectID = project.id');			
			$this->db->join('team', 'team.id = projectteams.teamID');
			$this->db->where('team.name', $name);
			$query = $this->db->get('project');

			return $query->result_array();
		}

		// get all teams
        public function team_members($name){
        	$this->db->select('*, users.id as usID');
			$this->db->join('team', 'team.id = teammembers.teamID');
			$this->db->join('users', 'users.id = teammembers.userID');
			$this->db->where('team.name', $name);
			$query = $this->db->get('teammembers');

			return $query->result_array();
		}

        public function team_creator($name, $userID){
        	$this->db->select('*');
			$this->db->join('team', 'team.id = teammembers.teamID');
			$this->db->where('userID', $userID);
			$this->db->where('team.name', $name);
			$query = $this->db->get('teammembers');

			return $query->num_rows();
		}

		public function get_max(){
			$this->db->select_max('id');
			$query = $this->db->get('team');

			return $query->row_array();
		}

		public function create_team($id, $user_id){
			$this->db->trans_start();
		    $data = array(
		    	'id' => $id,
				'name' => $this->input->post('teamname')
			);

			$data2 = array(
		    	'teamID' => $id,
				'userID' => $user_id
			);

			if (!empty($this->input->post('teammember'))){
			    $numberteam = count($this->input->post('teammember'));
			    for($i=0; $i<$numberteam; $i++) {
			      if(trim($this->input->post('teammember')[$i] != '')) {
			        $teams = $this->input->post('teammember')[$i];

			        $data1 = array(
						'teamID' => $id,
						'userID' => $teams
					);
					$this->db->insert('teammembers', $data1);
			      }
			    }
 			}

 			$this->db->insert('teammembers', $data2);
 			$this->db->insert('team', $data);

 			if ($this->db->trans_status() === FALSE){
        		return $this->db->trans_rollback();
			} else {
        		return $this->db->trans_commit();
			}	
		}
}