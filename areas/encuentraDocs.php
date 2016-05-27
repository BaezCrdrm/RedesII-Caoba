<?php
    function main($val, $dep, $nombre, $ruta)
    {
        //Escanea directorio
        //  Establece ruta directorio
        //$ruta = "";
        
        switch ($dep) {
            case '002': //Contabilidad general
                $ruta .= "Contabilidad";
                break;
            
            case '003': //Finanzas
                $ruta .= "Finanzas";
                break;
                
            case '004': //Nóminas
                $ruta .= "Nominas";
                break;
                
            case '005': //Tesorería
                $ruta .= "Tesoreria";
                break;
                
            case '006': //Ventas
                $ruta .= "Ventas";
                break;
                
            case '007': //Mercadotecnia
                $ruta .= "Mercadotecnia";
                break;
                
            case '008': //Abastecimiento
                $ruta .= "Abastecimiento";
                break;
                
            case '009': //Compras
                $ruta .= "Compras";
                break;
                
            case '010': //Produccion
                $ruta .= "Produccion";
                break;
                
            case '011': //Diseno
                $ruta .= "Diseno";
                break;
            
            default:
                echo "<h1>".$nombre.", tu espacio está en <a href='../wip.html'>costrucción</a> y pronto estará disponible.</h1>";
                return 0;
                break;
        }
        $ruta .= "/files";
        $myArray = array();
        $myArray = scandir($ruta);
        
        $myArray = regresaRutas($myArray, $ruta);
        $cadena = "<h1 id='tituloDocs'>Tus documentos</h1><ul>";
        
        for ($i=0; $i < count($myArray); $i++) { 
            $file = explode("/", $myArray[$i]);
            $cadena .= "<li onclick=\"muestraArchivo('".$myArray[$i]."')\" class='docs'><a href='#' target='_self'>".$file[count($file) - 1]."</a></li>";
        }
        
        $cadena .= "</ul>";
        echo $cadena;
    }
    
    function regresaRutas($tempArray, $ruta)
    {
        $arreglo = array();
        for ($i=0, $j=2; $j < count($tempArray); $i++, $j++) { 
            $arreglo[$i] = $ruta."/".$tempArray[$j];
        }
        return $arreglo;
    }
?>