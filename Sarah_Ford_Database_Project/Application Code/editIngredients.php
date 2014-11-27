<?php
include 'header.php';
$foodName = mysqli_real_escape_string ( $link, $_POST ["ingredient"] );

$foodResult = mysqli_query ( $link, "SELECT id FROM Food WHERE name='$foodName'" ) or die("dead on food id");
$food_id = mysqli_fetch_array($foodResult);
$food_id = intval ( $food_id[0] );
$recipe_id = $_SESSION["recipe_id"];

$ingredientResult = mysqli_query ( $link, "SELECT * FROM Ingredients WHERE food_id=$food_id and recipe_id=$recipe_id" )or die("Dead on ingrdients select");
$ingredient = mysqli_fetch_array($ingredientResult);

$food = $ingredient[0];
$qty = $ingredient[1];
$unit = $ingredient[2];
include 'footer.php';
?>
<HTML>
<body>
	<form action="updateIngredient.php" method="post">

		<div id="editIngredients">
			<input type="text" name="food" value=<?php echo $foodName;?> /> <br> <input
				type="text" name="qty" value=<?php echo $qty?> /> <br> <input
				type="text" name="unit" value=<?php echo $unit?> /> <input
				type="hidden"  name= "recipe_id" value=<?php echo $id?> />
				<input type="hidden" name="oldFood" value=<?php echo $food_id;?>/>
				 <input type="submit"
				value="Submit Changes" />
	</div>
	</form>
</body>
</HTML>