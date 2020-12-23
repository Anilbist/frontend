
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
	
		<div class= "bar">
			<div class="container">
				<ul>
					<li><a href ="index.php">Home</a></li>
					<li><a href ="">Products</a></li>
					<li><a href ="">About Us</a></li>
					<li><a href ="form.php">Account</a></li>
				</ul>
			</div>
		</div>
		<div class="sidebar">
			<header> Cateogries</header>
			<ul class="sidebar">
				<li>
			<?php
			include 'db.php';
		include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db);				
			$query=$add->view_cat();
			while($row= $query->fetch(PDO::FETCH_OBJ))
			{
				?>
				<a href="view_pro.php?Catid=<?php echo $row->cat_id ; ?>"><?php echo $row->cat_name ."<br>"; ?>
				</a>
				<?php
			}
		?>
		</li>
			</ul>

		</div>
		<?php
		
		$query = $add->view();
      	while($row = $query->fetch(PDO::FETCH_OBJ)){ 

		?>
			<div class="container">	
			<div class="image">
				<input type="hidden" name="">
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