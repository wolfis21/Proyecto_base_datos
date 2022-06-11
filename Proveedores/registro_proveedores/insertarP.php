<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>insertar</title>
</head>
<style>
    #pag{
        background-color: #d5ffff;
    }
    #btn{
        background-color: #579FDB;
    }
</style>

<body id="pag">
    
<?php
include("../conexion.php");
$con=conectar();

$idproveedor=$_POST['idproveedor'];
$categoria=$_POST['categoria'];
$Nombre=$_POST['Nombre'];
$Direccion=$_POST['Direccion'];
$telefono=$_POST['telefono'];

$slq2="SELECT * FROM proveedor WHERE idproveedor = $idproveedor || telefono = $telefono";
$query2=mysqli_query($con,$slq2);

if($query2 ->num_rows > 0){
    ?>    
    <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h1>DATOS YA EXISTENTES</h1>
    <h2>el id y/o telefono</h2>
   <br>
   <h2>Vuelva a registrar</h2>
    <br>
    <form action="proveedor.php">
    <input type="submit" class="btn btn-primary" value="<--" id="btn">
</form>
    
    </center>
<?php

}else{
$sql="INSERT INTO proveedor VALUES('$idproveedor','$categoria','$Nombre','$Direccion', '$telefono')";
$query= mysqli_query($con,$sql);

    Header("Location: proveedor.php");
}

?>


</body>
</html>
