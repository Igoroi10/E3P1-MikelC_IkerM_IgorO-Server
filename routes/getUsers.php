<?php
require_once (__DIR__."/../controller/Controller.php");

$result = $user->getUsers();

//devolvemos el resultado de la BD como JSON
echo json_encode($result);

?>