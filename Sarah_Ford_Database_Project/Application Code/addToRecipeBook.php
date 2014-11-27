<?php
include 'header.php';
$recipeID = $_SESSION["recipe_id"];
$recipeID = intval($recipeID);
$userID = $_SESSION["id"];
$userID = intval($userID);

$result=mysqli_query($link, "CALL recipeBookInsert($userID,$recipeID)") or die("Query fail: ".mysqli_error());
echo "recipe added to your book";

include 'footer.php'
?>
<HTML>
<br>
<a href="http://sarahscupboard.com/login.php">Back to your Kitchen</a>
</HTML>