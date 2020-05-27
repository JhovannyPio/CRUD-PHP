<!--php de inserccion-->
<?php
	include 'conexion.php';

	$nomb = $_POST['nomb'];
	$apell = $_POST['apell'];
	$suel = $_POST['suel'];
	$puest = $_POST['puest'];
					
					
	if($nomb!=null||$apell!=null||$suel!=null||$puest!=null){
		$sqli="insert into empleado(Nombre,Apellidos,Sueldo,Puesto) values('".$nomb."','".$apell."','".$suel."','".$puest."')";
		mysql_query($sqli);
						
		header("location:index.php");
						
	}
				
?>