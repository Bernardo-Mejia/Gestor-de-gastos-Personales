<?php
	
	require "conexion.php";
	
	session_start();

    $autor="Bernardo Gabriel Mejía Pérez";
    $fechaActual = date('d-m-Y');
	
	if($_POST){
		
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];
		
		$sql = "SELECT id, password, nombre, tipo_usuario FROM usuario_login WHERE usuario='$usuario'";
		//echo $sql;
		$resultado = $mysqli->query($sql);
		$num = $resultado->num_rows;
		
		if($num>0){
			$row = $resultado->fetch_assoc();
			$password_bd = $row['password'];
			
			$pass_c = ($password);
			
			if($password_bd == $pass_c){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['nombre'] = $row['nombre'];
				$_SESSION['tipo_usuario'] = $row['tipo_usuario'];
				
				header("Location: principal.php");
				
			} else {
			
			echo "<h4>La contraseña no coincide</h4>";
			
			}
			
			
			} else {
			echo "<h4>
                    NO existe el usuario
                  </h4>";
		}
		
		
		
	}
	
	
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="./style/index.css">
        <!-- particles -->
        <!-- Fuentes -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet">
        <!-- Estilos CSS -->
        <link rel="stylesheet" href="./scripts/particles/css/estilos.css">    
        <script src="./scripts/particles/js/app.js"></script> 
        <title>Inicio de sesión</title>
        <!-- bootstrap -->
        <link href="./style/b_styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <!-- ID Particles.js -->
        <div id="particles-js"></div>
        
        
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de sesión</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Usuario</label><input class="form-control py-4" id="inputEmailAddress" name="usuario" type="text" placeholder="Ingresa tu usuario" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Ingresa tu contraseña" /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Recordar contraseña</label></div>
											</div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><a class="small" href="#">¿Olvidaste tu contraseña?</a>
											<button type="submit" class="btn btn-primary">Acceder</button></div>
										</form>
                                    </div>
                                    <!-- 
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                     -->
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <?php echo $autor.' <b>-</b> '.$fechaActual;?></div>
                            <div>
                                <a href="#">Políticas de privacidad</a>
                                &middot;
                                <a href="#">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./scripts/js/scripts.js"></script>

        <script src="./scripts/particles/js/particles.min.js"></script>
        <script src="https://kit.fontawesome.com/a2e8d0339c.js"></script>
    </body>
</html>
