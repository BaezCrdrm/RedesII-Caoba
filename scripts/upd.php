<?php
    $area = $_POST["area"];
    $departamento = $_POST["deps"];
    $direccion = $_POST["direccion"];
    $subd = $_POST["subdominio"];
    $nombre = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fecha = $_POST["fecha"];
    $id = $direccion."@".$subd;
    $lastId = $_POST['lastId'];
    $det = $_POST['detalles'];
    $pass = $_POST["password"];
    
    require "consultas.php";
    $query = "UPDATE usuarios SET id='".$id."', nombre='".$nombre."', apellidos='".$apellidos."', fechaNac='".$fecha."' WHERE id='".$lastId."';";
    $consulta = genQuery($query);
    
    $good = false;
    
    if ($consulta == true) {
        $query = "UPDATE trabDeps SET idArea='".$area."', idDep='".$departamento."', descripcion='".$det."' WHERE idTrab='".$id."';";
        if($consulta = genQuery($query))
        {
            $good = true;
        }
    }
    
    if($consulta == true && $good==true && $pass != "")
    {
        $query = "UPDATE passwords SET password='".sha1($pass)."' WHERE user='".$id."';";
        if($consulta = genQuery($query))
        {
            $good = true;
        }
    }
    
    echo "<script type='text/javascript'>";
    if ($consulta == true  && $good = true) {
        echo "alert('Se actualizó correctamente');";
    }
    else {
        echo "alert('Hubo un problema al actualizar');";
    }
    echo "window.location.href='../users/admin/';
    </script>";
?>