<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM proveedor WHERE idproveedor='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar_Proveedor</title>
        <link href="../estilos.css" rel="stylesheet">
        
    </head>
    <style>
            #pag{
        background-color: #d5ffff;
    }
        #cuadr{
            background-color: #2196f3;
        }
    </style>
    <body id="pag">
    <form action="proveedor.php">

<input type="submit" class="btn btn-primary" value="<--" id="btn">

</form>
        <center>
            <br><br>
                <div class="col-md-3" id="cuadr">
                    <form action="updateP.php" method="POST">
                            <br>
                                <input type="hidden" name="idproveedor" value="<?php echo $row['idproveedor']  ?>">
                                Categoria: <br>
                                <input type="text" class="form-control mb-3" name="categoria" value="<?php echo $row['categoria']  ?>">
                                Nombre: <br>
                                <input type="text" class="form-control mb-3" name="Nombre" value="<?php echo $row['Nombre']  ?>">
                                Direccion: <br>
                                <input type="text" class="form-control mb-3" name="Direccion" value="<?php echo $row['Direccion']  ?>">
                                Telefono: <br>
                                <input type="text" class="form-control mb-3" name="telefono" value="<?php echo $row['telefono']  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
        </center>
    </body>
</html>