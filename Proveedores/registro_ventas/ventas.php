<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>Confirmacion</title>
</head>
<style>
    #pag{
        background-color: #d5ffff;
    }
    #btn{
        background-color: #579FDB;
    }
    #table{
        background-color:#5dc1b9;
    }
</style>
<body id="pag">
<form action="../index_r/index.php">

<input type="submit" class="btn btn-primary" value="<--" id="btn">

</form>
<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM unidad,ventas,cliente";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

?>    
<br><br>
<center>

<div class="col-md-3" id="table">
<br> 
<h1>VENTA</h1>

    <form action="enlazar2.php" method="POST">
    <th>ID_Unidad a Elegir: &nbsp&nbsp </th>
         <select REQUIRED name="idUnidad">
        <option value="0">Seleccione:</option>
        <?php
          $query2 = $con -> query ("SELECT * FROM unidad");
          while ($row2 = mysqli_fetch_array($query2)) {
            echo '<option selected="selected" >' .$row2['idUnidad'].'</option>';
          }
        ?>
        </select>
<br><br>
        <th>ID_Cliente del Pedido: &nbsp&nbsp </th>
         <select REQUIRED name="idCliente">
        <option value="0">Seleccione:</option>
        <?php
          $query2 = $con -> query ("SELECT * FROM cliente");
          while ($row2 = mysqli_fetch_array($query2)) {
            echo '<option selected="selected" >' .$row2['idCliente'].'</option>';
          }
        ?>
        </select>
<br><br>
            
        <input type="submit" class="btn btn-primary" id="btn">
<br><br>

    </form>

</div>
<?php  $con->close(); ?>

</center>
</body>
</html>