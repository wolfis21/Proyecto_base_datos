<?php 
    include("conexion.php");
    $con=conectar();

    $users=$_POST['users'];
    $password=$_POST['password'];

    $sql="SELECT * FROM login_u WHERE users='$users'";
    $query=mysqli_query($con,$sql);

    if($query->num_rows >0){
        ?>
    <div id="table">
    <br>
    <center><h1> ERROR!!</h1> </center>
    </div>
    <center>
    <h1>USUARIO YA EXISTENTES</h1>
   <br>
   <h2>intente con otro</h2>
    <br>
    <form action="Registrarse.php">
    <input type="submit" class="btn btn-primary" value="<--" id="btn">
</form>
        <?php
    }else{
        $sql2="INSERT INTO login_u VALUES('$id_users','$users','$password')";
        $query2= mysqli_query($con,$sql2);

    Header("Location: index.php");
    }
?>