<?php 
require 'funciones.php';
require '../utilities/getUserData.php';
writeConsole("--------");
writeConsole("createPost PHP");

$user = $_POST["user"];
$text = $_POST["text"];
// $images = $_POST["images"];
$date = time();

if(isset($_FILES["image"])){

	$image = "";

	if($_FILES['image']["error"][0] > 0){
		alert("Error al Subir las Imagenes");
	}else{

		$imageName = $_FILES['image']['name'][0];
		$image = "../Imagenes/publicaciones/".time().$imageName;
		$archivo = $_FILES['image']['tmp_name'][0];
		$subir = move_uploaded_file($archivo, $image);
	}
}

writeConsole("Text: ".$text);
writeConsole("User: ".$user);

$query = "INSERT INTO `posts` (`id`, `user`, `date`, `textPost`, `image`, `engagement`, `nComentarios`) VALUES (NULL, '$user', '$date', '$text', '$image', '0.0.0', '0');";
$ejec = mysqli_query($conex, $query);
writeConsole("Upload post result: $ejec");

$query = "SELECT * FROM posts WHERE user = '$userSession';";
$ejec = mysqli_query($conex, $query);
$postData = mysqli_fetch_array($ejec);
$id = $postData["id"];

echo '<article class="publicacion">

					<div class="row paddingArticle">
						<div class="col-1">
							<img class="perfilPost" src="'.$iconPerfilSession.'" alt="poster">
						</div>
						<div class="col-10 ps-4">
							<h2 class="sidebarBtnFont">'.$nameSession.' '.$lNamesSession.'</h2>
							<h4>Justo Ahora · </h4>
							<img class="postType" src="Imagenes/iconosMenu/postAmigosIcon.png" alt="who?">
						</div>
						<div class="col-1">
							<img class="menuPost" src="Imagenes/iconosMenu/threePointIcon.png" alt="Menu">
						</div>
					</div>';

					if($text != ""){
						echo '<p class="mx-3">'.$text.'</p>';	
					};
					if($image != ""){
						echo '<div class="imagenPost"><img class="border-bottom border-secondary" src="'.$image.'" alt="post"></div>';
					};

					echo '
					<div class="postInteraction border-bottom border-secondary d-flex align-items-center py-1 mx-3">
						<h3 class="mt-1 ms-2"></h3>
						<h3 class="ms-auto">Comentarios</h3>
					</div>

					<div class="d-flex text-center border-bottom border-secondary likeParent mx-3">
						<a class="menuBtnDark sidebarBtnFont like me-1" role="button">
							<img src="Imagenes/iconosMenu/likeOutline.png" alt="Me Gusta"><h3>Me Gusta</h3>
							<div class="rounded-pill interacciones">
								<form>
									<input type="hidden" value="0.1" name="id">
									<a role="button"><img src="Imagenes/iconosMenu/likeIcon.png" alt="Like"></a>
								</form>
								<form>
									<input type="hidden" value="0.2" name="id">
									<a role="button"><img src="Imagenes/iconosMenu/meEncanta.png" alt="Like"></a>
								</form>
								<form>
									<input type="hidden" value="0.3" name="id">
									<a role="button"><img src="Imagenes/iconosMenu/meEmputa.png" alt="Like"></a>
								</form>
							</div>
						</a>
						<a class="menuBtnDark sidebarBtnFont mx-1" role="button"><img src="Imagenes/iconosMenu/comment.webp" alt="Comentar"><h3>Comentar</h3></a>
						<a class="menuBtnDark sidebarBtnFont ms-1" role="button"><img src="Imagenes/iconosMenu/compartirIcon.png" alt="Compartir"><h3>Compartir</h3></a>
					</div>

					<div class="d-flex justify-content-end mx-3">
						<a role="button"><h3>Mas Relevantes</h3><img class="ms-1 p-1" src="Imagenes/iconosMenu/arrowDown.png" alt="Mas Relevantes"></a>
					</div>

	<!-- ****************************************************************************
	*                               Comment Area                               *
	**************************************************************************** -->

					<div class="commentArea mx-3">
						<div class="commentWraper">
						</div>
						<form class="d-flex commentForm" id="commentForm'.$id.'" method="post" action="#">
							<a><img class="avatar" src="'.$iconPerfilSession.'" alt="Perfil"></a>
							<textarea class="flex-fill px-2 mt-1 mb-2 commentBody" placeholder="Escribe un comentario..." type="text" name="commentBody"></textarea>
							<input class="idForm" type="hidden" name="id" value="'.$id.'">
							<input class="userForm" type="hidden" name="user" value="'.$userSession.'">
							<input class="replyForm" type="hidden" name="reply" value="0">
						</form>
					</div>

				</article>';

?>