<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$errores = '';
	$nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
	$edad = filter_var($_POST['edad'], FILTER_SANITIZE_STRING);
	$pais = filter_var($_POST['pais'], FILTER_SANITIZE_STRING);
	$correo = filter_var($_POST['correo'], FILTER_SANITIZE_STRING);


	if(empty($nombre) || empty($edad) || empty($pais) || empty($correo))
	{
		$errores .= 'Todos los campos son obligatorios';
	}

	if($errores == '')
	{
		try
		{
			$conexion = new mysqli('localhost', 'root', '', 'ajax');
			$statement = $conexion->prepare('INSERT INTO usuarios(edad, name, pais, email) VALUES (?,?,?,?)');
			$statement->bind_param('isss', $edad, $nombre, $pais, $correo);
			$statement->execute();
			$resultado = $statement->get_result();
			echo $resultado;

		}
		catch(MYSQLI_SQL_EXCEPTION $e)
		{
			#redirigir a pagina de error
			echo 'error';
		}
	}



}


include('views/index.view.php');
?>