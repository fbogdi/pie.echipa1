<?php
ob_start();
?>
<?php



if(isset($_POST['submit'])) {
    require_once "conect.php";

    $a = new da();
    $nume = mysqli_real_escape_string($a->opencon(), $_POST['nume']);
    $psw = mysqli_real_escape_string($a->opencon(), $_POST['nu']);
    if (empty($nume) || empty($psw)) {

        exit();



    } else {
        $result = mysqli_query($a->opencon(), "SELECT * FROM `conturi` WHERE util='$nume' and pasw='$psw'")
        or die("nu vrea" . mysqli_error());
        $row = mysqli_num_rows($result);
        if ($row < 1) {
            echo "nu merge";

        }

else {

    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['nume'] = $row['util'];
        $_SESSION['nu'] = $row['pasw'];
        header("Location:../untitled1/util.php");
        ob_end_flush();



    }

}
    }

}
else{

    exit();


}
?>

