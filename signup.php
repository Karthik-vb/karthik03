<!DOCTYPE html>
<html>
<title>Login Form</title>
<head>
<?php
include('config.php');
?>
<style>
body {
    background: url('images/bg1.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

</style>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<link rel="stylesheet type="text/css" href="style.css">


</head>
<body>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<div class="login-block register-box">
    <div class="logo">
    	<img src="images/2.gif"/>
    </div>
	<form action="register.php" method="post"  id="signup"  enctype="multipart/form-data" autocomplete=off>    
	    <input type="text" placeholder="UserName" id="username1" name="username" class="fullname" required/>
    	<input type="password" placeholder="password" id="password1" name="password1" class="password" required/>
	    <input type="password" placeholder="comfirm password" id="password2" name="password2" class="password" required/>
		<span class="error" style="color:red"></span>
      <div class="file-upload">
								<div class="file-select">
							<div class="file-select-button demoInputBox" id="fileName">Choose File</div>
							<div class="file-select-name demoInputBox"  id="noFile">No file chosen...</div> 
			<input type="file" onChange="ValidateSize(this)" name="files" class="form-control" accept="image/jpg,image/png,image/jpeg" id="files" />
							
						  </div>
	</div>
 
		<input type="submit"  id="newreg" name="submit" class="login"/>
	</form>
	 <?php
if(isset($_GET["msg"]))
{
	echo $_GET["msg"];
}
?>

<p style="text-align:center; font-size:14px">Have an account ? <a href="index.php" style="text-decoration:none"><strong style="color:#08C400" id="hide">Sign In</strong></a></p>

</div>
<script type="text/javascript" src="script/script.js"></script>
</body>
</html>
