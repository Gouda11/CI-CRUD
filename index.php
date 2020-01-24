<h1><?= $title ?></h1>
<?php foreach($posts as $post) :?>

<h3><?php echo $post['title']; ?></h3>

<div class="row">
<div class="colmd-3">
<img class="thubnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>"></img>


</div>

<div class="col-md-9">
<small class="post-date"> Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?> 
</strong></small><br> </br>

<?php echo word_limiter($post['body'], 50); ?>
<p> <a class="badge badge-pill badge-primary" href="<?php echo site_url('/posts/' .$post['slug']); ?>">
Read More</a> </p> 

</div>
</div>

<?php endforeach; ?>


