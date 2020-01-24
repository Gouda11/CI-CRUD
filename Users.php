<?php 

class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('posts_model');
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function index(){
        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error']))
            {
                $data['user'] = $user;
            }
            var_dump($user);

        }else{
                   $this->load->view('users/register');
 
        }

    }
    // Register User
    public function register(){


        $data['title'] = 'Sign Up';
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

        
        if ($this->form_validation->run() ==FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            $enc_pass = md5($this->input->post('password'));
            $this->user_model->register($enc_pass);
        

        // SET MESSAGE
        $this->session->set_flashdata('user_registered', 'you are now registered successfully and can log in');
        
        redirect('posts'); 
        }

    }

    // Login User
    public function login(){
        $data['title'] = 'Login';

    
        $this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        
        if ($this->form_validation->run() ==FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
           // GET USERAME
           $username= $this->input->post('username');
            $password=md5($this->input->post('password'));

            // Login 
            $user_id= $this->user_model->login($username, $password);

            //checking condition
            if(user_id){

                $user_data=array(
                    'user_id' => $user_id,
                    'username' =>$username,
                    'logged_in'=>True
        
                );
                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_loggedin', 'you are now loggedin successfully');
        
                redirect('posts'); 
                
            }else {
                $this->session->set_flashdata('loggedin_failed', 'you are now loggedin successfully');
        
                redirect('users/login'); 
                }
        
        
            }
        }

        public function logout(){
            $this->session->user_data('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            $this->session->set_flashdata('logged_out', 'you are now loggedout successfully');
        
                redirect('users/login'); 
            
            
        } 

    
    // check if username exists
    public function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists', 'That username is taken. Please choos another one');

         if ($this->user_model->check_username_exists($username)) {
             return true;
         } else {
             return false;
         }
    }

    public function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose different one');

         if ($this->user_model->check_email_exists($email)) {
             return true;
         } else {
             return false;
         }
    }
}
