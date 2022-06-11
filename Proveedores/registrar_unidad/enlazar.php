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
/* ingreso lista de materiales para el trailer*/
include ("../conexion.php");
$con=conectar();

$idUnidad_Material="";
$unidad_idunidad=$_POST['idUnidad'];
$material_idmaterial=$_POST['idMaterial'];
$cant_unidad=$_POST['cant_unidad'];


    $sql2="UPDATE material SET  cant_material= cant_material - '$cant_unidad' where idMaterial='$material_idmaterial'";
     $query2= mysqli_query($con,$sql2);
     $sql="INSERT INTO unidad_material VALUES('$idUnidad_Material','$unidad_idunidad','$material_idmaterial','$cant_unidad')";
    $query= mysqli_query($con,$sql);
    

        $sql3="SELECT cant_material FROM material WHERE idMaterial='$material_idmaterial'";
        $query3=mysqli_query($con,$sql3);
       $row= mysqli_fetch_array($query3);

     if($row<=0) {
?>
    <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h1>NO HAY STOCK DEL MATERIAL SELECCIONADO</h1>
    <h2>vaya a comprar</h2>    
   <br>
    <form action="compra.php">
    <input type="submit" class="btn btn-primary" value="ir" id="btn">
</form>
    </center>
<?php
echo "se realizo";  
}
echo $row2;
Header("Location: unidad_material.php");
?>
 <?php  $con->close(); ?>
</body>
</html>