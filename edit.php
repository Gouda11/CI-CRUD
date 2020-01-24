<h2>Create Post</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>

  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Ttle" value="<?php echo $post['title']?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" id="editor" class="form-control" cols="30" rows="10" placeholder="enter your thoughts" ><?php echo $post['body']?></textarea>
  </div>
  <div class="form-group">
    <label>Categories</label>
    <select name="category_id" class="form-control">
    <?php foreach ($categories as $category): ?>
    <option value="<?php echo $category['id']; ?>"> <?php echo $category['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div> 
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>