<?php
    function main($val, $id, $nombre)
    {
        switch ($val) {
            case 1:
                echo asgnacionGenEquipos();
                break;
                
            case 2:
                include("../plantillas/registroEquiposUsuarios.html");
                echo "<h1>".$nombre.", tu espacio está en <a href='../wip.html'>costrucción</a> y pronto estará disponible completamente.</h1>";
                return leeEquipos($id);
                break;
            
            default:
                //echo "<h1>".$nombre.", tu espacio está en <a href='../wip.html'>costrucción</a> y pronto estará disponible.</h1>";
                return 0;
                break;
        }
    }
?>