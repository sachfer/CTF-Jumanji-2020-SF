<?php
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bazaar</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">


</head>
<body>

		<?php include('navbar.php'); ?>

		<div class="products">
			<div class="container">
			</br>
		</br>
		<h3><center>Seems like you are looking for something!</h3></center>
	</br>
</br>
<div class="row">
	<div class="col-md-4">
		<div class="card" style="width:30rem;">
			<img src="images/bazaar4.jpg" class="card-img-top" alt="...">
			<div class="card text-center" style="width: 30rem;">
				<div class="card-body">
					<h5 class="card-title"><b>Bakery</b></h5>
					<p class="card-text">You might be craving for some delicious cakes..</p>
					<a href="products.php" href="#bakery" class="btn btn-lg btn-light" style="font-size: 18px">Check out</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card" style="width: 30rem;;">
			<img src="images/bazaar3.jpg" class="card-img-top" alt="...">
			<div class="card text-center" style="width:30rem;;">
				<div class="card-body" class="card text-center">
					<h5 class="card-title"><b>Weapons</b></h5>
					<p class="card-text">Add some of these to Finbar's weapon valet to fight with the villain..</p>
					<a href="products.php#weapons" class="btn btn-lg btn-light">Check out</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card" style="width: 30rem;;">
			<img src="images/bazaar5.jpg" class="card-img-top" alt="...">
			<div class="card text-center" style="width: 30rem;;">
				<div class="card-body">
					<h5 class="card-title"><b>Fruits</b></h5>
					<p class="card-text">Boost your health with some delicious fruits from Jumanji..</p>
					<a href="products.php#fruits" class="btn btn-lg btn-light">Check out</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/all.min.js"></script>
</body>

</html>