<?php 
include "header.php";

$newFood = mysqli_real_escape_string($link, $_POST['foodItem']);
$cookID = mysqli_real_escape_string($link, $_POST['cookID']);
$cookID=intval($cookID);
// $response = file_get_contents('http://example.com/path/to/api/call?param1=5');
try{	
       
	$result=mysqli_query($link, "CALL cupboardInsert($cookID,'$newFood')") or die("Query fail: ".mysqli_error());
	echo "$newFood has been added to your cupboard";
	$newId = mysqli_query($link, "SELECT id FROM Cooks WHERE username = '$username'");
}
catch (mysqli_sql_exception $e) {
		echo 'Caught exception: ', $e->getMessage(), "\n";}

include "footer.php" ;
?>
<HTML>
<body>
<br>
<a href="http://sarahscupboard.com/login.php"> Back to your Cupboard</a>
</body>
</HTML>