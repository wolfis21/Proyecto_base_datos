<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM cliente";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<html lang="en">

<head>
    <title>Clientes</title>
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
<div class="col-md-3" id="table">
    <br>
      <h1>Registro de Clientes</h1>
      <br>
           <form action="insertarC.php" method="POST">

                <input type="text" class="form-control mb-3" REQUIRED name="idCliente" placeholder="idCliente">
                <input type="text" class="form-control mb-3" REQUIRED name="NombreC" placeholder="nombre">
                <input type="text" class="form-control mb-3" REQUIRED name="ApellidoC" placeholder="apellido">
                <input type="int" class="form-control mb-3" REQUIRED name="TelefonoC" placeholder="telefono">
                <input type="text" class="form-control mb-3" name="direccionC" placeholder="direccion">
                                    
                 <input type="submit" class="btn btn-primary">
            </form>
</div>
    </center>
</body>

</html>