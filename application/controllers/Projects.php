<?php
class Projects extends CI_Controller {
    public function index(){
        $page = 'index';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

	    if ( ! file_exists(APPPATH.'views/projects/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
    	}

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'projects';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['myprojects'] = $this->project_model->my_projects($this->session->userdata('user_id'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('projects/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function info($id = NULL){
        $page = 'info';

        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/projects/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['info'] = $this->project_model->get_project_info($id);
        $data['members'] = $this->project_model->get_project_projectteam($id);
        $data['teamnotjoin'] = $this->team_model->get_all_teams();
        if(empty($data['info'])){
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'projects';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['back'] = $_SERVER['HTTP_REFERER'];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('projects/'.$page, $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/scripts');

            
    }

    public function inviteteam($projectID){
        $projectID = $this->input->post('proID');
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }


            $this->project_model->invitenewteam($projectID);

            // Set message
             $this->session->set_flashdata('team_invited', 'Team Invited');
             redirect('projects/info'.$projectID);
            
    }


    public function members($id = NULL){
        $page = 'members';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/projects/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['members'] = $this->project_model->get_project_members($id);
        $data['info'] = $this->project_model->get_project_info($id);

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'projects';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['back'] = $_SERVER['HTTP_REFERER'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('projects/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function create(){
        $page = 'create';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/projects/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'projects';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['teams'] = $this->team_model->get_all_teams();

        $this->form_validation->set_error_delimiters('<script type="text/javascript">$(function(){toastr.error("', '")});</script>');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('location', 'location', 'required');
        $this->form_validation->set_rules('start', 'date start', 'required');
        $this->form_validation->set_rules('end', 'date end', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('projects/'.$page, $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/scripts');
        } else {
            $max = $this->project_model->get_max();
            $id = $max['id'] + 1;
            $this->project_model->create_project($id);

            // Set message
            $this->session->set_flashdata('project_created', 'Your project has been created');
            redirect('projects/create');
        }

    }

    public function update(){
        $page = 'create';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/projects/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'projects';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['back'] = $_SERVER['HTTP_REFERER'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('projects/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function remove(){
        $page = 'create';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/projects/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'projects';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('projects/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
}