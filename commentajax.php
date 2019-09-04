<?php
$host="localhost";
$username="root";
$password="";
$databasename="mychat";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if(isset($_POST['comment']) && isset($_POST['name']))
{
  $target_dir = "";

	if(isset($_FILES['files']['size']))
       {
 $file_size= explode('.', $_FILES['files']['name']);
 $type = $file_size[count($file_size) - 1];
						if($type != "")
 						{
						$target_file = 'group/' . uniqid(rand()) . '.' . $type;
						$imgname=$_FILES['files']['name'];
					move_uploaded_file($_FILES["files"]["tmp_name"],$target_file);
					 }
					 else
					 {
					 $target_file ="";
					 }
 }
 
 else
 {
 $target_file ="";
 $imgname="";
 $file_size="";
 } 
 
  $comment=base64_encode($_POST['comment']);
  $name=$_POST['name'];
  $insert=mysql_query("insert into comments (name,comment,img,imgname,type,post_time) values('$name','$comment','$target_file','$imgname','$type',CURRENT_TIMESTAMP)");
}

?>