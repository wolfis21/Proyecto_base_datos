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
    #table{
        background-color: #FF2424;
    }
</style>
<body id="pag">
<?php
include("../conexion.php");
$con=conectar();

$idMaterial=$_POST['idMaterial'];
$nombre_m=$_POST['nombre_m'];
$valor_m=$_POST['valor_m'];
$cant_material=$_POST['cant_material'];
$proveedor_idproveedor=$_POST['idproveedor'];

$slq2="SELECT * FROM material WHERE idMaterial = '$idMaterial' || nombre_m = '$nombre_m'";
$query2=mysqli_query($con,$slq2);

if($cant_material<0){
?>
   <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h1>NO PUEDE INGRESAR MATERIALES NEGATIVOS</h1>   
   <br>
   <h2>Vuelva a registrar</h2>
    <br>
    <form action="material.php">
    <input type="submit" class="btn btn-primary" value="<--" id="btn">
</form>
    </center>
<?php
}else if($query2->num_rows > 0){
    ?>
    <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h1>DATOS YA EXISTENTES</h1>
    <h2>El id y/o nombre de material</h2>    
   <br>
   <h2>Vuelva a registrar</h2>
    <br>
    <form action="material.php">
    <input type="submit" class="btn btn-primary" value="<--" id="btn">
</form>
    </center>
    
<?php

}else{

$sql="INSERT INTO material VALUES('$idMaterial','$nombre_m','$valor_m','$cant_material','$proveedor_idproveedor')";
$query= mysqli_query($con,$sql);

    Header("Location: material.php");
}
?>
<?php  $con->close(); ?>

</body>
</html>