
<body style="background-image:url('admin.jpg');background-size:cover"> 
</body>


<?php

  include('admin_header.php');
$success="";
$error="";
session_start(); 
if(isset($_SESSION['username']))
{	
      
 }
  


else
{	 
	header("Location: home.php"); 
	exit;
}
IF(isset($_POST['submit'])){
	if(!$_POST['id'])
	$error="enter Id";

		else{
			$i=$_POST['id'];
		   
			$conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
					if (!$conn) {
						die('Could not connect: ' . mysql_error());
					} 
	

			mysql_select_db('wadhostel',$conn);
			$query2="select * from notices where id='".$i."'";
			$res=mysql_query($query2,$conn);   // check whether the notice is available or not
			$data=mysql_fetch_row($res);
			if(!$data)
					$success= "Id does not exist";
			
			
			$query="delete from `notices` where id='".$i."'";
		
			
			 mysql_query($query,$conn);
			
			mysql_close();
		
		
 	  

}



}


?>


	<br><br><Br>
<center style="color:white">
 
 <span style="font-size:30px">Delete Notice
 </span>
 <br />
 <br/>
 
 <form method="post">
Id:
 
<input type="text" name="id"/>
<br/> 
<br/> 
<br/>

<input type="submit" value="submit" name="submit"/>
 </form> 
<br/> 
<br/> 
 <?php echo $success;
 echo $error;?>
 </center>