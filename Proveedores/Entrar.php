<?php 
    include("conexion.php");
    $con=conectar();

    $users=$_POST['users'];
    $password=$_POST['password'];

    $sql="SELECT * FROM login_u WHERE users='$users' AND password='$password'";
    $query=mysqli_query($con,$sql);

    if(!$query->num_rows >0){
        ?>
    <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h2>Contrasena y/o usuario son incorrectos o no existen!!</h2>
    <br>
    <form action="index.php">
    <input type="submit" class="btn btn-primary" value="<--" id="btn">
</form>
        <?php
    }else{
    Header("Location: index_r/index.php");
    }
?>