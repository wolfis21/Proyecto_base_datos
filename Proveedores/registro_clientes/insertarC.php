<?php
include("../conexion.php");
$con=conectar();

$idCliente=$_POST['idCliente'];
$NombreC=$_POST['NombreC'];
$ApellidoC=$_POST['ApellidoC'];
$TelefonoC=$_POST['TelefonoC'];
$direccionC=$_POST['direccionC'];

$sql2="SELECT * FROM cliente WHERE idCliente='$idCliente'";
$query2=mysqli_query($con,$sql2);

if($query2 ->num_rows >0){
    ?>    
    <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h1>CLIENTE YA REGISTRADO</h1>
   <br>
    <br>
    <form action="clientes.php">
    <input type="submit" class="btn btn-primary" value="<--" id="btn">
</form>
    </center>
<?php

}else{
$sql="INSERT INTO cliente 
         VALUES('$idCliente','$NombreC','$ApellidoC','$TelefonoC','$direccionC')";

$query= mysqli_query($con,$sql);

    Header("Location: clientes.php");
}

?>