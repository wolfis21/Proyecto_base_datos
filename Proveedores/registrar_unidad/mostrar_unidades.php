<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>Mostrar Trailers</title>
</head>
<style type="text/css">
    #registro{
        background-color: #5dc1b9;
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
	<li><a href=""><img height="50px" src=../imagen/logo.jpg></a></li>
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
<div class="col-md-8" id="contenido">
  	<table class=table id="table">
  		<thead class="table-success table-striped">
               <tr>
  			<th>Id_unidad</th>
  			<th>Tipo_trailer</th>
  			<th>Imagen</th>
              </tr>
  		</thead>
          <tbody>
          <?php
       include("../conexion.php");
         $con=conectar();

        $sentecia="SELECT * FROM unidad";
        $resultado= $con->query($sentecia) or die (mysqli_error($con));
        while($fila=$resultado->fetch_assoc())
        {
        ?>
        <tr>
        <td><?php echo $fila['idUnidad']?></td>
        <td><?php echo $fila['Tipo_trailer']?></td>
        <td><img height="120px" src=" data:images/jpg;base64,<?php echo base64_encode($fila['imagen']);?>" /></td>
        </tr>
        </tbody>
       <?php
        }
      ?>
     </div>
     </center>
	 <?php  $con->close(); ?>
</body>
</html>