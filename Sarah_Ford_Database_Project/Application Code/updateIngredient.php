<?php
include 'header.php';
$food =  mysqli_real_escape_string ( $link, $_POST ["food"] );
$qty =  mysqli_real_escape_string ( $link, $_POST ["qty"] );
$unit =  mysqli_real_escape_string ( $link, $_POST ["unit"] );
$old_food_id =  mysqli_real_escape_string ( $link, $_POST ["oldFood"] );
$recipe_id = $_SESSION["recipe_id"];

$new_food_result = mysqli_query($link, "Select id from Food where name='$food'");
$new_food = mysqli_fetch_array($new_food_result);
$new_food_id = intval($new_food[0]);
echo $new_food_id;
if($new_food_id==0){
	mysqli_query($link, "INSERT INTO Food (name) VALUES ('$food')") or die("failed to insert");
	$new_food_result = mysqli_query($link, "Select id from Food where name='$food'");
	$new_food = mysqli_fetch_array($new_food_result);
	$new_food_id = intval($new_food[0]);
	echo $new_food_id;
	
}
 
$old_food_id = intval($old_food_id);
$qty = floatval($qty);

$recipe_id = intval($recipe_id);
mysqli_query($link, "CALL updateIngredients($recipe_id,$old_food_id,$new_food_id,$qty,'$unit')") or die(error_get_last());
include 'footer.php';
?>
<HTML>
<br>
<br>
<a href="http://sarahscupboard.com/recipeView.php"> Back to this recipe</a>
</HTML>
