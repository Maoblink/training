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