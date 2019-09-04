<?php
 include('config.php');
if($_POST['id']){
$id=$_POST['id'];
    if($id != "") {
        $querys = "SELECT * FROM comments WHERE id='".$id."'";
        $result = $con->query($querys);

        while ($delete = mysqli_fetch_array($result)) {
            $image = $delete['img'];
           
            unlink($image);
        }

        $del = "DELETE FROM comments WHERE id='".$id."'";
         $con->query($del);
    }

}
?>