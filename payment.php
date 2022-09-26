<?php
	require_once 'config.php';
	// require_once 'products.php';

	// $total = $_POST['total'];
	// print($total);

	if(isset($_POST['paymentSubmit'])){ // if the form was submitted
		$total = $_POST['payTotal'];

		if($total == ""){
			echo '<script type="text/javascript">'; 
			echo 'alert("Amount is empty");'; 
			echo 'window.location.href = "products.php";'; // redirect to the page you want
			echo '</script>';
		}
		else if($total == 0){
			echo '<script type="text/javascript">'; 
			echo 'alert("c2hvcnR1cmwuYXQvZ01SWTg=");'; // flag goes here
			echo 'window.location.href = "marketplace.php";'; // redirect to the page you want
			echo '</script>';
		}
		else{
			echo '<script type="text/javascript">'; 
			echo 'alert("Congratulations, you successfully purchased the items!");'; 
			echo 'window.location.href = "marketplace.php";'; // redirect to the page you want
			echo '</script>';
		}
	}	
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Payment</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,viewport-fit=cover">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<body>
	<!-- NavBar Start -->
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
	  	<div class="container">
	    	<a class="navbar-brand" href="#"><img src="images/logo2.png" width="100" height="30" alt=""></a>
	    </div>
  	</nav>
	  <!-- NavBar End -->

	<div class="products">
		<div class="container">
			</br>
			</br>
			<div class="col-md-6 offset-md-3">
				<div class="card">
				  <div class="card-body">
				    <h3><center>Make the payment!</h3></center>
					<!-- payment form -->
					<form name="paymentForm" onsubmit="return validateForm()" action= "" method="post">
					  <div class="form-group row">
					    <label for="payTotal" class="col-sm-2 col-form-label">Total ($)</label>
					    <div class="col-sm-10">
					      <input type="text" readonly class="form-control-plaintext" id="payTotal" style="font-size: 1.7rem !important" name="payTotal" value=<?php print $_POST['total']?>>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="card" class="col-sm-2 col-form-label">Card Number</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="Card" name="card" placeholder="Please enter your card no">
					    </div>
					  </div>
					  <center><button type="submit" name="paymentSubmit" class="btn btn-info mb-2">Confirm Payment</button></center>
					</form>
				  </div>
				</div>
				
			</div>
			</br>
			</br>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="js/all.min.js"></script>

	<!-- validation -->
	<script>
    	function validateForm(){
    		var card = document.forms["paymentForm"]["card"].value;

    		if(card == ""){
    			alert("Please enter your card details!");
    			return false;	
    		}
    		else{
    			return true;
    		}
    	}
    </script>

</body>
</html>