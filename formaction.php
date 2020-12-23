<?php
		include 'db.php';
	  	include 'product.php';
		$database= new Datab;
		$db = $database->connect();
		$add= new product($db);
//add category
		if(isset($_POST["add_cat"]))
	{
		$cat_name = $_POST['cat'];
		$query=$add->add_cat($cat_name);
		if($query  )
	 	  	{
	         	echo "<script>alert('category added successfully')</script>";
	         	echo "<script>window.open('category.php','_self')</script>";
	        }
        else
	        { 
	        	echo "failed";
	        }
	}

//update category
	if(isset(($_POST['update_cat'])))
	{	
		$Cat_id =$_POST['Id'];
		$Cat_name = $_POST['cat'];
		$query=$add->update_cat($Cat_id,$Cat_name);
		if($query  )
	 	  	{
	         	echo "<script>alert('category updated successfully')</script>";
	         	echo "<script>window.open('view_cat.php','_self')</script>";
	        }
        else
	        {
	        	echo "failed";
	        }
	}

//delete category
	if(isset(($_GET['del_cat'])))
	{	
		$Cat_id =$_GET['del_cat'];
		$query=$add->del_cat($Cat_id);
		if($query )
	 	  	
		{	
			header("location:view_cat.php");
			
		}
	else
		{
			echo "connection failed";
		}
	}

//view product by category
	

//addproduct
 		if (isset($_POST['add_p']))
     	 {
	      	$Name = $_POST['p_name'];
	      	$Disp = $_POST['p_dis'];
	      	$Price = $_POST['p_price'];
	      	$Cat =$_POST['product_cat'];
	      	$query=$add->insert($Name,$Disp,$Price,$Cat);
      	if($query )
 	  		{
         	
         		echo "<script>alert('Product added successfully')</script>";
	         	echo "<script>window.open('login.php','_self')</script>";
        	}
         else
         	{
         		echo "failed";
         	}
 		}



//update
	                                                                                                                                                                                             
	if (isset($_POST["update"]))
	{	 
		$Pro_sn=$_POST['Id'];
		$Pro_name=$_POST['p_name'];
		$Pro_dis=$_POST['p_dis'];
		$Pro_price=$_POST['p_price'];
		$Pro_cat =$_POST['product_cat'];
		$Query = $add->update($Pro_name,$Pro_dis,$Pro_price,$Pro_cat,$Pro_sn);
		if($Query  )
	 	  	{
	         	echo "<script>alert('Product updated successfully')</script>";
	         	echo "<script>window.open('list.php','_self')</script>";
	        }
        else
	        {
	        	echo "failed";
	        }
    }

//delete


if (isset($_GET['del_p']))
{
	$Pro_sn = $_GET['del_p'];
	$Query = $add->delet($Pro_sn);
	if($Query)
		{	
			header("location:list.php");
			
		}
	else
		{
			echo "connection failed";
		}
}

?>