<body style="margin:0px; color:gold;background-image:url('home.jpg');background-size:cover	">
</body> 

 <?php  
	session_start();
   $user=$_SESSION['username'];
   
	 
 
if(isset($_SESSION['username']))
{	
     
	 if($_SESSION['username'] == 'admin')
	 {session_start();
	 header("Location: admin.php");
	 exit;
	 }
	 $conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
	 	if (!$conn) {
				die('Could not connect: ' . mysql_error());
			}
		 


			mysql_select_db('wadhostel',$conn);
			
			$query="select * from registration where username='".$user."'";
			
			$res=mysql_query($query,$conn); 
					
		include('header.php');  
 
			$data=mysql_fetch_row($res);
			 
	 

}	  


else
{	 
	header("Location: Login.php"); 
	exit;
}




	 
	 
	 
 ?>
 <centeR>
 <h1>
 <?php echo "welcome ".$_SESSION['username'];?>
 </h1>
 <br><Br>
 <li>Check Your Notices
 <li>Modify Your Detials
 <li>Do Complain about Any Stuff
 </center>
 
 
 
 
 
