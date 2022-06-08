<?php
include("conexion2.php");

if (isset($_POST['registro'])) {

    if (strlen($_POST['password']) >= 1 && strlen($_POST['email']) >= 1){
    
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $username = trim($_POST['user']);
        $phone = trim($_POST['phone']);
        $photo = trim($_POST['photo']);
        $consulta = "INSERT INTO usuarios (id, username, email, contrasenias, fotoPerfil, telefono, nombre, apellidos, pais, edad, gustos, iconPerfil) VALUES (NULL, '$username', '$email', '$password', '$photo', '$phone', '', '', '', '0', '', '');";
        $resultado = mysqli_query($conex,$consulta);
        if ($resultado){
            
            ?>
            <h3>¡Te has Registrado Correctamente!</h3>
            <?php
            
        }else{
            
            ?>
            <h3>¡Ops Ha ocurrido un error!</h3>
            <?php
            
        }
    }else{
        
        ?>
        <h3>Por favor, complete el formulario</h3>
        <?php
        
    }
}

if (isset($_POST['login'])){
    
    if (strlen($_POST['passwordLog']) >= 1 && strlen($_POST['emailLog']) >= 1){
        
        session_start();
        $emailLog = trim($_POST['emailLog']);
        $passwordLog = trim($_POST['passwordLog']);
        $query= "SELECT * from usuarios where email = '$emailLog' and contrasenias = '$passwordLog'";
        $consulta = mysqli_query($conex,$query);
        $array = mysqli_fetch_array($consulta);
        
        $_SESSION['idSession'] = $array['id'];
        $_SESSION["emailSession"] = $array['email'];
        $_SESSION["userSession"] = $array['username'];
        $_SESSION["passwordSession"] = $array['contrasenias'];
        $_SESSION["phoneSession"] = $array['telefono'];
        $_SESSION["photoSession"] = $array['fotoPerfil'];
        $_SESSION["nameSession"] = $array['nombre'];
        $_SESSION["lNameSession"] = $array['apellidos'];
        $_SESSION["countrySession"] = $array['pais'];
        $_SESSION["ageSession"] = $array['edad'];
        $_SESSION["hobiesSession"] = $array['gustos'];
        $_SESSION["iconSession"] = $array['iconPerfil'];
        
        if($array){
            
            /*print_r($_SESSION);*/
            header('Location: index.php');
            
        }else{
            
            echo "incorrecto";
            
        }
        
    }
    
}
?>








































































