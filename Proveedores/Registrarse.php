<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="../estilos.css" rel="stylesheet">

    <title>Registrarse</title>
</head>
<style>
    #pag{
        background-color: #d5ffff;
    }
    #btn{
        background-color: #579FDB;
    }
    #registro{
        background-color: #5dc1b9;
        border-radius:15px;
    }
</style>
<body id="pag">
    <br><br>
    <center>
<div class="col-md-3" id="registro">
    <br><br>
      <h1>Registrar Usuario</h1>
    
           <form action="ingresar_users.php" method="POST">

                <input type="text" class="form-control mb-3" REQUIRED name="users" placeholder="Usuario">
                <input type="text" class="form-control mb-3" REQUIRED name="password" placeholder="Contrasena">
                <br>
                
                 <center><input type="submit" class="btn btn-primary " id="btn"></center>
           <br>
                </form>
            <form action="index.php">
            <input type="submit" class="btn btn-primary " id="btn" value="Atras">
            </form>
</div>
</center>
</body>

</html>
