<body style="margin:0px; color:gold;background-image:url('admin.jpg');background-size:cover">



</body> 

<?php 

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
//			echo 'Connected successfully';


			mysql_select_db('wadhostel',$conn);
			
			$query= "SELECT `id`, `Title`, `notice` FROM `notices` WHERE 1";
			$res=mysql_query($query,$conn);
		 
			echo "<br><br><br><center style='font-size:30px'> Avaliable  Notices</center><br><br><br>";

		 
			 while ($data=mysql_fetch_row($res))
			{	  
				echo "<center style='font-size:30px;color:WHITE'>Title:".$data[1]."</center> <br><center>".$data[2]."</center>";
				echo "<center>  .............................................................................................................  </center>";
			 } 
?>

