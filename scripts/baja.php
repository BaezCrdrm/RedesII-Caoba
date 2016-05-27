<?php
    function bajaPersona($id)
    {
        $query = "DELETE FROM usuarios WHERE id='".$id."'";
        require "consultas.php";
        $myBool = genQuery($query);
        return $myBool;
    }
?>