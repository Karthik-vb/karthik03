<?php
include("config.php");
session_start();
$uname=$_SESSION["uname"];
$id=$_SESSION["id"];
if(isset($_POST["submit"]))
{
        $pw = strtolower($_POST["oldpassword"]);
		$pass = md5($pw);
		$newpass = strtolower($_POST["newpassword"]);
        $confirmnewpass = strtolower($_POST["confirmnewpassword"]);

if($uname!=""&&$pass!=""&&$newpass!=""&&$confirmnewpass!="")
{	
$sql="SELECT ID,Name,Password FROM user WHERE Name='$uname' AND Password='$pass'";
    $result=$con->query($sql);
	if($result->num_rows>=1) 
	{
                             if($newpass==$confirmnewpass)
                                 {
								 	$pw = md5($newpass);
                              $sql="UPDATE user SET Password='$pw' where Name='$uname'";
							  
                          if($con->query($sql))
                              {
							  	header('location:home.php?msg=<p align="center" class="correct">Congratulations You have successfully changed your password</p>');
             
                                }
							  }
							  else 
							  {
							  header("location:home.php?msg1=<p align='center' class='error'>Password and confirm password must be same</p>");
							  
							   }
							   
 
                              
	                            
	         }
			 else
			 {
			 header("location:home.php?msg1=<p align='center' class='error'>old password is incorrect</p>");
			  }
					 
				}
				else
				{	 
				header("location:home.php?msg1=<p align='center' class='error'>plz fill all the details</p>");
				}
	   }
      ?>
	   