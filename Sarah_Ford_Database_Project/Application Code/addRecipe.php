<?php
include 'header.php';
$instructions= mysqli_real_escape_string ( $link, $_POST ["instructions"] );
$title= mysqli_real_escape_string ( $link, $_POST ["title"] );
mysqli_query ( $link, "CALL newRecipe('$title','$instructions')")or die("failed to insert new recipe");
$id=mysqli_query ( $link, "SELECT id from Recipe where name='$title'")or die("failed to find id");
$id=mysqli_fetch_array($id);
$id=$id[0];
$_SESSION["recipe_id"] = $id;

?>
<HTML>
<h2>Now Add the Ingredients</h2>
<form action="addIngredients.php" method="post">
<ul id="ingredientList">
<li>
<input type="text" value="ingredient name" name = "food" id="food"/> 
<input type="text" value="qty" name="qty" id="qty"/>
<input type="text" value="units" name="units" id="units"/>
<input type="hidden" value=<?php echo $id;?> name="id"/>
</li>
</ul>
<input type="submit" value ="add another ingredient"/>

</form>
</HTML>