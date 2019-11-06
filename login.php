<?php

$a = new da();


$nume = mysqli_real_escape_string($a->opencon(),$_POST['nume']);
$psw =mysqli_real_escape_string($a->opencon(),$_POST['nu']);
session_start();




 if(isset($nume) && isset($psw)) {


    $result = mysqli_query($a->opencon(), "SELECT * FROM `conturi` WHERE util='$nume' and pasw='$psw'")
    or die("nu vrea" . mysqli_error());
    $row = mysqli_fetch_array($result);

    if (isset($_SESSION['nume']) && $_SESSION['nume'] == true && $_SESSION['nume']==$nume)
        echo "<h1>buna " . $_SESSION['nume'] . "</h1>";


    if ($row["util"] == $nume && $row["pasw"] == $psw) {
        echo "<script type='text/javascript'>alert('buna $nume!');</script>";
    } else if ($row["util"] != $nume && $row["pasw"] != $psw) {
        echo "" . $row['util'];
    }
    //  echo $nume;
    //echo $psw;
}