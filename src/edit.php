<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Modificaciones</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div>
	<header>
		<h1>Conquistadores</h1>
	</header>
	
	<main>				
	<h2>Modificación</h2>

	<?php


	/*Obtiene el id del registro del empleado a modificar, identificador, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

	//Recoge el id del empleado a modificar a través de la clave identificador del array asociativo $_GET y lo almacena en la variable identificador
	$identificador = $_GET['identificador'];

	//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
	$identificador = $mysqli->real_escape_string($identificador);


	//Se selecciona el registro a modificar: select
	$sql="SELECT * FROM conquistadores WHERE conquistador_id = $identificador";
	//echo 'SQL: ' . $sql . '<br>';
	$resultado = $mysqli->query($sql);

	//Se extrae el registro y lo guarda en el array $fila
	//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
	$fila = $resultado->fetch_array();
	$nombre = $fila['nombre'];
	$territorios = $fila['territorios_conquistados'];
	$batallas = $fila['batallas_principales'];
	$logros = $fila['logros_principales'];
	$nacimiento = $fila['ano_nacimiento'];
	$muerte = $fila['ano_muerte'];
	$descripcion = $fila['descripcion'];
	$categoria = $fila['categoria'];

	//Se cierra la conexión de base de datos
	$mysqli->close();
	?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php-->

	<form action="edit_action.php" method="post">
		<div>
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php echo $nombre;?>" required>
		</div>
		<div>
			<label for="territorios">Territorios Conquistados</label>
			<textarea name="territorios" id="territorios" required><?php echo $territorios;?></textarea>
		</div>
		<div>
			<label for="batallas">Batallas Principales</label>
			<textarea name="batallas" id="batallas"><?php echo $batallas;?></textarea>
		</div>	
		<div>
			<label for="logros">Logros Principales</label>
			<textarea name="logros" id="logros"><?php echo $logros;?></textarea>
		</div>

		<div>
			<label for="nacimiento">Año Nacimiento</label>
			<input type="number" name="nacimiento" id="nacimiento" value="<?php echo $nacimiento;?>">
		</div>

		<div>
			<label for="muerte">Año Muerte</label>
			<input type="number" name="muerte" id="muerte" value="<?php echo $muerte;?>">
		</div>

		<div>
			<label for="descripcion">Descripción</label>
			<textarea name="descripcion" id="descripcion"><?php echo $descripcion;?></textarea>
		</div>
		<div>
			<label for="categoria">Categoría</label>
			<select name="categoria" id="categoria">
				<option value="Antiguo" <?php if ($categoria == 'Antiguo') echo 'selected'; ?>>Antiguo</option>
				<option value="Medieval" <?php if ($categoria == 'Medieval') echo 'selected'; ?>>Medieval</option>
				<option value="Moderno" <?php if ($categoria == 'Moderno') echo 'selected'; ?>>Moderno</option>
			</select>
		</div>

		<div >
			<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
			<button type="submit" name="modifica" value="si">Aceptar</button>
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

