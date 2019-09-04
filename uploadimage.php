<?php 
include('config.php');
session_start();
if($_POST){
 $comment='';
 $status='1';
 $name = $_POST['name'];
 $fid = $_POST['fid'];
 $tid = $_POST['tid'];
    $type = explode('.', $_FILES['files']['name']);
    $type = $type[count($type) - 1];
    $url = 'solo/' . uniqid(rand()) . '.' . $type;
     $imgname=$_FILES['files']['name'];
    if(in_array($type, array('gif', 'jpg', 'jpeg', 'png','mp4','docx','pdf','txt','xls','mp3','zip'))) {
        if(is_uploaded_file($_FILES['files']['tmp_name'])) {
            if(move_uploaded_file($_FILES['files']['tmp_name'], $url)) {
 
                
         $sql="insert into solochat (name,comment,img,imgname,type,post_time,form_id,to_id,status) values('$name','$comment','$url','$imgname','$type',CURRENT_TIMESTAMP,'$fid','$tid','$status')";
 
                $con->query($sql);
                                }
        }
    }
     
}


?>