<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

</head>

<body>

  <div class="modal fade" id="signup" role="dialog">
  
<?php
$query = "SELECT * from user WHERE ID= '$id'";
$res = mysqli_query($con,$query);
$row= mysqli_fetch_array($res);

?>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button"  class="close" data-dismiss="modal">&times;</button>
          <h3 class="text-primary">View Profile</h3>
        </div>
		<div class="modal-body">
		<div class="row">	
		    <form  method="post" action="" role="form" class="form-horizontal" autocomplete=off>
			
			<div class="form-group">
			<label class="control-label col-md-4">User Name *:</label>
			<div class="col-md-7">
			<input type="text" class="form-control" name="name" value="<?php echo $row['Name']; ?>" placeholder=" Your Name" disabled><br>
			</div>
			</div>
			
				<div class="form-group row">
					<label class="control-label col-md-4">your profile pic :</label>
		<div class="col-md-7">
		<?php
		if($row['Profile']!="uploads/")
		             {
			         echo'<img alt="your image"  class="portimg" style="max-width:200px; max-height:200px;" src="'.$row['Profile'].'"/>';
					 }
					 else
					 {
					 echo'<img alt="your image"  class="portimg" style="display: none;" src="#"/>';
					 }
					 ?>
					 </div>
					 
				</div><br>		
			<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
			</form>					
                </div>
		</div>
      </div>      
    </div>
  </div>
 

 <div class="modal fade" id="newpass" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button"  onclick="javascript:window.location.reload()" class="close" data-dismiss="modal">&times;</button>
          <h3 class="text-primary">New password</h3>
        </div>
		<div class="modal-body">
		<div class="row">	
		    <form  method="post" name="form" id="newpass1" action="newpass.php" role="form" class="form-horizontal" autocomplete=off>
			
			
			<div class="form-group">
					<label class="control-label col-md-5">Enter your old password:</label>
		<div class="col-sm-6"><input type="password" class="form-control" autocomplete="new-password" placeholder="oldpassword"  name="oldpassword" required></div><br>
				</div>

 <div class="form-group">
					<label class="control-label col-md-5">Enter your new password:</label>
			<div class="col-sm-6"><input type="password" class="form-control" autocomplete="new-password" placeholder="newpassword"  name="newpassword" required></div><br>
				</div>
				<div class="form-group">
		<label class="control-label col-md-5">Re-Enter your new password:</label>
     <div class="col-sm-6"><input type="password" class="form-control" autocomplete="new-password" placeholder="confirmnewpassword"  name="confirmnewpassword" required></div>
				</div>
								   <?php
      if(isset($_GET["msg1"]))
     {
	echo $_GET["msg1"];
       }
          ?>
			<div class="modal-footer">
			<button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-send"> </span> Submit</button>
          <button type="button"  onclick="javascript:window.location.reload()" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
			</form>					
                </div>
		</div>
        
      </div>      
    </div>
  </div>
  <script>
   $(function() {
  $("#newpass1").validate({
    rules: {
	
       oldpassword: {
                required: true,
                minlength: 3
            }, 
       newpassword: {
                required: true,
                minlength: 3
            },
	  confirmnewpassword: {
                required: true,
                minlength: 3
            } 
    },
    messages: {
       oldpassword: {
                required: "Please enter some data",
                minlength: "Your data must be at least 3 characters"
            },
			 newpassword: {
                required: "Please enter some data",
                minlength: "Your data must be at least 3 characters"
            },
			 confirmnewpassword: {
                required: "Please enter some data",
                minlength: "Your data must be at least 3 characters"
            }
	  
    }
  });
  });
 
  
  
  </script>  


</body>
</html>
