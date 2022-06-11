<?php

include("../conexion.php");
$con=conectar();

$idMaterial=$_POST['idMaterial'];
$nombre_m=$_POST['nombre_m'];
$valor_m=$_POST['valor_m'];

$sql="UPDATE material SET  idMaterial='$idMaterial',nombre_m='$nombre_m',valor_m='$valor_m' 
            WHERE idMaterial='$idMaterial'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: revisarM.php");
    }else{
        echo "error de conexion con SQL";
    }
?>