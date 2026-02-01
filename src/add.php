<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
	<header>
		<h1>Conquistadores</h1>
	</header>
	<main>				
	<h2>Alta</h2>
<!--FORMULARIO DE ALTA. Al hacer click en el botón Agregar, llama a la página: add.php (form action="add.php")
La página: add.php se encargará de proceder a la inserción del registro en la tabla de empleados
-->

	<form action="add_action.php" method="post">
		<div>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" placeholder="nombre del conquistador" required>
		</div>
		<div>
			<label for="territorios">Territorios Conquistados</label>
			<textarea name="territorios" id="territorios" placeholder="territorios conquistados" required></textarea>
		</div>
		<div>
			<label for="batallas">Batallas Principales</label>
			<textarea name="batallas" id="batallas" placeholder="batallas principales"></textarea>
		</div>
		<div>
			<label for="logros">Logros Principales</label>
			<textarea name="logros" id="logros" placeholder="logros principales"></textarea>
		</div>
		<div>
			<label for="nacimiento">Año Nacimiento</label>
			<input type="number" name="nacimiento" id="nacimiento" placeholder="año nacimiento">
		</div>
		<div>
			<label for="muerte">Año Muerte</label>
			<input type="number" name="muerte" id="muerte" placeholder="año muerte">
		</div>
		<div>
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion" id="descripcion" placeholder="descripción"></textarea>
		</div>
		<div>
			<label for="categoria">Categoría</label>
			<select name="categoria" id="categoria">
				<option value="Antiguo">Antiguo</option>
				<option value="Medieval">Medieval</option>
				<option value="Moderno">Moderno</option>
			</select>
		</div>

		<div>
			<button type="submit" name="inserta" value="si">Aceptar</button>
			<button type="button" onclick="location.href='home.php'">Cancelar</button>
		</div>
	</form>
	
	</main>	
	<footer>
		<p><a href="home.php">Volver</a></p>	
		<p><a href="logout.php">Cerrar sesión (Sign out) <?php echo $_SESSION['username']; ?></a></p>
		Created by Asier Rodriguez Ormaechea
  	</footer>
</div>
</body>
</html>