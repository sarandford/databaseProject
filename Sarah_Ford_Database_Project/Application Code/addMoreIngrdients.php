<?php
include 'header.php';
$id= $_SESSION["recipe_id"];
include 'footer.php'
?>
<HTML>
<h2>Now Add the Ingredients</h2>
<form action="addIngredients.php" method="post">
<ul id="ingredientList">
<li>
<input type="text" value="ingredient name" name = "food" id="food"/> 
<input type="text" value="qty" name="qty" id="qty"/>
<input type="text" value="units" name="units" id="units"/>
<input type="hidden" name="id" value=<?php echo $id;?>  />
</li>
</ul>
<input type="submit" value ="add another ingredient"/>

</form>
</HTML>