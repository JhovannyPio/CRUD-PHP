<?php
        header('Content-type: application/json');
        include 'conexion.php';
        
        mysql_query("delete from empleado where id_empleado=".$_GET['id'])
        or die(mysql_error());
?>