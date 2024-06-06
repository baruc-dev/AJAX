<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla de usuarios con AJAX</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<header>
			<h1>Tabla de Usuarios</h1>
			<div>
				<!-- <button id="btn_cargar_usuarios" class="btn active">Cargar Usuarios</button> -->
			</div>
		</header>
		<main>
			<form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="formulario" class="formulario">
				<input type="text" name="nombre" id="nombre" placeholder="Nombre">
				<input type="text" name="edad" id="edad" placeholder="Edad">
				<input type="text" name="pais" id="pais" placeholder="Pais">
				<input type="email" name="correo" id="correo" placeholder="Correo">
				<button type="submit" class="btn">Agregar</button>
			</form>
			<div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div>
			<table id="tablamain" class="tabla">
				<tr id="hermano">
					<th>ID</th>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Pais</th>
					<th>Correo</th>
				</tr>

			<table id="tabla" class="tabla">
				

               
			</table>
			<div class="loader" id="loader"></div>
		</main>
	</div>
	<script src="js/main.js"></script>
</body>
</html>