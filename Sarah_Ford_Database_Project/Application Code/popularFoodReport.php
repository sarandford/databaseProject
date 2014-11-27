<?php
include 'header.php';
$result = mysqli_query ( $link, "SELECT * FROM popularFood" ) or die ( "Information not currently avaliable" );
$foodName = array();
$count =array();
while($result_array = mysqli_fetch_array($result)){
	array_push($foodName, $result_array[0]);
	array_push($count, $result_array[1]);
}
include 'footer.php';	
?>
<h1>Most Popular Foods according to other user data</h1>
<body onload="getInfo()">
<SCRIPT type="text/javascript">
function getInfo() {
		var food =  <?php echo '["' . implode('", "', $foodName) . '"]' ?>;
		var count = <?php echo '["' . implode('", "', $count) . '"]' ?>;
		for (item=0; item<food.length; item++) {
    		if(food[item] ==""|| food[item]==" "||count[item] ==""|| count[item]==" ") {continue};
    	var table = document.getElementById("popularFood");
	var row = document.createElement("tr");
	var foodColumn = document.createElement("td");
	var countColumn = document.createElement("td");
	foodColumn.innerHTML+= food[item];
	countColumn.innerHTML+= count[item];
	row.appendChild(foodColumn);
	row.appendChild(countColumn);
	table.appendChild(row);
		}
}
</SCRIPT>
</body>

<table id="popularFood" >

</table>