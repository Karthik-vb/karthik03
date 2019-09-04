<?php
include('config.php');
session_start();
	$id=$_SESSION['id'];
$idletime=1000;
if (time()-$_SESSION['login']>$idletime){

     $queryz = "UPDATE user Set Online='Offline' WHERE id='".$id."' ";                        
        $con->query($queryz);	
header("Location:index.php?msg=<p align='center' class='error'>timed out</p>");
 session_destroy(); 
 }
else
{
    $_SESSION['login']=time();
}

if(isset($_SESSION['uname'])) {

}
else{
	header("location:index.php?msg=<p align='center' class='error'>plz login here...</p>");
	}


?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lets Chat</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
   <script>
 		 function autoRefresh_div()
 {
 
      $("#result").load("load.php").show();

  }
 
  setInterval('autoRefresh_div()', 1000);


   </script>
<link rel="stylesheet type="text/css" href="style.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
    background: url('images/test.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

</style>
<script type="text/javascript" src="script/grpscript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/1e803d693b.js"></script>
</head>

<body>




<div class="container">
<div class="row">
<div class="col-md-6">


<div class="container">
	<div class="row">
        <div class="panel panel-default user_panel">
            <div class="panel-heading">
          <h3 class="panel-title"><strong>User List</strong><a href="home.php" style="text-decoration:none; color:white; float:right;"><i class="fa fa-home" aria-hidden="true"></i> home</a></h3>
				
            </div>
            <div class="panel-body">
				<div class="table-container">
                    <table class="table-users table" border="0">
                        <tbody>
						<?php
						$qry1 = "SELECT * FROM user where id !='".$id."'";

                                  $sql2=$con->query($qry1);
								  while($row2=mysqli_fetch_array($sql2)){
								   $time=$row2['Time'];
								   $online=$row2['Online'];
								     if($online=='Online')
									       {
						                    $dis="<img src='images/dot.png' height='15px' width='15px' class='tb' alt=''>";
                                           }
										   else
                                           {
                                             $dis="<img src='images/dotoffline.png' height='15px' width='15px' class='tb' alt=''>";											
                                           }

                            echo'<tr>';
							 echo'  <td align="center">
								'.$dis.'
								</td>';
                                echo'<td width="10" align="center">
                                    <img class="pull-left img-circle nav-user-photo" width="60" height="50" src='.$row2['Profile'].' />
                                </td>';
								
                              echo'  <td>
                                  <h4>'.$row2['Name'].' </h4>
                                </td>';
                               
                                echo'<td align="center">
								
                                    Last Login:'.date("j/m/Y g:i:sa", strtotime($time)).'<br><small class="text-muted">2 days ago</small>
                                </td>';
                           echo' </tr>';
						   }
                        ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

	</div>
</div>
</div>
<div class="col-md-6">
<div class="main_section">
 <div class="chat_container">
         		 
		 
         <div class="col-sm-12 message_section">
		 <div class="row">
		 <div class="new_message_head">
	<div class="pull-left"><h4 style="color:white;font-size:16px;margin-top:0px;margin-bottom:-10px;"><strong>GROUP CHAT</strong></h4></div><div class="pull-right">
  
    <a href="logout.php?id=<?= $_SESSION['id'] ?>" style="text-decoration:none; color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
	</div>
		 </div><!--new_message_head-->
		 
		 <div class="chat_area">
		 <ul class="list-unstyled">
		 
		<div id="result">
	
		<?php
			include("load.php");
		?>
	</div>				 
				
		 
		 
		 </ul>
		 </div><!--chat_area-->
		 
		 <form method='post' action="#" enctype="multipart/form-data"  id="my_form" name="my_form" autocomplete=off>
		 <input type="text" style="display:none" name="name" id="username" value="<?= $_SESSION['uname'] ?>">
          <div class="message_write">
    	 <textarea class="form-control" name="comment" id="comment" placeholder="type a message"></textarea>
		 <div class="clearfix"></div>
		 <div class="chat_bottom">
		  <div class="file-upload1">
		 
								<div class="file-select1">
							<div class="file-select-button1 demoInputBox" id="fileName"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
 Add Files</div>
					<div class="file-select-name1 demoInputBox"  id="noFile">No file chosen...</div>		
			<input type="file" onChange="ValidateSize(this)" name="files" class="form-control" accept=".jpeg,.jpg,.mp3,.pdf,.txt,.docx,.xsl,.mp4,.png,.gif,.zip"  id="files" />
							
						  </div>
						  
	</div>         
	</div>
	<div id="loading"><img src="images/loading.gif" style="width:80px;float:right;"/></div>
 <input type="submit"  value="Send" id="sub"  name="btn" class="pull-right btn btn-success">

 </form>
 </div>
 
		 </div>
		 </div>
         </div> <!--message_section-->
      </div>
</div>
</div>
</div>
</div>


</body>
</html>