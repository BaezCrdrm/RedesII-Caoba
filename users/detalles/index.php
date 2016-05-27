<?php
    session_start();
    $cuenta = $_POST['cuenta'];
    $accion = $_POST['accion'];
    $pass = $_POST['password'];
    $areas = array();
    $departamentos = array();
    
    if (isset($_SESSION['activeSession'])) {
    // Agregar función update
        if ($accion=="Detalles") {
            require "../../scripts/consultas.php";
            obtieneAreasDep($areas, $departamentos);
            
            $datos = consultaUsuario($cuenta);
        }
?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Detalles <?php echo $cuenta?></title>
        <link rel="stylesheet" href="../../CSS/FormAlta.css">
    </head>
    
    <body>
        <?php
            if ($accion=="Detalles") {
                include("../../plantillas/registroUsuario.html");                
                echo "<br><a href='../admin/'><button>Regresar</button></a>
                <script type='text/javascript' src='../../scripts/interfaz.js'></script>
                <script type='text/javascript' src='../../scripts/jsUser.js'></script>
                <script type='text/javascript'>
                        var areas = ".json_encode($areas).";
                        var departamentos = ".json_encode($departamentos).";
                        
                        generaFormAlta(areas, departamentos); 
                        var form = document.getElementById('formAlta');
                        form.action = '../../scripts/upd.php';   
                        var lastIdInp = document.createElement('input');
                        lastIdInp.type = 'hidden';
                        lastIdInp.name = 'lastId';
                        lastIdInp.id = 'inpHiddenId';
                        
                        var d = ".json_encode($datos).";
                        lastIdInp.value = d[0];
                        form.appendChild(lastIdInp);
                        preparaFormDetalles(d);
                </script>";
            }
            elseif($accion == "Eliminar") {
                require "../../scripts/baja.php";
                echo "<script type='text/javascript'>";
                if (bajaPersona($cuenta)) {
                    echo "alert('Se ha eliminado correctamente');
                    window.location.href='../admin/';";                    
                }
                else {
                    echo "alert('Hubo un problema');";
                }
                echo "</script>";
            }
        ?>
    </body>
</html>

<?php
    }
    else {
        header("Location:../../login");
    }
?>