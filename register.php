<?php
session_start();
include("config.php");
if(isset($_POST['submit'])) {

	
	$uname = strtolower($_POST['username']);
	$pword = strtolower($_POST['password1']);
	$pword2 = strtolower($_POST['password2']);
	$target_dir = "";

	if(isset($_FILES['files']['size']))
       {
$file_size= explode('.', $_FILES['files']['name']);
$type = $file_size[count($file_size) - 1];
    $target_file = 'uploads/' . uniqid(rand()) . '.' . $type;
move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
 }
 else
 {
 $target_file ="";
 }  

	if($pword != $pword2) {
	header("location:signup.php?msg=<p align='center' class='error'>Passwords do not match.</p>");
	
	}
	else {
		$checkexist ="SELECT Name FROM user WHERE Name = '$uname'";
		$result=$con->query($checkexist);
		if($result->num_rows>=1){
		header("location:signup.php?msg=<p align='center' class='error'>Username already exists, Please select other username.</p>");
			
		}
		else {
		$Online= 'Offline';
		if($type != "")
		{
			$sql="INSERT INTO user (`Name`,`Password`,`Profile`,`Online`,`Time`) VALUES('$uname',MD5('$pword'),'$target_file','$Online',CURRENT_TIMESTAMP)";
			}
			else
			{
			$target_file1 = "uploads/profile.png";
			$sql="INSERT INTO user (`Name`,`Password`,`Profile`,`Online`,`Time`) VALUES('$uname',MD5('$pword'),'$target_file1','$Online',CURRENT_TIMESTAMP)";
			}
			if($con->query($sql)){
			
			header('location:index.php');
			}
		}
		
	}

}

?>

