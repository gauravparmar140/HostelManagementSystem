
<body style="background-image:url('home.jpg');background-size:cover; "> 
</body>
<?php

  include('header.php');

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
		 
	  $data=$_POST['notices'];
		if(strlen($data) == 3)
				echo "enter Complaint first";
		else
		{
			$not=$_POST['notices'];
			$titl=$_POST['title'];
		
			$conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
					if (!$conn) {
						die('Could not connect: ' . mysql_error());
					}
					//echo 'Connected successfully';


			mysql_select_db('wadhostel',$conn);
			$query="INSERT INTO `complain`( `Title`, `Description`) VALUES ('$titl','$not')";
			mysql_query($query,$conn);
			mysql_close();
			
		
		
		
		}
	  
}







?>


<style>
  input:hover{
	  background-color:gold;
  }
  textarea:hover{
	  background-color:gold;
	  opacity:0.6;
  }
</style>


<center>
<span style="color:gold">
<br><br> <h1>
Enter Your Complaint</span></h1>
<form method="post">
<br/>
<br/>
<br/>
<h2>Title
<input type="text" name="title"/></h2>
<br/>
<br/>




<h2> Content</h2>
 <textarea  name="notices" cols="50" rows="5" style="border:dotted 2px orange;">
 
</textarea>
 

<br/>
<input type="submit" value="submit" name="submit"/>
 </form> 
 
 </center>