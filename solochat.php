<?php 
include('config.php');
session_start();
	$id=$_SESSION['id'];
	if(isset($_GET['fid']) && isset($_GET['tid']))
	{
	
	$fid=$_GET['fid'];
	$tid=$_GET['tid'];
	
	}
	
$idletime=1000;
$queryzs = "UPDATE solochat Set status=0  where to_id ='".$fid."' AND form_id ='".$tid."' AND status= 1";
$con->query($queryzs);	

if (time()-$_SESSION['login']>$idletime)
{

$queryz = "UPDATE user Set Online='Offline' WHERE id='".$id."'";                        
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

<!Doctype html>
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
 
      $("#results").load("soloload.php", 
    {
        'key1': '<?php echo $fid; ?>',
        'key2': '<?php echo $tid; ?>'
    });

  }
 
  setInterval('autoRefresh_div()', 1000);
		
    </script>
	
<link rel="stylesheet type="text/css" href="style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<style>
body {
    background: url('images/vb.jpeg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
}

</style>
<script type="text/javascript" src="script/soloscript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://use.fontawesome.com/1e803d693b.js"></script>
</head>

<body>




<div class="container">
<div class="row">

<div class="col-md-8 col-md-offset-2">
<div class="main_section">
 <div class="chat_container">
         		 
		 
         <div class="col-sm-12 message_section">
		 <div class="row">
		 <div class="new_message_head">
	<div class="pull-left"><h4 style="color:white;font-size:16px;margin-top:0px;margin-bottom:-10px;"><strong>Private Chat</strong></h4></div><div class="pull-right">
  <a href="home.php" style="text-decoration:none; color:white;"><i class="fa fa-home" aria-hidden="true"></i> home</a>
    <a href="logout.php?id=<?= $_SESSION['id'] ?>" style="text-decoration:none; color:white;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
	</div>
		 </div><!--new_message_head-->
		 
		 <div class="chat_area">
		 <ul class="list-unstyled">
		 
		<div id="results">
	
		<?php
			include("soloload.php");
		?>
	</div>				 
				
		 
		 
		 </ul>
		 </div><!--chat_area-->
		 
		 <form method='post' action="#" onSubmit="return posts();" id="my_form" name="my_form" autocomplete=off>
		 <input type="text" style="display:none" id="username1" value="<?= $_SESSION['uname'] ?>">
		 <input type="text" style="display:none" id="fid" value="<?= $_GET['fid'] ?>">
		 <input type="text" style="display:none" id="tid" value="<?= $_GET['tid'] ?>">
          <div class="message_write">
    	 <textarea class="form-control" id="comment1" placeholder="type a message"></textarea>
		 <div class="clearfix"></div>
		 <div class="chat_bottom">
		 <input type="submit"  value="Send"   name="btn" class="pull-right btn btn-success">
		 </form>
		 
<form  method="post" enctype="multipart/form-data" id="uploadImageForm">
         <input type="text" style="display:none" name="name" id="username1" value="<?= $_SESSION['uname'] ?>">
		 <input type="text" style="display:none" name="fid" id="fid" value="<?= $_GET['fid'] ?>">
		 <input type="text" style="display:none" name="tid" id="tid" value="<?= $_GET['tid'] ?>">
                  
         <div class="file-upload1">
		 
								<div class="file-select1">
							<div class="file-select-button1 demoInputBox" id="fileName"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
 Add Files</div>
					<div class="file-select-name1 demoInputBox"  id="noFile">No file chosen...</div>		
			<input type="file" onChange="ValidateSize(this)" name="files" class="form-control" accept=".jpeg,.jpg,.mp3,.pdf,.txt,.docx,.xsl,.mp4,.png,.gif,.zip"  id="files" />
							
						  </div>
						  
	</div>         
	 
          <button type="submit" id="vb" class="btn btn-info">Upload</button>
        </form>
		 <div id="messages"></div> 
 
 
 
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