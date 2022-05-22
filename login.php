<?php include("registro.php");?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
    <link href="bootstrap-5.1.3-dist/css/bootstrap.css" rel="stylesheet"/>
    <style>
    
        .card{
            margin: auto;
        }
        
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
        }
        
    </style>
</head>
<body>
    
    <div class="card" style="width: 29rem;">
        <div class="card-header">
            <p>
              <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="true" aria-controls="loginForm collapseExample">
                Registro/Log In
              </button>
            </p>
        </div>
        <div class="card-body">
            <div class="collapse show multi-collapse"  id="collapseExample">
                <h5 class="card-title" style="text-align: center;">Registro</h5>
                  <div class="container">
                    <form class="row g-3" method="post">
                      <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="inputEmail4">
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="inputPassword4">
                      </div>
                        <div class="col-1 align-self-end">
                            <input type="number" class="form-control" id="telCodigo">
                        </div>
                      <div class="col-5">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="tel" class="form-control" id="telefono" name="phone" placeholder="Número de Telefono">
                      </div>
                      <div class="col-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="user" id="username" placeholder="Username">
                      </div>
                      <div class="col-md-7">
                        <label for="fotoPerfil" class="form-label">Foto de perfil</label>
                        <input type="file" class="form-control" name="photo" id="fotoPerfil">
                      </div>
                      <div class="col-12">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="check" id="terminosCheck">
                          <label class="form-check-label" for="gridCheck">
                            Acepto los terminos de uso
                          </label>
                        </div>
                      </div>
                        <div class="col-6">
                            <button class="btn btn-success" type="submit" name="registro" value="Resgisrar">Registrarse</button>

                        </div>
                    </form>
                </div>
              </div>
            <div class="collapse multi-collapse" id="loginForm">
                <h5 class="card-title" style="text-align: center;">Log In</h5>
                <form class="row g-3" method="post">
                    <div class="col-12">
                        <label for="emailLog" class="form-label">Email</label>
                        <input type="text" class="form-control" name="emailLog" id="emailLog">
                    </div>
                    <div class="col-12">
                        <label for="passwordLog" class="form-label">Password</label>
                        <input type="password" class="form-control" name="passwordLog" id="passwordLog">
                    </div>
                    <button class="btn btn-success" type="submit" name="login" value="LogIn">Log In</button>
                
                </form>
            </div>
        </div>
        </div>
    </div>

    
    
    
    <script src="bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
</body>
</html>