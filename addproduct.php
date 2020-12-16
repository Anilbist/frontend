<?php 
session_start();
if(!isset($_SESSION['username']))

{
	header('location:form.php');
	die();
}
?>
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
      <h1>Add Product</h1>
    </div>
  </header>
    <nav id= "bar">
      <div class="container">
        <ul>
         <li><a href ="login.php">Home</a></li>
		<li><a href ="addproduct.php">Add Product</a></li>
		<li><a href ="list.php">List</a></li>
		<li><a href ="logout.php">Logout</a></li>
        </ul>
      </div>
    </nav>
	<div class = "productf">
	<form action="formaction.php" method = "post" enctype="multipart/form-data">
		<table>
			
			<tr>
				<td>Product Name:</td>
				<td> <input type="text" name="p_name"></td>
			</tr>
			<tr>
				<td>Product Discription:</td>
				<td><input type="text" name="p_dis"></td>
			</tr>
			<tr>
				<td>Product Price:</td>
				<td> <input type="text" name="p_price"></td>
			</tr>
			<tr>
				<td>Product Image:</td>
				
					<td> <input type='file' name='p_image[]' multiple/>	</td>
			
			</tr>
			<tr>
				<td><input type="submit" name="add_p" value ="Add Product" class="btn"></td>
			</tr>
		
		</table>
	</form>
</div>
</body>
</html>