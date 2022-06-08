<?php 

include("../conexion2.php");
include("funciones.php");
session_start();

$id = $_POST['id'];
$user = $_POST["user"];
$reply = $_POST["reply"];
$comment = $_POST["commentBody"];
$date = time();
$fechaComentario = tiempo_pasado($date);

if($reply == 0){
	$class = "commentP";
}else{
	$class = "reply";
};

writeConsole("---------------------");
writeConsole("uploadComment.php");
writeConsole("id = ".$id);
writeConsole("user = ".$user);
writeConsole("reply = ".$reply);
writeConsole("comment = ".$comment);

$query = "INSERT INTO comentarios (id, idComentario, user, date, text, image, reply) VALUES ('$id', NULL, '$user', '$date', '$comment', '', '$reply');";
$ejec = mysqli_query($conex, $query);

$query = "SELECT * FROM comentarios WHERE user = '$user'";
$ejec2 = mysqli_query($conex, $query);
$ejec2 = mysqli_fetch_array($ejec2);

if($ejec){
	echo '
	<div class="'.$class.'" idReply="'.$ejec2["idComentario"].'">
		<div class="commentCore row gx-3">
			<img class="col-auto align-self-start avatar" src="'.$_SESSION["iconSession"].'" alt="Usuario">
			<div class="col-auto comentario p-2">
				<h5 class="commentTitle p-0 m-0">'.$_SESSION["nameSession"].' '.$_SESSION["lNameSession"].'</h5>
				<p class="commentBody p-0 m-0">'.$comment.'</p>
			</div>
			<div class="col-auto commentMenuWraper">
				<div class="commentMenu">
					<a role="button"><img src="../Imagenes/iconosMenu/threePointIcon.png" alt="Menu Comentario"></a>
				</div>
				<ul class="commentMenuBlock btn-group-vertical">';
							echo "<li><a class='btn menuBtnDark deleteComment' role='button'>Eliminar</a></li>
							<li><a class='btn menuBtnDark' role='button'>Editar</a></li>";
						echo '
				</ul>
			</div>
			<div class="w-100"></div>
			<div class="commentEngagement col-6">
				<a class="me-3" role="button"><h6>Me Gusta</h6></a>
				<a class="me-3 replyButton" role="button"><h6>Responder</h6></a>
				<h6 class="">'.$fechaComentario.'</h6>
			</div> 
		</div>
	</div>';
}else{
	echo "KAGASTE";
}

 ?>