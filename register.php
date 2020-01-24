

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">
<div class="col-md-4 col-md-offset-4">
        <h2 class="text-center"><?= $title; ?></h2>
        <div class="form-group">
        <label >Name</label>
        <input type="text" class="form-control" name="name" placeholder="enter the name"></input>
        </div>
        <div class="form-group">
        <label >Zipcode</label>
        <input type="text" class="form-control" name="zipcode" placeholder="zipcode"></input>
        </div> 
        <div class="form-group">
        <label >Username</label>
        <input type="text" class="form-control" name="username" placeholder="enter the username"></input>

        </div>

        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="enter the email"></input>
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" placeholder="password"> </input>
        </div>
        <div class="form-group">
        <label> Confirm Password</label>
        <input type="password" class="form-control" name="password2" placeholder="confirm password"> </input>
        </div>
         <button class="btn btn-primary btn-block" text="submit">Submit</button>


</div>
</div>
