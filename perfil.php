<?php include("datosSesion.php")?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Perfil</title>
        <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="CSS/main.css"/>
        
        <script src="Javascript/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="Javascript/buscadorSelector.js"></script>
		<script src="Javascript/live.js"></script>
        
        <script>
            $(document).ready(function(){
				
				function listenerCerrar(){
					$(".hiddenMenu").css("display","none");
				};
				
				$("#cancelarIcon").click(function(){
					$(".absoluteCentering").css("display", "none");
				});
				
                $("#generalBtn").click(function(){
                    $("#infoGeneral").collapse("show");
                    $("#gustosInfo,#contactoInfo").collapse("hide");
                });
                $("#gustosBtn").click(function(){
                    $("#gustosInfo").collapse("show");
                    $("#infoGeneral,#contactoInfo").collapse("hide");
                });
                $("#contactoBtn").click(function(){
                    $("#contactoInfo").collapse("show");
                    $("#gustosInfo,#infoGeneral").collapse("hide");
                });
				
				
				$("#iconPerfil").click(function(){
					if($(".hiddenMenu").css("display") == "block"){
						document.addEventListener("click", listenerCerrar, false);
					}else{
					document.removeEventListener("click",listenerCerrar, false);
					$(".hiddenMenu").css("display","block");}
				});
				$(document).click(function(){
					document.addEventListener("click", listenerCerrar, false);
				})
				
				$("#actualizarMenu").click(function(){
					$(".absoluteCentering").css("display", "block");
				})
            });
			
        </script>
        
    </head>

    <body style="background-color: #171516;">
        
<!-- ****************************************************************************
*                                Top Navbar                                *
**************************************************************************** -->

        <?php include 'navbar.php' ?>

<!-- ****************************************************************************
*                          Subir Imagen de Perfil                          *
**************************************************************************** -->

		<form class="absoluteCentering" method="post" action="actualizarDatos.php" style="background-color: #171516;" enctype="multipart/form-data">
			<input class="form-control" type="file" name="iconChange" id="iconChange"/>
			<div class="row justify-content-between">
				<button class="btn btn-secondary col-4 ms-3" type="button" id="cancelarIcon">Cancelar</button>
				<button class="btn btn-secondary col-4 me-3" type="submit">Cambiar</button>
			</div>
		</form>

<!-- ------------------------------------------------------------------------
----------------------------------- BANNER ----------------------------------
---------------------------------------------------------------------------->
		
        <section class="infoCard marginSeccion" style="border-color: #171516;" id="seccionBanner">
			
            <header class="border-secondary" style="max-height: 18em;">
                <img class="card-img-top" src="<?php if($photoSession == ""){echo "Imagenes/Portadas/placeholder.png";}else{echo "$photoSession";} ?>">
                <button class="btn btn-light"><img src="Imagenes/iconosMenu/cameraIcon.png" alt=""> Editar Foto de Portada</button>

                <img class="rounded-circle img-fluid" alt="Imagen de Perfil" id="iconPerfil" src="<?php if ($iconPerfilSession == ""){echo "imagenes/iconPerfiles/sinIcon.jpg";}else{echo "$iconPerfilSession";} ?>"/>
                <div class="d-flex">
                    <h1 class="" id="icon"><?php echo "$nameSession $lNamesSession" ?></h1>
                </div>  

<!-- ****************************************************************************
*                        Botones para Editar Perfil                        *
****************************************************************************  -->

                <div class="d-flex flex-row-reverse" id="editBtn">
                    <button class="btn btn-secondary"><img src="Imagenes/iconosMenu/editIcon.png" alt="Editar"> Editar Perfil</button>
                    <button class="btn btn-primary me-2"><img src="Imagenes/iconosMenu/hobieInfo.png" alt="Añadir"> Añadir a la Historia</button>
                </div>

<!-- ****************************************************************************
*                                  Navbar                                  *
**************************************************************************** -->

                <nav class="navegacion">
                    <ul class="list-group list-group-horizontal">
                        <li class="btn-group me-auto">
                            <button class="btn menuBtn" id="nav1">Información</button>
                            <button class="btn menuBtn" id="nav2">Amigos</button>
                            <button class="btn menuBtn" id="nav3">Fortos</button>
                            <button class="btn menuBtn" id="nav4">Publicaciones</button>
                            <button class="btn menuBtn" id="nav5">Visitas</button>
                            <button class="btn menuBtn" id="nav6">Videos</button>
                        </li>
                        <li>
                            <button class="btn menuBtn p-1"><img class="p-0 m-1" src="Imagenes/iconosMenu/menuIcons.png" alt="menu"></button>
                        </li>
                    </ul>
                </nav>

<!-- ****************************************************************************
*                           Menu Actualizar Icon                           *
**************************************************************************** -->

                <ul class="list-group hiddenMenu" id="menuOculto">
                    <li class="list-group-item p-0 m-0"><a class="btn py-0" role="button" id="actualizarMenu">Actualizar Foto de Perfil</a></li>
                    <li class="list-group-item p-0 m-0"><a class="btn py-0" href="#" role="button">Ver Foto de Perfil</a></li>
                </ul>
            </header>
        </section>
        
<!-- ----------------------------------------------------------------
---------------- TARJETA DE INFORMACION DE PERFIL -------------------
-------------------------------------------------------------------->
        
        <div class="card infoCard mx-auto marginSeccion" id="seccionInfo">
            <h2 class="card-header">Información</h2>
            <div class="row" style="border: none;">
                        
<!-- ----------------------------------------------------------------
------------------------- BOTONES DE NAVEGACIÓN ---------------------
----------------------------------------------------------------- -->
					
				<nav class="col-md-4">
                	<ul class="list-group list-group-flush infoCard">
                    	<li class="list-group-item infoCard m-0 p-0"><button class="btn menuBtn" type="button" autofocus id="generalBtn">Información General</li>
                    	<li class="list-group-item infoCard m-0 p-0"><button class="btn menuBtn" type="button" id="gustosBtn">Intereses</button></li>
                    	<li class="list-group-item infoCard m-0 p-0"><button class="btn menuBtn" type="button" id="contactoBtn">Contacto</button></li>    
                	</ul>
                </nav>
				
<!-- ------------------------------------------------------------------
---------------------------INFORMACIÓN GENERAL-------------------------
------------------------------------------------------------------- -->
                        
				<div class="col-md-8" id="cartaInfo">
                    <div class="card infoCard">
                        <ul class="list-group list-group-flush collapse show " id="infoGeneral">
                            <li class="list-group-item infoCard" style="border: none;">
                                <div class="infoCard">
                                    <form class="collapse multi-collapse infoCard <?php if($nameSession == ""){echo "show"; }?> collapse-horizontal" id="nameForm" method="post" action="actualizarDatos.php">
                                        <div class="card-body row">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" placeholder="Nombre:">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="lastName" placeholder="Apellidos:">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-secondary" type="submit" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="true" aria-controls="nameForm nameInfo" name="actualizar">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                                    
<!-- -------------------------------------------------------------------------------
-----------------------------INFORMACIÓN GENERAL NOMBRE-----------------------------
-------------------------------------------------------------------------------- -->
                                
                                <div class="collapse infoCard <?php if($nameSession != ""){echo "show"; } ?> multi-collapse collapse-horizontal" id="nameInfo">
                                    <div class="row align-items-center">
                                        <div class="col-2 bg-secundary align-items-start icon">
                                            <img src="Imagenes/iconosMenu/nameForm.png" class="img-fluid" alt="Nombre y Apellidos">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="card-title" style="font-size: 1em;"><?php echo "$nameSession $lNamesSession" ?></h3>
                                        </div>
                                    </div>
                                </div>
                            
                            </li>
                            
<!-- ------------------------------------------------------------------------
------------------------------EDAD FORMULARIO--------------------------------
------------------------------------------------------------------------- -->
                            
                            <li class="list-group-item infoCard listaInfo">
                                <div>
                                    <form class="collapse multi-collapse <?php if($ageSession == 0){echo "show"; }?> collapse-horizontal" id="ageForm" method="post" action="actualizarDatos.php">
                                        
                                        <div class="card-body row">
                                            <div class="col-sm-3">
                                                <input type="number" class="form-control" name="age" placeholder="Edad:">
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-secondary" type="submit" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="true" aria-controls="ageForm ageInfo" name="actualizarEdad">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                                
<!-- ---------------------------------------------------------------------------------
--------------------------------EDAD DATOS--------------------------------------------
---------------------------------------------------------------------------------- -->
                                
                                <div class="collapse <?php if($ageSession != 0){echo "show"; } ?> multi-collapse collapse-horizontal" id="ageInfo">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-2 infoCard icon">
                                            <img src="Imagenes/iconosMenu/ageInfo.png" class="img-fluid" alt="Edad">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="card-title" style="font-size: 1em;"><?php echo "$ageSession Años" ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
<!-- ---------------------------------------------------------------------------
---------------------------------PAÍS FORMULARIO--------------------------------
---------------------------------------------------------------------------- -->
                            
                            <li class="list-group-item infoCard listaInfo">
                                <div>
                                    <form class="collapse multi-collapse <?php if($countrySession == ""){echo "show"; }?> collapse-horizontal" id="countryForm" method="post" action="actualizarDatos.php">
                                        <div class="card-body row">
                                            <div class="col-sm-7">
                                                <select name="country" class="form-select">
                                                    <option selected>Elige Pais</option>
                                                    <option>Venezuela</option>
                                                    <option>Albania</option>
                                                    <option>USA</option>
                                                    <option>Brazil</option>
                                                    <option>Alezkar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-secondary" type="submit" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="true" aria-controls="countryForm countryInfo" name="actualizarPais">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                                
<!-- -------------------------------------------------------------
----------------------PAÍS DATOS----------------------------------
-------------------------------------------------------------- -->
                                
                                <div class="collapse <?php if($countrySession != ""){echo "show"; } ?> multi-collapse collapse-horizontal" id="countryInfo">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-2 infoCard icon">
                                            <img src="Imagenes/iconosMenu/countryInfo.png" class="img-fluid" alt="País">
                                        </div>
                                        <div class="col-8">
                                            <h3 class="card-title" style="font-size: 1em;"><?php echo "$countrySession" ?></h3>
                                        </div> 
                                    </div>
                                </div>
                            </li>
                        </ul>
                        
<!-- ----------------------------------------------------------------------
--------------------------FORMULARIO INTERESES-----------------------------
-------------------------------------------------------------------------->
                        
                        <ul class="list-group list-group-flush collapse" data-parent="#infoShow" id="gustosInfo">
                            <li class="list-group-item infoCard">
                                <div>
                                    <form class="collapse collapse-horizontal" id="hobieForm" method="post" action="actualizarDatos.php">
                                        <div class="card-body row">
                                            <div class="col-sm-10">
                                                <select name="hobie" class="form-select mi-selector">
                                                    <option selected>Hobbys</option>
                                                    <?php
                                                    echo 'dfsfesfefewfewfwe'.$consultaGustos;
                                                    while ($valores = mysqli_fetch_array($consulta)){
                                                        foreach($consultaGustos as $gusto){
                                                            print_r($consultaGustos." = ".$gusto);
                                                            if($gusto == $valores['hobie']){
                                                                continue 2;
                                                            }
                                                        }
                                                        echo '<option>'.$valores['hobie'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-secondary" type="submit" data-bs-toggle="collapse" data-bs-target="#hobieForm" aria-expanded="true" aria-controls="hobieForm" name="actualizarGustos" id="guardar">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                                
<!-- -------------------------------------------------------------------
-------------------------INTERESES DATOS--------------------------------
-------------------------------------------------------------------- -->
                                
                                <h2 class="card-title">Intereses</h2>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-2 infoCard icon">
                                            <img src="Imagenes/iconosMenu/hobieArrow.png" class="img-fluid" alt="País">
                                        </div>
                                        <div class="col-8">
                                            <ul class="list-group">
                                                <?php 
                                                $i = 0;
                                                foreach ($consultaGustos as $gusto){
                                                echo 
                                                '<li class="list-group-item listaInfo infoCard">
                                                    <div class="container mx-0 px-0 row">
                                                        <h3 class="col-10">'
                                                            .$gusto.'
                                                        </h3>
                                                        <form class="col-2 p-0 m-0 eliminar" method="post" action="actualizarDatos.php">
                                                            <input type="hidden" value="'.$i.'" name="id">
                                                            <button class="btn btn-secundary p-0 m-0 equisBtn" type="submit" name="gusto">
                                                                <img src="Imagenes/iconosMenu/xIcon.png" class=" m-0 p-0" alt="Hobie">
                                                            </button>
                                                        </form>    
                                                    </div>
                                                </li>';
                                                $i = $i + 1;
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="row g-3 align-items-center">
                                    <div class="col-2 infoCard icon">
                                        <img src="Imagenes/iconosMenu/hobieInfo.png" class="img-fluid" alt="Hobie">
                                    </div>
                                    <div class="col-8">
                                        <a class="card-title" data-bs-toggle="collapse" href="#hobieForm" role="button" aria-expanded="false" aria-controls="hobieForm">Añadir Nuevos Hobbie</a>
                                    </div>    
                                </div>     
                            </li>
                        </ul>
                        
<!--------------------------------------------------------------------
-----------------------------INFORMACIÓN CONTACTO---------------------
--------------------------------------------------------------------->
                        
                        <ul class="list-group list-group-flush listaInfo collapse" data-parent="#infoShow" id="contactoInfo">
                            <li class="list-group-item infoCard" style="overflow-x: hidden">
                                <div class="row g-3 align-items-center infoCard">
                                    <div class="col-2 infoCard icon">
                                        <img src="Imagenes/iconosMenu/emailIcon.png" class="img-fluid" alt="Email">
                                    </div>
                                    <div class="col-8 infoCard">
                                        <h3 class="card-title"><?php echo "$emailSession" ?></h3>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item infoCard" style="overflow-x: hidden">
                                <div class="row g-3 align-items-center infoCard">
                                    <div class="col-2 infoCard icon">
                                        <img src="Imagenes/iconosMenu/phoneIcon.png" class="img-fluid" alt="Phone">
                                    </div>
                                    <div class="col-8 infoCard">
                                        <h3 class="card-title"><?php echo "$phoneSession" ?></h3>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
    </body>
    
</html>