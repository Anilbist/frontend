<?php 
		include 'db.php';
		include 'product.php';
		$database =new Datab();
		$db = $database->connect();
		$edit=new product($db);
		if(isset($_GET['ID']))
		{
			$Cat_id =$_GET['ID'];
			$query =$edit->edit_cat($Cat_id);
	      	$query->execute();
	      	while($row = $query->fetch(PDO::FETCH_OBJ))
	      		{ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header id="header">
		<div class ="container">
			<h1>Add Category</h1>
		</div>
	</header>
		<div class= "bar">
			<div class ="container" >
				<ul>
					<li><a href ="login.php">Home</a></li>
					<li><a href ="addproduct.php">Add Product</a></li>
					<li><a href ="list.php">List</a></li>
					<li><a href ="category.php">Category</a>
						<!-- <div class="dropdown">
							<ul>
								<div class="dropdown-content">
								<li><a href ="">Add </li>
								<li><a href ="">gfdg </li>
								<li><a href ="">dgsd</li>
								</div>
							</ul>
						</div> -->
					</li>
					<li><a href ="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="cat">
			<form action="formaction.php" method="post">
				<table>
					<input type="hidden" name="Id" value="<?php echo $row->cat_id ?>">
					<tr>
						<td>Category Name:</td>
						<td><input type="text" name="cat" value="<?php echo $row->cat_name ?>"></td>
					</tr>
					<tr>
						<td><input type="submit" name="update_cat" value="Update" class="btn"></td>
					</tr>
				</table>
			</form>
	
		
		<?php
				}
			}
	?>
</body>
</html>