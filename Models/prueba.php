<?php
require_once "connection.php";

$p= connection::Conexion()->prepare('SELECT * FROM usuarios');
$p->execute();

$error = $p->errorInfo();

$data = $p->fetch(PDO::FETCH_ASSOC);

print_r($data);

?>