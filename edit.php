<?php include 'db.php';
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
  <div class ="container">
	<form action="formaction.php" method = "post" enctype="multipart/form-data">
    <table>
      <input type="hidden" name="Id" value="<?php echo $row->sn ?>">
          <tr>
           <td><b>Product Name:</b></td>
                <td>
                       <input type="text" name="p_name" value="<?php echo $row->pname ?>">

                </td>
          </tr>
    	    <tr>
                <td><b>Product Discription:</b></td>
                <td>
                      <textarea  name="p_dis" rows="10" cols="46"><?php echo $row->pdis ?></textarea></td>
                </td>
          </tr>
    	    <tr>
                <td><b>Product Price:</b></td>
                <td>
                      <input type="text" name="p_price" value="<?php echo $row->pprice?>">
                </td>
          </tr>
          <tr>
        <td>Product Category:</td>
        <td><select name="product_cat">
                
                       <option>categories</option>
        
        <?php
            $query=$add->view_cat();
            while($row= $query->fetch(PDO::FETCH_OBJ)){
        ?>
        <option value="<?php echo $row->cat_id?>"><?php echo $row->cat_name ?></option>
                       <?php }
      ?>
      </select></td>
      </tr>
          <tr>
                <td><b>Product Image:</b> </td>
                     <?php
                       while($row1 = $query1->fetch(PDO::FETCH_OBJ)){
                      ?> 
                <td><img src="<?php echo $row1->pimage ?>"></td>   
            <?php 
              }
            ?>
          </tr>
          <tr>
              <td>
                    <input type='file' name='p_image[]' class ="custom-file-input" multiple="" >
              </td>
          </tr>
          <tr>
  	           <td><input type="submit" name="update" value ="Update" class ="btn"></td>
          </tr>
          <?php 
             }
          ?>                 
      
    </table>
  </form>
</div>
</body>
</html>
