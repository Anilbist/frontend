
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header id="header">
		<div class ="container">
			<h1>Product Management</h1>
		</div>
	</header>
	
		<nav id= "bar">
			<div class="container">
				<ul>
					<li><a href ="index.php">Home</a></li>
					<li><a href ="">Products</a></li>
					<li><a href ="">About Us</a></li>
					<li><a href ="form.php">Account</a></li>
				</ul>
			</div>
		</nav>
		<?php
		include 'db.php';
		include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db);
		$query = $add->view();
      	while($row = $query->fetch(PDO::FETCH_OBJ)){ 

		?>
			<div class="container">	
			<div class="image">
				<a href="view.php?ID=<?php echo $row->sn; ?>">
				<img src="<?php echo $row->pimage ?>">
				</a>
				<div class = "disc" alt="anil" > <?php echo $row->pname ?> </div>
			</div>
	</div>
<?php
}
?>
</body>
</html>