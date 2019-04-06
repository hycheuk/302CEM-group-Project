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
form {
    padding: 150px;
}
h2 {
    padding: 50px;
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
<h2><center>Please Enter The CSV Order File here</center></h2>
<form action ='online.php' method="post" enctype="multipart/form-data" align="center">
	<input type="file" name="userfile" >
	<input type="submit" value="Upload">
</form>

</body>

<?php
$servername = "localhost";
$username="root";
$password = "";
$dbname = "302cem";

$conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_FILES['userfile'])){
        $fname = $_FILES['userfile']['name'];
        echo '<center> upload file name: '.$fname.'</center> ';
        $chk_ext = explode (".",$fname);


        if(strtolower(end($chk_ext)) == "csv")
        {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'Upload/'.
                $_FILES['userfile']['name']);
            echo "<center>successfully upload</center>";
        }

    else{
        Echo "<center> failed <br>invalid File</center>";
        }
}
$conn->close();
?>
</html>