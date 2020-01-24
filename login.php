<?php echo form_open('users/login'); ?>

<div class="row">
<div class="col-md-4 col-md-offset-4">
<h1 class="text-center"><?php echo $title; ?></h1>
<div class="form-group">
<input type="text" name="username" class="form-control" plcaeholder="Enter username" required autofocus>
</div>
<div class="form-group">
<input type="password" name="password" class="form-control" plcaeholder="Enter password" required autofocus>
</div>
<table>
	<tr> 
		<td>
			<!-- <button type="submit" class="btn btn-success btn-block">Sign In</button> -->

            <button onclick="myFunction()" class="btn btn-primary">Facebook Login</button>

		</td>

	</tr>

</table>

</div>



</div>


<?php echo form_close(); ?>

