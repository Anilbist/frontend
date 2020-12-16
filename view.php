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
      $count=$query1->rowCount();
      $row1 = $query1->fetch(PDO::FETCH_OBJ);
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
         <li><a href ="index.php">Home</a></li>
          <li><a href ="">Products</a></li>
          <li><a href ="">About Us</a></li>
          <li><a href ="form.php">Account</a></li>
        </ul>
      </div>
    </nav>
        <div id="content-wrapper">
            <div class="column">
              <img id="featured" src="<?php echo $row1->pimage ?>">
              <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
              </div>
                <div id="slide-wrapper">
                    <a id="slideLeft"  class ="arrow" onclick="plusSlides(-1)">&#10094;</a>
                    <div id ="slider">
                     <img class="thumbnail active"  src="<?php echo $row1->pimage ?>">
                     <?php
                      for($i=2; $i<=$count;$i++)
                      {
                         $row1 = $query1->fetch(PDO::FETCH_OBJ);
                      ?> 
                      <img class="thumbnail" src="<?php echo $row1->pimage ?>">
                    <?php 
                       }
                    ?>
                    </div> 
                            <a id="slideRight"  class ="arrow" >&#10095;</a>
                </div>
                </div>
    <div class="column">
      <h2><?php echo $row->pname ?></h2>
      <p><?php echo $row->pdis ?></p>
      <h2> <?php echo "RS.". $row->pprice?></h2>
    </div>
    <?php 
       }
    ?>
  </div>      
    
<script>
  var modal = document.getElementById('myModal');
  var img = document.getElementById('featured');
  var modalImg = document.getElementById("img01");
  img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;}
  var span = document.getElementsByClassName("close")[0];
  span.onclick = function() 
  { 
    modal.style.display = "none";
  }
  var thumbnails = document.getElementsByClassName("thumbnail");
  var activeImg =document.getElementsByClassName('active');
    for(var i=0; i<thumbnails.length; i++)
    {
      thumbnails[i].addEventListener('click',function()
      {
        console.log(activeImg);
        if(activeImg.length>0)
        {
          activeImg[0].classList.remove('active');
        }
        this.classList.add('active');
        document.getElementById('featured').src = this.src
      });
    }
    var right =document.getElementById('slideLeft');
    var left =document.getElementById('slideRight');
    right.addEventListener('click',function(){
      document.getElementById('slider').scrollLeft += 180
    })
    left.addEventListener('click',function(){
      document.getElementById('slider').scrollLeft -= 180
    })
    
</script>
</body>
</html>
