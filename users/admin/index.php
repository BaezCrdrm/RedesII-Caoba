<?php 
    ini_set('display_errors', 'Off');
    session_start();
    if (isset($_SESSION['activeSession'])) {
        //$val hace referencia al menú que se mostrará
        $val = $_POST['seleccionAdmin'];
        $areas = array();
        $departamentos = array();
        
        switch ($val) {
            case 1:
                require "../../scripts/consultas.php";
                obtieneAreasDep($areas, $departamentos);
                break;
                
            case 2:
                # code...
                break;
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Acceso administrador</title>
        
        <link rel="stylesheet" href="../../CSS/General.css">
        <link rel="stylesheet" href="../../CSS/Admin.css">
        <link rel="stylesheet" href="../../CSS/FormAlta.css">
        <link rel="stylesheet" href="../../CSS/MenuAccionesUsuarios.css">
    </head>
        
    <body>
        <header>
            <h1 id="saludo" title="You talkin' to me'">Hola admin</h1>
            
            <a href="../../scripts/cerrarSesion.php">Cerrar sesión</a>
        </header>
        
        <aside>
            <h2>Menú</h2>
            
            <h3>Usuarios</h3>
            <form action="" method="post">
                <ul>
                    <li id="u1" onclick="evUsuarios(this)"><input type="submit" value="Registrar usuario"/></li>
                    <li id="u2" onclick="evUsuarios(this)"><input type="submit" value="Usuarios registrados"/></li>
                    <input type="hidden" id="hiddenSelection" name="seleccionAdmin" value="-1" />
                </ul>
            </form>
        </aside>
        
        <section id="content">
            <?php
               if ($val==1) {
                   include("../../plantillas/registroUsuario.html");
                   
                   echo "<script type='text/javascript' src='../../scripts/interfaz.js'></script>
                <script type='text/javascript'>
                        var areas = ".json_encode($areas).";
                        var departamentos = ".json_encode($departamentos).";
                        
                        generaFormAlta(areas, departamentos); 
                        var form = document.getElementById('formAlta');
                        form.action = '../../scripts/alta.php';
                        document.getElementById('divDetalles').style.display = 'none';    
                </script>";
               }
               elseif ($val==2) {
                   require "../../scripts/consultas.php";
                   echo "<h1 id='tituloUsuarios'>Usuarios</h1>";
                   echo muestraUsuarios();
               }
            ?>
        </section>
        
        <footer>
            
        </footer>
    </body>
    <script type="text/javascript" src="../../scripts/jsUser.js"></script>
</html>

<?php
    }
    else {
        header("Location:../../login");
    }
?>