<?php 
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function register($enc_pass){
        $data=array(
            'name' => $this->input->post('name'),
            'zipcode' => $this->input->post('zipcode'),
            'email' => $this->input->post('email'),
            'password' => $enc_pass
        );
        return $this->db->insert('users', $data);
    }


        // log user in
        public function login($username, $password){
            $this->db->where('username' , $username);
            $this->db->where('password', $password);
            $result = $this->db->get('users');
    
            if($result->num_rows()==1){
                return $result->row(0)->id;
            }else{
                return false;
            }

        }


    // check user exits
    public function check_username_exists($username){
        $query= $this->db->get_where('users', array('username' =>$username));

        if(empty($query->row_array())){
            return true;
        }else {
            return false;
        }

    }

    public function check_email_exists($email){
        $query= $this->db->get_where('users', array('email' =>$email));

        if(empty($query->row_array())){
            return true;
        }else {
            return false;
        }

    }
}




        
        

    



    //  // logged out
    //  public function logout(){
    //     $this->session->user_data('logged_in');
    //     $this->session->unset_userdata('user_id');
    //     $this->session->unset_userdata('username');

    //     $this->session->set_flashdata('logged_out', 'you are now loggedout successfully');
    
    //         redirect('users/login'); 
        
        
    // }


    