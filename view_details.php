 <body style="margin:0px;color:gold;background-image:url('home.jpg');background-size:cover;">
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
			echo "<br><br><br><center><h1>Details Of User : ".$data[0]. "</h1></center><center><table>";
			echo "  <tr><td> ID </td><td>".$data[0]."</td></tr> <tr><td>UserName</td><td>".$data[1]."</td></tr><tr> <td>Password</td><td>".$data[2]."</td> </tr><tr><td>First Name</td><td>".$data[3]."</td></tr><tr><td>Gender</td> <td>".$data[4]."</td> </tr><tr><td>Address</td><td>".$data[5]."</td></tr><tr><td>Language</td><td>".$data[6]."</td></tr><tr><td>Country</td><td>".$data[7]."</td></tr><tr><td>Email Address</td><td>".$data[8]."</td></tr><tr><td>Plan</td><tD>".$data[9]."</td></tr>";
			echo "</table></center>";
	 

}	  


else
{	 
	header("Location: Login.php"); 
	exit;
}




	 
	 
	 
 ?>
 
 
