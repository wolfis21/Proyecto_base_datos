<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM material";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

/* se debe de registrar la fecha (DATE) y generarse solo el id de compra */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Compras</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

</head>
<style>
    #registro{
        background-color: #5dc1b9;
        border-radius:15px;
    }
    #btn{
        background-color: #30827b;
    }
    #table{
        background-color: #579FDB;
        border-radius:15px;
    }
    #table2{
        background-color: #2196f3;
        border-radius:15px;
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
<br><br>
<center>
<div class="container mt-5">
    <div class="row" > 

<div class="col-md-3" id="registro">
      <h1>Registro de Compras</h1>
  
           <form action="insertarC.php" method="POST">

                <label for="start"></label>
                <input type="date" class="form-control mb-3" id="start" REQUIRED name="Fecha_compra">
                <input type="int" class="form-control mb-3" REQUIRED name="cant_compra" placeholder="cantidad">
         <th>
           ID_Material: &nbsp&nbsp
         <select name="idMaterial">
        <option value="0">Seleccione:</option>
        <?php
          $query2 = $con -> query ("SELECT * FROM material");
          while ($row2 = mysqli_fetch_array($query2)) {
            echo '<option selected="selected">' .$row2['idMaterial'].'</option>';
          }
        ?>
      </select>
        </th>
        <br><br>
               <center>  <input type="submit" class="btn btn-primary" id="btn"> </center>
            </form>
            <br>
            <form action="revisarC.php">

<input type="submit" class="btn btn-primary" value="Historial" id="btn">

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
    <tr>
         <th><?php  echo $row['idMaterial']?></th>
         <th><?php  echo $row['nombre_m']?></th>
          </tr>
        <?php

        while($row=mysqli_fetch_array($query)){
      ?>
           <tr>
         <th><?php  echo $row['idMaterial']?></th>
         <th><?php  echo $row['nombre_m']?></th>
          </tr>
    </tbody>
    <?php
        }
    ?>
      </table>
</div>
</div>
      </div>
</center>
</body>
</html>