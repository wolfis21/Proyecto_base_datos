<?php
include("../conexion.php");
$con=conectar();

$Tipo_trailer=$_POST['Tipo_trailer'];
$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$sql="INSERT INTO unidad VALUES('$idUnidad','$Tipo_trailer','$imagen')";
$query= mysqli_query($con,$sql);


if($query){
    Header("Location: unidad.php");
    
}else {
    echo "error de sentencia sql";
}



?>