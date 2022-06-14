<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="Description" content="Ve todas las publicaciones de tus amigos">
	<title>Muro</title>
	
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
	<link rel="stylesheet" href="CSS/main.css">
	<link rel="icon" type="image.x-icon" href="Imagenes/iconosMenu/diceIcon.png">

	<script src="Javascript/jquery.js"></script>
	<script src="Javascript/live.js"></script>
	<script src="Javascript/jquery.autoresize.min.js"></script>
	<script src="Javascript/funciones.js"></script>
	<script src="Javascript/pages/muro.js"></script>

	<script>
		$(document).ready(function(){
			$('textarea').autoResize();

			function listenerCerrar(){
				$(".interacciones").css("display","none");
			};

			$(".like").mouseover(function(){
				if($(".interacciones").css("display") == "block"){
					document.addEventListener("click", listenerCerrar, false);
				}else{
				document.removeEventListener("click",listenerCerrar, false);
				$("div.interacciones", this).css("display","block");}
			});

			$(document).click(function(){
				document.addEventListener("click", listenerCerrar, false);
			})

		})
	</script>
</head>
<body>
	
	<?php
	include 'php/funciones.php';
	include 'datosSesion.php';
	include 'navbar.php';
	?>

<!-- ****************************************************************************
*                             Create Post Form                             *
**************************************************************************** -->

		<form action="" id="creatPostForm">
			<div class="collapse multi-collapse audience-collapse show" id="createPostWrapper">
				<div class="createFormHeader" id="createPostHeader">
					<h3 class="mx-auto">Crear Publicación</h3>
					<button class="closeBtn">X</button>
				</div>

				<div id="createPostBody">
					<div class="row" id="postIfo">
						<img src="<?php echo $iconPerfilSession; ?>" alt="Avatar Perfil" class="col-1 avatarPoster">
						<div id="createPostNameWrapper">
							<h2 id="namePost"><?php echo ($nameSession." ".$lNamesSession); ?></h2>
							<button class="publicBtn" type="button" data-bs-toggle="collapse" data-bs-target=".audience-collapse" aria-expanded="false" aria-controls="#createPostWrapper #audienceMenu">
								<img class="me-2" src="Imagenes/iconosMenu/world.png" alt="Publico">Publico<img class="ms-2" src="Imagenes/iconosMenu/arrowDown" alt="Público">
							</button>
						</div>
					</div>

					<div id="createContentWrapper">
						<textarea name="text" id="creatPostText" placeholder="¿Qué estás pensando, <?php echo ($nameSession); ?>?"></textarea>
					</div>

					<ul class="d-flex" id="createMenuSecondary">
						<li class="me-auto"><a role="button"><img src="Imagenes/iconosMenu/colorRullet.png" alt="Añadir Emojis"></a></li>
						<li><a role="button"><img src="Imagenes/iconosMenu/emoji.png" alt="Añadir Emojis"></a></li>
					</ul>

					<ul class="d-flex justify-content-between" id="createMenu">
						<li><a role="button">Añadir a tu Publicación</a></li>
						<li><button class="circularButton"><img src="Imagenes/iconosMenu/addImage.png" alt="Añadir Imagen"></button></li>
						<li><button class="circularButton"><img src="Imagenes/iconosMenu/etiquetar.png" alt="Etiquetar a un Amigo"></button></li>
						<li><button class="circularButton"><img src="Imagenes/iconosMenu/emoji.png" alt="Añadir Emojis"></button></li>
						<li><button class="circularButton"><img src="Imagenes/iconosMenu/location.webp" alt="Registrar Visita"></button></li>
						<li><button class="circularButton"><img src="Imagenes/iconosMenu/micro.png" alt="Sesión de Preguntas y Respuestas"></button></li>
						<li class="align-self-center" id="createMenuPoints"><button class="circularButton" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="#createPostWrapper #addToPostMenu"><img src="Imagenes/iconosMenu/threePointIcon.png" alt="Más"></button></li>
					</ul>

					<div class="d-grid gap-2" id="createSubmitWrapper">
						<button class="btn btn-primary" id="createSubmit">Publicar</button>
					</div>

				</div>
			</div>

<!-- ****************************************************************************
*                             Add To Post Menu                             *
****************************************************************************  -->

			<div class="collapse multi-collapse" id="addToPostMenu">

				<div class="createFormHeader" id="addToPostHeader">
					<button class="closeBtn" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="#createPostWrapper #addToPostMenu"><img src="Imagenes/iconosMenu/arrowLeft.png" alt="Retroceder"></button>
					<h3>Añadir a tu Publicación</h3>
				</div>

				<ul class="row" id="addToPostOptions">
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/addImage.png" alt="Añadir Imagen/Video"><span>Foto/Video</span></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/etiquetar.png" alt="Etiquetar"><spam>Etiquetar</spam></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/emoji.png" alt="Sentimiento/Adtividad"><span>Sentimiento/Adtividad</span></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/location.webp" alt="Registrar Visita"><span>Registrar Visita</span></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/micro.png" alt="Sesión de Preguntas y Repuestas"><span>Sesión de Preguntas y Repuestas</span></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/flag.webp" alt="Acontecimiento Importante"><span>Acontecimiento Importante</span></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/gif.png" alt="Gif"><span>Gif</span></button></li>
					<li class="col-6 gy-2"><button class="menuBtnDark d-flex gap-2"><img src="Imagenes/iconosMenu/live.png" alt="Directo"><span>Video en Directo</span></button></li>
				</ul>

			</div>

<!-- ****************************************************************************
*                               Audience Menu                              *
****************************************************************************  -->

			<div class="collapse audience-collapse" id="audienceMenu">

				<div class="createFormHeader" id="audienceMenuHeader">
					<button class="closeBtn" type="button" data-bs-toggle="collapse" data-bs-target=".audience-collapse" aria-expanded="false" aria-controls="#createPostWrapper #audienceMenu"><img src="Imagenes/iconosMenu/arrowLeft.png" alt="Retroceder"></button>
					<h3>Seleccionar Audiencia</h3>
				</div>

				<div id="audienceMenuLabel">
					<h4>¿Quién puede ver tu publicación?</h4>
					<p>Tu publicación se mostrará en la sección de noticias, en tu perfil y en los resultados de búsqueda.</p>
				</div>

				<div class="btn-group-vertical" id="audienceMenuOptions" role="group">
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button" id="publicBtn">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/world.png" alt="Público">
						<div>
							<h4>Público</h4>
							<p>Cualquiera dentro y fuera de Facebook</p>
						</div>
						<label class="checkLabel ms-auto">
						  <input type="radio" name="audience" value="publico" class="ms-auto align-self-center">
						  <span class="checkmark"></span>
						</label>
					</button>
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/threeFriends.png" alt="Amigos">
						<div>
							<h4>Amigos</h4>
							<p>Tus Amigos de Facebook</p>
						</div>
						<label class="checkLabel ms-auto">
						  <input type="radio" name="audience" value="publico" class="ms-auto align-self-center">
						  <span class="checkmark"></span>
						</label>
					</button>
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/amigosExcepto.png" alt="Amigos excepto">
						<div>
							<h4>Amigos, Excepto</h4>
							<p>Elige qué amigos pueden ver tus publicaciones</p>
						</div>
						<img class="ms-auto" src="Imagenes/iconosMenu/rightArrowMini.png" alt="amigos excepto">
					</button>
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/persona.png" alt="Amigos concretos">
						<div>
							<h4>Amigos concretos</h4>
							<p>Mostrar solo a algunos amigos</p>
						</div>
						<img class="ms-auto" src="Imagenes/iconosMenu/rightArrowMini.png" alt="amigos excepto">
					</button>
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/lock.webp" alt="Solo yo">
						<div>
							<h4>Solo yo</h4>
						</div>
						<label class="checkLabel ms-auto">
						  <input type="radio" name="audience" value="publico" class="ms-auto align-self-center">
						  <span class="checkmark"></span>
						</label>
					</button>
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/engranaje.png" alt="Personalizada">
						<div>
							<h4>Personalizada</h4>
							<p>Incluir y excluir amigos y listas</p>
						</div>
						<img class="ms-auto" src="Imagenes/iconosMenu/rightArrowMini.png" alt="amigos excepto">
					</button>
					<button class="btn menuBtnDark d-flex gap-2 align-items-center" type="button">
						<img class="marcoCircularBtn" src="Imagenes/iconosMenu/star.png" alt="Mejores amigos">
						<div>
							<h4>Mejores amigos</h4>
							<p>Tu lista personalizada</p>
						</div>
						<label class="checkLabel ms-auto">
						  <input type="radio" name="audience" value="publico" class="ms-auto align-self-center">
						  <span class="checkmark"></span>
						</label>
					</button>
				</div>

			</div>

		</form>

<!-- ****************************************************************************
*                               Left Side Bar                              *
**************************************************************************** -->

	<div class="row mNavbar g-0" id="muroPrincipal">
		<section class="col-3 d-none d-lg-block sideBar mx-0 p-0">k
			<ul class=" me-0 p-0">
				<li class="btn-group-vertical m-0 p-0">
					<button class="btn menuBtnDark"><img class="rounded-circle" src="<?php echo "$iconPerfilSession" ?>" alt="Perfil"> <h2 class="sidebarBtnFont"><?php echo "$nameSession $lNamesSession" ?></h2> </button>
					<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/amigosSidebar.png" alt="Amigos"><h2 class="sidebarBtnFont">Amigos</h2></button>
					<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/groupSidebarIcon.png" alt="Grupos"><h2 class="sidebarBtnFont">Grupos</h2></button>
					<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/marketPlaceSidebar.png" alt="Market Place"><h2 class="sidebarBtnFont">Marketplace</h2></button>
					<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/videosSidebar.png" alt="Videos"><h2 class="sidebarBtnFont">Videos</h2></button>
					<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/recuerdos.png" alt="Recuerdos"><h2 class="sidebarBtnFont">Recuerdos</h2></button>

					<div class="collapse" id="verMasSidebar1">
						<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/recuerdos.png" alt="Recuerdos"><h2 class="sidebarBtnFont">Recuerdos</h2></button>
						<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/recuerdos.png" alt="Recuerdos"><h2 class="sidebarBtnFont">Recuerdos</h2></button>
						<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/recuerdos.png" alt="Recuerdos"><h2 class="sidebarBtnFont">Recuerdos</h2></button>
						<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/recuerdos.png" alt="Recuerdos"><h2 class="sidebarBtnFont">Recuerdos</h2></button>
						<button class="btn menuBtnDark"><img class="rounded-circle" src="Imagenes/iconosMenu/recuerdos.png" alt="Recuerdos"><h2 class="sidebarBtnFont">Recuerdos</h2></button>
					</div>
					<button class="btn menuBtnDark border-bottom border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#verMasSidebar1" aria-expanded="false" aria-controls="verMasSidebar1" ><img class="rounded-circle verMasBtn" src="Imagenes/iconosMenu/arrowDown" alt="Ver Más"><h2 class="sidebarBtnFont">Ver Más</h2></button>
				</li>
			</ul>
			<h1>Tus Accesos Directos</h1>
			<ul class="sidebar2 me-0 p-0">
				<li class="btn-group-vertical m-0 p-0">
					<button class="btn menuBtnDark"><img src="Imagenes/Juegos/dragonCityIcon.png" alt="Dragon City"><h2 class="sidebarBtnFont">Dragon City</h2></button>
					<button class="btn menuBtnDark"><img src="Imagenes/Juegos/subwaySurfersIcon.webp" alt="Subway Surfers"><h2 class="sidebarBtnFont">Subway Surfers</h2></button>
					<button class="btn menuBtnDark"><img src="Imagenes/Juegos/theWitcher.webp" alt="The Witcher"><h2 class="sidebarBtnFont">The Witcher</h2></button>
					<button class="btn menuBtnDark"><img src="Imagenes/Juegos/farmVille2Icon.jpg" alt="Farm Ville"><h2 class="sidebarBtnFont">Farm Ville 2</h2></button>
					<button class="btn menuBtnDark"><img src="Imagenes/Juegos/8BallPoolIcon.png" alt="8 Ball Pool"><h2 class="sidebarBtnFont">8 Ball Pool</h2></button>
					<button class="btn menuBtnDark">Jasper</button>
					<button class="btn menuBtnDark">Jasper</button>
					<button class="btn menuBtnDark">Jasper</button>
					<button class="btn menuBtnDark">Jasper</button>
					<button class="btn menuBtnDark">Jasper</button>	
					<button class="btn menuBtnDark">Jasper</button>
					<button class="btn menuBtnDark">Jasper</button>
				</li>
			</ul>
		</section>

<!-- ****************************************************************************
*                             Sección Principal                            *
**************************************************************************** -->

<!-- ****************************************************************************
*                                  Stories                                 *
***************************************************************************** -->
		<section class="col col-md-9 col-lg-6" id="centralSection">
			<ul class="list-group list-group-horizontal">
				<li class="flex-fill">
					<img class="rounded-circle" src="Imagenes/iconPerfiles/sinIcon.jpg" alt="iconStory">
					<figure class="align-text">
							<img src="Imagenes/placeholders/storyPlaceholder.jpg" alt="">
						<figcaption>Mi Primera Story</figcaption>
					</figure>

				</li>
				<li class="flex-fill">
					<img class="rounded-circle" src="Imagenes/iconPerfiles/sinIcon.jpg" alt="iconStory">
					<figure>
						<img src="Imagenes/placeholders/storyPlaceholder.jpg" alt="">
						<figcaption>Mi Primera Story</figcaption>
					</figure>

				</li>
				<li class="flex-fill">
					<img class="rounded-circle" src="Imagenes/iconPerfiles/sinIcon.jpg" alt="iconStory">
					<figure>
						<img src="Imagenes/placeholders/storyPlaceholder.jpg" alt="">
						<figcaption>Mi Primera Story</figcaption>
					</figure>

				</li>
				<li class="flex-fill">
					<img class="rounded-circle" src="Imagenes/iconPerfiles/sinIcon.jpg" alt="iconStory">
					<figure>
						<img src="Imagenes/placeholders/storyPlaceholder.jpg" alt="">
						<figcaption>Mi Primera Story</figcaption>
					</figure>
				</li>
			</ul>

<!-- ****************************************************************************
*                             Crear Publicación                            *
**************************************************************************** -->

			<article class="row px-4 py-3 mx-auto gy-2 publicacion" id="crearPublicacion">
				<div class="col-12 ms-1 pb-3 row border-bottom border-secondary">
					<a class="col-1" href="perfil.php"> <img class="rounded-circle" id="crearPublicacionPerfil" src="<?php echo "$iconPerfilSession"?>" alt="Perfil"></a>
					<button class="col-11 border-0 rounded-pill" id="btnCreate">¿En qué estás pensando ahora mismo?</button>
				</div>
				<div class="col-6">
					<button class="articleBtnFont menuBtnDark"><img class="my-1 me-3" src="Imagenes/iconosMenu/live.png" alt="Iniciar Directo">Video en Vivo</button>
				</div>
				<div class="col-6">
					<button class="articleBtnFont menuBtnDark"><img class="my-1 me-3" src="Imagenes/iconosMenu/photoIcon.png" alt="Compartir Foto">Foto/Video</button>
				</div>
			</article>

<!-- ****************************************************************************
*                                   Posts                                  *
**************************************************************************** -->
			<?php include 'php/posts.php' ?>
		</section>

<!-- ****************************************************************************
*                              Right Side Bar                              *
****************************************************************************
 -->

		<section class="col-3 d-none d-md-block sideBar">
			<aside class="g-0 border-bottom border-secondary">

				<div class="row ads menuBtnDark w-100 m-0 py-0">
					<div class="col-4 my-auto">
						<img src="Imagenes/ads/adPlaceholder.png" alt="ads" class="img-fluid">
					</div>
					<div class="col-8">
						<div class="card-body">
							<h3 class="card-title">Lorem ipsum, dolor sit amet.</h3>
							<a href="#" class="card-subtitle">www.ads.com</a>
						</div>
					</div>
				</div>

				<div class="row ads menuBtnDark w-100 m-0 py-0">
					<div class="col-4 my-auto">
						<img src="Imagenes/ads/adPlaceholder.png" alt="ads" class="img-fluid">
					</div>
					<div class="col-8">
						<div class="card-body">
							<h3 class="card-title">Lorem ipsum, dolor sit amet.</h3>
							<a href="#" class="card-subtitle">www.ads.com</a>
						</div>
					</div>
				</div>

			</aside>
		</section>
	</div>

	<script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
</body>
</html>