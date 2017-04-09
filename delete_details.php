<body style="background-image:url('admin.jpg');background-size:cover"> 
</body>
<?php 
$success="";
$error="";
  include('admin_header.php');
session_start();
if(isset($_SESSION['username']))
{	
      
 }
  


else
{	 
	header("Location: home.php"); 
	exit;
}
  if(isset($_POST['submit'])){
	 
	 
	 if(!$_POST['id']){
		 $error="Enter Id";
	 }
	 else{
	 $i=$_POST['id'];
	 
	 $conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
	 	if (!$conn) {
				die('Could not connect: ' . mysql_error());
			}
//			echo 'Connected successfully';


			mysql_select_db('wadhostel',$conn);
			$query2="select * from registration where id='".$i."'";
			$res=mysql_query($query2,$conn);   // check whether the id is available or not
			$data=mysql_fetch_row($res);
			 
			if(!$data)
			{			$error= "Id does not exist";
			}
			else{
				
						$success="Successfully Deleted Student details";
			}
			
			
			
			
			$query="delete from 	`registration` where id='".$i."'";
mysql_query($query,$conn); 
			mysql_close();
			
			
			
			
			
			
	 }
	}
			
?>



<style> 
</style>
<div>
 
<form method="post">
<br><br><br>
<h1>
<center style="color:white;"><br>
Delete Student Record<br><br>
</h1>
<center style="color:white;">

 Record:
<input type="text" name="id"/> 
 <br> <br><br>
<input type="submit" value="Delete" name="submit"/>
<br><br><br><br>
</form>
<?php   echo $error;
echo $success;

?>
</center>
</div>
</div>