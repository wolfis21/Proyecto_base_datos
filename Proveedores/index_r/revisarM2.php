<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT idMaterial,nombre_m,valor_m,cant_material FROM material";
    $query=mysqli_query($con,$sql);
    $row2=mysqli_num_rows($query);
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>inventario</title>
</head>
<style>
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
<form action="index.php">

<input type="submit" class="btn btn-primary" value="<--" id="btn">

</form>
    <center>
                <br><br>
                <h1>STOCK</h1>
                        <br><br>
<div class="col-md-8" id="table2">
    <table class="table" id="table">
     <thead class="table-success table-striped" >
    <tr>
        <th>ID_Material</th>
        <th>Nombre_Material</th>
        <th>Valor_unidad</th>
        <th>cantidad</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
<!--para hacer un muestreo de inventario-->
    <tbody>
      <?php
      $contador=0;
                  if(!$query){
                    echo"Error en la consulta";
                  }else{
                    if($row2<1){
                      echo"<tr><td>NULL</td></tr>";
                    }else{
                      for($i=0; $i<=$row;$i++){
                        if($row['3']<=2){
                  
                        echo'
                        <tr>
                        <td>',$row[0],'</td>
                        <td>',$row[1],'</td>
                        <td>',$row[2],'</td>
                        <td>',"<span style=\"color:red;\">".stripslashes($row[3])."</span>",'</td>';
                              $contador++;
                      }else{
                          echo'
                          <tr>
                          <td>',$row[0],'</td>
                          <td>',$row[1],'</td>
                          <td>',$row[2],'</td>
                          <td>',$row[3],'</td>';

                        }
                       ?>
                       <th><a href="../registro_material/actualizarM.php?id=<?php echo $row['idMaterial'] ?>" class="btn btn-info">Editar</a></th>
                        <th><a href="../registro_material/deleteM.php?id=<?php echo $row['idMaterial'] ?>" class="btn btn-danger">Eliminar</a></th>

                  </tr>

                        <?php
                        $row = mysqli_fetch_array($query);
                    }
                    }
                  }
        ?>
    </tbody>
                 </table>
                 <br>
                <?php if($contador>=1){
                    echo '<td>',"<span style=\"color:red;\">".stripslashes('NECESITA COMPRAR MAS MATERIAL!!')."</span>",'</td>';
                  }
                ?>
             </div>
        </div>
        </center>
        <?php  $con->close(); ?>
      </body>

</html>


