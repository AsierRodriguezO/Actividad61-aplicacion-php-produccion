<?php

include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Registro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<h1>Mayores conquistadores</h1>
	</header>
	<main>

<?php

	//echo $_POST['inserta'].'<br>';
	if(isset($_POST['inserta'])) 
	{
		$email = $mysqli->real_escape_string($_POST['email']);
		$username = $mysqli->real_escape_string($_POST['username']);
		$password = $mysqli->real_escape_string($_POST['password']);
		$repeat_password = $mysqli->real_escape_string($_POST['repeat_password']);
		
		if(empty($email) || empty($username) || empty($password) || empty($repeat_password)) 
		{
			if(empty($email)) {
				echo "<div>Campo correo electrónico vacío.</div>";
			}
			if(empty($username)) {
				echo "<div>Campo nombre de usuario vacío.</div>";
			}
			if(empty($password)) {
				echo "<div>Campo contraseña vacío.</div>";
			}
			if(empty($repeat_password)) {
				echo "<div>Campo repetir contraseña vacío.</div>";
			}
			
			$mysqli->close();
			echo "<a href='javascript:self.history.back();'>Volver atras</a>";
		} //fin si
		else //Sino existen campos de formulario vacíos se procede al alta del nuevo registro
		{
			if($password !== $repeat_password) {
				echo "<div>Las contraseñas no coinciden.</div>";
				$mysqli->close();
				echo "<a href='javascript:self.history.back();'>Volver atras</a>";
			} else {
				// Verificar duplicados
				$check_email = $mysqli->query("SELECT * FROM usuarios WHERE correo = '$email'");
				$check_username = $mysqli->query("SELECT * FROM usuarios WHERE nombre_usuario = '$username'");
				if ($check_email->num_rows > 0) {
					echo "<div>El correo electrónico ya está registrado.</div>";
					$mysqli->close();
					echo "<a href='javascript:self.history.back();'>Volver atras</a>";
				} elseif ($check_username->num_rows > 0) {
					echo "<div>El nombre de usuario ya está registrado.</div>";
					$mysqli->close();
					echo "<a href='javascript:self.history.back();'>Volver atras</a>";
				} else {
					// Hashear password
					$hashed_password = $password;
	//Se ejecuta una sentencia SQL. Inserta (da de alta) el nuevo registro: insert.
					$result = $mysqli->query("INSERT INTO usuarios (correo, nombre_usuario, contrasena) VALUES ('$email', '$username', '$hashed_password')");	
					//Se cierra la conexión
					$mysqli->close();
					//Se redirige a la página principal: index.php
					header("Location:index.php");
				}
			}
		}//fin sino
	}
	?>

		<!--<div>Registro añadido correctamente</div>
		<a href='index.php'>Ver resultado</a>-->
	</main>
</body>
</html>
