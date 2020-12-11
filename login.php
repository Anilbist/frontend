
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<header id="header">
		<div class ="container">
			<h1>PRODUCTS</h1>
		</div>
	</header>
		<nav id= "bar">
			<div class ="container" >
				<ul>
					<li><a href ="login.php">Home</a></li>
					<li><a href ="addproduct.php">Add Product</a></li>
					<li><a href ="list.php">List</a></li>
					<li><a href ="logout.php">Logout</a></li>
				</ul>
			</div>
		</nav>
		<?php include 'db.php';
		include 'product.php';
		

session_start();
if(isset($_SESSION['username']))
{
	echo "welcome".' '.$_SESSION['username'];
}
else
{
	header('location:form.php');
	die();
}
$database= new Datab;
		$db = $database->connect();
		$add= new product($db);
		$query = $add->view();
      	while($row = $query->fetch(PDO::FETCH_OBJ)){ 
		?>
		<div class ="container" >
			<div class="image">
				<a target="_blank" href="<?php echo $row->pimage ?>">
				<img src="<?php echo $row->pimage ?>" width="600" height="400">
				</a>
			</div>
		</div>
		<?php
	}
?>
	
</body>
</html>