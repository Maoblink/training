<?php

include("conexion2.php");
session_start();

if ($_SESSION){
    
    $idSession = $_SESSION['idSession'];
    $userSession = $_SESSION['userSession'];
    $photoSession = $_SESSION['photoSession'];
    $emailSession = $_SESSION['emailSession'];
    $passwordSession = $_SESSION['passwordSession'];
    $phoneSession = $_SESSION['phoneSession'];
    
    $query = "SELECT * from usuarios where email = '$emailSession' and contrasenias = '$passwordSession'";
    $consulta = mysqli_query($conex,$query);
    $array = mysqli_fetch_array($consulta);
	
    $nameSession = $array['nombre'];
    $lNamesSession = $array['apellidos'];
    $ageSession = $array['edad'];
    $countrySession = $array['pais'];
    $hobiesSession = $array['gustos'];
    
    $query = "SELECT hobie from gustos;";
    $consulta = mysqli_query($conex,$query);
    
    $queryGustos = "SELECT gustos from usuarios where id = $idSession;";
    $consultaGustos = mysqli_query($conex,$queryGustos);
    $consultaGustos = mysqli_fetch_array($consultaGustos);
    $consultaGustos = $consultaGustos['gustos'];
    $consultaGustos = explode(",", $consultaGustos);
    
}

if(isset($_POST['actualizar'])){
        
        $nuevoNombre = trim($_POST['name']);
        $nuevoApellido = trim($_POST['lastName']);
        $query = "UPDATE `usuarios` SET `nombre` = '$nuevoNombre', `apellidos` = '$nuevoApellido' WHERE `usuarios`.`id` = $idSession;";
        $consulta = mysqli_query($conex,$query);
        
    
}

if(isset($_POST['actualizarEdad'])){
    
        $nuevaEdad = trim($_POST['age']);
        $query = "UPDATE `usuarios` SET `edad` = '$nuevaEdad' WHERE `usuarios`.`id` = $idSession;";
        $consulta = mysqli_query($conex,$query);
    
}

if(isset($_POST['actualizarPais'])){
    
        $nuevoPais = trim($_POST['country']);
        $query = "UPDATE `usuarios` SET `pais` = '$nuevoPais' WHERE `usuarios`.`id` = $idSession;";
        $consulta = mysqli_query($conex,$query);
    
}


if(isset($_POST['actualizarGustos'])){
    
    print_r($_POST['hobie']);
    $nuevoGusto = trim($_POST['hobie']);
    $query = "SELECT hobie from gustos;";
    $consulta = mysqli_query($conex,$query);
    
    $e = 0;
    while(mysqli_fetch_array($consulta)){
        $e++;
    }
    
    $consulta = mysqli_query($conex,$query);
    
    $i = 0;
    while ($gusto = mysqli_fetch_array($consulta)){
        $i++;
        if ($gusto != $nuevoGusto && $i != $e){
            continue;
        }
        
        $query = "INSERT INTO `gustos` (`id`, `hobie`) VALUES (NULL, '$nuevoGusto');";
        $consulta = mysqli_query($conex,$query);
        
    }
    
    $query = "UPDATE `usuarios` SET `gustos` = '$hobiesSession,$nuevoGusto' WHERE `usuarios`.`id` = $idSession;";
    $consulta = mysqli_query($conex,$query);
    
}

if(isset($_POST['gusto'])){
    
    unset($consultaGustos[$_POST['id']]);
    $i = 0;
    $consultaGustos = implode(",", $consultaGustos);
    $query = "UPDATE `usuarios` SET `gustos` = '$consultaGustos' WHERE `usuarios`.`id` = $idSession;";
    $consulta = mysqli_query($conex,$query);
}


if(isset($_FILES['iconChange'])){
	if($_FILES['iconChange']['error'] > 0){

	}else{

		$ruta = $_SESSION['iconPerfilSession'];
		unlink($ruta);

		$nom_archivo = $_FILES['iconChange']['name'];
		$ruta = "Imagenes/iconPerfiles/".time().$nom_archivo;
		$archivo = $_FILES['iconChange']['tmp_name'];
		$subir = move_uploaded_file($archivo, $ruta);

		$query = "UPDATE `usuarios` SET `iconPerfil` = '$ruta' WHERE `usuarios`.`id` = $idSession;";
		$consulta = mysqli_query($conex,$query);
	}
}


header("Location: perfil.php");














































?>