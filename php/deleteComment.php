<?php 

include("../conexion2.php");
include("funciones.php");
session_start();

writeConsole("------------------");
writeConsole("deleteComment.php");

$id = $_POST['id'];
writeConsole("idComentario a borrar = ".$id);
$query = "DELETE FROM comentarios WHERE idComentario = $id";
$ejec = mysqli_query($conex, $query);

?>