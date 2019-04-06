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
<form action ="go.php" method="post">
	Retailer ID:<br>
	<input type = "text" name = "name">
	<br>
    <br>
	
	Item ID:<br>
	<input type="text" name = "item">
	<br><br>
	<input type="submit" value="Deliver">
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
						echo "Record up dated successfully";
                        echo "<br>Item Remaining:";
                        $sql = "SELECT * FROM inventory WHERE item_id = '$item' ";
                        $result10 = $conn->query($sql);
                        echo "<table>";
                            while($row = $result10->fetch_row()) {
                            echo "<tr><td> 	item_id: " . $row[0]. " </td><td> item_name " . $row[1] . " </td><td> quantity: " . $row[2] . " </td><td> description: " . $row[3]. " </td></tr>  ";
                            }
                        echo "<table>";
					}
				}
				
			} else {
				echo "Already delivery" ;
			}
				
		} else {
			echo "Error updating record or no enough quantity" . $conn->error;
		}
			}
	}

$conn->close();
?>
</html>

