<body style="background-image:url('home.jpg');background-size:cover">
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

include('header.php'); 
  $userNameError="";
  $passwordError="";
  $genderError="";
  $fnameError="";
  $addressError="";
  $languageError="";
  $countryError="";
  $emailError="";
  $planError="";
	$ERROR=0;
  
if(isset($_POST['submit'])){
				
	if(!$_POST['username'])
	{$userNameError="*";$ERROR=1;}
  	
	if(!$_POST['password'])
			{$passwordError="*";$ERROR=1;}
  			
	if(!$_POST['gender'])
			{ $genderError="*";$ERROR=1;}
  
	if(!$_POST['name'])
			{ $fnameError="*";$ERROR=1;}
 	
	if(!$_POST['address'])
			{ $addressError="*";$ERROR=1;}
	 	
	if(!$_POST['language'])
			{ $languageError="*";$ERROR=1;}
    
	$email=$_POST['email'];
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
 	 $emailError=" * enter valid email";$ERROR=1;
	} 
	
	if(!$_POST['plan'])
			{ $planError="*";$ERROR=1;}
		 
	IF($ERROR== 0){	 
			$user=$_POST['username'];
			$pass=$_POST['password']; 
			$gen=implode(',',$_POST['gender']);
			$fname=$_POST['name'];
			$add=$_POST['address'];
			$language=implode(',',$_POST['language']);
			$country=implode(',',$_POST['country']);
			$email=$_POST['email'];
			$plan=implode(',',$_POST['plan']);	 
																			 
																			 
	$conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
	
	if (!$conn) {
    die('Could not connect: ' . mysql_error());
} 
	mysql_select_db('wadhostel',$conn);	
	$i=$_SESSION['username'];
	var_dump($i);
	 
	
	$query="UPDATE `registration` SET `username`='".$user."',`password`='".$pass."',`firstname`='".$fname."',`gender`='".$gen."',`address`='".$add."',`language`='".$language."',`country`='".$country."',`emailaddress`='".$email."',`plan`='".$plan."' WHERE username='".$i."'";
	
	var_dump(mysql_query($query,$conn));
	mysql_close($conn); 
	 
	 
	}
	
 
}
?>



<html>
	<head>
		<title>	Form
		</title>
	</head>
	<style>
		input{
			opacity:0.7;
		}
		body{
			color:gold;
		}
	</style>
	
	 
  <body>

		<center > <h1>MODIFY YOUR DETAILS</h1> 
		<form  method="POST"  autocomplete="off"   >	 
			<table>
				<tr> <td>UserName : </td><td><input type="text" placeholder="UserName"  size="30%" name="username"/><?php echo $userNameError;?></td> 
 </tr>
				<tr><td>PassWord : </td><td><input type="password" name="password" placeholder="password"/><?php echo $passwordError;?> </td><td></td></tr>
				<tr><td>Gender : </td><td>Male<input type="radio" name="gender[]" value="male"/> FeMale<input type="radio" name="gender[]" value="female"/><?php echo $genderError;?></td><td></td></tr>
				<tr> <td>FirstName : </td><td><input type="text" name="name"  value="readOnly"/><?php echo $fnameError;?></td><td></td></tr> 
				
				<tr> <td>Address : </td><td> <textArea rows="5" name="address" cols="30"></textarea><?php echo $addressError;?></td><td></td></tr> 
				<tr> <td>Language : </td> <td>English<input type="checkbox"   value="english" name="language[]"/>hindi<input type="checkbox" name="language[]" value="hindi" />gujarati<input type="checkbox" value="gujarati" name="language[]"/><?php echo $languageError;?><td><td> </td></tr>
				<tr><td>Country : </td><td><select name="country[]"><option name="" value="india">India</option>
													<option value= "usa " name="country[]">USA</option>
													<option value="Canada" name="country[]" >Canada</option>
											</select><?php echo $countryError;?>
						</td>
						</tr>
				<tr> <td>Email Address </td><td> <input type="text"  name="email" value="EmailAddress"/><?php echo $emailError;?></td><td></td>
				
				<tr><td>Select Plan </td><td> <select name="plan[]" ><option value="monthly">Monthly</option>
													<option value="yearly">Yearly</option>
											
											</select><?php echo $planError; ?></td><td></td></tr>																								
				
				
				 
				
				<Tr><td colspan="3"><center><input type="submit" name="submit"  value="submit" /></center></td>
		
				 
			</table>   
			</form>
			</center>
	</body>
</html>