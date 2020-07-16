<?php
class Teams extends CI_Controller {
    public function index(){
        $page = 'index';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

	    if ( ! file_exists(APPPATH.'views/teams/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
    	}

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['teams'] = $this->team_model->get_all_teams();
        $data['myteams'] = $this->team_model->get_my_teams($this->session->userdata('user_id'));
        $data['current'] = 'teams';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('teams/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function info($name = NULL){
        $page = 'info';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/teams/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }


        $data['teaminfo'] = $this->team_model->get_all_teams();
        if(empty($data['teaminfo'])){
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'teams';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['teamname'] = $this->team_model->get_all_teams($name);
        $data['creator'] = $this->team_model->team_creator($name, $this->session->userdata('user_id'));
        $data['teamprojects'] = $this->team_model->team_projects($name);
        $data['teammembers'] = $this->team_model->team_members($name);
        $data['back'] = $_SERVER['HTTP_REFERER'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('teams/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function members($name = NULL){
        $page = 'members';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/teams/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'teams';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['teamname'] = $this->team_model->get_all_teams($name);
        $data['teammembers'] = $this->team_model->team_members($name);
        $data['back'] = $_SERVER['HTTP_REFERER'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('teams/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }


    public function create(){
        $page = 'create';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/teams/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'teams';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['allusers'] = $this->user_model->all_users($this->session->userdata('user_id'));

        $this->form_validation->set_error_delimiters('<script type="text/javascript">$(function(){toastr.error("', '")});</script>');
        $this->form_validation->set_rules('teamname', 'Team Name', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('teams/'.$page, $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/scripts');
        } else {
            $max = $this->team_model->get_max();
            $id = $max['id'] + 1;
            $this->team_model->create_team($id, $this->session->userdata('user_id'));

            // Set message
            $this->session->set_flashdata('team_created', 'Your team has been created');
            redirect('teams/create');
        }


    }

}