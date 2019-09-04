<?php   
include("config.php");
session_start(); 
$id = $_SESSION['id'];
$queryz = "UPDATE user Set Online='Offline' WHERE id='".$id."' ";                        
        $con->query($queryz);	
session_destroy(); 

exit();

?>