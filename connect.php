<?php 
$server_name = 'localhost';
$server_user = 'root';
$server_password = '';
$connect = mysqli_connect($server_name, $server_user, $server_password);

if ($connect) {
	echo "Connection successful";
} else{
	die(mysqli_connect_error());
}

$sql = "CREATE DATABASE cardealership";
$result = mysqli_query($connect, $sql);
if ($result) { 
	echo "<br>Database created successfully";
} else {
	
	die(mysqli_error($connect));
}


?>
