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
<?php
$x=$_POST['id'];
$y=$_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname="302cem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("connection failed: " . $conn-> connect_error);
}
echo "connected successfully";

$sql = "SELECT user_name, id, password FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	window.open('http://destination.com');
} else {
	echo "0 results";
}
$conn->close();
?>