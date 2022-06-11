<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM unidad, unidad_material";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trailers</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

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
	<li><a href=""><img height="80px" src=../imagen/logo.jpg></a></li>
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
    <div class="container mt-5">
         <div class="row" > 

    <br><br>
    <center>
            <div class="col-md-3" id="table" >
      <h1>Registro de Trailers</h1>

      <form action="insertarU.php" method="POST" enctype="multipart/form-data">

      <input type="text" class="form-control mb-3" REQUIRED name="Tipo_trailer" placeholder=" clase de trailer">
      <br>
      <input type="file" REQUIRED name="imagen">
        <br> <br>
      <input type="submit" class="btn btn-primary" id="btn">
    </form>
            </div>
    </div>
    </center>
<br><br>  
        <table class="table" id="table">
  		    <thead class="table-success table-striped">
               <tr>
  			<th>Id_unidad</th>
  			<th>Tipo_trailer</th>
  			<th>Imagen</th>
              </tr>
  		    </thead>
            <tbody>
          <?php
     
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
        </table>
     
    </div>
    </div>
<!--  solo para irme  a mostrar las unidades
<div id="contenido">
  	<table style="margin: auto; width: 800px; border-collapse: separate; border-spacing: 10px 5px;">
  		<thead>
  			<th>Id_unidad</th>
  			<th>Tipo_trailer</th>
  			<th>Imagen</th>
  		</thead>

      <?php
    /*
        $sentecia="SELECT * FROM unidad";
        $resultado= $con->query($sentecia) or die (mysqli_error($con));
        while($fila=$resultado->fetch_assoc())
        {
        ?>
        <tr>
        <td><?php echo $fila['idUnidad']?></td>
        <td><?php echo $fila['Tipo_trailer']?></td>
        <td><img height="50px" src=" data:images/jpg;base64,<?php echo base64_encode($fila['imagen']);?>" /></td>
        </tr>
       <?php
        }
     */ ?>
     -->

</body>
</html>