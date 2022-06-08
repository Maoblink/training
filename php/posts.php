<?php 

$query = "SELECT * from posts";
$consulta = mysqli_query($conex,$query);

 ?>

<?php 

$idReply = 1;
$idForm = 1;
while ($post = mysqli_fetch_array($consulta)) {

	$query = "SELECT * from usuarios where username = '".$post['user']."'";
	$ask = mysqli_query($conex,$query);
	$poster = mysqli_fetch_array($ask);

	$reacciones = $post['engagement'];
	$reacciones = explode(".",$reacciones);
	$reacciones = array(intval($reacciones[0]), intval($reacciones[1]), intval($reacciones[2]));
	$reaccionesCuenta = $reacciones[0] + $reacciones[1] + $reacciones[2];
	arsort($reacciones);

	$query = "SELECT * FROM comentarios WHERE id = '".$post['id']."' AND reply < 1";
	$ask = mysqli_query($conex,$query);

	$fechaPost = $post["date"];
	$fechaPost = tiempo_pasado($fechaPost);

	echo
	 '<article class="publicacion">

					<div class="row paddingArticle">
						<div class="col-1">
							<img class="perfilPost" src="'.$poster["iconPerfil"].'" alt="poster">
						</div>
						<div class="col-10 ps-4">
							<h2 class="sidebarBtnFont">'.$poster["nombre"].' '.$poster["apellidos"].'</h2>
							<h4>'.$fechaPost.' · </h4>
							<img class="postType" src="Imagenes/iconosMenu/postAmigosIcon.png" alt="who?">
						</div>
						<div class="col-1">
							<img class="menuPost" src="Imagenes/iconosMenu/threePointIcon.png" alt="Menu">
						</div>
					</div>';

					if($post["textPost"] != ""){
						echo '<p class="mx-3">'.$post["textPost"].'</p>';	
					};

					if($post["image"] != ""){
						echo '<div class="imagenPost"><img class="border-bottom border-secondary" src="'.$post["image"].'" alt="post"></div>';
					};

					echo '
					<div class="postInteraction border-bottom border-secondary d-flex align-items-center py-1 mx-3">
						';
						reset($reacciones);

						while ($i =  current($reacciones)){
							if (key($reacciones) == 0 && $i > 0 ){
								echo '<img src="Imagenes/iconosMenu/likeIcon.png" alt="Like">';
							}else if(key($reacciones) == 1 && $i > 0){
								echo '<img src="Imagenes/iconosMenu/meEncanta.png" alt="Like">';
							}else if(key($reacciones) == 2 && $i > 0){
								echo '<img src="Imagenes/iconosMenu/meEmputa.png" alt="Like">';
							}
							next($reacciones);
						};
						  echo '
						<h3 class="mt-1 ms-2">'.$reaccionesCuenta.'</h3>
						<h3 class="ms-auto">'.$post["nComentarios"].' Comentarios</h3>
					</div>

					<div class="d-flex text-center border-bottom border-secondary likeParent mx-3">
						<a class="menuBtnDark sidebarBtnFont like me-1" role="button">
							<img src="Imagenes/iconosMenu/likeOutline.png" alt="Me Gusta"><h3>Me Gusta</h3>
							<div class="rounded-pill interacciones">
								<form>
									<input type="hidden" value="'.$post["id"].'.1" name="id">
									<a role="button"><img src="Imagenes/iconosMenu/likeIcon.png" alt="Like"></a>
								</form>
								<form>
									<input type="hidden" value="'.$post["id"].'.2" name="id">
									<a role="button"><img src="Imagenes/iconosMenu/meEncanta.png" alt="Like"></a>
								</form>
								<form>
									<input type="hidden" value="'.$post["id"].'.3" name="id">
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
						<div class="commentWraper">';
							
							$idComentario = 1;

							while($comentarios = mysqli_fetch_array($ask)){

								$query = "SELECT * FROM usuarios WHERE username = '".$comentarios['user']."'";
								$askUser = mysqli_query($conex,$query);
								$commentUser = mysqli_fetch_array($askUser);

								$fechaComentario = tiempo_pasado($comentarios["date"]);

								echo 
								'<div class="commentP" idReply="'.$comentarios["idComentario"].'" id="comentario'.$comentarios["idComentario"].'">
									<div class="commentCore row gx-3">
										<img class="col-auto align-self-start avatar" src="'.$commentUser["iconPerfil"].'" alt="Usuario">
										<div class="col-auto comentario p-2" id="bloque'.$idComentario.'">
											<h5 class="commentTitle p-0 m-0">'.$commentUser["nombre"].' '.$commentUser["apellidos"].'</h5>
											<p class="commentBody p-0 m-0">'.$comentarios["text"].'</p>
										</div>
										<div class="col-auto commentMenuWraper">
											<div class="commentMenu">
												<a role="button"><img src="../Imagenes/iconosMenu/threePointIcon.png" alt="Menu Comentario"></a>
											</div>
											<ul class="commentMenuBlock btn-group-vertical">';
													if($commentUser["username"] == $_SESSION["userSession"]){
														echo "<li><a class='btn menuBtnDark deleteComment' role='button'>Eliminar</a></li>
														<li><a class='btn menuBtnDark' role='button'>Editar</a></li>";
													}else{
														echo "<li><a class='btn menuBtnDark' role='button'>Ocultar Comentario</a></li> 
														<li><a class='btn menuBtnDark' role='button'>Ocultar Comentario</a></li>";
													};
													echo '
											</ul>
										</div>
										<div class="w-100"></div>
										<div class="commentEngagement col-6" reply="false" id="engagement'.$comentarios["idComentario"].'">
											<a class="me-3" role="button"><h6>Me Gusta</h6></a>
											<a class="me-3 replyButton" role="button"><h6>Responder</h6></a>
											<h6 class="">'.$fechaComentario.'</h6>
										</div> 
										<div class="w-100"></div> 
									</div>';


									$query = "SELECT * FROM comentarios WHERE reply = ".$comentarios['idComentario']."";
									$askReply = mysqli_query($conex,$query);
									$i = 0;
									$e = 0;
									$idComentario++;


									while($respuestas = mysqli_fetch_array($askReply)){
										$query = "SELECT * FROM usuarios WHERE username = '".$respuestas['user']."'";
										$askUser = mysqli_query($conex,$query);
										$replyUser = mysqli_fetch_array($askUser);
										$fechaComentario = tiempo_pasado($respuestas["date"]);
						
										echo
										'<img class="hilo" id="hilo'.$idReply.'" src="Imagenes/iconosMenu/lineaComentarioVertical.png" alt="line">
										<img class="" id="curva'.$idReply.'" src="Imagenes/iconosMenu/lineaCurvaComentario.png" alt="line">
										<div class="reply" idReply="'.$respuestas["idComentario"].'" id="comentario'.$respuestas["idComentario"].'">
											<div class="commentCore row gx-3">
												<img class="col-auto align-self-start avatar" src="'.$replyUser["iconPerfil"].'" alt="Alucard">
												<div class="col-auto comentario p-2" id="bloque'.$idComentario.'">
													<h5 class="commentTitle p-0 m-0">'.$replyUser["nombre"]." ".$replyUser["apellidos"].'</h5>
													<p class="commentBody p-0 m-0">'.$respuestas["text"].'</p>
												</div>
												<div class="col-auto commentMenuWraper">
													<div class="commentMenu">
														<a role="button"><img src="../Imagenes/iconosMenu/threePointIcon.png" alt="Menu Comentario"></a>
													</div>
													<ul class="commentMenuBlock btn-group-vertical">';
															if($replyUser["username"] == $_SESSION["userSession"]){
																echo "<li><a class='btn menuBtnDark deleteComment' role='button'>Eliminar</a></li>
																<li><a class='btn menuBtnDark' role='button'>Editar</a></li>";
															}else{
																echo "<li><a class='btn menuBtnDark' role='button'>Ocultar Comentario</a></li> 
																<li><a class='btn menuBtnDark' role='button'>Ocultar Comentario</a></li>";
															};
															echo '
													</ul>
												</div>
												<div class="w-100"></div>
												<div class="commentEngagement col-6">
													<a class="me-3" role="button"><h6>Me Gusta</h6></a>
													<h6 class="">'.$fechaComentario.'</h6>
												</div>
											</div>
										</div>';
										$idTarget = $idComentario - 1;
										?> <script> 
											obtenerAltura(<?php echo "'#comentario".$respuestas["reply"]." #bloque".$idTarget."', '#comentario".$respuestas['reply']." #hilo".$idReply."', 'height', ".$i.", ".$e; ?>)
											obtenerAltura(<?php echo "'#comentario".$respuestas["reply"]." #bloque".$idTarget."', '#comentario".$respuestas['reply']." #curva".$idReply."', 'top', ".$i.", ".$e; ?>) </script> <?php
										$i = $i + 30;
										$idReply++;
										$idComentario++;
										$e++;
									};
									echo'
								</div>';
							};

						echo '</div>
						<form class="d-flex commentForm" id="commentForm'.$idForm.'" method="post" action="#">
							<a><img class="avatar" src="'.$iconPerfilSession.'" alt="Perfil"></a>
							<textarea class="flex-fill px-2 mt-1 mb-2 commentBody" placeholder="Escribe un comentario..." type="text" name="commentBody"></textarea>
							<input class="idForm" type="hidden" name="id" value="'.$post["id"].'">
							<input class="userForm" type="hidden" name="user" value="'.$userSession.'">
							<input class="replyForm" type="hidden" name="reply" value="0">
						</form>';
						$idForm++;
						echo '
					</div>

				</article>';
}

?>
