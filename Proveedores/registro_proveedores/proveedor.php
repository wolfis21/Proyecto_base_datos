<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM proveedor";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Proveedores</title>
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
<div class="container mt-5">
    <div class="row" > 
                        
<div class="col-md-3" id="registro">
      <h1>Registro de Proveedor</h1>
    
           <form action="insertarP.php" method="POST">

                <input type="text" class="form-control mb-3" REQUIRED name="idproveedor" placeholder="idproveedor">
                <input type="text" class="form-control mb-3" REQUIRED name="categoria" placeholder="categoria">
                <input type="text" class="form-control mb-3" REQUIRED name="Nombre" placeholder="Nombre">    
                <input type="text" class="form-control mb-3" name="Direccion" placeholder="direccion">
                 <input type="text" class="form-control mb-3" REQUIRED name="telefono" placeholder="Telefono">
                
                 <center><input type="submit" class="btn btn-primary " id="btn"></center>
            </form>
</div>

<div class="col-md-8" id="table2" >
<br><br>
    <table class="table" id="table">
     <thead class="table-success table-striped" >
    <tr>
        <th>ID_proveedor</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <tbody>
    
    <tr>
         <th><?php  echo $row['idproveedor']?></th>
         <th><?php  echo $row['categoria']?></th>
         <th><?php  echo $row['Nombre']?></th>
         <th><?php  echo $row['Direccion']?></th>
         <th><?php  echo $row['telefono']?></th>

         <th><a href="actualizarP.php?id=<?php echo $row['idproveedor'] ?>" class="btn btn-info">Editar</a></th>
         <th><a href="deleteP.php?id=<?php echo $row['idproveedor'] ?>" class="btn btn-danger">Eliminar</a></th>
    </tr>
                    
      <?php
        while($row=mysqli_fetch_array($query)){
      ?>
           <tr>
         <th><?php  echo $row['idproveedor']?></th>
         <th><?php  echo $row['categoria']?></th>
         <th><?php  echo $row['Nombre']?></th>
         <th><?php  echo $row['Direccion']?></th>
         <th><?php  echo $row['telefono']?></th>

         <th><a href="actualizarP.php?id=<?php echo $row['idproveedor'] ?>" class="btn btn-info">Editar</a></th>
         <th><a href="deleteP.php?id=<?php echo $row['idproveedor'] ?>" class="btn btn-danger">Eliminar</a></th>
          </tr>
    </tbody>
    <?php
        }
    ?>
                 </table>
             </div>
         </div>  
         <?php  $con->close(); ?>
</body>
</html>