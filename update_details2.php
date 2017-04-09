 <body style="color:white;background-image:url('admin.jpg');background-size:cover"> 
</body>
<?php 
session_start();
include('admin_header.php');

$data=array('','','','','','','','','');
  
if(isset($_SESSION['username']))
{	
      
 }
   
else
{	 
	header("Location: home.php"); 
	exit;
}
	$conn = @mysql_connect('127.0.0.1:3306', 'root', 'root');
	
	if (!$conn) {
    die('Could not connect: ' . mysql_error());
}  'Connected successfully';

	mysql_select_db('wadhostel',$conn);	
	$i=$_SESSION['sid']; 
	
	$query1="SELECT `id`, `username`, `password`, `firstname`, `gender`, `address`, `language`, `country`, `emailaddress`, `plan` FROM `registration` WHERE id='".$i."'"; 
	$res=mysql_query($query1,$conn);
	
	 
	$data=mysql_fetch_row($res);
	 
	
	
	
	 

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
	//echo 'Connected successfully';

	mysql_select_db('wadhostel',$conn);	
	$i=$_SESSION['sid']; 
	
	$query1="SELECT `id`, `username`, `password`, `firstname`, `gender`, `address`, `language`, `country`, `emailaddress`, `plan` FROM `registration` WHERE id='".$i."'"; 
	$res=mysql_query($query1,$conn);
	 
	$data=mysql_fetch_row($res);
	 
	
	
	$query2="UPDATE `registration` SET `username`='".$user."',`password`='".$pass."',`firstname`='".$fname."',`gender`='".$gen."',`address`='".$add."',`language`='".$language."',`country`='".$country."',`emailaddress`='".$email."',`plan`='".$plan."' WHERE id='".$i."'";
	mysql_query($query2,$conn); 
	mysql_close($conn); 
	 
	 
	}
	
 
}
?>



<html>
	<head>
		<title>	Form
		</title>
	</head>
	 
	<body>
		<center > <h1>MODIFY YOUR DETAILS</h1></center><center>
		<form  method="POST"  autocomplete="off"   >	 
			<table>
				<tr> <td>UserName : </td><td><input type="text"   size="30%" name="username"  value="<?php echo $data[1];?>"   /><?php echo $userNameError;?></td> 
 </tr>
				<tr><td>PassWord : </td><td><input type="password" name="password" value="<?php echo $data[2];?>"     /><?php echo $passwordError;?> </td><td></td></tr>
				<tr><td>Gender : </td><td>Male<input type="radio" name="gender[]" value="male"/> FeMale<input type="radio" name="gender[]" /><?php echo $genderError;?></td><td></td></tr>
				<tr> <td>FirstName : </td><td><input type="text" name="name"  value="<?php echo $data[3];?>"  /><?php echo $fnameError;?></td><td></td></tr> 
				
				<tr> <td>Address : </td><td> <textArea rows="5" name="address"  cols="50"></textarea><?php echo $addressError;?></td><td></td></tr> 
				<tr> <td>Language : </td> <td>English<input type="checkbox"   value="english" name="language[]"/>hindi<input type="checkbox" name="language[]" value="hindi" />gujarati<input type="checkbox" value="gujarati" name="language[]"/><?php echo $languageError;?><td><td> </td></tr>
				<tr><td>Country : </td><td><select name="country[]"><option name="" value="india">India</option>
													<option value= "usa " name="country[]">USA</option>
													<option value="Canada" name="country[]" >Canada</option>
											</select><?php echo $countryError;?>
						</td>
						</tr>
				<tr> <td>Email Address </td><td> <input type="text"  name="email" value="<?php echo $data[8];?>"  "/><?php echo $emailError;?></td><td></td>
				
				<tr><td>Select Plan </td><td> <select name="plan[]" ><option value="monthly">Monthly</option>
													<option value="yearly">Yearly</option>
											
											</select><?php echo $planError; ?></td><td></td></tr>																								
				
				
				 
				
				<Tr><td colspan="3"><center><input type="submit" name="submit"  value="submit" /></center></td>
		
				 
			</table>   
			</form>
			</center>
	</body>
</html>