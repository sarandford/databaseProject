<?php
include 'header.php';
$instructions = mysqli_real_escape_string ( $link, $_POST ['instructions'] );
$id = $_SESSION ["recipe_id"];
include 'footer.php';
?>
<HTML>
<h1>Edit Recipe Instructions</h1>

<body id="editInstructions" onload="editInstructions()">
	<form action="updateInstructions.php" id="updateInstructions"
		method="post">
		<input type="hidden" name="id" value=<?php echo $id;?> />
		<script type="text/javascript">
function editInstructions(){
  	var instructions= <?php echo json_encode($instructions); ?>;
  	var area = document.getElementById("editInstructions");
  	var element = document.createElement("textarea");
  	element.setAttribute("name", "instructions");
  	element.setAttribute("form","updateInstructions");
  	element.innerHTML= instructions;
  	area.appendChild(element);
  	
  	}
	
</script>
		<input type="submit" value="Submit Changes" />
	</form>
</body>

</HTML>


