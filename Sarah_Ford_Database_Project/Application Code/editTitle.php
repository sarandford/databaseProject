<?php
include 'header.php';
$title = mysqli_real_escape_string ( $link, $_POST ['title'] );
$id = $_SESSION ["recipe_id"];
;
include 'footer.php';
?>
<HTML>
<h1>Edit Recipe Title</h1>
<body id="editTitle" onload="editTitle()">
	<form action="updateTitle.php" id="title" method="post">


		<script type="text/javascript">
function editTitle(){
  	var title= <?php echo json_encode($title); ?>;
  	var area = document.getElementById("editTitle");
  	var element = document.createElement("textarea");
  	element.setAttribute("name", "title");
  	element.setAttribute("form","title");
  	element.innerHTML = title;
  	area.appendChild(element);
  	
  	}
</script>
		<input type="submit" value="Submit Changes" />
	</form>
</body>
</HTML>
