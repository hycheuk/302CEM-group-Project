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
<form action ="online.php" method="post">
	ID:<br>
	<input type = "text" name = "name">
	<br>
    <br>
	<input type="submit" value="search">
</form>
</body>
<?php
error_reporting(E_PARSE);
$x=$_POST['name'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="302cem";


$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM invoice WHERE retailer_id = '$x' ";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
echo "<table>";
	while($row = $result->fetch_row()) {
		$sql = " SELECT deliverble FROM delivery WHERE item_id = '$row[0]' ";
		$result01 = $conn->query($sql);
		$row01 = $result01->fetch_row();
		if ($row01[0] == '1'){
			$count = "Deliver";
		} else {
			$count = "Non-deliver";
		}
		echo "<tr><td> 	item_id: " . $row[0]. " </td><td> item_name " . $row[1] . " </td><td> quantity: " . $row[2] . " </td><td> deadline_date: " . $row[3]. " </td> <td> 	retailer_id: " . $row[4]. " </td><td> retailer_name: " . $row[5]. " </td><td> retailer_tel: " . $row[6]. " </td><td> retailer_address: " . $row[7]. " </td><td> manufacturer_id: " . $row[8]. " </td><td> manufacturer_name	: " . $row[9]. " </td><td> delivery: ". $count ."</td></tr>  ";
	}
echo "<table>";
} else {
	echo "Please enter the retailer ID to check order";
}
$conn->close();
?>