<nav class="navbar navbar-expand fixed-top navegacionTop">
            <div class="container-fluid">
                <a class="navbar-brand p-0 m-0" href="Index.php"><img src="Imagenes/iconosMenu/diceIcon.png" alt="Home" id="brandIcon"></a>

<!-- ****************************************************************************
*                              Navbar Collapse                             *
**************************************************************************** -->

                <div class="collapse navbar-collapse navbarColapso">
                    <form class="d-flex">
                        <input class="form-control rounded-pill" style="background: rgba(47, 47, 47, 1); border-color: rgba(116, 116, 116, 1); color: rgba(116, 116, 116, 1);" type="search" placeholder="Busqueda" aria-label="search">
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item px-1">
                            <a class="btn menuBtn px-0"  aria-current="page" role="button" href="#">
                                <img src="Imagenes/iconosMenu/homeIcon.png" alt="Home">
                            </a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="btn menuBtn px-0" role="button" href="#">
                                <img src="Imagenes/iconosMenu/videoIcon.png" alt="Videos">
                            </a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="btn menuBtn px-0" role="button" href="#">
                                <img src="Imagenes/iconosMenu/marketplaceIcon.png" alt="Marketplace">
                            </a>
                        </li>
                        <li class="nav-item px-1">
                            <a class="btn menuBtn px-0" role="button" href="#">
                                <img src="Imagenes/iconosMenu/groupIcon.jpg" alt="Grupos">
                            </a>
                        </li>
                    </ul>
                </div>

<!-- ****************************************************************************
*                            Navbar No Collapse                            *
**************************************************************************** -->

                <ul class="navbar-nav navbarOut">
                    <li class="nav-item px-1 rounded-pill">
                        <a class="btn seleccionado rounded-pill px-0" role="button" href="#">
                            <img class="rounded-circle ms-1 me-2" src="<?php if ($iconPerfilSession == ""){echo "imagenes/iconPerfiles/sinIcon.jpg";}else{echo "$iconPerfilSession";} ?>" alt="Perfil"><p class="me-3"><?php echo "$nameSession" ?></p>
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn menuBtn rounded-circle px-0" role="button" href="#">
                            <img class="rounded-circle mx-2 navBtnCircle" src="Imagenes/iconosMenu/navMenu.png" alt="Menu">
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn menuBtn rounded-circle px-0" role="button" href="#">
                            <img class="rounded-circle mx-2 navBtnCircle" src="Imagenes/iconosMenu/messengerIcon.png" alt="Home">
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn menuBtn rounded-circle px-0" role="button" href="#">
                            <img class="rounded-circle mx-2 navBtnCircle" src="Imagenes/iconosMenu/notiIcon.png" alt="Home">
                        </a>
                    </li>
                    <li class="nav-item px-1">
                        <a class="btn menuBtn rounded-circle px-0" role="button" href="#">
                            <img class="rounded-circle mx-2 navBtnCircle" src="Imagenes/iconosMenu/arrowDown.png" alt="Home">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>