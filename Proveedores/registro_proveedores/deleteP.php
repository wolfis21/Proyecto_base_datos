<?php

include("../conexion.php");
$con=conectar();

$idproveedor=$_GET['id'];

$sql="DELETE FROM proveedor  WHERE idproveedor='$idproveedor'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: proveedor.php");
    }else{
        echo 'error de sentencia sql';
    }
?>