<?php
  
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Categories extends CI_Controller {
      public function __construct(){
          parent::__construct();
          $this->load->library('form_validation');
          $this->load->model("category_model");
          $this->load->model("posts_model");
      }

       
      public function index(){
        $data['title']='Categories';
        $data['categories'] = $this->category_model->get_categories(); //foreach in index.php

      $this->load->view('templates/header');
      $this->load->view('categories/index', $data);
      $this-> load->view('templates/footer');
}
      
      
      public function create(){
        if($this->session->userdata('logged_in')){
            redirect('users/login','refresh');
           
       }
            $data['title']='Create Category';

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this-> load->view('templates/footer');
                } else {
            $this->category_model->create_category();
            // SET MESSAGE
        $this->session->set_flashdata('category_created', 'category created');
        
            
            redirect('categories','refresh');
            
        }     
     }
     public function posts($id){
         $data['title']= $this->category_model->get_category($id)->name;
         $data['posts']= $this->posts_model->get_posts_by_category($id);

         $this->load->view('templates/header');
         $this->load->view('posts/index', $data);
         $this-> load->view('templates/footer');

     }
  }