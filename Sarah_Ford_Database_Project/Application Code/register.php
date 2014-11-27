<?php
include "header.php" ;

$username = mysqli_real_escape_string($link, $_POST['newUserName']);

$password = mysqli_real_escape_string($link, $_POST['newPassword']);
try{
	$valid = false;
	mysqli_query($link, "INSERT INTO Cooks (username,password) VALUES ('$username', '$password')")or die("username or password is already taken. Please try again");
	echo "New user successfully created username = '$username'\n Please use your browser's back button and login to view your cupboard";
	$valid = true;
	$newId = mysqli_query($link, "SELECT id FROM Cooks WHERE username = '$username'") or die("dead query");
	$row = mysqli_fetch_array($newId);
	$new = (int)$row['id'];}

catch (mysqli_sql_exception $e) {
		echo 'Caught exception: ', $e->getMessage(), "\n";}

include "footer.php" ;
?>