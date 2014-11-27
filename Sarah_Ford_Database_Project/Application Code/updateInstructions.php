<?php
include 'header.php';
$instructions = mysqli_real_escape_string ( $link, $_POST ["instructions"] );
$id = $_SESSION["recipe_id"];
mysqli_query ( $link, "CALL updateInstructions($id,'$instructions')") or die ( "Query fail: " . mysqli_error ());
include 'footer.php';
?>
<html>
<a href="http://sarahscupboard.com/userRecipeView.php"> Back to the recipe</a>
</html>