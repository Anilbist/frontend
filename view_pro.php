
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
		<div class= "bar">
			<div class ="container" >
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
		
		<div class="wel">
		<?php 	
			
				if(isset($_GET['Catid'])){
					$Cat_id=$_GET['Catid'];
					// $query = $db->prepare("SELECT *FROM prod Where id =?");
					// $query->execute([$Cat_id]);
					$query=$add->viewpro_cat($Cat_id);
				while($row = $query->fetch(PDO::FETCH_OBJ)){ 
      				$Id=$row->sn;
      			$query1=$db->prepare("SELECT * FROM image where pi_id=? limit 0,1 ");
      	 		$query1->execute([$Id]);
      	 		while($row1 = $query1->fetch(PDO::FETCH_OBJ)){

      		
		?>
	</div>
		<div class ="container" >
			<div class="image">
				<a href="view.php?ID=<?php echo $row->sn; ?>">
				<img src="<?php echo $row1->pimage ?>">
				</a>
			<div class = "disc" > <?php echo $row->pname ?> </div>

			</div>
		</div>
		<?php
			}
			}
		}
		?>
	
</body>
</html>