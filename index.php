<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD-PHP</title>
	<!--Apis de bootstrap e iconos-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<!--llamada de los estilos-->
    <link href="miestilo.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!--php para mostrar los datos de la base de datos-->
	<?php
        include 'conexion.php';
        $sql = "select * from empleado";
        $resultado=mysql_query($sql);
	?>
	<!--cabecera de la tabla y boton de agregar-->
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Empleados</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar empleado</span></a>						
					</div>
                </div>
			</div>
	<!--Inicio de nuestra tabla paramostrar los datos-->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
						<th>Sueldo</th>
                        <th>Puesto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($filas=mysql_fetch_assoc($resultado)){
                    ?>
                    <tr>
                        <td><?php echo $filas['id_empleado'] ?></td>
                        <td><?php echo $filas['Nombre'] ?></td>
						<td><?php echo $filas['Apellidos'] ?></td>
                        <td><?php echo $filas['Sueldo'] ?></td>
                        <td><?php echo $filas['Puesto'] ?></td>
                        <td>
							<a href="#editEmployeeModal" class="edit" data-toggle="modal" empleado="<?php echo $filas['id_empleado'] ?>" onclick="update(this);actualicer(this)"><i class="material-icons" data-toggle="tooltip" title="Edit" >&#xE254;</i></a>
							

							<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" empleado="<?php echo $filas['id_empleado'] ?>" onclick="delet(this);"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							
                        </td>
                    </tr>
					<?php } ?>
                </tbody>
            </table>
			
        </div>
    </div>
	<!-- Insertar empleados-- Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="insertar.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Agregar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" class="form-control" name="nomb" required>
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text" class="form-control" name="apell" required>
						</div>
						<div class="form-group">
							<label>Sueldo</label>
							<input type="text" class="form-control" name="suel" required>
						</div>
						<div class="form-group">
							<label>Puesto</label>
							<input type="text" class="form-control" name="puest" required>
						</div>					
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit"  class="btn btn-success" value="Agregar">
						
					</div>
					
				</form>

			</div>
			
			
		</div>
	</div>
	
	
	<!-- Modal de Editar HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="actualizaruser.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
							<input type="hidden" id="idempleado_edit" class="form-control" name="edid">
					<div class="modal-body">					
						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="idnomb_edit" class="form-control" name="ednomb">
						</div>
						<div class="form-group">
							<label>Apellidos</label>
							<input type="text"  id="idapell_edit" class="form-control" name="edapell">
						</div>
						<div class="form-group">
							<label>Sueldo</label>
							<input type="text"  id="idsuel_edit" class="form-control" name="edsuel">
						</div>
						<div class="form-group">
							<label>Puesto</label>
							<input type="text" id="idpuest_edit" class="form-control" name="edpuest">
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar">
					</div>
				</form>

			</div>
		</div>
		</div>
	</div>
	<!-- borarr datos Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form >
					<div class="modal-header">						
						<h4 class="modal-title">Eliminar Empleado</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>¿Seguro que deseas eliminar al empleado?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="button"  id="buttom_delete"  onclick="delet2(this)" class="btn btn-danger" value="Eliminar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--llamada de nuetro archivo js-->
	<script src="cupdate.js"></script>
</body>



</html>