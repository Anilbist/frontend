<?php	include 'db.php';
		include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db);
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
?>
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
	<!-- <header id="header">
		<div class ="container">
			<h1>PRODUCTS</h1>
		</div>
	</header> -->
		<div class= "bar">
			<div class ="container" >
				<ul>
					<li><a href ="login.php">Home</a></li>
					<li><a href ="addproduct.php">Add Product</a></li>
					<li><a href ="list.php">List</a></li>
					<li><a href ="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="sidebar">
			<header> Cateogries</header>
			<ul class="sidebar">
				<li>
			
				<a href="add_cat.php">Add Category</a>
				<a href="view_cat.php">view</a>
				

		</li>
			</ul>

		</div>
		
		<?php 	
				$query = $add->view();
		      	while($row = $query->fetch(PDO::FETCH_OBJ)){ 
		?>
	
		<div class ="container" >
			<div class="image">
				<a href="view.php?ID=<?php echo $row->sn; ?>">
				<img src="<?php echo $row->pimage ?>">
				</a>
			<div class = "disc" > <?php echo $row->pname ?> </div>

			</div>
		</div>
		<?php
			}
		?>
	
</body>
</html>