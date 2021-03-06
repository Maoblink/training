<?php
session_start();
print_r($_SESSION);

if ($_SESSION){
    
    $userSession = $_SESSION['userSession'];
    $photoSession = $_SESSION['photoSession'];
    
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>The Dungeon Master's Maze</title>
    <meta name="Description" content="Todo lo que necesitas para preparar tu sesión de rol"/>
    <meta name="Keywords" content="Rol, DM, Vampiro, D&D"/>
    <link rel="stylesheet" href="CSS/Estilos principal.css"/>
</head>

<body>
	
<!-- --------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------- BANNER ------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------>
    
    <header>
         <img src="Imagenes/Banner Principal rol.png" alt="Banner" class="bannerprincipal" />
    </header>

<!-- --------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------ BARRA DE NAVEGACIÓN ----------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------>
	
    <nav>
            <ul class="navegacion">
                <li><a href="">Inicio</a></li>
                <li>
                    <a href="">Recursos</a>
                    <ul>
						
                        <li><a href="">Recurso1</a>
                            <ul>
                                <li><a href="">SubRecurso1</a></li>
                            </ul>
                        </li>
						
                        <li><a href="">Recurso2</a></li>
                        <li><a href="">Recurso3</a></li>
                        <li><a href="">Recurso4</a></li>
						
                    </ul>
                </li>
                <li><a href="">Aventuras</a>
                    <ul>
						
                        <li><a href="">Aventura1</a></li>
                        <li><a href="">Aventura2</a></li>
                        <li><a href="">Aventura3</a></li>
                        <li><a href="">Aventura4</a></li>
						
                    </ul>
                </li>
                <li class="problematico"><a href="">Noticias</a>
                    <ul>
						
                        <li><a href="">Noticia1</a></li>
                        <li><a href="">Noticia2</a></li>
                        <li><a href="">Noticia3</a></li>
                        <li><a href="">Noticia4</a></li>
						
                    </ul>
                </li>
                <li class="problematico"><a href="login.php"><?php if ($_SESSION){echo "$userSession";}else{echo "Iniciar Session";} ?></a>
                    <ul>
                        <?php
                        if ($_SESSION){
                            echo "
                            <li><a href='perfil.php'>Mi Perfil</a></li>
                            <li><a href='cerrarSesion.php'>Cerrar Sesión</a></li>
                            ";
                        }
                        ?>
                    </ul>
                </li>
            </ul>
    </nav>
    
<!-- --------------------------------------------------------------------------------------------------------------------------------------
------------------------------------------------------------- PANEL PRINCIPAL -------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------>
	
    <section class="covertura">
        
    
        <article class="artis1">
            
            <h2>Ya Disponible la Nueva Campaña de DnD</h2>
            
            <p>lorem Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
        
            <img  class="articulos" src="Imagenes/327192_Dance_By_Caroline_Gariba.png" alt="D&D"/>
        
        </article>
        
      <article class="artis2">
            
            <h2>Los Secretos de Lasombra</h2>
            
            <p>lorem Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
        <img  class="articulos2" src="Imagenes/312112-world-darkness-es-cancelado.jpg" alt="WOD"/>
        
        </article>
        
        <article class="artis1">
            
            <h2>Termina Pre-Compra de Robotta</h2>
            
            <p>lorem Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
        
            <img  class="articulos" src="Imagenes/anuncio-1-ROBOTTA.jpg" alt="Robotta"/>
        
        </article>
        
        <article class="artis2">
            
            <h2>Las Razas mas Raras de DnD</h2>
            
            <p>lorem Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
        
            <img  class="articulos2" src="Imagenes/D&D 2.jpg" alt="D&D 2"/>
        
        </article>
        
    
    </section>
    
<!-- --------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------- ADS ---------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------>
	
    <aside class="bannerlaterales">
        
        <img src="Imagenes/plantilla-diseno-banner-sorteo_96807-438.jpg" alt="Sorteo" />
        
        <img src="Imagenes/wonder-day-among-us-hd-wallpaper-35.jpg" alt="among us" />
        
    </aside>
	
<!-- --------------------------------------------------------------------------------------------------------------------------------------
----------------------------------------------------------------- FOOTER ------------------------------------------------------------------
------------------------------------------------------------------------------------------------------------------------------------------>
    
    <footer>
        
        <form>
        
            <h3>¡Subscribete a Nuestro Boletín Rolero!</h3>
            
            <div>
            
                <label for="correo" id="etiquetacorreo">Email:</label>
                
                <br/>
                
                <input type="email" name="email" id="correo" />
            
                <br/>
            
                <label for="nombre">Nombre:</label>
                
                <br/>
                
                <input type="text" id="nombre"/>
            
            </div>
        
        </form>
        
            <div id="copyright">    
        
                <h4>Derechos de Copyright:</h4>
            
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea quod officia recusandae, nulla natus eos nisi nobis, commodi nam, consequatur aperiam porro delectus officiis aspernatur laboriosam illum eum quia mollitia.</p>
            
            </div>
        
    </footer>

    
    <script src="Javascript/Efectos Principal.js" type="text/javascript"></script>
    
</body>
    
</html>
