<?php
include "header.php";

$username = mysqli_real_escape_string ( $link, $_POST ["userName"] );
$password = mysqli_real_escape_string ( $link, $_POST ["password"] );

try {
	// mysqli_query($link, "SELECT username FROM Cooks where username=$username" );
	$userId = mysqli_query ( $link, "SELECT Cooks.id FROM Cooks WHERE Cooks.username = '$username'" );
	
	echo $username;
	$row = mysqli_fetch_array ( $userId );
	echo $row [0];
	echo "here";
	// echo "Welcome back!"+ $userId;
	
	$cupboard = mysqli_query ( $link, "SELECT name FROM foodNames WHERE cook_id = $row[0]" );
	$cupboard = mysqli_fetch_array ( $cupboard );
} 

catch ( mysqli_sql_exception $e ) {
	
	echo ('Caught exception: ' + $e->getMessage ());
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=us-ascii">
<title>Welcome Back!</title>
</head>

<body onload="addFood()">
	<SCRIPT>
		function addFood() {//cupboard is an array of the items in the cupboard fetched by the sql
			var cupboard = <?php echo json_encode($cupboard);?>;
			for (i = 0; i <cupboard.length ; i++) {
				var food = document.getElementById("foodList");
				//console.log food;
				var element = document.createElement("input");
				console.log element;
				element.setAttribute("type","checkbox");
				food.innerHTML(length[i]);
				food.appendChild(element);
			}
	
		}
	  
	</SCRIPT>
	<table border="0" cellpadding="0" cellspacing="0" style="width: 100%">
		<tbody>
			<?php echo json_encode($cupboard);?>
			<tr>
				<td style="width: 50%">
					<h3>Cupboard</h3>
				</td>
				<td></td>
				<td style="width: 50%">
					<h3>Recipes</h3>

					<p>Check out some of these cool recipes</p>
				</td>
			</tr>
			<tr>
				<td>
					<p>The food currently in your cupboard</p>

					<p>Select any items you would like to delet</p>

					<p>To add more items, see below</p>

					<p>
						<HTML>



<span id="foodList"> </span>
<input name="deleteFood" type="button" value="Delete Selected" />
					
					</p>

					<p></p>

					<form action="addAnItem.php" name="addAnItem">
						New Purchase:&nbsp;<input name="foodItem" type="text" /><input
							name="addItem" type="button" value="Add to Cupboard" />
					</form>

					<p></p>
				</td>
				<td></td>
				<td>
					<ul>
						<li></li>
					</ul>
				</td>
			</tr>
		</tbody>
	</table>

</body>
</html>
<?php include "footer.php" ; ?>