<?php 
class Comment extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->model('posts_model');
        $this->load->library('form_validation');
    }

    public function create($post_id){
        $slug = $this->input->post('slug');
        $data['post'] = $this->posts_model->select_slug($slug);
    
    $this->form_validation->set_rules('name', 'Name', 'trim|required');
    $this->form_validation->set_rules('email', 'Emali', 'trim|required|valid_email');
    $this->form_validation->set_rules('body', 'Body', 'trim|required');
    
    
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
          $this->load->view('posts/view', $data);
          $this-> load->view('templates/footer');

    } else {
        $this->comment_model->create_comment($post_id);
        // SET MESSAGE
        $this->session->set_flashdata('comment_added', 'comment added successfully');
        
        
        redirect('posts/' .$slug,'refresh');
        
    }
    
} 
}