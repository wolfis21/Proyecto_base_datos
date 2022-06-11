<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>LOGIN</title>
     <link rel="stylesheet" href="vaidroll.css">	
</head>
<body>
  <div class="cajafuera" align="center">
 
<div class="formulariocaja">
<form method="post" action="Entrar.php" name="vaidrollteam">
<div class="formtitulo">Login</div>
<div align="left" class="textoscajas">&#128273; Ingresar usuario</div>
<input type="text" name="users" class="cajaentradatexto">
<div align="left" class="textoscajas">
&#128274; Ingresar password
</div>
<input type="password" name="password" id="password"
 class="cajaentradatexto">
 <div class="afcheckbox1" align="left">
 <div style="float:left;">
 <input type="checkbox" onclick="verpassword()" >
 </div>
 <div style="float:left;">
 Mostrar contraseña
 </div>
 </div>
 
<input type="submit" value="Iniciar sesión" class="botonenviar">

<div style="margin-top:5%;">¿Necesitas una cuenta?  <a href="Registrarse.php">Registrar</a></div>
</form>
</div>
<div class="autor">
© 2021 Formulario Login. Todos los derechos reservados | Diseño de Isaac Saado 
<div>
</div>
</body>

<script>
  function verpassword(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password")
	  {
          tipo.type = "text";
      }
	  else
	  {
          tipo.type = "password";
      }
  }
</script>

</html>