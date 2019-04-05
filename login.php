<?php
$x=$_POST['id'];
$y=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="302cem";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM account Where id ='$x' and pw ='$y' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_row()) {
		if ($row[3] == 1) {
			header('Location: online.php');
		} else {
   			header('Location: manufacturer.php');
}

}
} else {
	echo "please try again";
}


$conn->close();
?>