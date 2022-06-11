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

$Fecha_compra=$_POST['Fecha_compra'];
$cant_compra=$_POST['cant_compra'];
$Material_idMaterial=$_POST['idMaterial'];

if($cant_compra<0){
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
        <form action="compra.php">
        <input type="submit" class="btn btn-primary" value="<--" id="btn">
    </form>
        </center>
    <?php
}
else{
$sql2="UPDATE material SET  cant_material= cant_material + '$cant_compra' where idMaterial='$Material_idMaterial'";
$sql="INSERT INTO compra VALUES('$idCompra','$Fecha_compra','$cant_compra','$Material_idMaterial')";
$query2= mysqli_query($con,$sql2);
$query= mysqli_query($con,$sql);

    Header("Location: compra.php");
}
?>
</body>

</html>
