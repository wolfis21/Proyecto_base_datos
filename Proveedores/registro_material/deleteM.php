<?php

include("../conexion.php");
$con=conectar();

$id=$_GET['id'];

$sql="DELETE FROM material  WHERE idMaterial='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: revisarM.php");
    }else{
        echo 'error en sentencia sql';
    }
?>