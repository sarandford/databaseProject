<?php
include "header.php" ;

$username = mysqli_real_escape_string($link, $_POST['newUserName']);

$password = mysqli_real_escape_string($link, $_POST['newPassword']);
try{
	mysqli_query($link, "INSERT INTO Cooks (username,password) VALUES ('$username', '$password')");
	echo "New user successfully created username = '$username'\n";
	$newId = mysqli_query($link, "SELECT id FROM Cooks WHERE username = '$username'");
	$row = mysqli_fetch_array($newId);
	$new = (int)$row['id'];
	//mysqli_query($link,"CALL newUser(1)");
}

catch (mysqli_sql_exception $e) {
		echo 'Caught exception: ', $e->getMessage(), "\n";}

include "footer.php" ;
?>