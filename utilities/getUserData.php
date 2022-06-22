<?php 
$rootServer = realpath($_SERVER["DOCUMENT_ROOT"]);
require "$rootServer/conexion2.php";
session_start();

$idSession = $_SESSION["idSession"];
$query = "SELECT * FROM usuarios WHERE id = '$idSession';";
$ejec = mysqli_query($conex, $query);
$sessionData = mysqli_fetch_array($ejec);

$_SESSION['idSession'] = $sessionData["id"];
$_SESSION['userSession'] = $sessionData["username"];
$_SESSION['nombre'] = $sessionData["nombre"];
$_SESSION['apellidos'] = $sessionData["apellidos"];
$_SESSION['photoSession'] = $sessionData["fotoPerfil"];
$_SESSION['emailSession'] = $sessionData["email"];
$_SESSION['passwordSession'] = $sessionData["contrasenias"];
$_SESSION['phoneSession'] = $sessionData["telefono"];
$_SESSION['iconPerfil'] = $sessionData["iconPerfil"];

$userSession = $_SESSION["userSession"];
$nameSession = $_SESSION["nombre"];
$lNamesSession = $_SESSION["apellidos"];
$photoSession = $_SESSION["photoSession"];
$emailSession = $_SESSION["emailSession"];
$passwordSession = $_SESSION["passwordSession"];
$phoneSession = $_SESSION["phoneSession"];
$iconPerfilSession = $_SESSION["iconPerfil"];

?>