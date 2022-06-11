<?php
function conectar(){
    $host="localhost";
    $user="isaac";
    $pass="1234";

    $bd="coje";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>