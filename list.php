<?php  	include 'db.php';
		include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db); 
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
	<title>List</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header id="header">
		<div class ="container">
	<h1>List of All Product </h1>
		</div>
	</header>
	
		<div class= "bar">
			<div class="container">
				<ul>
					<li><a href ="login.php">Home</a></li>
					<li><a href ="addproduct.php">Add Product</a></li>
					<li><a href ="list.php">List</a></li>
					<li><a href ="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		
	<aside style="width:10%; float:left;background-color: yellow; padding: 5px; height :300px;  position: fixed">
		<h2> Categories</h2>

		<?php
			$query=$add->view_cat();
			while($row= $query->fetch(PDO::FETCH_OBJ))
			{
				?>
				<a href="<?php echo $row->cat_name."<br>"; ?>"><?php echo $row->cat_name ."<br>"; ?>
				</a>
				<?php
			}
		?>
	</aside >

	<div id="t1">
		<table>
			<thead> 
				<t>
					<th>Name</th>
					<th>Discription</th>
					<th>Price</th>
					<th>product image</th>
					<th colspan="2">Operation</th>
				</t>
			</thead>

	<?php 
	// include 'db.php';
	// 	include 'product.php';
	// 	$database= new Datab;
	// 	$db = $database->connect();
	// 	$add= new product($db);
		$query = $add->view();
      	while($row = $query->fetch(PDO::FETCH_OBJ)){ 
      	 	
	?>
      	<tr>
			<td><?php echo $row->pname ?></td>
			<td><?php echo $row->pdis ?></td>
			<td><?php echo $row->pprice ?></td>
			<td><img src="<?php echo $row->pimage ?>"></td>
			<td><a href="edit.php?ID=<?php echo $row->sn; ?>" class ="btn">Edit</a>
			</td>
			<td><a href="formaction.php?del_p=<?php echo $row->sn; ?>" onclick= "return checkDelete()" class ="btn">Delete</a></td>
		</tr>
	
	<?php
  
 }

?>
<script>
	function checkDelete(){
		return confirm('do you want to delete this product');
	}
</script>
			
			
		</table>
	</div>


</body>
</html>