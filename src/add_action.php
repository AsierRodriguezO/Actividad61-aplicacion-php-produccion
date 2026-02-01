<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
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

<?php
/* Se Comprueba si se ha llegado a esta página PHP a través del formulario de altas. 
Para ello se comprueba la variable de formulario: "inserta" enviada al pulsar el botón Agregar.
Los datos del formulario se acceden por el método: POST
*/

//echo $_POST['inserta'].'<br>';
if(isset($_POST['inserta'])) 
{
/*Se obtienen los datos del usuario/empleado (nombre_usuario, correo, contraseña, nombre, apellido, edad y puesto) a partir del formulario de alta (username, email, password, name, surname, age y job)  por el método POST.

Se envía a través del body del mensaje HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET

Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:

1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['identificador']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$territorios = $mysqli->real_escape_string($_POST['territorios']);
	$batallas = $mysqli->real_escape_string($_POST['batallas']);
	$logros = $mysqli->real_escape_string($_POST['logros']);
	$nacimiento = $mysqli->real_escape_string($_POST['nacimiento']);
	$muerte = $mysqli->real_escape_string($_POST['muerte']);
	$descripcion = $mysqli->real_escape_string($_POST['descripcion']);
	$categoria = $mysqli->real_escape_string($_POST['categoria']);
    if (empty($nacimiento)) {
    $nacimiento = "NULL";} 
	else {
    $nacimiento = intval($nacimiento);}
    if (empty($muerte)) {
    $muerte = "NULL";} 
	else {
    $muerte = intval($muerte);}
	

//Se comprueba si algunos campos del formulario están vacíos. Es decir no tienen ningún valor útil
	if(empty($nombre) || empty($territorios)) 
	{
		if(empty($nombre)) {
			echo "<div>Campo nombre vacío.</div>";
		}
		if(empty($territorios)) {
			echo "<div>Campo territorios conquistados vacío.</div>";
		}
//Enlace a la página anterior
		//Se cierra la conexión
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>Volver atras</a>";
	} //fin si
	else //Sino existen campos de formulario vacíos se procede al alta del nuevo registro
	{
		// Verificar si el nombre ya existe
		$check_sql = "SELECT * FROM conquistadores WHERE nombre = '$nombre'";
		$check_result = $mysqli->query($check_sql);
		if ($check_result->num_rows > 0) {
			echo "<div>El nombre del conquistador ya existe. Por favor, elige otro nombre.</div>";
			$mysqli->close();
			echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
		} else {
	//Se ejecuta una sentencia SQL. Inserta (da de alta) el nuevo registro: insert.
		$sql="INSERT INTO conquistadores (nombre, territorios_conquistados, batallas_principales, logros_principales, ano_nacimiento, ano_muerte, descripcion, categoria) VALUES ('$nombre', '$territorios', '$batallas', '$logros', $nacimiento, $muerte, '$descripcion', '$categoria')";
		//echo 'SQL: ' . $sql . '<br>';
		$result = $mysqli->query($sql);	
		//Se cierra la conexión
		$mysqli->close();
		echo "<div>Conquistador añadido correctamente...</div>";
		echo "<a href='home.php'>Ver resultado</a>";
		//Se redirige a la página home: home.php
		//header("Location:home.php");
		}
	}//fin sino
}
?>
 	
	</main>
</div>
</body>
</html>
