<?php 
class product{

		public function __construct($db)
		{
    		$this->conn=$db;
		}

		public  function user($Username,$Password)
		{
			$query=$this->conn->prepare("SELECT * FROM user WHERE username=? AND password=?");
			$query->execute([$Username,$Password]);
			return $query;
		}

		public function insert($Name,$Disp,$Price,$Cat)
		{
			$add_product = $this->conn->prepare("INSERT INTO prod(pname,pdis,pprice,id) values(?,?,?,?)");
	        $add_product->execute([$Name,$Disp,$Price,$Cat]);
	        $last_id = $this->conn->lastInsertId();
			for($i=0; $i< count($_FILES['p_image']['name']); $i++)
			{
				$this->image($last_id,$i);
				$this->cat($last_id);
      		}
	      	return $add_product;
		}


		public function image($last_id,$i)
		{	
				$v1=rand(1,99999);
		     	$v2=md5($v1);
		     	$fna = $_FILES['p_image']['name'][$i];
		     	$dst="producti/".$v2.$fna;
		     	move_uploaded_file($_FILES['p_image']['tmp_name'][$i],$dst);
		     	$query1 = $this->conn->prepare("INSERT INTO image(pi_id,pimage) values(?,?) ");
		      	$query1->execute([$last_id,$dst]);
	      		return $query1;
		}

		public function cat($last_id)
		{
			$query1 = $this->conn->prepare("INSERT INTO cat_detail(pro_id) values(?) ");
		      	$query1->execute([$last_id]);
		}

 		public function view()
		{
			$query = $this->conn->prepare("SELECT * FROM prod 
			INNER JOIN image ON prod.sn=image.pi_id GROUP BY pi_id ");
      		$query->execute();
      		return $query;
		}

 		public function edit($Pro_sn)
		{
			$query = $this->conn->prepare("SELECT * FROM prod WHERE sn=?");
	      	$query->execute([$Pro_sn]);
	      	return $query;
		}

		public function update($Pro_name,$Pro_dis,$Pro_price,$Pro_cat,$Pro_sn)
		{
			$query= $this->conn->prepare("UPDATE prod SET pname =?,pdis = ?,pprice=?,id=? WHERE sn =?");
			$query->execute([$Pro_name,$Pro_dis,$Pro_price,$Pro_cat,$Pro_sn]);
			
			for($i=0; $i< count($_FILES['p_image']['name']); $i++)
			{
				$this->image($Pro_sn,$i);
      		}
			return $query;
		}

 

		public function remove($Pro_sn)
		{
			$query =$this->conn->prepare("SELECT * FROM image where pi_id =?");
    		$query->execute([$Pro_sn]);
		}



		public   function delet($Pro_sn)
		{	
			$query =$this->conn->prepare("SELECT * FROM image where pi_id =?");
   			$query->execute([$Pro_sn]);
		    while($row = $query->fetch(PDO::FETCH_OBJ)){
		    unlink($row->pimage);}
			$Query = $this->conn->prepare("DELETE FROM prod WHERE sn=?");
			$Query->execute([$Pro_sn]);
			return $Query;
		}
		public function add_cat($cat_name)
		{
			$add_cat = $this->conn->prepare("INSERT INTO category(cat_name) values(?) ");
	        $add_cat->execute([$cat_name]);
	        return $add_cat;	
		}

		public function view_cat()
		{
			$query=$this->conn->prepare("SELECT * FROM category");
			$query->execute();
			return $query;
		}

		public function edit_cat($Cat_id)
		{
			$query=$this->conn->prepare("SELECT * FROM category WHERE cat_id=?");
			$query->execute([$Cat_id]);
			return $query;
		}

		public function update_cat($Cat_id,$Cat_name)
		{
			$query=$this->conn->prepare("UPDATE category SET cat_name=? WHERE cat_id='$Cat_id'");
			$query->execute([$Cat_name]);
			return $query;
		}


		public function del_cat($Cat_id)
		{
			$query = $this->conn->prepare("DELETE From category WHERE cat_id=?");
			$query->execute([$Cat_id]);
			return $query;
		}

		public function viewpro_cat($Cat_id)
		{
			$query = $this->conn->prepare("SELECT * FROM prod where id=?");
      		$query->execute([$Cat_id]);
      		
      		return $query;
		}
}
?>