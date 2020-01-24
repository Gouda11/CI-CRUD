<!DOCTYPE html>
<html lang="en">
<head>
  <title>CI CRUD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <style>
* {
  box-sizing: border-box;
}

h2{
    color:green;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

</head>
<body>

<div class="container">
<div class="panel panel-default">
    <div class="panel-heading"></div>
  <div class="panel-body">
      <div class="pull-left">
      <h2>crud operation using CI</h2>
      </div>
  <form action= "<?php echo site_url('crud/add')?>" method="post" class="was-validated">
  <div class="gorm-group col-md-6">
      <label for="add_name">Name:</label>
      <input type="text" class="form-control" id="add_name" required placeholder="Enter name" name="add_name">
    </div>
    
    <div class="gorm-group col-md-6">
      <label for="add_email">Email:</label>
      <input type="email" class="form-control" id="email" require placeholder="Enter email" name="add_email">
    </div>
    <div class="gorm-group col-md-6">
      <label for="add_date">DATE:</label>
      <input type="date" class="form-control" id="add_date" name="add_date">
    </div>
    <div class="row">
    <div class="gorm-group col-md-6">
        <div class="col-25">
        <label for="add_address" >Address:</label>
        </div>
        <div class="col-75">
        <textarea id="address" name="add_address" placeholder="Write something.." style="height:200px"></textarea>
        </div>
    </div>
</div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  </div>
 
</div>
</div>

<div class="table-responsive">
<table class="table table-bordered">
<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Course</th>
<th>Status</th>
</tr>
<tbody>
  

</tbody>



</table>
<script type="text/javascript" language="javascript">
$(document).ready(function () {
  function fetch_data(){
    $.ajax({
      url: "<?php echo base_url(); ?>test_api/action",
      method: "GET",
      data:{data_action:'fetch_all'},
      success:function(data){
        $('tbody').html(data);
      }
    });
  }
  fetch_data();
});

</script>
</div>
</body>
</html>

<!-- 

  <tr>
  <td><?php echo $row->id; ?></td>
  <td><?php echo $row->name; ?></td>
  <td><?php echo $row->email; ?></td>
  <td><?php echo $row->mobile; ?></td>
  <td><?php echo $row->course; ?></td>
    <td><?php echo $row->status; ?></td>

  <td>

 -->