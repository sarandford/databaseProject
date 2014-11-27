<?php
include 'header.php';
$food=mysqli_real_escape_string ( $link, $_POST ["food"] );
$qty=mysqli_real_escape_string ( $link, $_POST ["qty"] );
$unit=mysqli_real_escape_string ( $link, $_POST ["units"] );
$id =$_SESSION["recipe_id"];
$new_food_result = mysqli_query($link, "Select id from Food where name='$food'");
$new_food = mysqli_fetch_array($new_food_result);
$new_food_id = intval($new_food[0]);
if($new_food_id==0){
	mysqli_query($link, "INSERT INTO Food (name) VALUES ('$food')") or die("failed to insert");
	$new_food_result = mysqli_query($link, "Select id from Food where name='$food'");
	$new_food = mysqli_fetch_array($new_food_result);
	$new_food_id = intval($new_food[0]);
	echo $new_food_id;
}
$qty=floatval($qty);
$id = intval($id);
$result = mysqli_query ( $link, "CALL ingredientInsert($id,'$food',$qty,'$unit') ")or die("Query Fail on Ingredients");
echo "$food added";
include 'footer.php'
?>
<html>
<div>
<form action='addAnotherIngredient.php' method='post'>
<br>
<br>
<input type="hidden" name='id' value=<?php echo $id;?>/>
<input type="submit" value="Add another"/>
<a href="http://sarahscupboard.com/login.php"> Go back to your kitchen</a>
</form>
</div>
</html>