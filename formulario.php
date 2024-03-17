
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/slogin.css" type="text/css">

<!DOCTYPE html> 
<meta charset="UTF-8">
<?php  
$con = mysqli_connect("localhost","root","","crud") or die("conexion exitosa!");
?>
<html> 	
		<head>
			<meta chrset="UTF-8">
			<title>Login</title> 
		</head>
<body>



<section class="container-fluid"> 
	<section class="row justify-content-center">
		<section class="col-12 col-sm-6 col-md-3"> 
			<form class="form-container" method="post" action="formulario.php">
				<div class="form-group">
						<label>Usuario:</label>
						<input type="text" class="form-control" name="usuario" placeholder="Escriba su nombre"/><br/>

						<label>Nombre:</label>
						<input type="text" class="form-control" name="nombre" placeholder="Escriba su nombre"/><br/>

						<label>Contraseña:</label>
						<input type="password" class="form-control" name="passw" placeholder="Escriba se contraseña"/><br/>

						<label>Email:</label>
						<input type="text" class="form-control" name="email" placeholder="Escriba su email"/><br/>

						<input type="submit" class="btn btn-primary btn-block" name="insert" value="INSERTAR DATOS"/>

						<a class="btn btn-primary btn-block" href="Pagina.html">REGRESAR</a></p>

				</div>
			</form>
		</section> 
	</section>
</section>
	
	<?php 
	if(isset($_POST['insert'])){
	
		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$pass = $_POST['passw'];
		$email = $_POST['email'];
		$fecha= date('d/m/y');

		$insertar = "INSERT INTO datos (usuario,nombre,contraseña,correo,fecha) values ('$usuario','$nombre','$pass','$email','$fecha')";
		
		$ejecutar = mysqli_query($con,$insertar);
	
		if($ejecutar){
		
		echo "<h3>Insertado correctamente</h3>";
		}
	}
	
	?> 
	
	<div class="container">
		<table class="table table-hover table-bordered table-dark">
			<thead>
		
			<tr>
				<th>ID</th>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Password</th>
				<th>Email</th>
				<th>Editar</th>
				<th>Borrar</th>
			</tr>
			
			<?php 
				
				
				$consulta = "SELECT * FROM datos";
				
				$ejecutar = mysqli_query($con, $consulta); 
				
				$i = 0;
				
				while($fila=mysqli_fetch_array($ejecutar)){			
					$id = $fila['id'];
					$usuario = $fila['usuario']; 
					$nombre = $fila['nombre']; 
					$password = $fila['contraseña']; 
					$email = $fila['correo'];
					$i++;	
				
			?>
			<tr align="center">
				<td><?php echo $id; ?></td>
				<td><?php echo $usuario; ?></td>
				<td><?php echo $nombre; ?></td>
				<td><?php echo $password; ?></td>
				<td><?php echo $email; ?></td>
				<td><a href="formulario.php?editar=<?php echo $id; ?>" class="btn btn-info">Editar</a></td>
				<td><a href="formulario.php?borrar=<?php echo $id; ?>" class="btn btn-danger">Borrar</a></td>
			</tr>
			<?php } ?>
			
		
		</table>
		<thead>	
	</div>
	
		<?php
			if(isset($_GET['editar'])){
			include("editar.php");
			}
		?> 
		<?php 
		if(isset($_GET['borrar'])){
		
		$borrar_id = $_GET['borrar'];
		
		$borrar = "DELETE FROM datos WHERE id='$borrar_id'";
		
		$ejecutar = mysqli_query($con,$borrar); 
			
			if($ejecutar){
			
			echo "<script>alert('El usuario ha sido borrado!')</script>";
			echo "<script>window.open('formulario.php','_self')</script>";
			}
		
		}
		
		?>
</body>
</html>