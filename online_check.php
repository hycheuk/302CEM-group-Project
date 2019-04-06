<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
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
form {
    padding: 0px 10px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">On nine company</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="online.php">UPLOAD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="online_check.php">ORDER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/302cem">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>
<form action ="online_check.php" method="post">
	Retailer ID:<br>
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
</html>