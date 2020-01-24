<h3><?php echo $post['title']; ?></h3>
<small class="post-date">Postd on: <?php echo $post['created_at']; ?></small><br>
<img class="thubnail" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>"></img>

<?php echo $post['body']; ?>
<br> <br>
<hr>

<?php if($this->session->userdata('user_id')==$post['user_id']): ?>
<hr>

<?php echo form_open('posts/delete/' . $post['id']); ?>
    <input type="submit" value="Delete" class="btn btn-danger"></input>
    </from>


    <a class="btn btn-primary" href=" <?php echo base_url(); ?>posts/edit/<?php echo  $post['slug']; ?>">Edit</a>
    </form>
<?php endif; ?>
<hr>

<h3>Comments</h3>
<?php if($comments) : ?>
    <div class="form-group">
    <?php foreach($comments as $comment) : ?>
    <h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name'] ?></strong>]</h5>
    <?php endforeach; ?>
    </div>
<?php else : ?>
<p>No Comments for this post, please add comment</p>
<?php endif; ?>

<h3>Add Comment</h3>
<?php echo validation_errors(); ?> 
<?php echo form_open('comment/create/' . $post['id']); ?>
<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
<label>Email</label>
<input type="text" name="email" class="form-control">
</div>
<div class="form-group">
<label>Body</label>
<textarea  name="body" class="form-control"> </textarea>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button class="btn btn-primary" type="submit">Submit</button>
</div>