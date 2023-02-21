<?php include('../modelo/register.php');
include('../modelo/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>credilibranzasjg</title>
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form method="POST" action="" name="register">
   		 <h1>Crear Cuenta</h1>
   		 <input type="text" name="documento" placeholder="Documento" required />
    	 <input type="text" name="nombre" placeholder="Nombre" required />
    	 <input type="text" name="apellido" placeholder="Apellido" required />
  	     <input type="email" name="email" placeholder="Email" required />
    	 <input type="password" name="password" placeholder="Contraseña" required />
     	 <input type="password" name="repassword" placeholder="Confirmar Contraseña" required />
     	 <button type="submit" name="register">Registrate</button>
   		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST" action="" name="login">
			<h1>Iniciar Sesion</h1>
			<input type="text" name="documento" placeholder="Documento" />
			<input type="password"  name="password" placeholder="Contraseña" />
			<a href="#">¿Ha olvidado su contraseña?</a>
			<button type="submit" name="login">Iniciar Sesion</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
			<h1>¡Bienvenido de nuevo!</h1>
			<p>Para mantenerte conectado con nosotros por favor inicia sesión con tus datos personales</p>
				<button class="ghost" id="signIn">Iniciar Sesion</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>¡Hola, amigo!</h1>
				<p>Introduce tus datos personales y empieza a viajar con nosotros</p>
				<button class="ghost" id="signUp">Registrate</button>
			</div>
		</div>
	</div>
</div>
<script src="../js/style.js"></script>
</body>
</html>