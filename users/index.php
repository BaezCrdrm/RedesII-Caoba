<?php
    ini_set('display_errors', 'Off');
    session_start();
    if (isset($_SESSION['activeSession'])) {
        $nombre = $_SESSION['userName'];
        $apellido = $_SESSION['userLastName'];
        $id = $_SESSION['id'];
        $dep = $_SESSION['departamento'];
        
        //$val hace referencia a la selección del menú por parte del usuario
        $val = $_GET['seleccionAdmin'];
        
        require "../scripts/consultas.php";
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Acceso de <?php echo $nombre;?></title>
        
        <link rel="stylesheet" href="../CSS/General.css">
        <link rel="stylesheet" href="../CSS/User.css">
        <link rel="stylesheet" href="../CSS/MenuAccionesUsuarios.css">
    </head>
        
    <body>
        <header>
            <h1 id="saludo" title="Bonjour">Hola <?php echo $nombre;?></h1>
            <div>
                <h4 id="userId" title="Este eres tú"><?php echo $id;?></h4>
                <a href="../scripts/cerrarSesion.php" title="Cierra tu sesión y vuelve a login">Cerrar sesión</a>
            </div>
        </header>
        
        <section id="content">
            <?php                
                $ruta = "../areas/";
                
                if($dep!='001' && $dep!=null){ 
                    include($ruta."encuentraDocs.php");
                }
                
                switch ($dep) {
                    case '001':
                        include($ruta."Sistemas/Soporte/asignacionEquipos.php");
                        $catch = main($val, $id, $nombre);
                        break;
                        
                    case '002':
                        //include($ruta."Finanzas/finanzas.php");
                        // include($ruta."encuentraDocs.php");
                        main($val, $dep, $nombre, $ruta."Finanzas/");
                        break;
                        
                    case '003':
                        main($val, $dep, $nombre, $ruta."Finanzas/");
                        break;
                        
                    case '004':
                        main($val, $dep, $nombre, $ruta."Finanzas/");
                        break;
                        
                    case '005':
                        main($val, $dep, $nombre, $ruta."Finanzas/");
                        break;
                        
                    case '006':
                        main($val, $dep, $nombre, $ruta."Ventas/");
                        break;
                        
                    case '007':
                        main($val, $dep, $nombre, $ruta."Ventas/");
                        break;
                        
                    case '008':
                        main($val, $dep, $nombre, $ruta."Abastecimiento/");
                        break;
                        
                    case '009':
                        main($val, $dep, $nombre, $ruta."Abastecimiento/");
                        break;
                        
                    case '010':
                        main($val, $dep, $nombre, $ruta."Produccion/");
                        break;
                        
                    case '011':
                        main($val, $dep, $nombre, $ruta."Manufactura/");
                        break;
                    
                    default:
                        echo "<h1>".$nombre.", tu espacio está en <a href='../wip.html'>costrucción</a> y pronto estará disponible.</h1>";
                        break;
                }
            ?>
        </section>
        
        <aside>
            <h1>
                <?php 
                    $ar = $_SESSION['area'];
                    echo trabEsp($ar, true);
                ?>
            </h1>
            <h3>
                <?php 
                    echo trabEsp($dep, false);
                ?>
            </h3>
            
            <div id="menuTrabajoUsuario">
                <form action="">
                    <ul>
                    <?php
                        switch ($dep) {
                            case "001":
                                include("../areas/Sistemas/Soporte/menuSoporte.html");
                                break;
                                
                            // case '002':
                            //     include("../areas/Finanzas/Contabilidad/menuConta.html");
                            //     break;
                            
                            default:
                                include("../plantillas/menuDocumentos.html");
                                break;
                        }
                    ?>
                        <input type="hidden" id="hiddenSelection" name="seleccionAdmin" value="-1" />
                    </ul>
                </form>
            </div>
        </aside>
        <script type="text/javascript" src="../scripts/jsUser.js"></script>
    </body>
</html>
<?php 
    }
    else {
        header("Location:../login");
    }
?>