<?php
include("config.php");

$comm = "select * from comments ORDER BY post_time DESC";
$sql=$con->query($comm);
while($row=mysqli_fetch_array($sql)){
$cons = 'select Profile from user where Name = "'.$row['name'].'"';
$sql1=$con->query($cons);
$row1=mysqli_fetch_array($sql1);
	$name=$row['name'];
	$comment=base64_decode($row['comment']);
	$pimg=$row['img'];
    $time=$row['post_time'];
	$img=$row1['Profile'];
	$id=$row['id'];
	$type=$row['type'];
				  echo'<li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src='.$img.' alt="User Avatar" style="width:45px;height:40px;" class="img-circle">
                     </span>
      
               <div class="chat-body1 clearfix">';
			   			   if($pimg!=''){
     
	 echo'<div class="receiver"><p><strong>'.$name.'</strong> :'.$comment.' ';

	 if($type != 'pdf' && $type != 'docx' && $type != 'xls' && $type != 'mp4'&& $type != 'mp3'&& $type != 'txt'&& $type != 'zip')
	 {
	 echo'<a href ='.$pimg.' target="_blank" title="view" style="text-decoration:none;"><img class="img-thumbnail img-responsive" src='.$pimg.' width="100px" height="100px"></a>';
	 echo'
	 	<span class="message-time pull-right">
		<a href='.$pimg.' style="float:none;font-size:14px;color:grey;padding:5px;" title="Download" download="image"><i class="fa fa-download" ></i></a>
    <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	 }
	 else
	 {
	 if($type=="pdf")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/pdf.png" >';
	echo'
	
		<span class="message-time pull-right">
		<a href='.$pimg.' id="emp" style="float:none;font-size:14px;color:grey;padding:5px;" title="Download" download="pdf"><i class="fa fa-download"></i></a>
               <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	}
	if($type=="zip")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/zip.png" >';
	echo'
	
		<span class="message-time pull-right">
		<a href='.$pimg.' id="emp" style="float:none;font-size:14px;color:grey;padding:5px;" title="Download" download="zipfile"><i class="fa fa-download"></i></a>
               <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	}
	if($type=="mp4")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/video.png" >';
	
	echo'
	
	<span class="message-time pull-right">
	<a href ='.$pimg.' target="_blank" title="Play" style="text-decoration:none;font-size:14px;color:grey;"> <i class="fa fa-play"></i></a>
		<a href='.$pimg.' id="emp" style="float:none;font-size:14px;color:grey;padding:5px;" title="Download" download="video"><i class="fa fa-download" aria-hidden="true"></i></a>
               <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	}
	if($type=="mp3")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/mp3.png" >';
	echo'
	<span class="message-time pull-right">
		<a href='.$pimg.' id="emp" style="float:none;font-size:14px;color:grey;padding:5px;" title="Download" download="audio"><i class="fa fa-download"></i></a>
            <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	}
	if($type=="xls")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/excel.png" >';
	echo'
	<span class="message-time pull-right">
	<a href='.$pimg.' id="emp" style="float:none;font-size:14px;color:grey;padding:5px;" title="Download" download="excel"><i class="fa fa-download"></i></a>
                <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	}
	if($type=="docx")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/word.png" >';
	echo'
	<span class="message-time pull-right">	
	<a href='.$pimg.' id="emp" style="float:none;color:grey;font-size:14px;padding:5px;" title="Download" download="document"><i class="fa fa-download"></i></a>
               <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
              </span>
	  ';
	}
	if($type=="txt")
	 {
	echo '<img class="img-thumbnail img-responsive" src="images/text.png" >';
	echo'
	<span class="message-time pull-right">
	<a href='.$pimg.' id="emp" style="float:none ;color:grey;font-size:14px;" title="Download" download="text"><i class="fas fa-file-download"></i></a>
	<a href ='.$pimg.' target="_blank"  title="View" style="text-decoration:none;font-size:14px;color:grey;padding:5px;"> <i class="fa fa-folder-open"></i> </a>
	
		<a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a> 
                
              </span>
	  ';
	}
	
	
	 }
	 echo'</p></div><div class="chat_time pull-right">'.date("j/m/Y g:i:sa", strtotime($time)).'</div>';
	  }
	  else{
	  echo'<div class="receiver"><p><strong>'.$name.'</strong> : '.$comment.'<span class="message-time pull-right">
               <a href="#" id="'.$id.'" style="float:none;font-size:18px;color:red;padding:5px;" title="delete" onclick="del(this.id);return false;"><i class="fa fa-remove"></i></a>
              </span></p></div><div class="chat_time pull-right">'.date("j/m/Y g:i:sa", strtotime($time)).'</div>';
	  }
	  
						echo'
						
                     </div>
                  </li>';


}
?>