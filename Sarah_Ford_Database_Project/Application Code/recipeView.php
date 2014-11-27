<?php
include "header.php";
$recipe = mysqli_real_escape_string ( $link, $_POST ['recipeSelected'] );
try {
	if ($recipe == "") {
		$id = $_SESSION ["recipe_id"];
		$result = mysqli_query ( $link, "select * from allRecipes where recipe_id=$id" ) or die ( "Query fail: " . mysqli_error () );
	} else {
		$result = mysqli_query ( $link, "select * from allRecipes where recipe_name= '$recipe'" ) or die ( "Query fail: " . mysqli_error () );
	}
	$ingredients = array ();
	$units = array ();
	$quantities = array ();
	$instructions = array ();
	$name = array ();
	$id = array ();
	while ( $recipe = mysqli_fetch_array ( $result ) ) {
		array_push ( $id, $recipe [0] );
		array_push ( $name, $recipe [1] );
		array_push ( $ingredients, $recipe [2] );
		array_push ( $quantities, $recipe [3] );
		array_push ( $units, $recipe [4] );
		array_push ( $instructions, $recipe [5] );
	}
	$id = $id [0];
	$_SESSION ["recipe_id"] = $id;
	
	$name = $name [0];
	$instructions = $instructions [0];
} catch ( mysqli_sql_exception $e ) {
	echo 'Caught exception: ', $e->getMessage (), "\n";
}

include "footer.php";
?>

<html>

<h1><?php echo $name;?></h1>
<form action="editTitle.php" id="title" method="post">
	<textarea name="title" style="display: none" form="title"><?php echo $name;?></textarea>
	<input type="hidden" name="id" value=<?php echo $id;?> /> <input
		type="submit" value="Edit Title" />
</form>

<br>
<br>


<h3>Like this Recipe?</h3>
<form action="addToRecipeBook.php" method="post">
	<input type="submit" value="Add it to your Recipe Book" /> <input
		type="hidden" name="newRecipe" value=<?php echo $id;?> />
</form>






<body onload="ingredientList()">

	<form action="editIngredients.php" method="post">
		<div id="ingredientList"></div>
		<input type="submit" value="Edit Selected Ingredient" />
	</form>




	<script type="text/javascript">
function ingredientList(){
  	var food=  <?php echo '["' . implode('", "', $ingredients) . '"]' ?>;
  	var quantities = <?php echo '["' . implode('", "', $quantities) . '"]' ?>;
  	var units = <?php echo '["' . implode('", "', $units) . '"]' ?>;
  	var ingredientList = document.getElementById("ingredientList");
    		for (var i in food) {
    			var element = document.createElement("input");
    		  	element.setAttribute("type","radio");
	    		//ingredients+= food[i]+ "," +quantities[i]+","+ units[i]+ ";";
	    		element.setAttribute("name","ingredient");
	    		element.setAttribute("value",food[i]);//pass in the food and the recipe id will be in the session so that will allow you to update the specific ingeridient
	    		ingredientList.appendChild(element);
				ingredientList.innerHTML+= " "+food[i]+ " " +quantities[i]+" "+ units[i]+"<br />";
			
	}
  	
  	}
	 
	</SCRIPT>
	<br />
	<br />
	<h2>Instructions</h2>
	<form action="editInstructions.php" id="instructionsEdit" method="post">
		<textarea name="instructions" style="display: none"
			form="instructionsEdit"><?php echo $instructions;?></textarea>
		<input type="hidden" name="id" value=<?php echo $id;?> />
		<div id="instructionArea">
<?php echo $instructions;?>
<input type="submit" value="Edit instructions" />
		</div>
	</form>
	<a href="http://sarahscupboard.com/login.php"> Back to your kitchen</a>

</body>
</html>