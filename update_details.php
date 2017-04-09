 <body style="background-image:url('admin.jpg');background-size:cover"> 
</body><?php 

$error="";
$success="";
 
  if(isset($_POST['submit'])){
	 
	 
	 if(!$_POST['id']){
		 $error= "Enter ID ";
	 }
	 else{
	 $i=$_POST['id'];
	// echo $i;
	 $conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
	 	if (!$conn) {
				die('Could not connect: ' . mysql_error());
			}
			//echo 'Connected successfully';


			mysql_select_db('wadhostel',$conn);
			
			$query="select * from registration where id='".$i."'";
			$res=mysql_query($query,$conn);
			$count=mysql_num_rows($res);
			if($count==1)
		{
			session_start();
			$_SESSION['sid']=$i; 
			header("Location: update_details2.php");
			exit;
		}
			else{
				$error="Id does not exist";
			}
			
			
			
			
			
			
			
	 }
	 }
	include('admin_header.php');
?>


 
<div style="color:white"> 
<form method="post">
<br><br>

<center>
<h1> Enter ID to Update Record</h1>


<center>ID 
<input type="text" size="5" name="id"/> 
<input type="submit" value="Update" name="submit"/> 
</center>   
</form>


<br><br>
<center><?php echo $error;
echo $success;
?></center>
	</div>
 