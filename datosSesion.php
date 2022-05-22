<?php

session_start();
include("conexion2.php");

$idSession = $_SESSION['idSession'];
$userSession = $_SESSION['userSession'];
$photoSession = $_SESSION['photoSession'];
$emailSession = $_SESSION['emailSession'];
$passwordSession = $_SESSION['passwordSession'];
$phoneSession = $_SESSION['phoneSession'];

$query = "SELECT * from usuarios where email = '$emailSession' and contrasenias = '$passwordSession'";
$consulta = mysqli_query($conex,$query);
$array = mysqli_fetch_array($consulta);

$_SESSION["nameSession"] = $array['nombre'];
$_SESSION["lNamesSession"] = $array['apellidos'];
$_SESSION["ageSession"] = $array['edad'];
$_SESSION["countrySession"] = $array['pais'];
$_SESSION["hobiesSession"] = $array['gustos'];
$_SESSION["iconPerfilSession"] = $array['iconPerfil'];

$nameSession = $array['nombre'];
$lNamesSession = $array['apellidos'];
$ageSession = $array['edad'];
$countrySession = $array['pais'];
$hobiesSession = $array['gustos'];
$iconPerfilSession = $array['iconPerfil'];

$queryGustos = "SELECT gustos from usuarios where id = $idSession;";
$consultaGustos = mysqli_query($conex,$queryGustos);
$consultaGustos = mysqli_fetch_array($consultaGustos);
$consultaGustos = $consultaGustos['gustos'];
$consultaGustos = explode(",", $consultaGustos);
    
$query = "SELECT hobie from gustos;";
$consulta = mysqli_query($conex,$query);

?>