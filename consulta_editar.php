<?php
        header('Content-type: application/json');
        include 'conexion.php';
        $sql = "select * from empleado where id_empleado=".$_GET['id'];
        $resultado=mysql_query($sql);


        $arr_result = array();
        while($result_of_result2= mysql_fetch_assoc($resultado))
        {
        $arr_result = $result_of_result2;
        }
    
        echo json_encode($arr_result);
        
        
?>