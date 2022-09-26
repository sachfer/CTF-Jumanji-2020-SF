<?php
	/* PHP code to connect with the database, formulate the query and execute it on the db */
	$prodCode = $_GET["id"]; //Get the productCode from the URL

	$con = mysqli_connect("localhost", "root", "", "test");

	$query = "select * from `products` where productCode='$prodCode'"; // sdd the variable right into the query without using prepared statements
	
	$result = mysqli_query($con, $query);
	
	if($result !=FALSE) //If some result is returned
	{
		// do what you need
	}
	else
		echo mysqli_error(); //print the error in case of error
	
?>