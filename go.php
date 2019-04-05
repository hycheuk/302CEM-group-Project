<head>
<style>
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 100%;
}

td, th {
	border : 1px solid #dddddd;
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #dddddd;
}
</style>
</head>
<body>
<form action ="go.php" method="post">
	ID:<br>
	<input type = "text" name = "name">
	<br>
    <br>
	
	Item:<br>
	<input type="text" name = "item">
	<br><br>
	<input type="submit" value="UPDATE">
</form>
</body>


<?php
error_reporting(E_PARSE);
$item = $_POST['item'];
$RE = $_POST['name'];
$servername = "localhost";
$username="root";
$password = "";
$dbname = "302cem";


$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT quantity FROM invoice Where item_id = '$item' AND retailer_id = '$RE' ";

$result01 = $conn->query($sql);

$sql = "SELECT quantity FROM inventory Where item_id = '$item' ";

$result02 = $conn->query($sql);

if (count($result01) > 0 and count($result02) > 0){
	while ($row1 = $result01->fetch_row()) {
		$row2 = $result02->fetch_row();

		if ($row2 >= $row1) {
			$sql = "SELECT deliverble FROM delivery WHERE item_id = '$item' AND retailer_id = '$RE' ";
			$result = $conn->query($sql);
			$print = $result->fetch_row();
			
			
			if ($print[0] == '0'){
				

				$count01 = ( $row2[0] - $row1[0] );
				

				$sql = "UPDATE delivery SET deliverble = '1' WHERE item_id = '$item' AND retailer_id = '$RE' " ;

				echo "<br> ";


				if (mysqli_query($conn, $sql)) {
					$sql = "UPDATE inventory SET quantity = '$count01' WHERE item_id = '$item' " ;
					if(mysqli_query($conn, $sql)){
						echo "Record updated successfully";
					}
				}
				
			} else {
				echo "Already delivery" ;
			}
				
		} else {
			echo "Error updating record: " . $conn->error;
		}
			}
	}

$conn->close();
?>

