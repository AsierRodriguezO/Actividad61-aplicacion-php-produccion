
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
	<header>
		<h1>Mayores conquistadores</h1>
	</header>
	<main>				
	<h2>Registro</h2>

	<!--FORMULARIO DE REGISTRO. Al hacer click en el botón Aceptar, llama a la página: registro_action.php (form action="registro_action.php")-->
	<form action="registro_action.php" method="post">
		<div>
			<label for="email">Correo</label>
			<input type="email" name="email" id="email" placeholder="correo electrónico" required>
		</div>
		<div>
			<label for="username">Usuario</label>
			<input type="text" name="username" id="username" placeholder="nombre usuario" required>
		</div>
		<div>
			<label for="name">Contraseña</label>
			<input type="password" name="password" id="password" placeholder="contraseña" required>
		</div>
		<div>
			<label for="repeat_password">Repetir Contraseña</label>
			<input type="password" name="repeat_password" id="repeat_password" placeholder="repetir contraseña" required>
		</div>
		<div>
			<button type="submit" name="inserta" value="si">Aceptar</button>
			<button type="button" onclick="location.href='index.php'">Cancelar</button>
		</div>
	</form>
	
	</main>	
	<footer>
	<p><a href="login.php">Ya tienes una cuenta? Iniciar sesión (Sign in)</a></p>		
	Created by Asier Rodriguez Ormaechea
  	</footer>
</div>
</body>
</html>