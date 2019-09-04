<?php
$host="localhost";
$username="root";
$password="";
$databasename="mychat";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if(isset($_POST['user_comm']) && isset($_POST['user_name'])&& isset($_POST['form_id'])&& isset($_POST['to_id']))
{
  $comment=base64_encode($_POST['user_comm']);
  $name=$_POST['user_name'];
  $fid=$_POST['form_id'];
  $tid=$_POST['to_id'];
  $status='1';
  $type='';
  $imgname='';
 $target_file ="";
   

  $insert=mysql_query("insert into solochat (name,comment,img,imgname,type,post_time,form_id,to_id,status) values('$name','$comment','$target_file','$imgname','$type',CURRENT_TIMESTAMP,'$fid','$tid','$status')");
}

?>