<?php
    $area = $_POST["area"];
    $departamento = $_POST["deps"];
    $direccion = $_POST["direccion"];
    $subd = $_POST["subdominio"];
    $nombre = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fecha = $_POST["fecha"];
    $id = $direccion."@".$subd;
    $pass = $_POST["password"];
    
    $query = "INSERT INTO usuarios (id, nombre, apellidos, fechaNac) values ('".$id."', '".strtoupper($nombre)."', '".strtoupper($apellidos)."', '".$fecha."'); "; 
    
    $myBool = true;
    require "consultas.php";
    if(!genQuery($query))
    {
        $myBool = false;
    }
    $query = "INSERT INTO trabDeps (idTrab, idArea, idDep) values ('".$id."', '".$area."', '".$departamento."');";
    if(!genQuery($query) && $myBool == true)
    {
        $myBool=false;
    }
    $query = "INSERT INTO passwords (user, password) values ('".$id."', '".sha1($pass)."');";
    if(!genQuery($query) && $myBool == true)
    {
        $myBool=false;
    }
    
    echo "<script type='text/javascript'>";
    if ($myBool == true) {
        echo "alert('Se ha registrado correctamente al nuevo usuario');";
    }
    else {
        echo "alert('Hubo un problema al realizar la operación');";
    }
    echo "window.location.href='../users/admin';
    </script>";
?>