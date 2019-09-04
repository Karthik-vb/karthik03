<?php
include("config.php");
session_start();

$uName = strtolower($_POST['username']);
$pWord = strtolower($_POST['password']);
$hash = md5($pWord);
if($uName!=""&&$hash!="")
{

$qry = "SELECT * FROM user WHERE Name='".$uName."' and Password='".$hash."'";

$sql=$con->query($qry);
if($sql->num_rows>=1)
{

$queryz = "UPDATE user SET Online= 'Online',Time=CURRENT_TIMESTAMP WHERE Name='".$uName."' ";                        
      $sql4=$con->query($queryz);	

	$res = mysqli_fetch_array($sql);
	$_SESSION['uname'] = $res['Name'];
	$_SESSION['id'] = $res['id'];
	$_SESSION['img'] = $res['Profile'];
	$_SESSION['login']=time();	
	header('location:home.php');
}
else {
	header("location:index.php?msg=<p align='center' class='error'>invalid user</p>");
}
}
else
{
header("location:index.php?msg=<p align='center' class='error'>Plz fill required fields </p>");
}

?>