<?php

	$con= new mysqli("localhost","root","","mychat");
	
	if($con->connect_error)
	{
		echo $con->connect_error;
		die("sorry Database error");
	}
	?>