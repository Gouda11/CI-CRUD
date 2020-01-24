<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sachin the man</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    
</head>
<body style="background-color:#fff";>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary body">
                <a class="navbar-brand" href="<?php echo base_url(); ?>">BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url();?>posts">Blogs</a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>categories/index">Categories </a>
                    </li>

                  </ul>


                  <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>posts/create">Create Post </a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>categories/create">Create Category </a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>users/register">User Register </a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>users/login">User Login </a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="<?php echo base_url(); ?>users/login">User logout </a>
                    </li>


                </div>
              </nav>

              <div class="container">
    
    <?php if ($this->session->flashdata('user_registered')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('user_registered'). '</p>' ; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_created')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('post_created'). '</p>' ; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('post_created')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('post_updated'). '</p>' ; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('category_created')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('category_created'). '</p>' ; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('comment_addedd')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('comment_added'). '</p>' ; ?>
    <?php endif; ?>

    
    <?php if ($this->session->flashdata('user_loggedin')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('user_loggedin'). '</p>' ; ?>
    <?php endif; ?>

    
    <?php if ($this->session->flashdata('loggedin_failed')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('loggedin_failed'). '</p>' ; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('logged_out')) : ?>
    <?php echo '<p class=" alert alert-success">' .$this->session->flashdata('logged_out'). '</p>' ; ?>
    <?php endif; ?>


