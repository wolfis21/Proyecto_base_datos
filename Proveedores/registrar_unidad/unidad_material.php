<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>Solicitud</title>
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
    body{background-color: #d5ffff;font-family: Arial;}
		
		#menu{
			background-color:  #137fd9;
		}
		#menu2{
			background-color:#5dc1b9;
		}

		#menu ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu ul li{
			display: inline-block;
		}

		#menu ul li a{
			color: white;
			display: block;
			padding: 10px 10px;
			text-decoration: none;
		}

		#menu ul li a:hover{
			background-color: #004843;
		}

		.item-r{
			float: right;
		}
		#menu2 ul{
			list-style: none;
			margin: 0;
			padding: 0;
		}

		#menu2 ul li{
			display: inline-block;
		}

		#menu2 ul li a{
			color: white;
			display: block;
			padding: 10px 10px;
			text-decoration: none;
		}

		#menu2 ul li a:hover{
			background-color: #004843;
		}

		.item-r{
			float: right;
		}
</style>
<body>
<div id="menu">
    <ul>
	<li><a href="../index_r/index.php"><img height="50px" src=../imagen/logo.jpg></a></li>
    <li><a href="../registro_proveedores/proveedor.php"> Agregar Proveedores</a></li>
    <li><a href="../registro_material/material.php"> Agregar Materiales</a></li>
    <li><a href="../registro_compra/compra.php">Hacer compras</a></li>
    <li><a href="../index_r/revisarM2.php">Inventario</a></li>
	<li><a href="../registro_clientes/clientes.php">Agregar cliente</a></li>
    <li><a href="../registrar_unidad/unidad.php">Registrar Trailers</a></li>
    <li><a href="../registrar_unidad/mostrar_unidades.php">Mostrar Trailers</a></li>

</ul>
</div>

<div id="menu2" align="right">
  <ul>		
<li><a href="../registrar_unidad/unidad_material.php">Solicitar Materiales</a></li>
  <li><a href="../registro_ventas/ventas.php">Aprobar Orden</a></li>
<li><a href="../registrar_factura/factura.php">Facturar</a></li>
  
  </ul>
  
  </div>
<?php
    include("../conexion.php");
    $con=conectar();

?>    
<br><br>
<center>

<div class="col-md-3" id="table">
<br> 
<h1>REGISTRO</h1>

    <form action="enlazar.php" method="POST">
    <th>ID_Unidad a Elegir: &nbsp&nbsp </th>
         <select REQUIRED name="idUnidad">
        <option value="0">Seleccione:</option>
        <?php
          $query = $con -> query ("SELECT * FROM unidad");
          while ($row = mysqli_fetch_array($query)) {
            echo '<option selected="selected" >' .$row['idUnidad'].'</option>';
          }
        ?>
        </select>
<br>
        <th>ID_Material a Usar: &nbsp&nbsp </th>
         <select REQUIRED name="idMaterial">
        <option value="0">Seleccione:</option>
        <?php
          $query2 = $con -> query ("SELECT * FROM material");
          while ($row2 = mysqli_fetch_array($query2)) {
            echo '<option selected="selected" >' .$row2['idMaterial'].'</option>';
          }
        ?>
        </select>
<br><br>
        <input type="text" class="form-control mb-3" REQUIRED name="cant_unidad" placeholder="cantidad de materiales">
<br>    
        <input type="submit" class="btn btn-primary" id="btn">
<br><br>
    </form>
</div>
<div class="col-md-8" id="table2" >
<br><br>
    <table class="table" id="table">
     <thead class="table-success table-striped" >
    <tr>
        <th>ID_Material</th>
        <th>Nombre de Material</th>
    </tr>
    </thead>
    <tbody>
        <?php
            $sql3="SELECT *  FROM material";
            $query3=mysqli_query($con,$sql3);
            
        while($row3=mysqli_fetch_array($query3)){
      ?>
           <tr>
         <th><?php  echo $row3['idMaterial']?></th>
         <th><?php  echo $row3['nombre_m']?></th>
          </tr>
    </tbody>
    <?php
        }
    ?>
      </table>
</div>
<?php  $con->close(); ?>
</center>
</body>
</html>
