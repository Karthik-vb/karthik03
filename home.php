<?php
include('config.php');
session_start();
$idletime=1000;
$id=$_SESSION['id'];         
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

if(isset($_SESSION['id'])) {
$dates="UPDATE user Set Online='Offline' WHERE Time <= CURRENT_TIMESTAMP - interval 1 day";
	  
	    $con->query($dates);
}
else
   {
	header("location:index.php?msg=<p align='center' class='error'>plz login here...</p>");
	}
?>
  
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet type="text/css" href="style.css">

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Dashboard</title>
</head>

<body>
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
               <a id="emp" class="dropdown-toggle" data-toggle="dropdown" href="#"> 
		   <?php
$s = "SELECT * FROM user WHERE Name='".$_SESSION["uname"]."'";

$imgs=$con->query($s);	
$ph = mysqli_fetch_array($imgs);
echo'<p><img src="'.$ph['Profile'].'"  alt="John" style="width:60px;height:50px;padding:5px;" class="img-circle"><span style="color:#F37032;">'.$_SESSION["uname"].'   <span class="badge">user</span></span></p>';
?>
          </a>
		  </ul>
          <ul class="dropdown-menu">
		  
		<li><a data-toggle="modal"  data-target="#signup"><span class="fa fa-user-circle"> </span> View Profile</a></li>
    <li><a data-toggle="modal"  data-target="#newpass"><span class="fa fa-key"> </span>  Change Password</a></li> 

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
              </ul>
            <ul class="nav navbar-nav navbar-right">
			<li><a href="logout.php?id=<?= $_SESSION['id'] ?>" style="text-decoration:none;"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        <li class="dropdown">
			<?php
			$sum ="SELECT COUNT(*) FROM solochat where to_id ='".$id."' AND status= 1";
	  
	    $tot_msg = mysqli_query($con,$sum);
          $total_count = mysqli_fetch_array($tot_msg)[0];
          echo'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i> Notification (<b>'.$total_count.'</b>)</a>';
		  ?>
          <ul class="dropdown-menu notify-drop">
		  
            <div class="notify-drop-title">
            	<div class="row">
				
            		<div class="col-md-8 col-sm-8 col-xs-8 text-center">Click here to view message <i class="fa fa-bell"></i></div>
            		<div class="col-md-4 col-sm-4 col-xs-4 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom">
					<i class="fa fa-dot-circle-o"></i></a></div>
            	</div>
            </div>
            
            <div class="drop-content">
			<?php
			$coms ="SELECT form_id,name,COUNT(*) as count FROM solochat where to_id ='".$id."' AND status= 1 GROUP BY name ORDER BY count DESC";
	  
	    $results = mysqli_query($con,$coms);
		if($results->num_rows<1)
{
echo"<li>
            		<div class='col-md-12 col-sm-12 col-xs-12'>You have got no new messages <a href='' class='rIcon'><i class='fa fa-dot-circle-o'></i></</div></li>";
}
                           while ($msgs = mysqli_fetch_array($results)) 
                               {

            	echo"<li>
            		<div class='col-md-3 col-sm-3 col-xs-3'><div class='notify-img'><img src='http://placehold.it/45x45' alt=''></div></div>
          <div class='col-md-9 col-sm-9 col-xs-9 pd-l0'><a href='solochat.php?fid=".$_SESSION['id']." && tid=". $msgs['form_id'] ."'>you got ". $msgs['count'] ." new messages from  ". $msgs['name'] ."  </a>  <a href='' class='rIcon'><i class='fa fa-dot-circle-o'></i></a>
            		
            		
           
            		</div>
            	</li>";
            	
    }
	?>
            </div>
            <div class="notify-drop-footer text-center">
            	<a href=""><i class="fa fa-eye"></i> Unread messages Notifications</a>
            </div>
			
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
	</div>
</div>
<div class="onoffswitch3">
    <input type="checkbox" name="onoffswitch3" class="onoffswitch3-checkbox" id="myonoffswitch3" checked>
    <label class="onoffswitch3-label" for="myonoffswitch3">
        <span class="onoffswitch3-inner">
            <span class="onoffswitch3-active">
                <marquee class="scroll-text"> Welcome to Our Chat Application  <span class="glyphicon glyphicon-forward"></span> This app helps the user to communicate with their friends around the world and we also provide group chat features and we allow the user to share their files within 2mb and i request you to share ur feed back with me <span class="glyphicon glyphicon-backward"></span></marquee>
                <span class="onoffswitch3-switch">LATEST NEWS </span></span>
            </span>
            
        </span>
    </label>
</div><br><br>
<div class="container-fluid">

<div class="row">
			<div class="col-lg-12">
<?php
if(isset($_GET["msg"]))
{
	echo $_GET["msg"];
}
?>
  
   
	<?php
	if (isset($_GET['pageno'])) 
	  {
            $pageno = $_GET['pageno'];
		      	  
        }
		 else 
		{
            $pageno = 1;
        }
	

	
	
	if($pageno == 1)
	{
echo' <form action="" class="example" method="post"  align="right" autocomplete=off><input name="search" type="search"  placeholder="search by Name" ><button type="submit" name="button"  class="text-primary"><span class="glyphicon glyphicon-search"> </span> Search</button><br>
';
}
?>
</form>               
<div class="panel panel-default">
					<div class="panel-heading1">
					<a id="emp" href="chat.php" style="color:white;text-align:center;float:right"><i class="fa fa-users"></i> Group Chat</a>
						<h2 class="panel-title">Chat Userlist</h2>
					</div>
  <div class="table-responsive">                                                                   
  <table class="table table-hover" id="dev-table">
    <thead>
	<tr>
        <th>S.No</th>
		<th>Profile Pic</th>
        <th>Name</th>
        <th>Status</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	  
        $no_of_records_per_page = 3;
		
        $offset = ($pageno-1) * $no_of_records_per_page;
        

        $total_pages_sql = "SELECT COUNT(*) FROM user where id !='".$id."'";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);

        $sql = "SELECT * FROM user where id != '".$id."' ORDER BY ID LIMIT $offset, $no_of_records_per_page";
        $res_data = mysqli_query($con,$sql);
	          $i=1;
		$currenti = ($pageno - 1) * $no_of_records_per_page + $i;
if(isset($_POST['button']))
{      
	
  $search=$_POST['search'];

  $query=mysqli_query($con,"select * from user where Name like '%{$search}%' and id != '".$id."' ORDER BY ID LIMIT $offset, $no_of_records_per_page");

if (mysqli_num_rows($query) > 0)
            {
			
                           while ($row = mysqli_fetch_array($query)) 
                               {
							  
	                                
                               echo'<tr>';   
                               echo '<td>'.$currenti ++.'</td>';
		                       echo'<td  align="center">
                                    <img class="pull-left img-circle nav-user-photo" width="50" height="40" src='.$row['Profile'].' />
                                </td>';
		                       echo '<td>'. $row['Name'] .'</td>';
		                       echo '<td>';
							   if($row['Online']== "Online")
							   {
							   echo'<a class="btn btn-info btn-sm" href="#">'. $row['Online'] .'';
							   }
							   else
							   {
							   echo'<a class="btn btn-danger btn-sm" href="#">'. $row['Online'] .'';
							   }
							   echo'</a></td>';
		                     echo '<td><a id="emp" href="solochat.php?fid='.$_SESSION['id'].' && tid='. $row['id'] .'">Startchat</a></td>';
	       
	                           echo '</tr>';
							      
	                          }
                }
				
                 else
                    {
                               echo'<tr>';
							   echo '<td></td>';
							   echo '<td></td>';
							   echo '<td><p class="error text-center">No User Found</p></td>';
							   echo '<td></td>';
							   echo '<td></td>';
							    
                               
                               echo '</tr>';
                                }
								}
                          
             else
                 {   
				 
           
        while($row = mysqli_fetch_array($res_data))
		{
               
							   
                             
	                          
                              echo'<tr>';   
                               echo '<td>'.$currenti ++.'</td>';
		                        echo'<td align="center">
                                    <img class="pull-left img-circle nav-user-photo" width="50" height="40" src='.$row['Profile'].' />
                                </td>';
		                       echo '<td>'. $row['Name'] .'</td>';
		                       echo '<td>';
							   if($row['Online']== "Online")
							   {
							   echo'<a class="btn btn-info btn-sm" href="#">'. $row['Online'] .'';
							   }
							   else
							   {
							   echo'<a class="btn btn-danger btn-sm" href="#">'. $row['Online'] .'';
							   }
							   echo'</a></td>';
		                     echo '<td><a id="emp"  href="solochat.php?fid='.$_SESSION['id'].' && tid='. $row['id'] .'">Startchat</a></td>';
	       
	                           echo '</tr>';         
	                 
	                  
					 }
					 }
					 
					
	              ?>  
	
	
    </tbody>
  </table>
  <ul class="pagination page">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
  </div>
</div>
</div>
</div>
</div>
<script>
    $(function () {
  $('[data-tooltip="tooltip"]').tooltip()
	});
</script>
 <?php
    if(isset($_GET["msg1"]))
	{   
    ?>
<script>
 $(function() { $('#newpass').modal('show'); });
</script>
 <?php
    }
    ?>

  <?php
			  include("popup.php");
?>
	
</body>
</html>
