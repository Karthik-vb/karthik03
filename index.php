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
<div class="login-block login-box">
    <div class="logo">
    	<img src="images/1.gif"/>
    </div>
    <form action="check-login.php" method="post" autocomplete=off>
	    <input type="text" placeholder="Username" id="username" name="username" class="username" required/>
	    <input type="password" placeholder="Password" id="password" name="password" class="password" required/>
	    <input type="submit"  id="loginbutton" name="loginbutton" class="login"/>
    </form>
 <?php
if(isset($_GET["msg"]))
{
	echo $_GET["msg"];
}
?>
	
    <p style="text-align:center; font-size:14px">Not registered ? <a href="signup.php" style="text-decoration:none"><strong style="color:#ff656c" id="show" >Create an account</strong></a></p>
</div>
<script type="text/javascript" src="script/script.js"></script>
</body>
</html>
