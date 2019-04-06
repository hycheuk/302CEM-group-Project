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
</style>
</head>
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
        <a class="nav-link" href="manufacturer.php">ORDER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="look_inventory.php">INVENTORY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="go.php">DELIVERY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/302cem">LOGOUT</a>
      </li>
    </ul>
  </div>
</nav>
<form action ="look_inventory.php" method="post">
	Item ID:<br>
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

$sql = "SELECT * FROM inventory WHERE item_id = '$x' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "<table>";
	while($row = $result->fetch_row()) {
		echo "<tr><td> 	item_id: " . $row[0]. " </td><td> item_name " . $row[1] . " </td><td> quantity: " . $row[2] . " </td><td> description: " . $row[3]. " </td></tr>  ";
	}
echo "<table>";
} else {
	echo "Please enter the correct Item ID to check inventory ";
}
$conn->close();
?>
</html>