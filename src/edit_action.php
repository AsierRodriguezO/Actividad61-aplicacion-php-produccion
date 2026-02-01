<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
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

<?php
/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/

//echo $_POST['modifica'].'<br>';
if(isset($_POST['modifica'])) {
/*Se obtienen los datos del empleado (id, nombre, apellido, edad y puesto) a partir del formulario de edición (identificador, name, surname, age y job)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['identificador']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$identificador = $mysqli->real_escape_string($_POST['identificador']);
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

//Se comprueba si existen campos del formulario vacíos
	if(empty($nombre) || empty($territorios)) 
	{
		if(empty($nombre)) {
			echo "<div>Campo nombre vacío.</div>";
		}
		if(empty($territorios)) {
			echo "<div>Campo territorios conquistados vacío.</div>";
		}
		$mysqli->close();
		echo "<a href='javascript:self.history.back();'>Volver atras</a>";
	} //fin si
	else //Se realiza la modificación de un registro de la BD. 
	{
		//Se actualiza el registro a modificar: update
		$sql="UPDATE conquistadores SET nombre = '$nombre', territorios_conquistados = '$territorios', batallas_principales = '$batallas', logros_principales = '$logros', ano_nacimiento = $nacimiento, ano_muerte = $muerte, descripcion = '$descripcion', categoria = '$categoria' WHERE conquistador_id = $identificador";
		//echo 'SQL: ' . $sql . '<br>';
		$mysqli->query($sql);
		$mysqli->close();
        echo "<div>Conquistador editado correctamente...</div>";
		echo "<a href='home.php'>Ver resultado</a>";
        //Se redirige a la página principal: home.php
        //header("Location: home.php");
	}// fin sino
}//fin si
?>

    
	</main>	
</div>
</body>
</html>

