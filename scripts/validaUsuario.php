<?php
    $usuario = $_POST["user"];
    $pass = $_POST["password"];
    require "consultas.php";
    
    $passQuery = "SELECT user, password FROM passwords WHERE user='".$usuario."';";
    $reg=mysqli_fetch_array(genQuery($passQuery), MYSQLI_NUM);
    
    if($usuario == $reg[0] && sha1($pass) == $reg[1])
    {
        $userQuery="SELECT * FROM usuarios WHERE id='".$usuario."';";
        $user=mysqli_fetch_array(genQuery($userQuery), MYSQLI_NUM);
        
        session_start();
        $_SESSION['userName'] = $user[1];
        $_SESSION['activeSession'] = true;
        $direccion = "";
        //Admin
        if ($usuario == "admin@caoba.com" && sha1($pass) == $reg[1]) {
            $direccion .= "admin";
        } 
        else { //Mortal
            $_SESSION['id'] = $usuario;
            $_SESSION['userLastName'] = $user[2];
            $_SESSION['userBirthday'] = $user[3];
            
            $queryArea = "SELECT idArea, idDep FROM trabDeps WHERE idTrab='".$usuario."'";
            $userArea = mysqli_fetch_array(genQuery($queryArea), MYSQLI_NUM);
            
            $_SESSION['area'] = $userArea[0];
            $_SESSION['departamento'] = $userArea[1];
        }
        header("Location:../users/".$direccion);     
    }
    else {
        echo "<script>
                alert('Hubo un problema al solicitar el acceso con este usuario.');
                window.history.back();
            </script>";
    }
?>