<?php include'db.php';
	  include 'product.php';
session_start();
$database= new Datab;
$db = $database->connect();
$add= new product($db);
if(isset($_POST["submit"]))
{
	$Username = $_POST['username'];
	$Password = $_POST['password'];
	$query =$add->user($Username,$Password);
	$count=$query->rowCount();
	
	if($count==1)
	
	{
		
		$_SESSION['username']= $Username;
		header("location:login.php");
	}
	else
	{
		echo "wrong username or password";
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="login ">
		<h1> Admin Login </h1>
	<form action= "form.php" method="post">
		<div>
		<input type="text" name = "username" placeholder="Username" required>
		</div>
		<div>
		<input type="password" name = "password" placeholder="Password" required>
		</div>
		<input type="submit" name ="submit" value ="Login" class="btn">
	</form>	
	</div>
</body>
</html>

