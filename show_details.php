
<body style="color:white;background-image:url('admin.jpg');background-size:cover"> 
</body>  <?php 
  session_start();
  
  if(isset($_SESSION['username']))
{	
      
 }
  


else
{	 
	header("Location: home.php"); 
	exit;
}
 
	 
	 
	 include('admin_header.php');
	 
	 $conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
	 	if (!$conn) {
				die('Could not connect: ' . mysql_error());
			}
			  

			mysql_select_db('wadhostel',$conn);
			
			$query="select * from registration where 1";
			
			 $res=mysql_query($query,$conn);
			 echo "<center><h1>User Details</h1></center><br/>";
			echo "<center><table border=2><tr><th>Id</th><th>UserName</th><th>Password</th><th>FirstName</th><th>Gender</th><th>Address</th><th>Language</th><th>Country</th><th>EmailAddress</th><th>Plan</th> </tr>" ;
						
			while(	$data=mysql_fetch_row($res)){
			echo " <tr><td>".$data[0]."</td><td>".$data[1]."</td> <td>".$data[2]."</td> <td>".$data[3]."</td> <td>".$data[4]."</td> <td>".$data[5]."</td><td>".$data[6]."</td><td>".$data[7]."</td><td>".$data[8]."</td><td>".$data[9]."</td></tr>";
			 }
			 echo "</table></center>";
	 

		
	 
  
 
 ?>

 

