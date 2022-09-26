<?php
error_reporting(0);
//Setting session start
session_start();

$total=0;

//Database connection, replace with your connection string.. Used PDO
$conn = new PDO("mysql:host=localhost;dbname=ctf", 'root', '');		
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


//get action string
$action = isset($_GET['action'])?$_GET['action']:"";

//Add to cart
if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {
	
	//Finding the product by code
	$query = "SELECT * FROM products WHERE sku=:sku";
	$stmt = $conn->prepare($query);
	$stmt->bindParam('sku', $_POST['sku']);
	$stmt->execute();
	$product = $stmt->fetch();
	
	$currentQty = $_SESSION['products'][$_POST['sku']]['qty']+1; //Incrementing the product qty in cart
	$_SESSION['products'][$_POST['sku']] =array('qty'=>$currentQty,'name'=>$product['name'],'image'=>$product['image'],'price'=>$product['price']);
	$product='';
	header("Location:products.php");
}

//Empty All
if($action=='emptyall') {
	$_SESSION['products'] =array();
	header("Location:products.php");	
}

//Empty one by one
if($action=='empty') {
	$sku = $_GET['sku'];
	$products = $_SESSION['products'];
	unset($products[$sku]);
	$_SESSION['products']= $products;
	header("Location:products.php");	
}


 //Get all Bakery
$query = "SELECT * FROM products WHERE category_id = 1";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll();

 //Get all Weapons
$query = "SELECT * FROM products WHERE category_id = 2";
$stmt = $conn->prepare($query);
$stmt->execute();
$weapons = $stmt->fetchAll();

//Get all Fruits
$query = "SELECT * FROM products WHERE category_id = 3";
$stmt = $conn->prepare($query);
$stmt->execute();
$fruits = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bazaar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


</head>
<style>
	body {
		overflow: scroll; !important;
	}
	::-webkit-scrollbar {
		width: 0px;
		background: transparent; /* make scrollbar transparent */
	}
</style>
<?php include('navbar.php'); ?>

<body>	

	<div class="container">
		<?php if(!empty($_SESSION['products'])):?>
			<!-- <nav class="navbar navbar-inverse" style="background:#04B745;"> -->
				<h3><center>Cart</h3></center>
				<div class="container-fluid pull-left" style="width:300px;">
					<div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Shopping Cart</a> </div>
				</div>
				<div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="products.php?action=emptyall" class="btn btn-info">Empty cart</a></div>

				<!-- </nav> -->
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Image</th>
							<th>Name</th>
							<th>Price ($)</th>
							<th>Qty</th>
							<th>Actions</th>
						</tr>
					</thead>
					<?php foreach($_SESSION['products'] as $key=>$product):?>
						<tr>
							<td><img src="<?php print $product['image']?>" width="50"></td>
							<td><?php print $product['name']?></td>
							<td><?php print $product['price']?></td>
							<td><?php print $product['qty']?></td>
							<td><a href="products.php?action=empty&sku=<?php print $key?>" class="btn btn-info">Delete</a></td>
						</tr>
						<?php $total = $total+$product['qty']*$product['price'];?>
					<?php endforeach;?>
					<!-- <tr><td colspan="5" align="right"><h4 id="Total">Total:$<?php print $total?></h4></td></tr> -->
					<tr>
						<td colspan="5" align="right">
							<form class="form-inline" name="productForm" onsubmit="return validateForm()" action="payment.php" method="POST">
								<div class="form-group mb-2" style="margin-left: 540px">
									<input type="text" readonly class="form-control-plaintext" id="staticTotal" style="font-size: 2.2rem !important" name="total" value=<?php print $total?>>
								</div>
								<div style="margin-left: 33px">
									<button type="submit" class="btn btn-outline-success mb-2" style="font-size: 2rem">Purchase</button>
								</div>
							</form>
						</td>
					</tr>
				</table>
				<center>
					<!-- <button type="button" name="submit" id="Submit" class="btn btn-info">Purchase</button> -->

				<!-- <form class="form-inline">
				  	<div class="form-group mb-2">
				    	<label for="staticTotal" class="sr-only">Total</label>
				    	<input type="text" readonly class="form-control-plaintext" id="staticTotal" value="">
			  		</div>
				  	<button type="submit" class="btn btn-info mb-2">Purchase</button>
				</form>
			-->
		</center>
	<?php endif;?>





	<center><h2 id="bakery" style="padding: 20px; margin-top: 30px">Bakery</h2></center>
</br>
<div class="row">
	<div class="container">
		<?php foreach($products as $product):?>
			<div class="col-md-4">
				<div class="thumbnail"> <img src="<?php print $product['image']?>" alt="Lights">
					<div class="caption">
						<p style="text-align:center;"><?php print $product['name']?></p>
						<p style="text-align:center;color:#04B745;"><b>$<?php print $product['price']?></b></p>
						<form method="post" action="products.php?action=addcart">
							<p style="text-align:center;color:#04B745;">
								<button type="submit" class="btn btn-warning">Add To Cart</button>
								<input type="hidden" name="sku" value="<?php print $product['sku']?>">
							</p>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</div>

<center><h2 id="weapons" style="padding: 20px; margin-top: 30px">Weapons</h2></center>
</br>
<div class="row">
	<div class="container">
		<?php foreach($weapons as $weapons):?>
			<div class="col-md-4">
				<div class="thumbnail"> <img src="<?php print $weapons['image']?>" alt="Lights">
					<div class="caption">
						<p style="text-align:center;"><?php print $weapons['name']?></p>
						<p style="text-align:center;color:#04B745;"><b>$<?php print $weapons['price']?></b></p>
						<form method="post" action="products.php?action=addcart">
							<p style="text-align:center;color:#04B745;">
								<button type="submit" class="btn btn-warning">Add To Cart</button>
								<input type="hidden" name="sku" value="<?php print $weapons['sku']?>">
							</p>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</div>

<center><h2 id="fruits" style="padding: 20px; margin-top: 30px" >Fruits</h2></center>
</br>
<div class="row">
	<div class="container">
		<?php foreach($fruits as $fruits):?>
			<div class="col-md-4">
				<div class="thumbnail"> <img src="<?php print $fruits['image']?>" alt="Lights">
					<div class="caption">
						<p style="text-align:center;"><?php print $fruits['name']?></p>
						<p style="text-align:center;color:#04B745;"><b>$<?php print $fruits['price']?></b></p>
						<form method="post" action="products.php?action=addcart">
							<p style="text-align:center;color:#04B745;">
								<button type="submit" class="btn btn-warning">Add To Cart</button>
								<input type="hidden" name="sku" value="<?php print $fruits['sku']?>">
							</p>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach;?>
	</div>
</div>
</div>
<!-- validation -->
<script>
	function validateForm(){
		var total = document.forms["productForm"]["total"].value;

		if(total == "" || total == 0){
			alert("Your cart is empty!");
			return false;	
		}
		else{
			return true;
		}
	}
</script>

</body>
</html>