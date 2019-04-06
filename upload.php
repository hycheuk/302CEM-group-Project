<html>
<body>

<form action ='upload.php' method="post" enctype="multipart/form-data">
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
        echo 'upload file name: '.$fname.' ';
        $chk_ext = explode (".",$fname);


        if(strtolower(end($chk_ext)) == "csv")
        {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'Upload/'.
                $_FILES['userfile']['name']);
            echo "successfully upload";
        }

    else{
        Echo " failed <br>invalid File";
        }
}
$conn->close();
?>
</html>