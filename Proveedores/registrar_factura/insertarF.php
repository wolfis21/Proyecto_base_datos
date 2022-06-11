<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../estilos.css" rel="stylesheet">
    <title>Document</title>
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
<?php
include("../conexion.php");
$con=conectar();

$idfactura="";
$Fecha_fact=$_POST['Fecha_fact'];
$ventas_idventas=$_POST['idventas'];
$impuesto_m=$_POST['impuesto_m'];
$impuesto_o=$_POST['impuesto_o'];

if($impuesto_m > 0 ||$impuesto_o > 0){

$sql="INSERT INTO factura VALUES('$idfactura','$ventas_idventas','$Fecha_fact','$impuesto_m','$impuesto_o')";
$query= mysqli_query($con,$sql);


    $sql2="SELECT f.idfactura,v.Cliente_idCliente, c.NombreC,c.ApellidoC,c.Telefono,c.direcciónC, u.Tipo_trailer,u.imagen, v.cant_t+(v.cant_t*((f.impuesto_m+f.impuesto_o)/100))
     FROM cliente c, ventas v, factura f, unidad u WHERE c.idCliente=v.Cliente_idCliente AND v.Unidad_idUnidad=u.idUnidad AND f.ventas_idventas=v.idventas AND f.ventas_idventas='$ventas_idventas'";
            
?>
<center>
                <br><br>
                <h1>Factura</h1>
                        <br><br>
<div class="col-md-8" id="table2">
    <table class="table" id="table">
     <thead class="table-success table-striped" >
    <tr>
        <th>ID_FACTURA</th>
        <th>ID_CLIENTE</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>TELEFONO</th>
        <th>DIRECCION</th>
        <th>TIPO DE TRAILER</th>
        <th>IMAGEN</th>
        <th>MONTO A PAGAR</th>
        
    </tr>
    </thead>
<!--para hacer un muestreo de inventario-->
    <tbody>
      <?php
          $query2=mysqli_query($con,$sql2);
          $row2=mysqli_num_rows($query2);
          $row=mysqli_fetch_array($query2);

                  if(!$query2){
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
                          <td>',$row[3],'</td>
                          <td>',$row[4],'</td>
                          <td>',$row[5],'</td>
                          <td>',$row[6],'</td>';
                            ?>

<td><img height="120px" src=" data:images/jpg;base64,<?php echo base64_encode($row[7]);?>" /></td>
                          <td><?php echo $row[8]?></td>
                          </tr>
                          <?php
                          $row = mysqli_fetch_array($query2);
                        }
                    }
                    }
        ?>
    </tbody>
                 </table>
             </div>
        
        </center>
<?php
}else{
    ?>
       <div id="table">
       <br>
       <center><h1> ERROR!!</h1> </center>
       </div>
       <center>
       <h1>NO PUEDE PONER IMPUESTOS NEGATIVOS</h1>   
      <br>
      <h2>Vuelva a registrar</h2>
       <br>
       <form action="factura.php">
       <input type="submit" class="btn btn-primary" value="<--" id="btn">
   </form>
       </center>
       <?php
   }
?>
<br><br>
<form action="../index_r/index.php">
<input type="submit" class="btn btn-primary" id="btn" value="Salir">
</form>

<?php  $con->close(); ?>
</body>
</html>
