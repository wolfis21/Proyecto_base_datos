<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT * FROM compra";
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

    <title>registro de Compras</title>
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
<form action="compra.php">

<input type="submit" class="btn btn-primary" value="<--" id="btn">

</form>
    <center>
                <br><br>
                        <br><br>
<div class="col-md-8" id="table2">
    <table class="table" id="table">
     <thead class="table-success table-striped" >
    <tr>
        <th>ID_Compra</th>
        <th>Fecha_Compra</th>
        <th>cant_compra</th>
        <th>Material_idMaterial</th>
    </tr>
    </thead>
<!--para hacer un muestreo de clientes-->
    <tbody>
      <?php
                  if(!$query){
                    echo"Error en la consulta";
                  }else{
                    if($row2<1){
                      echo"<tr><td>NULL</td></tr>";
                    }else{
                      for($i=0; $i<=$row;$i++){
                
                          echo'
                          <tr>
                          <td>',$row[0],'</td>
                          <td>',$row[1],'</td>
                          <td>',$row[2],'</td>
                          <td>',$row[3],'</td>';

                          $row = mysqli_fetch_array($query);
                        }
                       ?>
                  </tr>
                        <?php
                    }
                    } 
        ?>
    </tbody>
                 </table>
                 
             </div>
        </div>
        </center>
</body>

</html>