<?php
    include("../conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM factura,ventas";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Facturado</title>
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

<body align="center">
<div class="col-md-3" id="table">
 
      <h1>Facturado</h1>

           <form action="insertarF.php" method="POST">

                <label for="start"></label>
                <input type="date" class="form-control mb-3" id="start" REQUIRED name="Fecha_fact">
                <input type="text" class="form-control mb-3" REQUIRED name="impuesto_m" placeholder="Impuesto en % material">
              <input type="text" class="form-control mb-3" REQUIRED name="impuesto_o" placeholder="Impuesto en % obra">
              <br>
              ID_Venta:  
              <select REQUIRED name="idventas">
        <option value="0">Seleccione:</option>
        <?php
          $query2 = $con -> query ("SELECT * FROM ventas");
          while ($row2 = mysqli_fetch_array($query2)) {
            echo '<option selected="selected" >' .$row2['idventas'].'</option>';
          }
        ?>
        </select>
        <br><br>
                 <input type="submit" class="btn btn-primary" id="btn">
            </form>
</div>
<?php  $con->close(); ?>
</body>

</html>