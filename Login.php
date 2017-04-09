<?php

$userNameError="";
$passwordError="";
$error="";
if(isset($_POST['submit'])){
	
	if(!$_POST['username']){
 		$userNameError="*";
	} 
	if(!$_POST['password']){
 		$passwordError="*";
	}
	
	 
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	 
	 
	
	
		$conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
			if (!$conn) {
				die('Could not connect: ' . mysql_error());
			} 


			mysql_select_db('wadhostel',$conn);
			 
			  
			$query = "SELECT username,password FROM registration WHERE userName='".$user."'  and password='".$pass."'";
				
			
		$res = mysql_query($query,$conn);
		$count = mysql_num_rows($res);
		
		 	if($count==1)
		{ 	session_start();
			$_SESSION['username']=$user;
			header("Location: home.php");
			exit;
			
		}
		else
		{
			$error = "Login Failed";
		}
		
		
	
		
		
		mysql_close($conn);
	 			

}


 

 include('main_menu.html');





?>
<style>
input:hover{
	background-color:gold;
	
}
</style>
<body STYLE="BACKGROUND-image:url('login.jpg');background-size:cover">



<div>
<div style="position:absolute;left:500px;top:100px;font-size:70px;color:gold">Login Form</div>
<div style="background-color:cornsilk;position:absolute;left:550px;top:220px;opacity:0.7">

 <br><br>
<form method="post">
	<table>
		<tr>	
			<td>	<span style="color:DarkOrange;font-weight:bold;font-size:20px;;">UserName</span><input type="text" style="height:30px" name="username"/>
			</td>
			<td>	<?php echo $userNameError;?>
			</td>
			
			
		</tr>
		
		
		
		<tr>
		
		<td><span style="color:DarkOrange;font-weight:bold;font-size:20px;;">Password       </span><input type="password" style="height:30px" name="password"/>
			</td>
			
			
			<td>
				<?php echo $passwordError?>
			</td>
		</tr>
		
		
		
		
		<tr>	
			<td><br/>
				<center><input type="submit" value="LogIn" name="submit"/></center>
			</td>
		</tr>
	</table>
</form>
<center><?php  echo $error; ?></center>
</div>
</div>

</body>