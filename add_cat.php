<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="css/style.css">
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
					<li><a href ="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="cat">
			<form action="formaction.php" method="post">
				<table>
					<tr>
						<td>Category Name:</td>
						<td><input type="text" name="cat"></td>
					</tr>
					<tr>
						<td><input type="submit" name="add_cat" value="Add Category" class="btn"></td>
					</tr>
				</table>
			</form>
		</div>
</body>
</html>