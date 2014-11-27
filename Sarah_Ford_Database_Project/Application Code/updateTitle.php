<?php
include 'header.php';
$title = mysqli_real_escape_string ( $link, $_POST ['title'] );

$id = $_SESSION ["recipe_id"];
$id = intval ( $id );

mysqli_query ( $link, "CALL updateTitle($id,'$title')" ) or die ( "Query fail: " . mysqli_error () );

include 'footer.php';
?>
<html>
<form action="login.php" id="recipeReturn" method="post">
	<textarea name="recipeSelected" style="display: none"
		form="recipeReturn"><?php echo $title;?></textarea>
	<input type="submit" value="Back To Recipes" />
</form>
</html>