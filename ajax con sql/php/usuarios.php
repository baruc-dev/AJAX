<?php

try
{

    $conexion = new mysqli('localhost', 'root', '', 'ajax');
    $statement = $conexion ->prepare('SELECT * FROM usuarios');
    $statement->execute();
    $statement->bind_result($_id, $edad, $name, $pais, $email);
    $respuesta = array();
    while($statement->fetch())
    {
        $respuesta[] = array('_id' => $_id, 'edad' => $edad, 'name' => $name, 'pais' => $pais, 'email' => $email);
    }

    echo json_encode($respuesta);

}
catch(MYSQLI_SQL_EXCEPTION $e)
{
    header('Location: error.php');
}






?>