
<?php
session_start();
ob_start();

?>
<!DOCTYPE html>

<head>

    <title>Ifto super bet</title>
    <img src="g.gif" alt="prima">
    <form method="post" action="logout.php" >

    <button  type="submit" name="ss" style="float:right">Log out</button>


</form>


</head>
<style>



    img{
        position: relative;
        bottom: 5px;
        height: 120px;
        width:102%;
        right:5px;

    }


    body{

        background-color: #4CAF50;

    }
    button{

        background-color: red;
        color: white;
        padding: 8px 15px;
        margin: -45px 0 0 1420px ;
        border: 2px solid green;
        cursor: pointer;
        display: flex;
        position:absolute;





    }
    button:hover {
        opacity: 0.8;
    }


    h1 {
        font-weight: bold;
        color: #fff;
        font-size: 24px;
        transform: translate(-80%, -195%);
        font-family: 'Amatica SC',cursive;

    }
    .column {
        float: left;
        padding: 10px;
        height: 300px;



    }
    .stanga  {
        float: left;
        width: 20%;

    }
    .mijloc {
        width: 50%;
        float:left



    }


    .dreapta{
        float: left;
        width: 20%;
        margin:10px 0 0 200px;

    }


}


    .mySlides{
        display:block;
        position: relative;
        width: 100%;
        height:200px;
        border: 10px solid black;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        text-align: center;
        padding: 10px 20px;
    }



    * {
        box-sizing: border-box;
    }
    table{

        background-color: blue;





    }
.e{
    width: 28%;
    margin:-300px 0 0 1100px;
height: 500px;


}
    th, td {

        border:1px solid black;
      padding:10px 30px;
    }​


</style>


<body>



<?php

if(isset($_SESSION['nume'])) {

    echo "<h1 style='float:right'>Buna ".$_SESSION['nume'] ."</h1>";

}






?>
<div class="column stanga">


    <div  style="background-color: red">

        <div class="slide"  id="middle" >
            <img class="mySlides" src="folder/ceva.jpg" style="width:100%">
            <img class="mySlides" src="folder/images.jpg" style="width:100%">
            <img class="mySlides" src="folder/main.jpg" style="width:100%">
            <img class="mySlides" src="folder/ceva1.jpg" style="width:100%">

        </div>
        <ul  class="lista" id="left" >
            <li class="daa" style="font-size:50px"><a href="#">Fotbal</a></li>
            <li style="font-size:50px"><a href="#">Baschet</a></li>
            <li style="font-size:50px"><a href="#">ceva</a></li>
            <li style="font-size:50px"><a href="#">tot ceva</a></li>
        </ul>

        <script>
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}
                x[myIndex-1].style.display = "block";
                setTimeout(carousel, 4000);
            }



        </script>

</div>

</div>

        <?php

        function tabel()
        {
            require_once 'conect.php';

            $tabel = '<table id="table" >';
            $tabel .= '<th><h2>Codul</h2></th>';
            $tabel .= '<th><h2>Eveniment</h2></th>';
            $tabel .= '<th><h2><div class="pariu">1</div></h2></th>';
            $tabel .= '<th><h2><div class="pariu">X</div></h2></th>';
            $tabel .= '<th><h2><div class="pariu">2</div></h2></th>';
            $tabel .= '<th><h2><div class="pariu">1X</div></h2></th>';
            $tabel .= '<th><h2><div class="pariu">X2</div></h2></th>';
            $tabel .= '<th><h2><div class="pariu">12</div></h2></th>';


            $a = new da();
            $sql = "SELECT echipa1,echipa2,codev FROM evenimente;";
            $result = mysqli_query($a->opencon(), $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $tabel .= '<tr>';
                    $tabel .='<td onclick="c(this);">' . $row['codev'] . '</td>';
                    $tabel .= '<td><div>' . $row['echipa1'] . '-' . $row['echipa2'] . '</div></td>';
                    $codev = $row['codev'];

                    $b = new da();
                    $result2 = mysqli_query($b->opencon(), "SELECT cota FROM cote WHERE codev = " . $codev .
                        " AND codv = (SELECT codv FROM variante WHERE tip_varianta = '1')" );

                    if (mysqli_num_rows($result2) > 0) {
                        $row_s = mysqli_fetch_assoc($result2);
                        $tabel .= '<td ><div id="cota" class="varianta" onclick="d(this)">' .$row_s['cota'].'</div></td>';
                    } else {
                        $tabel .= '<td> - </td>';
                    }
                    $result2 = mysqli_query($b->opencon(), "SELECT cota FROM cote WHERE codev = " . $codev .
                        " AND codv = (SELECT codv FROM variante WHERE tip_varianta = 'X')");

                    if (mysqli_num_rows($result2) > 0) {
                        $row_s = mysqli_fetch_assoc($result2);
                        $tabel .= '<td><div class="varianta">' .$row_s['cota'].'</div></td>';
                    } else {
                        $tabel .= '<td> - </td>';
                    }
                    $result2 = mysqli_query($b->opencon(), "SELECT cota FROM cote WHERE codev = " . $codev .
                        " AND codv = (SELECT codv FROM variante WHERE tip_varianta =  '2' ) " );

                    if (mysqli_num_rows($result2) > 0) {
                        $row_s = mysqli_fetch_assoc($result2);
                        $tabel .= '<td><div class="varianta">' .$row_s['cota'].'</div></td>';
                    } else {
                        $tabel .= '<td> - </td>';
                    }
                    $result2 = mysqli_query($b->opencon(), "SELECT cota FROM cote WHERE codev = " . $codev .
                        " AND codv = (SELECT codv FROM variante WHERE tip_varianta = '1X')");

                    if (mysqli_num_rows($result2) > 0) {
                        $row_s = mysqli_fetch_assoc($result2);
                        $tabel .= '<td><div class="varianta">' .$row_s['cota'].'</div></td>';
                    } else {
                        $tabel .= '<td> - </td>';
                    }
                    $result2 = mysqli_query($b->opencon(), "SELECT cota FROM cote WHERE codev = " . $codev .
                        " AND codv = (SELECT codv FROM variante WHERE tip_varianta = 'X2')");

                    if (mysqli_num_rows($result2) > 0) {
                        $row_s = mysqli_fetch_assoc($result2);
                        $tabel .= '<td><div class="varianta">' .$row_s['cota'].'</div></td>';
                    } else {
                        $tabel .= '<td> - </td>';
                    }
                    $result2 = mysqli_query($b->opencon(), "SELECT cota FROM cote WHERE codev = " . $codev .
                        " AND codv = (SELECT codv FROM variante WHERE tip_varianta = '12')");

                    if (mysqli_num_rows($result2) > 0) {
                        $row_s = mysqli_fetch_assoc($result2);
                        $tabel .= '<td><div class="varianta">' .$row_s['cota'].'</div></td>';
                    } else {
                        $tabel .= '<td> - </td>';
                    }
                    $tabel .= '</tr>';


                }

                echo $tabel;
            }


        }


        ?>




                       <script>
                           function c(x)
                           { var a = 0;
                               var b = 2;
                               var arr=[];
                               var ar=[];
var da=x.innerHTML;
                        arr.push(da);

                               console.log(arr);
                             
                             /*
                              if (a == b)
                               {
                                   alert("You have reached the limit of adding " + counter + " inputs");}
                               else {

                                   ++a;
                                   var newdiv = document.createElement('div' + a);

                                   newdiv.innerHTML = "<label>Level" + a + ": *</label><input type='text' id='da'>" +
                                       " varianta: <select> <option>1</option> <option>X</option><option>2</option> <option>1X</option><option>X2</option> <option>12</option></select> ";
                                   document.getElementById('dynamicInput').appendChild(newdiv);


                                   document.getElementById('da').innerHTML =arr;
                               }


*/

                               }
                           </script>





      <div>

        <?php

        tabel();


//for($i=0;$i<=32;$i++) {
  //  echo '<div > codul biletului: <input  id="input" type="text"  size="10" >
  //varianta: <select class="select"><option>1</option> <option>X</option><option>2</option> <option>1X</option><option>X2</option> <option>12</option></select> </div> ';
//}-->
?>




    </div>
<div class="column e" style="background-color: pink">
    <hr/>
    <div id="dynamicInput">

    </div>
    <hr/>

</div>

</body>


</html>



