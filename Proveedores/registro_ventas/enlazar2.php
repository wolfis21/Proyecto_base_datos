<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>Proceso</title>
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
	<li><a href=""><img height="80px" src=../imagen/logo.jpg></a></li>
    <li><a href="../registro_proveedores/proveedor.php"> Agregar Proveedores</a></li>
    <li><a href="../registro_material/material.php"> Agregar Materiales</a></li>
    <li><a href="../registro_compra/compra.php">Hacer compras</a></li>
	<li><a href="revisarM2.php">Inventario</a></li>
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
include ("../conexion.php");
$con=conectar();

$idventas="";
$Unidad_idUnidad=$_POST['idUnidad'];
$Cliente_idCliente=$_POST['idCliente'];
$cant_t=0;

$sql="INSERT INTO ventas VALUES('$idventas','$Unidad_idUnidad','$Cliente_idCliente','$cant_t')";
$query= mysqli_query($con,$sql);

if($query){
    $sql2="SELECT um.Unidad_idUnidad, um.Material_idMaterial, m.nombre_m, um.cant_unidad, m.valor_m, um.cant_unidad * m.valor_m
    FROM unidad_material um, unidad u, material m 
    WHERE um.Material_idMaterial=m.idMaterial AND u.idUnidad=um.Unidad_idUnidad AND idUnidad='$Unidad_idUnidad'";

    $query2=mysqli_query($con,$sql2);
    $row2=mysqli_fetch_array($query2)
?>
<center>
<br><br>
<h1> Orden de Venta</h1>
<br><br>

    <div class="col-md-8" id="table2">
    <table class="table" id="table">
     <thead class="table-success table-striped" >
    <tr>
        <th>Unidad_idUnidad</th>
        <th>Material_IDMaterial</th>
        <th>nombre_m</th>
        <th>cant_unidad</th>
        <th>valor c/u</th>
        <th>monto</th>
    
    </tr>
    </thead>
    <tbody>
      <?php     
            while($row=mysqli_fetch_array($query2)){
                ?>
                     <tr>
                   <th><?php  echo $row['Unidad_idUnidad']?></th>
                   <th><?php  echo $row['Material_idMaterial']?></th>
                   <th><?php  echo $row['nombre_m']?></th>
                   <th><?php  echo $row['cant_unidad']?></th>
                   <th><?php  echo $row['valor_m']?></th>
                   <th><?php  echo $row['um.cant_unidad * m.valor_m']?></th>
                   <?php
                    $cant_t = $cant_t + $row['um.cant_unidad * m.valor_m'];
                   ?>
                     </tr>
                </tbody>
    <?php
    }
    $sql3="UPDATE ventas SET cant_t='$cant_t' 
    WHERE Unidad_idUnidad='$Unidad_idUnidad' AND Cliente_idCliente='$Cliente_idCliente'";
    $query3=mysqli_query($con,$sql3);
    if(!$query3){
        echo "error";
    }
}

?>

                </table>
                <br>
                <div align="left">
                    <?php print"<h2>Monto de Orden: ".$cant_t."<h2>";?>
                </div>
                </div>
            
             </center>
             <?php  $con->close(); ?>
            </body>
</html>