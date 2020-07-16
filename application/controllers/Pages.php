<?php
class Pages extends CI_Controller {
    public function view($page = 'home'){
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

	    if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
    	}

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'dashboard';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['userinfo'] = $this->user_model->about($this->session->userdata('user_id'));

        $data['teams'] = $this->user_model->count_teams($this->session->userdata('user_id'));
        $data['projects'] = $this->user_model->count_projects($this->session->userdata('user_id'));
 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function register(){
        $page = 'register';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'dashboard';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['back'] = $_SERVER['HTTP_REFERER'];

        $this->load->view('pages/'.$page, $data);

    }

    public function login(){
        if($this->session->userdata('logged_in')){
            redirect('pages/view');
        }

        $this->form_validation->set_error_delimiters('<script type="text/javascript">$(function(){toastr.error("', '")});</script>');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('pages/login');

        } else {
            // Get input
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Login user
            $user_id = $this->user_model->login($email, $password);

            if($user_id){
                // Create session
                $user_data = array(
                    'user_id' => $user_id['id'],
                    'email' => $email,
                    'firstname' => $user_id['firstname'],
                    'lastname' => $user_id['lastname'],
                    'usedtologin' => $user_id['usedtologin'],
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');

                redirect('home');
            } else {
                // Set message
                $this->session->set_flashdata('login_failed', 'Invalid Email/Password');

                redirect('login');
            }       
        }
    }

    public function logout(){
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');

        redirect('login');
    }

    public function settings($page = 'settings'){
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'settings';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['userinfo'] = $this->user_model->about($this->session->userdata('user_id'));
 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }

    public function profile($id = NULL){
        $page = 'userprofile';
        if(!$this->session->userdata('logged_in')){
                redirect('login');
        }

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['current'] = 'dashboard';
        $data['firstname'] = $this->session->userdata('firstname');
        $data['lastname'] = $this->session->userdata('lastname');
        $data['userinfo'] = $this->user_model->about($id);
        $data['teams'] = $this->user_model->count_teams($id);
        $data['projects'] = $this->user_model->count_projects($id);
        $data['listprojects'] = $this->user_model->user_projects($id);
        $data['back'] = $_SERVER['HTTP_REFERER'];
 
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/scripts');
    }
}