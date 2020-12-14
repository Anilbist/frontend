<?php include 'db.php';
include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db);
    	$Pro_sn=$_GET['ID'];
      	$query =$add->edit($Pro_sn);
      	while($row = $query->fetch(PDO::FETCH_OBJ)){ 
      $query1=$db->prepare("SELECT * FROM image where pi_id=$Pro_sn ");
      $query1->execute();
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
      <h1>Product Management</h1>
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
	<div class="box">
            <?php
               while($row1 = $query1->fetch(PDO::FETCH_OBJ)){
            ?> 
        <div class="leftside">
             <img id="myImg" src="<?php echo $row1->pimage ?>">
             <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="img0">
            </div> 
        </div> 
            <?php 
              }
            ?>
          <div class="name">
      
                       <span><?php echo $row->pname ?></span>
                     <p> <?php echo $row->pdis?></p>
                </div>
                <div class="price">
                      <span><?php echo  $row->pprice?></span>
               </div>
         
          <?php 
             }
          ?> 
         
   
</div>
<script>

var modal = document.getElementById("myModal");
var img = document.getElementById("myImg");
var modalImg = document.getElementById("img0");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
</body>
</html>
