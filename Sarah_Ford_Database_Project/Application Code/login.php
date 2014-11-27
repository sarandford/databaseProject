<?php
include "header.php";

$username = mysqli_real_escape_string ( $link, $_POST ["userName"] );
$password = mysqli_real_escape_string ( $link, $_POST ["password"] );

try {
	$userId = mysqli_query ( $link, "SELECT Cooks.id FROM Cooks WHERE Cooks.username = '$username' and Cooks.password='$password'" ) or die ( "invalid username/password. Please use your browser's back button and try again" );
	
	$row = mysqli_fetch_array ( $userId );
	if ($row == null) {
		exit ( "invalid username and password. Please use your browser's back button and try again" );
	}
	$cookID = $row [0];
	if ($cookID == 0 || $username == "") {
		$cookID = $_SESSION ["id"];
		$username = $_SESSION ["username"];
	} else {
		$_SESSION ["username"] = $username;
		$_SESSION ["id"] = $cookID;
	}
	$userRecipes = mysqli_query ( $link, "SELECT recipe_name FROM cooksRecipeNames WHERE cook_id= $cookID" );
	$result = mysqli_query ( $link, "SELECT name FROM foodNames WHERE cook_id = $cookID" );
	$recipeResult = mysqli_query ( $link, "SELECT name FROM Recipe" );
	$totalResult = mysqli_query ( $link, "SELECT totalItems($cookID)" ) or die("dead");
	$total = mysqli_fetch_array($totalResult);
	$total = $total[0];
	$recipes = array (
			" " 
	);
	$cupboard = array (
			" " 
	);
	$recipeBook = array (
			"" 
	);
	
	while ( $food = mysqli_fetch_array ( $result ) ) {
		
		array_push ( $cupboard, $food [0] );
	}
	while ( $recipe = mysqli_fetch_array ( $recipeResult ) ) {
		
		array_push ( $recipes, $recipe [0] );
	}
	while ( $recipe = mysqli_fetch_array ( $userRecipes ) ) {
		array_push ( $recipeBook, $recipe [0] );
	}
} 

catch ( mysqli_sql_exception $e ) {
	
	echo ('Caught exception: ' + $e->getMessage ());
}
$cupboard . trim ( " " );
$recipes . trim ( " " );

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
<h1>Welcome Back!</h1>
</head>

<body style="margin: 10"
	onload="addFood();getRecipes();getUserRecipes()">
	<SCRIPT type="text/javascript">
	function addFood() {
    		var cupboard =  <?php echo '["' . implode('", "', $cupboard) . '"]' ?>;
    		console.log(cupboard);
    		for (var item in cupboard) {
        		if(cupboard[item] ==""|| cupboard[item]==" ") {continue};
        	var food = document.getElementById("foodList");
        	console.log(food);
		var element = document.createElement("input");
		element.setAttribute("type","radio");
		element.setAttribute("value", cupboard[item]);
		element.setAttribute("name","foodSelected");
		food.appendChild(element);
		food.innerHTML+= cupboard[item]+"<br />";
	}
    }
  	function getRecipes(){
  	var recipes=  <?php echo '["' . implode('", "', $recipes) . '"]' ?>;
    		console.log(recipes);
    		for (var r in recipes) {
    			if(recipes[r] ==""|| recipes[r]==" ") {continue};
        	var rList = document.getElementById("recipeList");
		
       	 	var element = document.createElement("input");
		element.setAttribute("type","radio");
		element.setAttribute("name","recipeSelected");
		element.setAttribute("value", recipes[r]);
		rList.appendChild(element);
		rList.innerHTML+= recipes[r]+" <br />";
	}
  	}
    		function getUserRecipes(){
    		  	var recipes=  <?php echo '["' . implode('", "', $recipeBook) . '"]' ?>;
    		    		console.log(recipes);
    		    		for (var r in recipes) {
    		    			if(recipes[r] ==""|| recipes[r]==" ") {continue};
    		        	var rList = document.getElementById("userRecipeList");
    				
    		       	 	var element = document.createElement("input");
    				element.setAttribute("type","radio");
    				element.setAttribute("name","recipeSelected");
    				element.setAttribute("value", recipes[r]);
    				rList.appendChild(element);
    				rList.innerHTML+= recipes[r]+" <br />";
    			}
    		}
	  
	</SCRIPT>
	<div>
		<div class="cupboard">
			<h3>Cupboard</h3>
			<p>The food currently in your cupboard</p>
			<p>Select any items you would like to delete</p>
			<p>To add more items, see below</p>
			<p>Total items: <?php echo $total;?></p>
			<form action="removeFromCupboard.php" method="post">
				<input name="cookID" type="hidden" value=<?php echo $cookID;?> /> <input
					name="deleteFood" type="submit" value="Delete Selected" /><br />
				<ul id="foodList">
				</ul>
			</form>
			<p></p>
			<form action="addToCupboard.php" name="addAnItem" method="post">
				New Purchase:&nbsp;<input name="foodItem" type="text" /> <input
					name="cookID" type="hidden" value=<?php echo $cookID;?> /> <input
					name="addItem" type="submit" value="Add to Cupboard" />

			</form>
		</div>
		<div>
			<h3>Recipes</h3>
			<p>Check out some of these cool recipes</p>
			<a href="http://sarahscupboard.com/addRecipeTemplate.html"> Or add
				your own</a>
			<form action="recipeView.php" method="post">
				<div id="recipeList">
					<input name="viewRecipe" type="submit" value="View Selected" /> <br />
				</div>
			</form>

		</div>
		<div>
			<h3>Your Saved Recipes</h3>
			<form action="userRecipeView.php" method="post">
				<div id="userRecipeList">
					<input name="viewUserRecipe" type="submit" value="View Selected" />
					<br>
				</div>
			</form>

		</div>
	</div>
<a href="http://sarahscupboard.com/popularFoodReport.php"> Want to know more? Click here for a report</a>
</body>
</html>
<?php include "footer.php" ; ?>