<?php 
    include("../conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM material WHERE idMaterial='$id'";
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
        <title>Actualizar_Material</title>
        <link href="../estilos.css" rel="stylesheet">
        
    </head>
    <style>
    #registro{
        background-color: #5dc1b9;
    }
    #btn{
        background-color: #30827b;
    }
    #pag{
        background-color: #d5ffff;
    }
    #table{
        background-color: #579FDB;
    }
    #table2{
        background-color: #2196f3;
    }
</style>
    <body id="pag">
    <form action="revisarM.php">

<input type="submit" class="btn btn-primary" value="<--" id="btn">

</form>
        <br><br><br><br>

        <center>
                <div class="col-md-3" id="registro">
                    <form action="updateM.php" method="POST">
                    
                                <input type="hidden" name="idMaterial" value="<?php echo $row['idMaterial']  ?>">
                                
                                Nombre de material 
                                <input type="text" class="form-control mb-3" name="nombre_m" placeholder="nombre_m" value="<?php echo $row['nombre_m']  ?>">
                                Valor de material 
                                <input type="text" class="form-control mb-3" name="valor_m" placeholder="valor_m" value="<?php echo $row['valor_m']  ?>">
                               
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar" id="btn">
                    </form>
                    
                </div>
         </center>
    </body>
</html>