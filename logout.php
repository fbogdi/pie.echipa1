<?php
require_once 'util.php';
ob_start();
if(isset($_POST['ss'])) {
   // echo "apas butonul";
    session_unset();
    session_destroy();
    if (!isset($_SESSION['nume'])) {

       // echo "apas 1butonul";
        header("Location: ../untitled1/da.php?logout=1");

        ob_end_flush();
    }
    else {header("Location: ../untitled1/util.php");}

    }


