<?php
$url='localhost:3306';
$username='root';
$password='';
$connect=mysqli_connect($url,$username,$password,"ctf");
// $result = mysqli_query($connect,"SELECT * FROM prdcts");

$row = $result->fetch_array(MYSQLI_NUM);

echo $row[0] . " " . $row[1];

$connect->close();
//check connection
 if(mysqli_connect_errno($connect))
 {
	echo 'Failed to connect to database: '.mysqli_connect_error();
}
else
	echo 'Connected Successfully!!';


?>