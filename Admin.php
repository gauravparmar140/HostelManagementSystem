<body style="background-image:url('admin.jpg');background-size:cover"> 
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

 include('admin_header.php') ;

?>
 
<style> 
a{
	 color:white;
	padding:10px;
	display:inline-block;
	text-decoration:none;
	border-style:solid;
	border-width:1px;
	border-color:white; 
	margin-top:20px;
	padding:10px;
}
a:hover{
	background-color:RED;
}

</style>
 
<body style="margin:0px">
 		
<br/>
<br/>
<center style="color:white;">


		<h1>Marwadi Education Foundation - Hostel</h1>
		<h3> Welcome To Admin-Panel </h3>
		 
		 Admin Can Perform Following Action
		 <ul>
			<li>Add New Student
			<li>Delete Student Details
			<li>Show All Details
			<li>Update Details
			<li>Add New Details
			<li>Delete Notice
		 </ul>
		
		
		
</center>

	</body>	
			
			
			
			
			
			
			 
		
		 
		
		
		 