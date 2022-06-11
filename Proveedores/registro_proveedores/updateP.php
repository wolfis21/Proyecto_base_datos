<?php

include("../conexion.php");
$con=conectar();

$idproveedor=$_POST['idproveedor'];
$categoria=$_POST['categoria'];
$Nombre=$_POST['Nombre'];
$Direccion=$_POST['Direccion'];
$telefono=$_POST['telefono'];

$sql="UPDATE proveedor SET  idproveedor='$idproveedor',categoria='$categoria',Nombre='$Nombre',Direccion='$Direccion' ,telefono='$telefono'
 WHERE idproveedor='$idproveedor'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: proveedor.php");
    }else{
        echo "error en sentencia sq;";
    }
?>