
<!DOCTYPE html>
<html>
<head>

</head>
<body>



<?php
class da
{function opencon()
{
$conn = new mysqli('localhost', 'root', "", "andrei");

return $conn;
}


}

$da=new da();

/*
$sql1="SELECT * FROM `conturi` ";
$result = mysqli_query($da->opencon(), $sql1);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "Name: " . $row["codc"]. " ". $row["util"]." ".$row["pasw"]."<br>";
    }
} else {
    echo "0 results";
}
$result->close();
*/


?>
</body>
</html>