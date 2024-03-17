<link rel="stylesheet" href="css/slogin.css" type="text/css">

<?php 
		if(isset($_GET['editar'])){
			
			$editar_id = $_GET['editar']; 
			
			$consulta = "SELECT * FROM datos WHERE id='$editar_id'";
			$ejecutar = mysqli_query($con, $consulta); 
			
			$fila=mysqli_fetch_array($ejecutar);
			
			$usuario = $fila['usuario']; 
			$nombre = $fila['nombre']; 
			$pass = $fila['contraseña']; 
			$email = $fila['correo'];
			
			}
?>
		
<section class="container-fluid"> 
	<section class="row justify-content-center">
		<section class="col-12 col-sm-6 col-md-3"> 
			<form class="form-container" method="post" action="">
				<div class="form-group">
					<input class="form-control" type="text" name="usuario" value="<?php echo $usuario;?>"/><br/>
					<input class="form-control" type="text" name="nombre" value="<?php echo $nombre;?>"/><br/>
					<input class="form-control" type="password" name="passw" value="<?php echo $pass;?>"/><br/>
					<input class="form-control" type="text" name="email" value="<?php echo $email ;?>"/><br/>
					<input class="btn btn-primary btn-block" type="submit" name="actualizar" value="ACTUALIZAR DATOS"/>
					</div>
			</form>
		</section> 
	</section>
</section>
	<?php 
	if(isset($_POST['actualizar'])){
		$actualizar_usuario = $_POST['usuario'];
		$actualizar_nombre = $_POST['nombre'];
		$actualizar_pass = $_POST['passw'];
		$actualizar_email = $_POST['email'];
		
		$actualizar = "UPDATE datos SET usuario='$actualizar_usuario',nombre='$actualizar_nombre', contraseña='$actualizar_pass', correo='$actualizar_email' WHERE id='$editar_id'";
		
		$ejecutar = mysqli_query($con, $actualizar);
	
		if($ejecutar){
		
		echo "<script>alert('Datos actualizados!')</script>";
		echo "<script>window.open('formulario.php','_self')</script>";
		}
	}
	
	?> 