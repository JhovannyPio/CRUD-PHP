<!--php de inserccion-->
<?php
	include 'conexion.php';

					
	$nomb = $_POST['ednomb'];
	$apell = $_POST['edapell'];
	$suel = $_POST['edsuel'];
	$puest = $_POST['edpuest'];
					
	
	if($nomb!=null||$apell!=null||$suel!=null||$puest!=null){

		mysql_query("update empleado set Nombre='$nomb', Apellidos='$apell', Sueldo='$suel', Puesto='$puest' where id_empleado=".$_POST['edid']) or die(mysql_error());
		
		header("location:index.php");
		
		}
				
?>