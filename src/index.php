<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Mayores conquistadores</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
	<header>
		<h1>Mayores conquistadores</h1>
	</header>

	<main>
	
	<?php
	session_start();
	//Si el usuario ya ha iniciado sesión se le redirige a la página home.php
	if (isset($_SESSION['username'])) {
		header("Location: home.php");
		exit();
	}
	?>
	<p><a href="login.php">Iniciar sesión (Sign in)</a></p>
	<p><a href="registro.php">Registrarse (Sign up)</a></p>

	</main>
	<footer>
    	Created by Asier Rodriguez Ormaechea
  	</footer>
</div>
</body>
</html>
