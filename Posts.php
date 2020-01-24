<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Posts extends CI_Controller {
      public function __construct(){
          parent::__construct();
          $this->load->model("posts_model");
          $this->load->model("comment_model");
          $this->load->library('form_validation');
      }
      
      public function index(){
            $data['title']='Latest Posts';
            $data['posts'] = $this->posts_model->select_all_data();

          $this->load->view('templates/header');
          $this->load->view('posts/index', $data);
          $this-> load->view('templates/footer');
  }

  public function view($slug =NULL){
      $data['post']=$this->posts_model->select_slug($slug);
      $post_id= $data['post']['id'];
      $data['comments']= $this->comment_model->get_comments($post_id); // view.php comments for each
       
      if (empty($data['post'])){
          show_404();
      }
      $data['title']= $data['post']['title'];

      $this->load->view('templates/header');
      $this->load->view('posts/view', $data);
      $this-> load->view('templates/footer');
}


public function create(){
      // check login
      if(!$this->session->userdata('logged_in')){
           redirect('users/login','refresh');
          
      }
      $data['title']= 'create post';

      $data['categories']= $this->posts_model->get_categories();

      $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[5]');

      $this->form_validation->set_rules('body', 'Body', 'required');
      
    
    if ($this->form_validation->run() == FALSE) {
        $this->load->view('templates/header');
        $this->load->view('posts/create', $data);
        $this-> load->view('templates/footer');

    } else {
        $config['upload_path']='./assets/images/posts/';
        $config['allowed_types']='jpg|gif|png|jpeg';
        $config['max_size']='2048';
        $config['max_width']='500';
        $config['max_heigght']='500';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
                $error = array('error' => $this->upload->display_errors());
                $post_image='noimage.jpg';
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                $post_image= $_FILES["files"]["name"];

        }
             $this->posts_model->create_post($post_image);

             // SET MESSAGE
        $this->session->set_flashdata('post_created', 'you post has been created');
        
             redirect('posts');
       
    }
}
    
     public function delete($id){

        if($this->session->userdata('logged_in')){
            redirect('users/login','refresh');
           
       }
         $this->posts_model->delete_post($id);
         
         redirect('posts','refresh');
         
     }

     public function edit($slug){
         //check login
        if($this->session->userdata('logged_in')){
            redirect('users/login','refresh');
           
       }

       // check user
       if ($this->session->userdata('user_id')!= $this->posts_model->get_posts($slug)['user_id']) {
           
           redirect('posts','refresh');
           
       }
         
         $data['post']=$this->posts_model->select_slug($slug);
         $data['categories']= $this->posts_model->get_categories();

       
      if (empty($data['post'])){
          show_404();
      }
      $data['title']='Edit Post';

      $this->load->view('templates/header');
      $this->load->view('posts/edit', $data);
      $this-> load->view('templates/footer');

         
     }

     public function update(){
        if($this->session->userdata('logged_in')){
            redirect('users/login','refresh');
           
       }
         $this->posts_model->update_post();

         // SET MESSAGE
        $this->session->set_flashdata('post_updated', 'your post has been updated');
        
         redirect('posts');
         
     }

      


  }