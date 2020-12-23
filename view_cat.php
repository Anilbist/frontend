<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>caregories</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header id="header">
		<div class ="container">
	<h1>List of Categories </h1>
		</div>
	</header>
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
		<div id="t1">
		<table border  =1>
			<thead>
			<tr>
				<th>Category</th>
				<th colspan="2">operation</th>
			</tr>
			<?php 	include 'db.php';
					include 'product.php';
					$database = new Datab;
					$db = $database->connect();
					$view = new product($db);
					$query=$view->view_cat();
					while($row= $query->fetch(PDO::FETCH_OBJ)){
			?>
			<tr>
				<td><?php echo $row->cat_name ?></td>
				<td><a href="edit_cat.php?ID=<?php echo $row->cat_id ?>" class ="btn">Edit</a></td>
				<td><a href="formaction.php?del_cat=<?php echo $row->cat_id ?>"onclick= "return checkDelete()" class ="btn">Delete</a></td>
			</tr>
			<?php 
				}
			 ?>
			 </thead>
		</table>
	</div>
		<script>
			function checkDelete()
			{
				return confirm('do you want to delete this product');
			}
		</script>
</body>
</html>			