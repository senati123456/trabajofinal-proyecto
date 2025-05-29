<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" href="css/styles1.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="validarRegistro.php" method="post" onsubmit="return validarFormulario()">
					<label for="chk" aria-hidden="true">Regístrate</label>
					<input type="text" name="usuario" id="usuario" placeholder="Crea un usuario" required>
					<input type="email" name="email" id="email" placeholder="Email" required>
					<input type="password" name="password_" id="password_" placeholder="Crea tu contraseña" required>
					<button>Registrar</button>

                    <?php
                    if (isset($_GET['registro'])) {
                        if ($_GET['registro'] == 'exito') {
                            echo '<div class="alert-success">Registro exitoso</div>';
                        } elseif ($_GET['registro'] == 'error') {
                            echo '<div class="alert-danger">Error al registrarse</div>';
                        }
                    }
                    ?>

				</form>
			</div>

			<div class="login">
					<form action="validarIndex.php" method="POST">
						<label for="chk" aria-hidden="true">Iniciar sesión</label>
						<input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
						<input type="password" name="password_" id="password_" placeholder="Contraseña" required>
						<button>Iniciar Sesión</button>
					</form>
			</div>
	</div>
</body>
</html>