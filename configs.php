<?php
/*if($_SERVER['REMOTE_ADDR'] != '188.83.107.94'){
    //ocultar erros
    error_reporting(0);
    ini_set('display_errors', 0);
}
else{
    //mostrar
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}*/


$server = 'localhost';
$user = 'root';
$password = '';
$db = 'website_project';

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error)
    die("Connection error: ".$conn->connect_error);

?>