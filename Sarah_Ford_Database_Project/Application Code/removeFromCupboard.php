<?php
include "header.php";

$badFood = mysqli_real_escape_string ( $link, $_POST ['foodSelected'] );
$cookID = mysqli_real_escape_string ( $link, $_POST ['cookID'] );
$cookID = intval ( $cookID );
try {
	echo $badFood;
	$result = mysqli_query ( $link, "CALL cupboardDelete($cookID,'$badFood')" ) or die ( "Query fail: " . mysqli_error () );
	echo "$newFood has been removed from your cupboard";
} catch ( mysqli_sql_exception $e ) {
	echo 'Caught exception: ', $e->getMessage (), "\n";
}

include "footer.php";
?>
<html>
<br>
<a href="http://sarahscupboard.com/login.php"> Go back to your kitchen</a>
</html>